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
            <h1 class="m-0 text-dark">Dokumen SDD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Project</a></li>
              <li class="breadcrumb-item active">Demand</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" id="div-content">

                <div class="row" id="report2">
                  <div class="col-sm-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h4 class="card-title">Detail Dashboard BSA
                          <?php if ($jenis==1) echo " [Bulanan:$bulan]";
                            if ($jenis==2) echo " [Mingguan:$tanggal]";
                            if ($jenis==3) echo " [PIC:$nama][Bulan:$bulan]";
                            if ($jenis==4) echo " [MGR:$nama][Bulan:$bulan]";
                          ?></h4>
                      </div>
                      <div class="card-body">  
                        <table id="mytable" class="table table-bordered table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th class="th-datatables">Tanggal</th>
                              <th class="th-datatables">Nomor SDD</th>
                              <th class="th-datatables">Demand ID</th>
                              <th class="th-datatables">No CR</th>
                              <th class="th-datatables">Deskripsi</th>
                              <th class="th-datatables">Tim BSA</th>
                              <th class="th-datatables">Divisi</th>
                              <th class="th-datatables">Aplikasi Terdampak</th>
                              <th class="th-datatables">Status</th>
                              <th class="th-datatables">Mandays</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            if (!empty($datasddbsa)) {
                            foreach ($datasddbsa as $row) 
                            {  
                              ?>
                            <tr>
                              <td class="td-datatables"><?php echo $row->tanggaldokumen; ?></td>
                              <td class="td-datatables"><?php echo $row->nomordokumen; ?></td>
                              <td class="td-datatables"><?php echo $row->demandid; ?></td>
                              <td class="td-datatables"><?php echo $row->nomorcr; ?></td>
                              <td class="td-datatables"><?php echo $row->deskripsi; ?></td>
                              <td class="td-datatables"><?php echo $row->nama; ?></td>
                              <td class="td-datatables"><?php echo $row->divisi; ?></td>
                              <td class="td-datatables"><?php echo $row->aplikasiterdampak; ?></td>
                              <td class="td-datatables"><?php echo $row->status; ?></td>
                              <td class="td-datatables"><?php echo $row->estimasimandays; ?></td>
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
