  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <!-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped"  id="mytable">
                  <thead>
                    <tr>
                      <th class="th-datatables">Demand ID</th>
                      <th class="th-datatables">Jenis Dokumen</th>
                      <th class="th-datatables">Nomor Dokumen</th>
                      <th class="th-datatables">Tanggal Dokumen</th>
                      <th class="th-datatables">Deskripsi</th>
                      <th class="th-datatables">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dokumen as $row) {
                      ?>
                    <tr>
                      <td><?php echo $row->DemandID;?></td>
                      <td><?php echo $row->JenisDokumen;?></td>
                      <td><?php echo $row->NomorDokumen;?></td>
                      <td><?php echo $row->TanggalDokumen;?></td>
                      <td><?php echo $row->Deskripsi;?></td>
                      <td>
                        <a href="javascript:detaildok(1,'<?php echo $row->Id;?>')" data-toggle="tooltip" title="View"><i class="far fa-eye"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script >
    $(document).ready(function (e) {
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