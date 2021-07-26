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
            <h1 class="m-0 text-dark">Demand</h1>
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
                      <th class="th-datatables">Demand ID</th>
                      <th class="th-datatables">Nama/Deskripsi Demand</th>
                      <!-- <th class="th-datatables">Nama Project</th> -->
                      <th class="th-datatables">Divisi</th>
                      <th class="th-datatables">Jenis</th>
                      <th class="th-datatables">Status</th>
                      <th class="th-datatables">Tim Member</th>
                      <th class="th-datatables">Ekspektasi Implementasi</th>
                      <th class="th-datatables">No CR</th>
                      <th class="th-datatables">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $namabulan=array("","Januari","Februari","Maret","April","Mei",
                        "Juni","Juli","Agustus","September","Oktober","November","Desember");
                      if (!empty($datademand)) {
                      foreach ($datademand as $row) 
                      {  
                        if ($row->MingguEksImplementasi<>0) {$eksimpl='W'.$row->MingguEksImplementasi.' '.$namabulan[$row->BulanEksImplementasi].
                          ' '.$row->TahunEksImplementasi;} 
                        elseif ($row->BulanEksImplementasi<>0) {
                            $eksimpl=$namabulan[$row->BulanEksImplementasi].
                          ' '.$row->TahunEksImplementasi ;}
                        else {$eksimpl='Q'.$row->KuartalEksImplementasi.
                          ' '.$row->TahunEksImplementasi ;}
                          
                        ?>
                      <tr>
                        <td class="td-datatables"><?php echo $row->DemandId;?>
                        </td>
                        <td class="td-datatables"><?php echo $row->NamaDemand; ?></td>
                        <!-- <td class="td-datatables"><?php echo $row->NamaProject; ?></td> -->
                        <td class="td-datatables"><?php echo $row->Divisi; ?></td>
                        <td class="td-datatables"><?php 
                        $jenis='';
                        if ($row->JenisDemand == 'Carry Over') $jenis = 'Carry Over';
                        else if ($row->SoIn == 'SO') $jenis = 'Sign Off';
                        else $jenis = 'Insersi';
                        echo $row->ProjectProcurement.'-'.$jenis; ?></td>
                        <td class="td-datatables"><?php 
                        if ($row->ProjectProcurement == 'Project') echo $row->StatusProject;
                        else echo $row->StatusProcurement; ?></td>
                        <td class="td-datatables"><?php echo $row->tim_member; ?></td>
                        <td class="td-datatables"><?php echo $eksimpl; ?></td>
                        <td class="td-datatables"><?php echo $row->nomorcr; ?></td>
                        <td class="td-datatables">
                        <a href="<?php echo base_url('project') ?>/demanddetail?id=7&aksi=View&demandid=<?php echo $row->DemandId;?>" data-toggle="tooltip" title="View"><i class="far fa-eye"></i></a>
                        <?php if ($NPP<>'') { ?>
                          <a href="<?php echo base_url('project') ?>/demanddetail?id=7&aksi=Edit&demandid=<?php echo $row->DemandId;?>" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a>
                          <a href="javascript:hapusdemand(<?php echo $row->DemandId;?>)" data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i></a>
                        <?php } ?> </td>
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
