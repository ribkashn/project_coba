  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section div class="content-header" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-10">
            <h1 class="m-0 text-dark">Inbox</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content pb-1">
      <div class="container-fluid h-100">
        <div class="row">
          <div class="col-sm-9">
            <ul class="nav nav-pills ml-auto p-3">
              <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Demand PIC</a></li>
              <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Demand Tim</a></li>
              <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">PVCS Tracker PIC</a></li>
              <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">PVCS Tracker Tim</a></li>
            </ul>
          </div>
          <div class="col-sm-1" style="padding-top: 40px">
            <div class="icheck-primary d-inline">
              <input type="checkbox" class="form-control" id="baru" name="baru" onchange="ubahbaru()">
              <label class="form-check-label" for="baru"><span class="badge badge-success">New</span></label>
            </div>
          </div>
          <div class="col-sm-2" style="padding-top: 40px">
            <div class="icheck-primary d-inline">
              <input type="checkbox" class="form-control" id="merah" name="merah" onchange="ubahwarna('merah')">
              <label class="form-check-label" for="merah"><i class="fas fa-circle" style="color:red"></i></label>
            </div>
            <div class="icheck-primary d-inline" style="padding-left: 10px">
              <input type="checkbox" class="form-control" id="kuning" name="kuning" onchange="ubahwarna('kuning')">
              <label class="form-check-label" for="kuning"><i class="fas fa-circle" style="color:yellow"></i></label>
            </div>
          </div>
        </div>
        
        
        <div class="row">
          <div class="col-sm-3">
            <div class="card card-row card-secondary">
              <div class="card-header">
                <h3 class="card-title">
                  <?php echo $jenis1; ?>
                </h3>
                <div class="card-tools">
                  <span class="badge badge-warning"><?php echo $jumlah1; ?></span>
                </div>
              </div>
              
              <div class="card-body"  style="height: 600px; overflow-y: auto;padding: 8px">
                <?php if ($jumlah1>0) {
                foreach ($datapic1 as $row) { 
                    $warna=' hijau';
                    $batas=9;
                    if ($row->kategoripengembanganproject=='Kategori A (1-2 minggu)') $batas=2;
                    if ($row->kategoripengembanganproject=='Kategori C (3-5 bulan)') $batas=15;
                    if ($row->kategoripengembanganproject=='Kategori D + Pengadaan (> 5 bulan)') $batas=18;
                    if ($row->selisih<=$batas) $warna=' kuning';
                    if ($row->selisih<0) $warna=' merah';
                  ?>
                <div class="card card-info card-outline <?php if ($row->baru=='') echo 'lama'; echo $warna; ?>">
                  <div class="card-header" style="padding-left: 15px;padding-right: 15px">
                    <h5 class="card-title">
                      <?php if ($warna!=' hijau') { ?>
                      <i class="fas fa-circle" style="color:<?php if ($warna==' kuning') echo 'yellow'; else echo 'red';?>"></i>
                      <?php } ?>
                      <?php echo $row->DemandId;?></h5>
                    <?php if ($row->baru=='Y') { ?>
                      <span class="badge badge-success" style="font-size: 60%;vertical-align: top;">New</span>
                    <?php } ?>
                    <div class="card-tools">
                      <a href="<?php $url=base_url('project/demanddetail').'?id=7&aksi=View&demandid='.$row->DemandId; echo $url;?>" data-toggle="tooltip" title="View" style="padding-left: 4px;padding-right: 4px"><i class="far fa-eye" style="color: #adb5bd"></i></a>
                      <a href="<?php $url=base_url('project/demanddetail').'?id=7&aksi=Edit&demandid='.$row->DemandId.'&dari=inbox'; echo $url;?>" data-toggle="tooltip" title="Edit" style="padding-left: 4px;padding-right: 4px"><i class="far fa-edit" style="color: #adb5bd"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <?php echo $row->NamaDemand;?>
                  </div>
                </div>
              
            <?php } 
              } ?>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card card-row card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <?php echo $jenis2; ?>
                </h3>
                <div class="card-tools">
                  <span class="badge badge-warning"><?php echo $jumlah2; ?></span>
                </div>
              </div>
              <div class="card-body" style="height: 600px; overflow-y: auto;padding: 8px">
              <?php if ($jumlah2>0) {
                foreach ($datapic2 as $row) { 
                    $warna=' hijau';
                    $batas=9;
                    if ($row->kategoripengembanganproject=='Kategori A (1-2 minggu)') $batas=2;
                    if ($row->kategoripengembanganproject=='Kategori C (3-5 bulan)') $batas=15;
                    if ($row->kategoripengembanganproject=='Kategori D + Pengadaan (> 5 bulan)') $batas=18;
                    if ($row->selisih<=$batas) $warna=' kuning';
                    if ($row->selisih<0) $warna=' merah';
                  ?>
              
                <div class="card card-info card-outline <?php if ($row->baru=='') echo 'lama'; echo $warna;?>">
                  <div class="card-header" style="padding-left: 15px;padding-right: 15px">
                    <h5 class="card-title">
                      <?php if ($warna!=' hijau') { ?>
                      <i class="fas fa-circle" style="color:<?php if ($warna==' kuning') echo 'yellow'; else echo 'red';?>"></i>
                      <?php } ?>
                      <?php echo $row->DemandId;?></h5>
                    <?php if ($row->baru=='Y') { ?>
                      <span class="badge badge-success" style="font-size: 60%;vertical-align: top;">New</span>
                    <?php } ?>
                    <div class="card-tools">
                      <a href="<?php $url=base_url('project/demanddetail').'?id=7&aksi=View&demandid='.$row->DemandId; echo $url;?>" data-toggle="tooltip" title="View" style="padding-left: 4px;padding-right: 4px"><i class="far fa-eye" style="color: #adb5bd"></i></a>
                      <a href="<?php $url=base_url('project/demanddetail').'?id=7&aksi=Edit&demandid='.$row->DemandId.'&dari=inbox'; echo $url;?>" data-toggle="tooltip" title="Edit" style="padding-left: 4px;padding-right: 4px"><i class="far fa-edit" style="color: #adb5bd"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <?php echo $row->NamaDemand;?>
                  </div>
                </div>
            <?php } 
              } ?>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card card-row card-default">
              <div class="card-header bg-info">
                <h3 class="card-title">
                  <?php echo $jenis3; ?>
                </h3>
                <div class="card-tools">
                  <span class="badge badge-warning"><?php echo $jumlah3; ?></span>
                </div>
              </div>
              <div class="card-body" style="height: 600px; overflow-y: auto;padding: 8px">
              <?php if ($jumlah3>0) {
                foreach ($datapic3 as $row) { 
                  $warna=' hijau';
                    $batas=9;
                    if ($row->kategoripengembanganproject=='Kategori A (1-2 minggu)') $batas=2;
                    if ($row->kategoripengembanganproject=='Kategori C (3-5 bulan)') $batas=15;
                    if ($row->kategoripengembanganproject=='Kategori D + Pengadaan (> 5 bulan)') $batas=18;
                    if ($row->selisih<=$batas) $warna=' kuning';
                    if ($row->selisih<0) $warna=' merah';
                  ?>
                <div class="card card-info card-outline <?php if ($row->baru=='') echo 'lama'; echo $warna;?>">
                  <div class="card-header" style="padding-left: 15px;padding-right: 15px">
                    <h5 class="card-title"><?php if ($warna!=' hijau') { ?>
                      <i class="fas fa-circle" style="color:<?php if ($warna==' kuning') echo 'yellow'; else echo 'red';?>"></i>
                      <?php } ?>
                      <?php echo $row->DemandId;?></h5>
                    <?php if ($row->baru=='Y') { ?>
                      <span class="badge badge-success" style="font-size: 60%;vertical-align: top;">New</span>
                    <?php } ?>
                    <div class="card-tools">
                      <a href="<?php $url=base_url('project/demanddetail').'?id=7&aksi=View&demandid='.$row->DemandId; echo $url;?>" data-toggle="tooltip" title="View" style="padding-left: 4px;padding-right: 4px"><i class="far fa-eye" style="color: #adb5bd"></i></a>
                      <a href="<?php $url=base_url('project/demanddetail').'?id=7&aksi=Edit&demandid='.$row->DemandId.'&dari=inbox'; echo $url;?>" data-toggle="tooltip" title="Edit" style="padding-left: 4px;padding-right: 4px"><i class="far fa-edit" style="color: #adb5bd"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <?php echo $row->NamaDemand;?>
                  </div>
                </div>
            <?php } 
              } ?>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card card-row card-success">
            <div class="card-header">
              <h3 class="card-title">
                <?php echo $jenis4; ?>
              </h3>
              <div class="card-tools">
                <span class="badge badge-warning"><?php echo $jumlah4; ?></span>
              </div>
            </div>
            <div class="card-body"  style="height: 600px; overflow-y: auto;padding: 8px">
            <?php if ($jumlah4>0) {
              foreach ($datapic4 as $row) { 
                ?>
              <div class="card card-info card-outline <?php if ($row->baru=='') echo 'lama';echo ' hijau';?>">
                <div class="card-header" style="padding-left: 15px;padding-right: 15px">
                  <h5 class="card-title"><?php echo $row->DemandId;?></h5>
                  <?php if ($row->baru=='Y') { ?>
                      <span class="badge badge-success" style="font-size: 60%;vertical-align: top;">New</span>
                    <?php } ?>
                  <div class="card-tools">

                    <a href="<?php $url=base_url('project/demanddetail').'?id=7&aksi=View&demandid='.$row->DemandId; echo $url;?>" data-toggle="tooltip" title="View" style="padding-left: 4px;padding-right: 4px"><i class="far fa-eye" style="color: #adb5bd"></i></a>
                    <a href="<?php $url=base_url('project/demanddetail').'?id=7&aksi=Edit&demandid='.$row->DemandId.'&dari=inbox'; echo $url;?>" data-toggle="tooltip" title="Edit" style="padding-left: 4px;padding-right: 4px"><i class="far fa-edit" style="color: #adb5bd"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <?php echo $row->NamaDemand;?>
                </div>
              </div>
          <?php } 
            } ?>
            </div>
          </div>
          </div>
      </div>
    </div>
    </section>


</div>

<script>
$(document).ready(function (e) {
     getData();
    // showPage();
  });

function getData() {
    $("#hasil").load("<?php echo base_url('inbox'); ?>/getinbox",{jenis: '1'});
  }

function ubahbaru() {
  if ($('#baru').prop('checked')) $('.lama').hide();
  else $('.lama').show();
}

function ubahwarna(v_warna) {
  if (v_warna=='merah') {
    if ($('#merah').prop('checked')) {
      $('#kuning').prop("checked", false);
      $('.merah').show();
      $('.hijau').hide();
      $('.kuning').hide();
    }
    else {
      $('.hijau').show();
      $('.kuning').show();
      $('.merah').show();
    }
  }
  if (v_warna=='kuning') {
    if ($('#kuning').prop('checked')) {
      $('#merah').prop("checked", false);
      $('.kuning').show();
      $('.hijau').hide();
      $('.merah').hide();
    }
    else {
      $('.hijau').show();
      $('.kuning').show();
      $('.merah').show();
    }
  }
}

</script>
