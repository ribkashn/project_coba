<!DOCTYPE html>
<html>
<?php $this->load->view('template/head'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php $this->load->view('template/navbar'); ?>

  <?php $this->load->view('template/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard PTM</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard PTM</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-2">
            <label for="tanggal">Tanggal Promote</label>
          </div>
          <div class="col-sm-2">
            <div class="input-group" id="grptanggal">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="tglmulai" name="tglmulai" placeholder="Tanggal" value="<?php echo $tglmulai; ?>" onchange="ubahtgl()">
            </div>
          </div>
          s/d
          <div class="col-sm-2">
            <div class="input-group" id="grptanggal">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="tglakhir" name="tglakhir" placeholder="Tanggal" value="<?php echo $tglakhir; ?>" onchange="ubahtgl()">
            </div>
          </div>
        </div>
        <br>
        
        <!-- Small boxes (Stat box) -->

        <div id="result">
        </div>

      </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('template/footer'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('template/script'); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url('assets/AdminLTE') ?>/dist/js/pages/dashboard.js"></script> -->
<script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/datalabels/chartjs-plugin-datalabels.min.js"></script>

<script>
$(document).ready(function (e) {
  getData();
});

function getData() {
    $("#result").load("<?php echo base_url('dashboard'); ?>/dashboardptm1",{tglmulai: $("#tglmulai").val(),tglakhir: $("#tglakhir").val()});

    $("#loading").addClass("overlay");
    $("#loading").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');

  }

function Removeclass() {
    $('#loading').removeClass('overlay');
    $('#loading').fadeOut();    
  }


$('#tglmulai').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grptanggal",
  });

$('#tglakhir').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grptanggal",
  });

function ubahtgl() {
  var tglmulai=$("#tglmulai").val().substring(6,10)+$("#tglmulai").val().substring(3,5)+$("#tglmulai").val().substring(0,2);
  var tglakhir=$("#tglakhir").val().substring(6,10)+$("#tglakhir").val().substring(3,5)+$("#tglakhir").val().substring(0,2);

  if (tglakhir >= tglmulai) {
    getData();
  }
}

function detaildashboard (jenis,var1) {
  var tglmulai=$("#tglmulai").val();
  var tglakhir=$("#tglakhir").val();

  if (jenis==1) { 
    str="<?php echo base_url('dashboard') ?>/detaildashboardtracker?jenis=1&divisi="+var1+"&tglmulai="+tglmulai+"&tglakhir="+tglakhir;
  }
  if (jenis==2) { 
    str="<?php echo base_url('dashboard') ?>/detaildashboardtracker?jenis=2&maingroup="+var1+"&tglmulai="+tglmulai+"&tglakhir="+tglakhir;
  }
  if (jenis==3) {
    str="<?php echo base_url('dashboard') ?>/detaildashboardtracker?jenis=3&rproddate="+var1+"&tglmulai="+tglmulai+"&tglakhir="+tglakhir;
  }
  if (jenis==4) {
    str="<?php echo base_url('dashboard') ?>/detaildashboardtracker?jenis=4&projectcategory="+var1+"&tglmulai="+tglmulai+"&tglakhir="+tglakhir;
  }

  window.open(str);
}

</script>
</body>
</html>
