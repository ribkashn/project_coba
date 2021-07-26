<!DOCTYPE html>
<html>
<?php $this->load->view('template/head'); ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
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
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard PTM</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" id="div-content">

        <div class="row">
          <section class="col-lg-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-table mr-1"></i>
                      Data Result
                </h3>
                <div class="card-tools">
                </div>
              </div>

              <div class="card-body">
                <h5><?php echo $judul;?></h5>
                <br>
                <div class="row">
                  <div class="col-sm-12">
                  <table id="mytable" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                    <tr>
                      <th class="th-datatables">CR Track No</th>
                      <th class="th-datatables">Submit Date</th>
                      <th class="th-datatables">Project Name</th>
                      <th class="th-datatables">Assign to</th>
                      <th class="th-datatables">PO1</th>
                      <th class="th-datatables">Demand Id</th>
                      <th class="th-datatables">CR Status</th>
                      <th class="th-datatables">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $namabulan=array("","Januari","Februari","Maret","April","Mei",
                        "Juni","Juli","Agustus","September","Oktober","November","Desember");
                      if (!empty($datatracker)) {
                      foreach ($datatracker as $row) 
                      {  
                        ?>
                      <tr>
                        <td class="td-datatables"><?php echo $row->nomorcrir;?></td>
                        <td class="td-datatables"><?php echo $row->submitdate; ?></td>
                        <td class="td-datatables"><?php echo $row->projectname.'-'.$row->shortdescription; ?></td>
                        <td class="td-datatables"><?php echo $row->assignto; ?></td>
                        <td class="td-datatables"><?php echo $row->po1; ?></td>
                        <td class="td-datatables"><?php echo $row->demandid; ?></td>
                        <td class="td-datatables"><?php echo $row->crstatus; ?></td>
                        <td class="td-datatables"><a href="<?php echo base_url('project') ?>/trackerdetail?id=10&aksi=View&nomorcr=<?php echo $row->nomorcrir;?>" data-toggle="tooltip" title="View"><i class="far fa-eye"></i></a></td>
                      </tr>
                      <?php }
                      }
                      ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>

            </div>
            </section>
        </div>
      </div>
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


<script>
  $(document).ready(function (e) {
    <?php if ($alert) echo 'showMessage();' ?>

  });

function showMessage() {
    var message1="<?php if($message1<>'') echo $message1; ?>";
    var message2="<?php if($message2<>'')echo $message2; ?>";
    var typealert="<?php if($typealert<>'')echo $typealert; ?>";
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      //timer: 3000
    });
    Toast.fire({
        icon: typealert,
        title: '&nbsp;'+message1
      });

}


  $(function () {
    $('#mytable').DataTable( {
      "processing": true, // for show progress bar
      "serverSide": false, // for process server side
      "dom": "<'row'<'col-sm-5'B><'col-sm-3 text-center'l><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "buttons": ["copy", "csv", "excel", "pdf", "colvis"],
    } );
  });


</script>
</body>
</html>
