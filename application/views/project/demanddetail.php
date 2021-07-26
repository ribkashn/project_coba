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
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12">
            <form action="<?php echo base_url('project') ?>/tambahdemand" method="post" name="frmfilter">
            <div class="card card-info">
              <div class="  card-header">
                <h3 class="card-title">
                  <?php echo $aksi?> Demand <?php if ($aksi!='Tambah') echo ' -- ';?><label><?php if ($detaildemand) echo   $detaildemand[0]->DemandId; ?> </label>
                </h3>
              </div>
           
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">

                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Demand</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">PVCS Tracker</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Dokumen</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Note</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Histori</a></li>
                </ul>
                <hr>


                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  <?php 
                    if ($aksi=='Tambah') {$view='T';$edit='Y';}
                    if ($aksi=='Edit') {$view='Y';$edit='Y';}
                    if ($aksi=='View') {$view='Y';$edit='T';} ?>
                <div class="row">
                  <div class="col-sm-12">
                    <label>Demand</label>

                    <div class="form-group">
                      <div class="row">
                         <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="jenisdemand">Jenis Demand</label>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenisdemand" id="Baru" onclick="jenis_demand('Baru')" value="Baru" required
                            <?php 
                            if (($view=='Y') and ($detaildemand[0]->JenisDemand!='Carry Over')) echo ' checked'; 
                            if($view=='Y') echo ' disabled';?> >
                            <label class="form-check-label" for="Baru" >Baru</label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenisdemand" id="Carryover" onclick="jenis_demand('Carry')" value="Carry Over"
                             <?php 
                            if (($view=='Y') and ($detaildemand[0]->JenisDemand=='Carry Over')) echo ' checked'; 
                            if($view=='Y') echo ' disabled';?>
                            >
                            <label class="form-check-label" for="Carryover">Carry Over</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="demandid">Demand ID</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="demandid" name="demandid" placeholder="Demand ID" readonly value="<?php if ($view=='Y') echo $detaildemand[0]->DemandId;?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="jenisdemand">Tipe Demand</label>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipedemand" id="SO" onclick="tipe_demand('SO')" value="SO" required
                            <?php 
                              if (($view=='Y') and ($detaildemand[0]->SoIn=='SO')) echo ' checked';
                              if ($view=='Y') echo ' disabled';
                              ?> >
                            <label class="form-check-label" for="SO">Sign Off</label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipedemand" id="IN" onclick="tipe_demand('IN')" value="IN"
                            <?php 
                              if (($view=='Y') and ($detaildemand[0]->SoIn=='IN')) echo ' checked';
                              if ($view=='Y') echo ' disabled';
                              ?> >
                            <label class="form-check-label" for="IN">Insersi</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="tahundemand">Tahun Create Demand</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="tahundemand" name="tahundemand" value="<?php if ($view=='Y') echo $detaildemand[0]->TahunDemand; else echo date('Y'); ?>" placeholder="Tahun Create Demand" required <?php if ($view=='Y') echo ' readonly'; ?>>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="periodedemand">Periode Demand</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="periodedemand" name="periodedemand" value="<?php if ($view=='Y') echo $detaildemand[0]->PeriodeDemand; else echo date('Y'); ?>" placeholder="Periode Demand" required <?php if ($view=='Y') echo ' readonly'; ?>>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="namademand">Nama/Deskripsi Demand</label>
                        </div>
                        <div class="col-sm-7">
                          <textarea class="form-control" rows="5" id="namademand" name="namademand" placeholder="Nama/Deskripsi Demand" required <?php  if ($edit=='T') echo ' readonly';?>><?php if ($view=='Y') echo $detaildemand[0]->NamaDemand;?></textarea>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="divisi">Divisi</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="divisi" name="divisi" required
                          <?php if ($view=='Y') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listdivisi)) {
                              foreach ($listdivisi as $row) { ?>
                                <option value="<?php echo $row->Kode;?>" 
                                  <?php if (($view=='Y') and ($detaildemand[0]->Divisi==$row->Kode)) echo 'selected '; ?>><?php echo $row->Kode.'-'.$row->Nama;  ?></option>
                                  <?php  
                              }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="lob">Line of Business</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="lob" name="lob" required <?php if ($view=='Y') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listlob)) {
                              foreach ($listlob as $row) { ?>
                                <option value="<?php echo $row->Kode;?>" <?php if (($view=='Y') and ($detaildemand[0]->LOB==$row->Kode)) echo 'selected '; ?>><?php echo $row->Kode.'-'.$row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="program">Program</label>
                        </div>
                        <div class="col-sm-7">
                          <input class="form-control"  name="program" id="program" <?php if ($edit=='T') echo ' disabled';?> value="<?php if ($view=='Y' and !empty($detaildemand[0]->Program)) echo $detaildemand[0]->Program;?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="project">Project</label>
                        </div>
                        <div class="col-sm-7">
                          <input class="form-control"  name="nmproject" id="nmproject" <?php if ($edit=='T') echo ' disabled';?> value="<?php if ($view=='Y' and !empty($detaildemand[0]->Project)) echo $detaildemand[0]->Project.': '.$detaildemand[0]->Nama;?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="procurement">Project/Procurement</label>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="projectprocurement" id="project" onclick="ubah_status('Project')" value="Project" required  <?php 
                            if (($view=='Y') and ($detaildemand[0]->ProjectProcurement=='Project')) echo ' checked'; 
                            if($edit=='T') echo ' disabled';?>>
                            <label class="form-check-label" for="project">Project</label>
                          </div>
                        </div>
                        <div class="com-sm-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="projectprocurement" id="procurement" onclick="ubah_status('Procurement')" value="Procurement" <?php 
                            if (($view=='Y') and ($detaildemand[0]->ProjectProcurement=='Procurement')) echo ' checked'; 
                            if($edit=='T') echo ' disabled';?>>
                            <label class="form-check-label" for="procurement">Procurement</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="statusproject">Status Project/Procurement</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="statusproject" name="statusproject" <?php if ($edit=='T') echo ' disabled';?>>
                           <?php
                              if ($detaildemand[0]->ProjectProcurement == 'Project') {
                                if (!empty($liststatusproject)) {
                                  foreach ($liststatusproject as $row) { ?>
                                  <option value="<?php echo $row->Nama;?>" <?php if ($view=='Y' and $detaildemand[0]->StatusProject == $row->Nama) echo 'selected';  ?>><?php echo $row->Nama;  ?></option>
                                  <?php  
                                  }
                                }
                              } elseif ($detaildemand[0]->ProjectProcurement == 'Procurement') {
                                if (!empty($liststatusprocurement)) {
                                  foreach ($liststatusprocurement as $row) { ?>
                                  <option value="<?php echo $row->Kode.'. '.$row->Nama;?>" <?php if ($view=='Y' and $detaildemand[0]->StatusProcurement == $row->Kode.'. '.$row->Nama) echo 'selected';  ?>><?php echo $row->Kode.'. '.$row->Nama;  ?></option>
                                  <?php  
                                  }
                                }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="grouping">Grouping</label>
                        </div>
                        <div class="col-sm-7">
                          <input class="form-control" name="grouping" id="grouping" <?php if ($edit=='T') echo ' disabled'; ?> value="<?php if ($view=='Y' and !empty($detaildemand[0]->Grouping)) echo $detaildemand[0]->Grouping;?>" >
                          <!-- <datalist id="listgrouping" style="font-family: inherit;">
                            <?php
                            if (!empty($listgrouping)) {
                              foreach ($listgrouping as $row) { ?>
                                <option value="<?php echo $row->Nama;?>" <?php if ($view=='Y' and $detaildemand[0]->Grouping == $row->Nama) echo 'selected';  ?>></option>
                            <?php  
                              }
                            } ?>
                          </datalist> -->
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="groupingcluster">Grouping Cluster</label>
                        </div>
                        <div class="col-sm-7">
                          <input class="form-control"  name="groupingcluster" id="groupingcluster" <?php if ($edit=='T') echo ' disabled';?> value="<?php if ($view=='Y' and !empty($detaildemand[0]->GroupingCluster)) echo $detaildemand[0]->GroupingCluster;?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="tipeproject">Tipe Project</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="tipeproject" name="tipeproject" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listtipeproject)) {
                              foreach ($listtipeproject as $row) { ?>
                                <option value="<?php echo $row->Nama;?>" <?php if ($view=='Y' and $detaildemand[0]->TipeProject == $row->Nama) echo 'selected';  ?>><?php echo $row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="tipeproject">Kategori Pengadaan</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="kategoripengadaan" name="kategoripengadaan" <?php 
                          if ($edit=='T') echo ' disabled';
                          if (!empty($detaildemand)) if ($detaildemand[0]->ProjectProcurement=='Project')  echo ' disabled'; ?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listkategoripengadaan)) {
                              foreach ($listkategoripengadaan as $row) { ?>
                                <option value="<?php echo $row->Nama;?>"><?php echo $row->Nama;  ?></option>
                              <?php  
                              }
                            } ?> 
                          </select>
                        </div>
                      </div>
                    </div>
    
                    <hr>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="corpplan">Corporate Plan</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="corpplan" name="corpplan" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listcorpplan)) {
                              foreach ($listcorpplan as $row) { ?>
                                <option value="<?php echo $row->Kode;?>" <?php if ($view=='Y' and $detaildemand[0]->CorPlan == $row->Kode) echo 'selected';  ?>><?php echo $row->Kode.'-'.$row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="narative">Narative</label>
                        </div>
                        <div class="col-sm-7">
                          <textarea class="form-control" rows="2" id="narative" name="narative" <?php if ($edit=='Y') { ?>placeholder="Narative"<?php } ?> <?php if ($edit=='T') echo ' readonly'; ?>><?php if ($view=='Y') echo $detaildemand[0]->Narative;?></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="eksimplementasi">Ekspektasi Implementasi</label>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenisekspektasi" id="minggucek" onclick="ekspektasi('minggu')" <?php 
                                if (($view=='Y') and ($detaildemand[0]->MingguEksImplementasi!='0')) echo ' checked'; 
                                if($edit=='T') echo ' disabled';?>>
                            <label class="form-check-label" for="minggucek">Minggu ke</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control" id="mingguke" name="mingguke" <?php if ($aksi=='Tambah') echo 'disabled';
                             elseif ($detaildemand[0]->MingguEksImplementasi=='0') echo 'disabled';?> onchange="isiminggu()">
                            <option value=""></option>
                            <option value="1" <?php if ($view=='Y' and $detaildemand[0]->MingguEksImplementasi=='1') echo 'selected';?>>1</option>
                            <option value="2" <?php if ($view=='Y' and $detaildemand[0]->MingguEksImplementasi=='2') echo 'selected';?>>2</option>
                            <option value="3" <?php if ($view=='Y' and $detaildemand[0]->MingguEksImplementasi=='3') echo 'selected';?>>3</option>
                            <option value="4" <?php if ($view=='Y' and $detaildemand[0]->MingguEksImplementasi=='4') echo 'selected';?>>4</option>
                            <option value="5" <?php if ($view=='Y' and $detaildemand[0]->MingguEksImplementasi=='5') echo 'selected';?>>5</option>
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenisekspektasi" id="bulancek" onclick="ekspektasi('bulan')" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi<>'0' and $detaildemand[0]->MingguEksImplementasi=='0') echo 'checked';
                            if($edit=='T') echo ' disabled';?>>
                            <label class="form-check-label" for="bulancek">Bulan</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control" id="bulan" name="bulan"  <?php if ($aksi=='Tambah') echo 'disabled';
                             elseif ($detaildemand[0]->BulanEksImplementasi=='0') echo 'disabled';?>>
                            <option value=""></option>
                            <option value="1" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='1') echo 'selected'; ?>>Januari</option>
                            <option value="2" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='2') echo 'selected'; ?>>Februari</option>
                            <option value="3" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='3') echo 'selected'; ?>>Maret</option>
                            <option value="4" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='4') echo 'selected'; ?>>April</option>
                            <option value="5" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='5') echo 'selected'; ?>>Mei</option>
                            <option value="6" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='6') echo 'selected'; ?>>Juni</option>
                            <option value="7" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='7') echo 'selected'; ?>>Juli</option>
                            <option value="8" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='8') echo 'selected'; ?>>Agustus</option>
                            <option value="9" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='9') echo 'selected'; ?>>September</option>
                            <option value="10" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='10') echo 'selected'; ?>>Oktober</option>
                            <option value="11" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='11') echo 'selected'; ?>>November</option>
                            <option value="12" <?php if($view=='Y' and $detaildemand[0]->BulanEksImplementasi=='12') echo 'selected'; ?>>Desember</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenisekspektasi" id="kuartalcek" onclick="ekspektasi('kuartal')" value="kuartalcek" <?php if($view=='Y' and $detaildemand[0]->KuartalEksImplementasi<>'0') echo 'checked'; if($edit=='T') echo ' disabled';?>>
                            <label class="form-check-label" for="kuartalcek">Kuartal</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control" id="kuartal" name="kuartal"  <?php if ($aksi=='Tambah' or $aksi=='View') echo 'disabled';
                             elseif ($detaildemand[0]->KuartalEksImplementasi=='0') echo 'disabled';?>>
                            <option value=""></option>
                            <option value="1" <?php if($view=='Y' and $detaildemand[0]->KuartalEksImplementasi=='1') echo 'selected'; ?>>Q1-Kuartal 1</option>
                            <option value="2" <?php if($view=='Y' and $detaildemand[0]->KuartalEksImplementasi=='2') echo 'selected'; ?>>Q2-Kuartal 2</option>
                            <option value="3" <?php if($view=='Y' and $detaildemand[0]->KuartalEksImplementasi=='3') echo 'selected'; ?>>Q3-Kuartal 3</option>
                            <option value="4" <?php if($view=='Y' and $detaildemand[0]->KuartalEksImplementasi=='4') echo 'selected'; ?>>Q4-Kuartal 4</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                          Tahun
                        </div>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?php if ($view=='Y') echo $detaildemand[0]->TahunEksImplementasi; else echo date('Y'); ?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="mandays">Estimasi Mandays</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-2">
                          <label for="mandaysdesain">Desain</label>
                          <input type="text" class="form-control" id="mandaysdesain" name="mandaysdesain" placeholder="Mandays Desain" value="<?php if ($view=='Y') echo $detaildemand[0]->MandaysDesain; else echo '0';?>" <?php if ($edit=='T') echo ' readonly'; ?> onchange="hitungmandays()">
                        </div>
                        <div class="col-sm-2">
                          <label for="mandaysdev">Developmen</label>
                          <input type="text" class="form-control" id="mandaysdev" name="mandaysdev" placeholder="Mandays Dev" value="<?php if ($view=='Y') echo $detaildemand[0]->MandaysDev; else echo '0';?>" <?php if ($edit=='T') echo ' readonly'; ?> onchange="hitungmandays()">
                        </div>
                        <div class="col-sm-2">
                          <label for="mandaystest">Test</label>
                          <input type="text" class="form-control" id="mandaystest" name="mandaystest" placeholder="Mandays Test" value="<?php if ($view=='Y') echo $detaildemand[0]->MandaysTest; else echo '0';?>" <?php if ($edit=='T') echo ' readonly'; ?> onchange="hitungmandays()">
                        </div>
                        <div class="col-sm-2">
                          <label for="mandays">Total</label>
                          <input type="text" class="form-control" id="mandays" name="mandays" placeholder="Estimasi Mandays" value="<?php if ($view=='Y') echo $detaildemand[0]->EstimasiMandays; else echo '0';?>" readonly>
                        </div>
                      
                      </div>
                    </div>

                    <div class="form-group classterdampak" id="groupterdampak">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="terdampak">Aplikasi Terdampak</label>
                        </div>
                        <div class="col-sm-7">
                          <?php 
                            if (!empty($detaildemand[0]->AplikasiTerdampak))
                            $terdampak=explode(";", $detaildemand[0]->AplikasiTerdampak); else
                            $terdampak='';
                            $x=0;$looping=true;
                            do {  ?>
                          <div class="row elementterdampak" id="divterdampak_<?php echo $x+1;?>">
                            <div class="col-sm-11"> 
                              <input class="form-control inputterdampak" name="terdampak_<?php echo $x+1;?>" id="terdampak_<?php echo $x+1;?>"  <?php if ($edit=='T') echo ' disabled';?> value="<?php if ($view=='Y' and !empty($terdampak[$x])) echo $terdampak[$x];?>" >

                            </div>

                            <div class="col-sm-1">
                              <?php if ($x==0) { ?>
                              <button type="button" name="btnterdampak_<?php echo $x+1;?>" id="btnterdampak_<?php echo $x+1;?>" class="btn-sm btn-primary tambah1" <?php if ($edit=='T') echo ' disabled';?>><i class="fas fa-plus"></i></button>
                              <?php } else {
                              ?>
                              <button type="submit" name="deleteterdampak_<?php echo $x+1;?>" id="deleteterdampak_<?php echo $x+1;?>" class="btn-sm btn-danger remove" <?php if ($edit=='T') echo ' disabled';?> ><i class="fas fa-minus"></i></button>
                              <?php } ?>
                            </div>
                          </div>
                          <?php $x=$x+1;
                          if (empty($terdampak[$x])) $looping=false;
                          } while ($looping); ?> 
                        </div>
                      </div>
                    </div>

                    <hr class="hideBSA">

                    <div class="timmember" id="anggotatim">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="mgrbnp_1">Anggota Tim</label><br>
                        </div>
                      </div>

                      <div class="form-group hideBSA" id="timbnp">
                        <div class="row">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label for="mgrbnp_1">Tim BNP</label>
                          </div>
                        </div>

                        <?php
                          $x=0; $looping=true;
                          do {
                          if (!empty($listmembermgrbnp[$x])) $member= $listmembermgrbnp[$x]->npp;
                          else $member='';
                          ?>
                        <div class="row element_mgrbnp" id="divmgrbnp_<?php echo $x+1;?>">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label class="form-check-label"><?php if ($x==0) echo 'Manager';?></label>
                          </div>
                          <div class="col-sm-7">
                            <div class="row">
                              <div class="col-sm-11">
                                <select class="form-control member" id="mgrbnp_<?php echo $x+1;?>" name="mgrbnp_<?php echo $x+1;?>" <?php if ($edit=='T') echo ' disabled';?> onchange="rubahmember()">
                                  <option value=""></option>
                                  <?php
                                  if (!empty($listmgrbnp)) {
                                    foreach ($listmgrbnp as $row) { ?>
                                      <option value="<?php echo $row->NPP;?>" <?php if ($view=='Y' and $member == $row->NPP) echo 'selected';  ?>><?php echo $row->Nama.'/'.$row->NPP;  ?></option>
                                    <?php  
                                    }
                                  } ?>
                               </select>
                              </div>
                              <div class="col-sm-1">
                                <?php if ($x==0) { ?>
                                <button type="button" name="add_mgr_bnp" id="add_mgr_bnp" class="btn-sm btn-primary tambah" <?php if ($edit=='T') echo ' disabled';?>><i class="fas fa-plus"></i></button>
                                <?php } else { ?>
                                <button type="submit" name="delete_mgr_bnp_<?php echo $x+1;?>" id="delete_mgr_bnp_<?php echo $x+1;?>" class="btn-sm btn-danger remove" <?php if ($edit=='T') echo ' disabled';?> ><i class="fas fa-minus"></i></button>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $x=$x+1;
                        if (empty($listmembermgrbnp[$x])) $looping=false;
                            } while ($looping); ?>

                        <?php
                          $x=0; $looping=true;
                          do {
                          if (!empty($listmemberamgrbnp[$x])) $member= $listmemberamgrbnp[$x]->npp;
                          else $member='';
                          ?>
                        <div class="row element_amgrbnp" id="divamgrbnp_<?php echo $x+1;?>">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label class="form-check-label"><?php if ($x==0) echo 'Asisten Manager';?></label>
                          </div>
                          <div class="col-sm-7">
                            <div class="row">
                              <div class="col-sm-11">
                                <select class="form-control member" id="amgrbnp_<?php echo $x+1;?>" name="amgrbnp_<?php echo $x+1;?>" <?php if ($edit=='T') echo ' disabled';?> onchange="rubahmember()">
                                  <option value=""></option>
                                  <?php
                                  if (!empty($listamgrbnp)) {
                                    foreach ($listamgrbnp as $row) { ?>
                                      <option value="<?php echo $row->NPP;?>"<?php if ($view=='Y' and $member == $row->NPP) echo 'selected';  ?>><?php echo $row->Nama.'/'.$row->NPP;  ?></option>
                                    <?php  
                                    }
                                  } ?>
                                ?>
                                </select>
                              </div>
                              <div class="col-sm-1">
                                <?php if ($x==0) { ?>
                                <button type="button" name="add_amgr_bnp" id="add_amgr_bnp" class="btn-sm btn-primary tambah" <?php if ($edit=='T') echo ' disabled';?>><i class="fas fa-plus"></i></button>
                                <?php } else { ?>
                                <button type="submit" name="delete_amgr_bnp_<?php echo $x+1;?>" id="delete_amgr_bnp_<?php echo $x+1;?>" class="btn-sm btn-danger remove" <?php if ($edit=='T') echo ' disabled';?> ><i class="fas fa-minus"></i></button>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $x=$x+1;
                        if (empty($listmemberamgrbnp[$x])) $looping=false;
                          } while ($looping); ?>
                      </div>

                      <div class="form-group" id="timbsa">
                        <div class="row">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label for="bsa1">Tim BSA</label>
                          </div>
                        </div>

                        <?php
                          $x=0; $looping=true;
                          do {
                          if (!empty($listmembermgrbsa[$x])) $member= $listmembermgrbsa[$x]->npp;
                          else $member='';
                          ?>
                        <div class="row element_mgrbsa" id="divmgrbsa_<?php echo $x+1;?>">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label class="form-check-label"><?php if ($x==0) echo 'Manager';?></label>
                          </div>
                          <div class="col-sm-7">
                            <div class="row">
                              <div class="col-sm-11">
                                <select class="form-control member" id="mgrbsa_<?php echo $x+1;?>" name="mgrbsa_<?php echo $x+1;?>" <?php if ($edit=='T') echo ' disabled';?> onchange="rubahmember()">
                                  <option value=""></option>
                                  <?php
                                  if (!empty($listmgrbsa)) {
                                    foreach ($listmgrbsa as $row) { ?>
                                      <option value="<?php echo $row->NPP;?>" <?php if ($view=='Y' and $member == $row->NPP) echo 'selected';  ?>><?php echo $row->Nama.'/'.$row->NPP;  ?></option>
                                    <?php  
                                    }
                                  } ?>
                                </select>
                              </div>
                              <div class="col-sm-1">
                                <?php if ($x==0) { ?>
                                <button type="button" name="add_mgr_bsa" id="add_mgr_bsa" class="btn-sm btn-primary tambah" <?php if ($edit=='T') echo ' disabled';?>><i class="fas fa-plus"></i></button>
                                <?php } else { ?>
                                <button type="submit" name="delete_mgr_bsa_<?php echo $x+1;?>" id="delete_mgr_bsa_<?php echo $x+1;?>" class="btn-sm btn-danger remove" <?php if ($edit=='T') echo ' disabled';?> ><i class="fas fa-minus"></i></button>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $x=$x+1;
                         if (empty($listmembermgrbsa[$x])) $looping=false;
                              } while ($looping); ?>

                          <?php
                            $x=0; $looping=true;
                            do {
                            if (!empty($listmemberamgrbsa[$x])) $member= $listmemberamgrbsa[$x]->npp;
                            else $member='';
                            ?>
                        <div class="row element_amgrbsa" id="divamgrbsa_<?php echo $x+1;?>">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label class="form-check-label"><?php if ($x==0) echo 'Asisten Manager';?></label>
                          </div>
                          <div class="col-sm-7">
                            <div class="row">
                              <div class="col-sm-11">
                                <select class="form-control member" id="amgrbsa_<?php echo $x+1;?>" name="amgrbsa_<?php echo $x+1;?>" <?php if ($edit=='T') echo ' disabled';?> onchange="rubahmember()">
                                  <option value=""></option>
                                  <?php
                                  if (!empty($listamgrbsa)) {
                                    foreach ($listamgrbsa as $row) { ?>
                                      <option value="<?php echo $row->NPP;?>" <?php if ($view=='Y' and $member == $row->NPP) echo 'selected';  ?>><?php echo $row->Nama.'/'.$row->NPP;  ?></option>
                                    <?php  
                                    }
                                  } ?>
                                </select>
                              </div>
                              <div class="col-sm-1">
                                <?php if ($x==0) { ?>
                                <button type="button" name="add_amgr_bsa" id="add_amgr_bsa" class="btn-sm btn-primary tambah" <?php if ($edit=='T') echo ' disabled';?>><i class="fas fa-plus"></i></button>
                                <?php } else { ?>
                                <button type="submit" name="delete_amgr_bsa_<?php echo $x+1;?>" id="delete_amgr_bsa_<?php echo $x+1;?>" class="btn-sm btn-danger remove" <?php if ($edit=='T') echo ' disabled';?> ><i class="fas fa-minus"></i></button>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $x=$x+1;
                       if (empty($listmemberamgrbsa[$x])) $looping=false;
                            } while ($looping); ?>
                      </div>

                      <div class="form-group hideBSA" id="timptm">
                        <div class="row">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label for="ptm1">Tim PTM</label>
                          </div>
                        </div>
                        <?php
                          $x=0; $looping=true;
                          do {
                          if (!empty($listmembermgrptm[$x])) $member= $listmembermgrptm[$x]->npp;
                          else $member='';
                          ?>
                        <div class="row element_mgrptm" id="divmgrptm_<?php echo $x+1;?>">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label class="form-check-label"><?php if ($x==0) echo 'Manager';?></label>
                          </div>
                          <div class="col-sm-7">
                            <div class="row">
                              <div class="col-sm-11">
                                <select class="form-control member" id="mgrptm_<?php echo $x+1;?>" name="mgrptm_<?php echo $x+1;?>" <?php if ($edit=='T') echo ' disabled';?> onchange="rubahmember()">
                                  <option value=""></option>
                                  <?php
                                  if (!empty($listmgrptm)) {
                                    foreach ($listmgrptm as $row) { ?>
                                      <option value="<?php echo $row->NPP;?>" <?php if ($view=='Y' and $member == $row->NPP) echo 'selected';  ?>><?php echo $row->Nama.'/'.$row->NPP;  ?></option>
                                    <?php  
                                    }
                                  } ?>
                                ?>
                                </select>
                              </div>
                              <div class="col-sm-1">
                                <?php if ($x==0) { ?>
                                <button type="button" name="add_mgr_ptm" id="add_mgr_ptm" class="btn-sm btn-primary tambah" <?php if ($edit=='T') echo ' disabled';?>><i class="fas fa-plus"></i></button>
                                <?php } else { ?>
                                <button type="submit" name="delete_mgr_ptm_<?php echo $x+1;?>" id="delete_mgr_ptm_<?php echo $x+1;?>" class="btn-sm btn-danger remove" <?php if ($edit=='T') echo ' disabled';?> ><i class="fas fa-minus"></i></button>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $x=$x+1;
                          if (empty($listmembermgrptm[$x])) $looping=false;
                            } while ($looping); ?>

                        <?php
                          $x=0; $looping=true;
                          do {
                          if (!empty($listmemberamgrptm[$x])) $member= $listmemberamgrptm[$x]->npp;
                          else $member=''
                          ?>
                        <div class="row element_amgrptm" id="divamgrptm_<?php echo $x+1;?>">
                          <div class="col-sm-1">
                          </div>
                          <div class="col-sm-3">
                            <label class="form-check-label"><?php if ($x==0) echo 'Asisten Manager';?></label>
                          </div>
                          <div class="col-sm-7">
                            <div class="row">
                              <div class="col-sm-11">
                                <select class="form-control member" id="amgrptm_<?php echo $x+1;?>" name="amgrptm_<?php echo $x+1;?>" <?php if ($edit=='T') echo ' disabled';?> onchange="rubahmember()">
                                  <option value=""></option>
                                  <?php
                                  if (!empty($listamgrptm)) {
                                    foreach ($listamgrptm as $row) { ?>
                                      <option value="<?php echo $row->NPP;?>" <?php if ($view=='Y' and $member == $row->NPP) echo 'selected';  ?>><?php echo $row->Nama.'/'.$row->NPP;  ?></option>
                                    <?php  
                                    }
                                  } ?>
                                </select>
                              </div>
                              <div class="col-sm-1">
                                <?php if ($x==0) { ?>
                                <button type="button" name="add_amgr_ptm" id="add_amgr_ptm" class="btn-sm btn-primary tambah" <?php if ($edit=='T') echo ' disabled';?>><i class="fas fa-plus"></i></button>
                                <?php } else { ?>
                                <button type="submit" name="delete_amgr_ptm_<?php echo $x+1;?>" id="delete_amgr_ptm_<?php echo $x+1;?>" class="btn-sm btn-danger remove" <?php if ($edit=='T') echo ' disabled';?> ><i class="fas fa-minus"></i></button>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $x=$x+1;
                       if (empty($listmemberamgrptm[$x])) $looping=false;
                            } while ($looping); ?>
                      </div>
                    </div>

                    <hr class="hideBSA">
                    
                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="picuser">PIC User</label>
                        </div>
                        <div class="col-sm-7">
                          <textarea class="form-control" rows="2" id="picuser" name="picuser" <?php if ($edit=='Y') { ?>placeholder="PIC User"<?php } ?> <?php if ($edit=='T') echo ' readonly'; ?>><?php if ($view=='Y') echo $detaildemand[0]->PICUser;?></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="businessrequestor">Business Requestor</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" rows="2" id="businessrequestor" name="businessrequestor" <?php if ($edit=='Y') { ?>placeholder="Business Requestor"<?php } ?> <?php if ($edit=='T') echo ' readonly'; ?> value="<?php if ($view=='Y') echo $detaildemand[0]->BusinessRequestor;?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="businessapprover">Business Approver</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" rows="2" id="businessapprover" name="businessapprover" <?php if ($edit=='Y') { ?>placeholder="Business Approver"<?php } ?> <?php if ($edit=='T') echo ' readonly'; ?> value="<?php if ($view=='Y') echo $detaildemand[0]->BusinessApprover;?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="uicsupport">UIC Support IT</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="uicsupport" name="uicsupport" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listuicsupportit)) {
                              foreach ($listuicsupportit as $row) { ?>
                                <option value="<?php echo $row->Nama;?>" <?php if($view=='Y' and $detaildemand[0]->UICSupportIT==$row->Nama) echo 'selected'; ?>><?php echo $row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="kategoripengembanganojk">Kategori Pengembangan OJK</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="kategoripengembanganojk" name="kategoripengembanganojk" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listpengembangojk)) {
                              foreach ($listpengembangojk as $row) { ?>
                                <option value="<?php echo $row->Kode.': '.$row->Nama;?>" <?php if($view=='Y' and $detaildemand[0]->KategoriPengembanganOJK==$row->Kode.': '.$row->Nama) echo 'selected'; ?>><?php echo $row->Kode.': '.$row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="profit">Jenis Pengembangan</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="jenispengembangan" name="jenispengembangan" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listjenispengembang)) {
                              foreach ($listjenispengembang as $row) { ?>
                                <option value="<?php echo $row->Nama;?>" <?php if($view=='Y' and $detaildemand[0]->JenisPengembangan==$row->Nama) echo 'selected'; ?>><?php echo $row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="pengembang">Pengembang</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="pengembang" name="pengembang" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listpengembang)) {
                              foreach ($listpengembang as $row) { ?>
                                <option value="<?php echo $row->Nama;?>" <?php if($view=='Y' and $detaildemand[0]->Pengembang==$row->Nama) echo 'selected'; ?>><?php echo $row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="ppjti">PPJ TI Pihak Terkait</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="ppjti" name="ppjti" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <option value="Ya" <?php if($view=='Y' and $detaildemand[0]->PPJTIPihakTerkait=='Ya') echo 'selected'; ?>>Ya</option>
                            <option value="Tidak" <?php if($view=='Y' and $detaildemand[0]->PPJTIPihakTerkait=='Tidak') echo 'selected'; ?>>Tidak</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <hr class="hideBSA">

                    <div class="form-group hideBSA" >
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="lokasidc">Lokasi DC</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="lokasidc" name="lokasidc" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listlokasidc)) {
                              foreach ($listlokasidc as $row) { ?>
                                <option value="<?php echo $row->Nama;?>" <?php if($view=='Y' and $detaildemand[0]->LokasiDC==$row->Nama) echo 'selected'; ?>><?php echo $row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="lokasidrc">Lokasi DRC</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="lokasidrc" name="lokasidrc" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <?php
                            if (!empty($listlokasidrc)) {
                              foreach ($listlokasidrc as $row) { ?>
                                <option value="<?php echo $row->Nama;?>" <?php if($view=='Y' and $detaildemand[0]->LokasiDRC==$row->Nama) echo 'selected'; ?>><?php echo $row->Nama;  ?></option>
                              <?php  
                              }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="profit">Profit/Efisiensi</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="profit" name="profit" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <option value="Profit" <?php if($view=='Y' and $detaildemand[0]->ProfitEfesiensi=='Profit') echo 'selected'; ?>>Profit</option>
                            <option value="Efisiensi" <?php if($view=='Y' and $detaildemand[0]->ProfitEfesiensi=='Efisiensi') echo 'selected'; ?>>Efisiensi</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="profit">Estimasi Biaya Capex</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control nominal" id="capex" name="capex" placeholder="Estimasi Biaya Capex" data-a-sign="Rp " data-a-dec="," data-a-sep="." value="<?php if($view=='Y') echo $detaildemand[0]->EstimasiBiayaCapex;else echo '0'; ?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="profit">Estimasi Biaya Opex</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control nominal" id="opex" name="opex" placeholder="Estimasi Biaya Opex" data-a-sign="Rp " data-a-dec="," data-a-sep="." value="<?php if($view=='Y') echo $detaildemand[0]->EstimasiBiayaOpex;else echo '0'; ?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="estimasirp">Estimasi Nilai Rupiah</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control nominal" id="estimasirp" name="estimasirp" placeholder="Estmasi Nilai Rupiah" data-a-sign="Rp " data-a-dec="," data-a-sep="." value="<?php if($view=='Y') echo $detaildemand[0]->EstimasiRPNilai;else echo '0'; ?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="tipebenefit">Tipe Benefit</label>
                        </div>
                        <div class="col-sm-7">
                          <div class="row">
                            <div class="col-sm-4">
                               <label>Commercial/Revenue</label>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control nominal" id="benefitcommercial" name="benefitcommercial" data-a-sign="Rp " data-a-dec="," data-a-sep="." value="<?php if($view=='Y') echo $detaildemand[0]->BenefitCommercial;else echo '0'; ?>" <?php if ($edit=='T') echo ' readonly'; ?> onchange="ubahbenefit()">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-7">
                          <div class="row">
                            <div class="col-sm-4">
                              <label>Efficiency Automation</label>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control nominal" id="benefitautomation" name="benefitautomation" data-a-sign="Rp " data-a-dec="," data-a-sep="." value="<?php if($view=='Y') echo $detaildemand[0]->BenefitAutomation;else echo '0'; ?>" <?php if ($edit=='T') echo ' readonly'; ?> onchange="ubahbenefit()">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-7">
                          <div class="row">
                            <div class="col-sm-4">
                              <label>Avoid Fine Regulatory</label>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control nominal" id="benefitregulatory" name="benefitregulatory" data-a-sign="Rp " data-a-dec="," data-a-sep="." value="<?php if($view=='Y') echo $detaildemand[0]->BenefitRegulatory;else echo '0'; ?>" <?php if ($edit=='T') echo ' readonly'; ?> onchange="ubahbenefit()">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-7">
                          <div class="row">
                            <div class="col-sm-4">
                              <label>BNI Image</label>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control nominal" id="benefitbniimage" name="benefitbniimage" data-a-sign="Rp " data-a-dec="," data-a-sep="." value="<?php if($view=='Y') echo $detaildemand[0]->BenefitBNIImage;else echo '0'; ?>" <?php if ($edit=='T') echo ' readonly'; ?> onchange="ubahbenefit()">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-7">
                          <div class="row">
                            <div class="col-sm-4">
                              <label>Total</label>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control nominal" id="totalbenefit" name="totalbenefit" data-a-sign="Rp " data-a-dec="," data-a-sep="." readonly value="<?php if($view=='Y') { echo $detaildemand[0]->BenefitCommercial+$detaildemand[0]->BenefitAutomation+$detaildemand[0]->BenefitRegulatory+$detaildemand[0]->BenefitBNIImage;} else echo '0'; ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <hr class="hideBSA">

                    <div class="form-group hideBSA" id="group1">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="maxreqreceived">Tanggal Maks. Request Diterima</label>
                        </div>
                        <div class="col-sm-7" id="grpmaxreqreceived">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control" id="maxreqreceived" name="maxreqreceived" placeholder="Maks. Request Received" value="<?php if($view=='Y') echo $detaildemand[0]->MaxReqReceived; ?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="requirementreceived">Request Sudah Diterima?</label>
                        </div>
                        <div class="col-sm-7">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="icheck-primary d-inline">
                                <input type="checkbox" class="form-control" id="requirementreceived" name="requirementreceived" <?php if ($edit=='T') echo ' disabled'; ?> onchange="ubahrequire()" <?php if ($view=='Y' and $detaildemand[0]->RequirementReceived=='Sudah') echo 'checked';?>>
                                <label class="form-check-label" for="requirementreceived" >Sudah</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="tglrequest">Tanggal Request Diterima</label>
                        </div>
                        <div class="col-sm-7" id="grptglrequest">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control" id="tglrequest" name="tglrequest" placeholder="Tanggal Request Diterima" value="<?php if($view=='Y') echo $detaildemand[0]->TglRequest; ?>" <?php if (($edit=='T') or ($aksi=='Tambah')or ($detaildemand[0]->RequirementReceived!='Sudah')) echo 'readonly'; ?>>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="statusklarifikasireq">Status Klarifikasi Req</label>
                        </div>
                        <div class="col-sm-7">
                          <select class="form-control" id="statusklarifikasireq" name="statusklarifikasireq" <?php if ($edit=='T') echo ' disabled';?>>
                            <option value=""></option>
                            <option value="On Progress" <?php if ($view=='Y' and $detaildemand[0]->StatusKlarifikasiReq=='On Progress') echo 'selected';?>>On Progress</option>
                            <option value="Done" <?php if ($view=='Y' and $detaildemand[0]->StatusKlarifikasiReq=='Done') echo 'selected';?>>Done</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="rencanainisiasi">Rencana Inisiasi</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="rencanainisiasi" name="rencanainisiasi" <?php if ($edit=='Y') { ?>placeholder="Rencana Inisiasi"<?php } ?> value="<?php if($view=='Y') echo $detaildemand[0]->RencanaInisiasi; ?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="tglinitialproj">Tanggal Initial Dokumen Project</label>
                        </div>
                        <div class="col-sm-7" id="grptglinitialproj">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control" id="tglinitialproj" name="tglinitialproj" <?php if ($edit=='Y') { ?>placeholder="Tanggal Initial Dokumen Project"<?php } ?> value="<?php if ($view=='Y') echo $detaildemand[0]->TglInitialDokProj;?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="tglfinalproj">Tanggal Final Dokumen Project</label>
                        </div>
                        <div class="col-sm-7" id="grptglfinalproj">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control" id="tglfinalproj" name="tglfinalproj" placeholder="Tanggal Final Dokumen Project" value="<?php if ($view=='Y') echo $detaildemand[0]->TglFinalDokProj;?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="tgldocumentproject">Tgl Dokumen Project</label>
                        </div>
                        <div class="col-sm-7" id="grptgldocumentproject">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control" id="tgldocumentproject" name="tgldocumentproject" placeholder="Tgl Document Project" value="<?php if($view=='Y') echo $detaildemand[0]->TglDocumentProject; ?>" <?php if ($edit=='T') echo ' readonly'; ?>>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group hideBSA">
                      <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <label for="versidokproj">Versi Dokumen Project</label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="versidokproj" name="versidokproj" <?php if ($edit=='Y') { ?>placeholder="Versi Dokumen Project"<?php } ?> value="<?php if ($view=='Y') echo $detaildemand[0]->VersiDokProj;?>" <?php if ($edit=='T') echo ' readonly'; ?> onkeypress="return isNumberKey(event);">
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab_2"> 
                  <div class="form-group">
                    <label >Data PVCS Tracker</label>
                      <table id="mytable3" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th class="th-datatables">Nomor CR</th>
                            <th class="th-datatables">Nama Project/Deskripsi</th>
                            <th class="th-datatables">Assign to</th>
                            <th class="th-datatables">CR Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if (!empty($datatracker)) {
                          foreach ($datatracker as $row) 
                          { ?>
                          <tr>
                            <td class="td-datatables"><?php echo $row->nomorcrir; ?></td>
                            <td class="td-datatables"><?php echo $row->projectname.'-'.$row->ShortDescription; ?></td>
                            <td class="td-datatables"><?php echo $row->AssignTo; ?></td>
                            <td class="td-datatables"><?php echo $row->CRStatus; ?></td>
                          </tr>
                        <?php } } ?>
                        </tbody>
                      </table>
                  </div>
                </div>

                <div class="tab-pane" id="tab_3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label >Dokumen</label>
                      <div class="row">
                        <div class="col-sm-12">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dokumen" id="btn-tambahdok2" <?php if($aksi!='Edit') echo 'disabled';?>><i class="fa fa-plus"></i>&nbsp;Tambah Dokumen</button>
                    </div>
                    <div class="col-sm-12">
                      <br>
                      <div id="tabeldok">
                        <table id="mytable" class="table table-bordered table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th class="th-datatables">Jenis Dokumen</th>
                              <th class="th-datatables">Nomor Dokumen</th>
                              <th class="th-datatables">Tanggal Dokumen</th>
                              <th class="th-datatables">Deskripsi</th>
                              <th class="th-datatables">Nama File</th>
                              <th class="th-datatables">Versi</th>
                              <th class="th-datatables">User</th>
                              <th class="th-datatables">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            if (!empty($listdokumen)) {
                            foreach ($listdokumen as $row) 
                            { ?>
                            <tr>
                              <td class="td-datatables"><?php echo $row->JenisDokumen; ?></td>
                              <td class="td-datatables"><?php echo $row->NomorDokumen; ?></td>
                              <td class="td-datatables"><?php echo $row->TanggalDokumen; ?></td>
                              <td class="td-datatables"><?php echo $row->Deskripsi; ?></td>
                              <td class="td-datatables"><?php 
                                if ($row->NamaFile=='' and ($npp==$row->npp or $row->npp=='00000')and $aksi=='Edit') { ?><a href="javascript:editdok(<?php echo $row->Id;?>)" data-toggle="tooltip" title="Upload Dokumen"><i class="fas fa-upload"></i></a> <?php } else { ?>
                                <a href="javascript:downloaddok('<?php echo $row->NamaFile;?>')" data-toggle="tooltip" title="Download Dokumen">  
                              <?php echo $row->NamaFile; ?></a> <?php } ?></td>
                              <td class="td-datatables"><?php echo $row->Versi; ?></td>
                              <td class="td-datatables"><?php echo $row->kelompok.'-'.$row->nama; ?></td>
                              <td class="td-datatables">
                                <?php if (($aksi=='Edit') and ($npp==$row->npp)) { ?>
                                <a href="javascript:editdok(<?php echo $row->Id;?>)" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a>
                              <a href="javascript:hapusdok(<?php echo $row->Id;?>,'<?php echo $row->NomorDokumen;?>')" data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i></a>
                                <?php } ?>
                            </td>
                            </tr>
                          <?php } } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                    </div>
                  </div>
                </div>

              </div>


              <div class="tab-pane" id="tab_4">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="note">Note</label>
                      <div class="row">
                        <div class="col-sm-12">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-note" id="btn-tambahnote2" <?php if($aksi!='Edit') echo 'disabled';?>><i class="fa fa-plus"></i>&nbsp;Tambah Note</button>
                      </div>
                    <div class="col-sm-12">
                      <br>
                      <div id="tabelnote">
                        <table id="mytable1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th class="th-datatables" style="width: 17%">Waktu</th>
                                <th class="th-datatables" style="width: 20%">User</th>
                                <th class="th-datatables">Title</th>
                                <th class="th-datatables">Note</th>
                                <th class="th-datatables">Aksi</th>
                              </tr>
                            </thead>
                              <tbody>
                              <?php 
                              if (!empty($listnote)) {
                              foreach ($listnote as $row) 
                              { ?>
                              <tr>
                                <td class="td-datatables" style="width: 17%"><?php echo $row->WaktuCreate; ?></td>
                                <td class="td-datatables" style="width: 20%"><?php echo $row->kelompok.'-'.$row->nama; ?></td>
                                <td class="td-datatables"><?php echo $row->Title; ?></td>
                                <td class="td-datatables" style="white-space:pre-wrap; word-wrap:break-word"><?php echo $row->Note;?></td>
                                <td class="td-datatables">
                                    <?php if (($aksi=='Edit') and ($npp==$row->npp)) { ?>
                                    <a href="javascript:editnote(<?php echo $row->Id;?>)" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a>
                                  <a href="javascript:hapusnote(<?php echo $row->Id;?>)" data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i></a>
                                    <?php } ?>
                                </td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="tab-pane" id="tab_5">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="dokumen">Histori</label>
                      <div id="tabelhistori">
                        <table id="mytable2" class="table table-bordered table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th class="th-datatables" style="width: 17%;">Waktu</th>
                              <th class="th-datatables" style="width: 25%;">User</th>
                              <th class="th-datatables">Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php 
                            if (!empty($listhistori)) {
                            foreach ($listhistori as $row) 
                            { ?>
                            <tr>
                              <td class="td-datatables" style="width: 17%;"><?php echo $row->WaktuCreate; ?></td>
                              <td class="td-datatables" style="width: 25%;"><?php echo $row->kelompok.'-'.$row->nama; ?></td>
                              <td class="td-datatables"><?php echo $row->Keterangan; ?></td>
                            </tr>
                          <?php } } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <input type="text" class="form-control" id="dari" name="dari" value="<?php echo $dari; ?>" hidden>
                <input type="text" class="form-control" id="aksi" name="aksi" value="<?php echo $aksi; ?>" hidden>
                <input type="text" class="form-control" id="ubahmember" name="ubahmember" hidden>
                <input type="text" class="form-control" id="ceksubmit" name="ceksubmit" hidden>
                <p id="demo"></p>
              </div>
            </div>
          </div>
              <div class="card-footer">
                  <button type="submit" onclick="return validasi()" class="btn btn-primary float-right" <?php if ($edit=='T') echo 'disabled';?>>Submit</button>
                  <button type="button" onclick="javascript:history.back()" class="btn btn-primary float-right" style="margin-right: 6px">Kembali</button>

              </div>
                
              </div>
            </form>
          </section>
        </div>
      </div>

      <div class="modal fade" id="modal-note">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="javascript:hidemodal()" method="post" id="frm-note">
            <div class="modal-header">
              <h4 class="modal-title" id="titlemodal2">Tambah Note</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body ui-front">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-2">
                    <label for="title-note">Title</label>
                  </div>
                  <div class="col-sm-10">

                    <input class="form-control" name="title-note" id="title-note" required
                    >

                    <!-- <input class="form-control" list="listtitle-note" name="title-note" id="title-note" required>
                    <datalist id="listtitle-note" style="font-family: inherit;">
                      <?php
                      if (!empty($listtitlenote)) {
                        foreach ($listtitlenote as $row) { ?>
                          <option value="<?php echo $row->Nama;?>"></option>
                            <?php  
                        }
                      } ?>
                    </datalist> -->
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-2">
                    <label>Note</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="note-modal" name="note-modal" placeholder="Note" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            <input type="text" class="form-control" id="aksi2" name="aksi2" hidden>
              <input type="text" class="form-control" id="idnote" name="idnote" hidden>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
              <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>
 
      <div class="modal fade" id="modal-dokumen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="javascript:hidemodal()" method="post" id="frm-dokumen">
            <div class="modal-header">
              <h4 class="modal-title" id="titlemodal1">Tambah Dokumen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Jenis Dokumen</label>
                  </div>
                  <div class="col-sm-9">
                    <select class="form-control" id="jenisdok" name="jenisdok" onchange="jenis_dokumen()" required>
                      <option value=""></option>
                      <?php
                        if (!empty($listjenisdok)) {
                          foreach ($listjenisdok as $row) { ?>
                            <option value="<?php echo $row->Nama;?>"><?php echo $row->Nama;  ?></option>
                          <?php  
                          }
                        } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group" id="frm-dokbaru">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Dokumen</label>
                  </div>
                  <div class="col-sm-1">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" class="form-control" id="dokbaru" name="dokbaru" onchange="ubahnomordok()" disabled>
                      <label class="form-check-label" for="dokbaru">Baru</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Nomor Dokumen</label>
                  </div>
                  <div class="col-sm-9">
                    <div class="dokumenbiasa">
                      <input type="text" class="form-control" id="nomordokumen" name="nomordokumen" placeholder="Nomor Dokumen" required>
                    </div>
                    <div class="dokumensdd">
                      <input class="form-control" list="listsdd" name="inputsdd" id="inputsdd" onchange="getdok()" required>
                      <datalist id="listsdd" style="font-family: inherit;">
                        <?php
                        if (!empty($listsdd)) {
                          foreach ($listsdd as $row) { ?>
                            <option value="<?php echo $row->nomordokumen;?>"></option>
                        <?php  
                          }
                        } ?>
                      </datalist>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Tanggal Dokumen</label>
                  </div>
                  <div class="col-sm-9" id="grptgldokumen">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="tgldokumen" name="tgldokumen" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Perihal/Deskripsi</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal/Deskripsi">
                  </div>
                </div>
              </div>
              <div class="form-group" id="frm-versi">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Versi</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="versi" name="versi" placeholder="Versi" onkeypress="return isNumberKey(event);" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group" id="frm-divisi">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Divisi</label>
                  </div>
                  <div class="col-sm-9">
                    <select class="form-control" id="divisi-modal" name="divisi-modal" disabled>
                      <option value=""></option>
                      <?php
                      if (!empty($listdivisi)) {
                        foreach ($listdivisi as $row) { ?>
                          <option value="<?php echo $row->Kode;?>"><?php echo $row->Kode.'-'.$row->Nama;  ?></option>
                            <?php  
                        }
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group" id="frm-tgldisposisi">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Tanggal Disposisi</label>
                  </div>
                  <div class="col-sm-9" id="grptgldisposisi">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="tgldisposisi" name="tgldisposisi" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" id="frm-picmgrbsa">
                <div class="row">
                  <div class="col-sm-3">
                    <label>PIC Manager BSA</label>
                  </div>
                  <div class="col-sm-9">
                    <select class="form-control" id="picmgrbsa" name="picmgrbsa" onchange="rubahpicbsa()" disabled>
                      <option value=""></option>
                      <?php
                      if (!empty($listmgrbsa)) {
                        foreach ($listmgrbsa as $row) { ?>
                          <option value="<?php echo $row->NPP;?>"><?php echo $row->Nama.'/'.$row->NPP;  ?></option>
                            <?php  
                        }
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group" id="frm-picamgrbsa">
                <div class="row">
                  <div class="col-sm-3">
                    <label>PIC Asisten Manager BSA</label>
                  </div>
                  <div class="col-sm-9">
                    <select class="form-control" id="picamgrbsa" name="picamgrbsa" onchange="rubahpicbsa()"disabled>
                      <option value=""></option>
                      <?php
                      if (!empty($listamgrbsa)) {
                        foreach ($listamgrbsa as $row) { ?>
                          <option value="<?php echo $row->NPP;?>"><?php echo $row->Nama.'/'.$row->NPP;  ?></option>
                            <?php  
                        }
                      } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group" id="frm-uploadfile">
                <div class="row">
                  <div class="col-sm-3">
                    <label for="uploadfile">Upload File</label>
                  </div>
                  <div class="col-sm-9">

                     <div class="input-group" id="grpuploadfile">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="uploadfile">
                        <label class="custom-file-label" for="uploadfile" id="isiupload">Choose File</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="btnupload">Upload</span>
                      </div>
                    </div>
                    <div class="input-group" id="grpnamafile">
                      <input type="text" class="form-control" id="namafile" name="namafile">
                      <div class="input-group-append">
                        <span class="input-group-text" id="btndownload">Download</span>
                        <span class="input-group-text" id="btnhapus">Hapus</span>
                      </div>
                    </div>



                  </div>
                </div>
              </div>

              <input type="text" class="form-control" id="aksi1" name="aksi1" hidden>
              <input type="text" class="form-control" id="iddokumen" name="iddokumen" hidden>
              <input type="text" class="form-control" id="ubahpicbsa" name="ubahpicbsa" hidden>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
              <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
 
  </div>
  <!-- /.content-wrapper -->

<script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
 
<STYLE TYPE="text/css" media="all">
.ui-widget{
    font-family: inherit;}
</STYLE>

<script>
$(document).ready(function (e) {

  $('.nominal').autoNumeric('init');

  //$('textarea.isinote').height($('textarea.isinote').prop('scrollHeight'));

  //getDatatimmember('<?php echo $demandid;?>');
  <?php if ($aksi!='View') {
    if ($this->session->userdata('kelompok')=='BSA') { ?>
      $('.hideBSA').hide(); <?php }?>
  <?php if ($this->session->userdata('kelompok')=='BNP') { ?>
      $('.hideBNP').hide(); <?php }?>
  <?php if ($this->session->userdata('kelompok')=='PTM') { ?>
      $('.hidePTM').hide(); <?php }?>
  <?php } ?>
});

$( function() {

   bsCustomFileInput.init();
      
    $( "#title-note" ).autocomplete({
      source: [
      <?php 
      if (!empty($listtitlenote)) {
        foreach ($listtitlenote as $row) {
          echo '"'.$row->Nama.'",';
        }
      } ?>]
    });

    $( "#program" ).autocomplete({
      source: [
      <?php 
      if (!empty($listprogram)) {
        foreach ($listprogram as $row) {
          echo '"'.$row->Nama.'",';
        }
      } ?>]
    });

    $( "#nmproject" ).autocomplete({
      source: [
      <?php 
      if (!empty($listproject)) {
        foreach ($listproject as $row) {
          echo '"'.$row->Kode.': '.$row->Nama.'",';
        }
      } ?>]
    });

    $( "#grouping" ).autocomplete({
      source: [
      <?php 
      if (!empty($listgrouping)) {
        foreach ($listgrouping as $row) {
          echo '"'.$row->Nama.'",';
        }
      } ?>]
    });

    $( "#groupingcluster" ).autocomplete({
      source: [
      <?php 
      if (!empty($listgroupingcluster)) {
        foreach ($listgroupingcluster as $row) {
          echo '"'.$row->Nama.'",';
        }
      } ?>]
    });

    $( ".inputterdampak" ).autocomplete({
      source: [
      <?php 
      if (!empty($listaplikasi)) {
        foreach ($listaplikasi as $row) {
          echo '"'.$row->Nama.'",';
        }
      } ?>]
    });

  } );


$('form').on('submit', function(){
    $('.nominal').each(function(){
        $(this).autoNumeric('update', {aSign: '', aDec: '.', aSep: ''});;
    });
});

function getDatatimmember(demandid1) {
    $("#anggotatim").load("<?php echo base_url('project'); ?>/gettimmember",{id: '<?php echo $id;?>',demandid: demandid1,aksi: '<?php echo $aksi;?>'});
 }

 function getDataterdampak(demandid1) {
    $("#groupterdampak").load("<?php echo base_url('project'); ?>/getterdampak",{id: '<?php echo $id;?>',demandid: demandid1,aksi: '<?php echo $aksi;?>'});


 }


  function jenis_demand(x) {
    if (x == 'Baru') {
      $('#demandid').prop('readonly', true);
      $("#demandid").val('');
      $('#SO').attr('disabled', false);
      $('#IN').attr('disabled', false);
      resetisidemand();
    }
    if (x == 'Carry') {
      $('#demandid').removeAttr('readonly');
      $('#SO').attr('disabled', true);
      $('#IN').attr('disabled', true);
    }
  }

  function tipe_demand(x) {
    var d = new Date();
    if (x == 'SO') {
      document.getElementById("tahundemand").value = d.getFullYear()+1;
      document.getElementById("periodedemand").value = d.getFullYear()+1;
      document.getElementById("tahun").value = d.getFullYear()+1;
    }
    if (x == 'IN') {
      document.getElementById("tahundemand").value = d.getFullYear();
      document.getElementById("periodedemand").value = d.getFullYear();
      document.getElementById("tahun").value = d.getFullYear();
    }
  }

  function isistatusproject(x) {
    $('#statusproject').empty();
    if (x == 'Project') {
      <?php foreach ($liststatusproject as $row) { ?>
        $('#statusproject').append('<option value="<?php echo $row->Nama;?>"><?php echo $row->Kode.'-'.$row->Nama;  ?></option>');
      <?php } ?>
    }
    if (x == 'Procurement') {
      <?php foreach ($liststatusprocurement as $row) { ?>
        $('#statusproject').append('<option value="<?php echo $row->Kode.'. '.$row->Nama;?>"><?php echo $row->Kode.'. '.$row->Nama;  ?></option>');
      <?php } ?>
   }
  }

  function ubah_status(x) {
    $('#statusproject').empty();
    if (x == 'Project') {
      <?php foreach ($liststatusproject as $row) { ?>
        $('#statusproject').append('<option value="<?php echo $row->Nama;?>"><?php echo $row->Kode.'-'.$row->Nama;  ?></option>');
      <?php } ?>
      $('#tipeproject').removeAttr('disabled');
      $('#kategoripengadaan').val('');
      $('#kategoripengadaan').attr('disabled', 'disabled');
    }
    if (x == 'Procurement') {
      <?php foreach ($liststatusprocurement as $row) { ?>
        $('#statusproject').append('<option value="<?php echo $row->Kode.'. '.$row->Nama;?>"><?php echo $row->Kode.'. '.$row->Nama;  ?></option>');
      <?php } ?>
      $('#tipeproject').val('');
      $('#tipeproject').attr('disabled', 'disabled');
      $('#kategoripengadaan').removeAttr('disabled');
    }
  }

  function ekspektasi(x) {
    $('#mingguke').val('');
    $('#bulan').val('');
    $('#kuartal').val('');

    if (x == 'minggu') {
      $('#mingguke').removeAttr('disabled');
      $('#bulan').attr('disabled', 'disabled');
      $('#kuartal').attr('disabled', 'disabled');
    }
    if (x == 'bulan') {
      $('#mingguke').attr('disabled', 'disabled');
      $('#bulan').removeAttr('disabled');
      $('#kuartal').attr('disabled', 'disabled');
    }
    if (x == 'kuartal') {
      $('#mingguke').attr('disabled', 'disabled');
      $('#bulan').attr('disabled', 'disabled');
      $('#kuartal').removeAttr('disabled');
    }
  }


$('#frm-note').submit(function() {
    $.ajax({
        url: "<?php echo base_url('project'); ?>/simpannote",
        type: 'POST', 
        data: {demandid: $("#demandid").val(),title: $("#title-note").val(),note: $("#note-modal").val(),aksi: $("#aksi2").val(),idnote: $("#idnote").val()},
        dataType: "json",

        success: function(data){
          var str1="success";
          var str2='&nbsp;'+'Note sudah tersimpan';
          if (data!=0) {
            str1="error";
            str2="Gagal simpan note #"+data;
          }
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            //timer: 3000
          });
          Toast.fire({
              icon: str1,
              title: str2,
            });
          var nmprogram="<?php echo base_url('project/loadnote'); ?>" + "?demandid="+$("#demandid").val()+"&aksi=<?php echo $aksi;?>";
          // alert("Namaprogram:"+nmprogram);
          $("#tabelnote").load(nmprogram);
          var nmprogram="<?php echo base_url('project/loadhistori'); ?>" + "?demandid="+$("#demandid").val();
          $("#tabelhistori").load(nmprogram);
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);

        }

  });

  });  

$('#frm-dokumen').submit(function() {
    $.ajax({
        url: "<?php echo base_url('project'); ?>/simpandok",
        type: 'POST', 
        data: {demandid: $("#demandid").val(),jenisdok: $("#jenisdok").val(),nomordokumen: $("#nomordokumen").val(), tgldokumen: $("#tgldokumen").val(), perihal: $("#perihal").val(), versi: $("#versi").val(), divisi: $("#divisi-modal").val(), tgldisposisi: $("#tgldisposisi").val(),picmgrbsa: $("#picmgrbsa").val(),picamgrbsa: $("#picamgrbsa").val(),aksi: $("#aksi1").val(),iddokumen: $("#iddokumen").val(),ubahpicbsa: $("#ubahpicbsa").val(),nomorsdd: $("#inputsdd").val(),namafile: $("#namafile").val()},
        dataType: "json",

        success: function(data){
          var str1="success";
          var str2="&nbsp;"+"Dokumen "+ data.nomordokumen + " sudah tersimpan ";
          if (data.hasil!=0) {
            str1="error";
            str2="Gagal simpan dokumen #"+ data.hasil;
            if (data.hasil==1) str2+=" Harap Relogin";
            if (data.hasil==3) str2+=" Nomor SDD dan versi sudah ada";
          }
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            //timer: 3000
          });
          Toast.fire({
              icon: str1,
              title: str2,
            });
          
          var nmprogram="<?php echo base_url('project/loaddok'); ?>" + "?demandid="+$("#demandid").val()+"&aksi=<?php echo $aksi;?>";
          // alert("Namaprogram:"+nmprogram);
          $("#tabeldok").load(nmprogram);
          var nmprogram="<?php echo base_url('project/loadhistori'); ?>" + "?demandid="+$("#demandid").val();
          $("#tabelhistori").load(nmprogram);
          getDatatimmember($("#demandid").val());
          getDataterdampak($("#demandid").val());
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);

        }

  });

  }); 

function hidemodal(){
  $("#modal-note").modal('hide');
  $("#modal-dokumen").modal('hide');
}

$("#btn-tambahnote1").click(function() {
  $("#titlemodal2").text("Tambah Note");
  $("#aksi2").val('Tambah');
  reset_note();
});

$("#btn-tambahnote2").click(function() {
  $("#titlemodal2").text("Tambah Note");
  $("#aksi2").val('Tambah');
  reset_note();
});

$("#btn-tambahdok1").click(function() {
  $("#jenisdok").val('');
  $('#jenisdok').removeAttr('disabled');
  $("#titlemodal1").text("Tambah Dokumen");
  $("#aksi1").val('Tambah');
  $("#ubahpicbsa").val('');
  $("#grpnamafile").hide();
  $("#grpuploadfile").show();
  reset_dok();
});

$("#btn-tambahdok2").click(function() {
  $("#jenisdok").val('');
  $('#jenisdok').removeAttr('disabled');
  $("#titlemodal1").text("Tambah Dokumen");
  $("#aksi1").val('Tambah');
  $("#ubahpicbsa").val('');
  $("#grpnamafile").hide();
  $("#grpuploadfile").show();

  $.ajax({
        url: "<?php echo base_url('project'); ?>/getlistsdd",
        type: 'POST', 
        dataType: "json",

        success: function(data){
          //alert(JSON.stringify(data));
          if (data == undefined) {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            //timer: 3000
          });
          Toast.fire({
              icon: 'error',
              title: 'Dokumen tidak ditemukan',
            });
        } else {
          $('#listsdd').empty();
          for(var i=0;i<data.length;i++)
          {
              $("#listsdd").append("<option value='" + 
              data[i].nomordokumen + "'></option>");
          }
        }
      } });

  reset_dok();
});

function reset_note() {
  $("#title-note").val('');
  $("#note-modal").val('');
}

function reset_dok() {
  $('#dokbaru').prop("checked", false);
  $("#nomordokumen").val('');
  $("#inputsdd").val('');
  $("#tgldokumen").val('');
  $("#perihal").val('');
  $("#versi").val('');
  $("#divisi-modal").val('');
  $("#tgldisposisi").val('');
  $("#picmgrbsa").val('');
  $("#picamgrbsa").val('');
  $("#namafile").val('');
  $('#uploadfile').next('label').html('Choose a file');

  $('#dokbaru').attr('disabled', 'disabled');
  $('#nomordokumen').prop('readonly', false);
  $('#divisi-modal').attr('disabled', 'disabled');
  $('#tgldisposisi').prop('readonly', false); 
  $('#versi').prop('readonly', true); 
  $('#picmgrbsa').attr('disabled', 'disabled');
  $('#picamgrbsa').attr('disabled', 'disabled');

  $('#frm-divisi').show();
  $('#frm-tgldisposisi').show();
  $('#frm-picmgrbsa').show();
  $('#frm-picamgrbsa').show();
  $('#frm-dokbaru').show();
  $('#frm-versi').show();
  $('.dokumenbiasa').show();
  $('.dokumensdd').hide();
  $("#inputsdd").prop('required',false);
  $("#nomordokumen").prop('required',true);
}

function jenis_dokumen() {
  reset_dok();
  if ($("#jenisdok").val() == 'Dokumen Project') {
    $('#versi').prop('readonly', false);
    $('#tgldisposisi').prop('readonly', true);
    $("#tgldokumen").val("<?php echo date('d/m/Y');?>");
    $('#frm-divisi').hide();
    $('#frm-tgldisposisi').hide();
    $('#frm-picmgrbsa').hide();
    $('#frm-picamgrbsa').hide();
    $('#frm-dokbaru').hide();
  }
  if (($("#jenisdok").val() == 'SDD')) {
    $('#dokbaru').removeAttr('disabled');
    $('#inputsdd').prop('readonly', true);
    $('#versi').prop('readonly', false);
    $('#tgldisposisi').prop('readonly', true);
    $("#tgldokumen").val("<?php echo date('d/m/Y');?>");
    $('#versi').val("1.0");
    $('#dokbaru').prop("checked", true);
    $('#picmgrbsa').removeAttr('disabled');
    $('#picamgrbsa').removeAttr('disabled');
    $('#frm-divisi').hide();
    $('#frm-tgldisposisi').hide();
    $('.dokumenbiasa').hide();
    $('.dokumensdd').show();
    $("#inputsdd").prop('required',true);
    $("#nomordokumen").prop('required',false);
  }
  if (($("#jenisdok").val() == 'Memo Requirement') || ($("#jenisdok").val() == 'Lain-lain')) {
    $('#divisi-modal').removeAttr('disabled');
    $('#frm-versi').hide();
    $('#frm-picmgrbsa').hide();
    $('#frm-picamgrbsa').hide();
    $('#frm-dokbaru').hide();
  }
  if (($("#jenisdok").val() == 'Notulen Rapat') || ($("#jenisdok").val() == 'Dokumen TOR')){
    $('#frm-versi').hide();
    $('#frm-picmgrbsa').hide();
    $('#frm-picamgrbsa').hide();
    $('#frm-dokbaru').hide();
    $('#frm-divisi').hide();
  }
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    //alert("Kode:"+charCode);
    return (charCode == 46 || (charCode >= 48 && charCode <= 57));
}

$("button.tambah1").click(function(){

  var nama_element='elementterdampak';
    var nama_div='divterdampak';
    var nama_select='terdampak';
    var nama_button='deleteterdampak';
    var max = 5;

    var total_element = $("#groupterdampak ."+nama_element).length;
    var lastid = $("#groupterdampak ."+nama_element+":last").attr("id");
    var split_id = lastid.split("_");
    var nextindex = Number(split_id[1]) + 1;

    if(total_element < max ){
      tambah_element1(nama_element,nama_div,nextindex,nama_select,
        nama_button)
    }

    $( ".inputterdampak" ).autocomplete({
      source: [
      <?php 
      if (!empty($listaplikasi)) {
        foreach ($listaplikasi as $row) {
          echo '"'.$row->Nama.'",';
        }
      } ?>]
    });
}); 

$('.classterdampak').on('click','.remove',function(){
    var id = this.id;
    var split_id = id.split("_");
    var namadiv = "#divterdampak_"+split_id[1];
    // Remove <div> with id
    $(namadiv).remove();
  }); 


function tambah_element1(nama_element,nama_div,nextindex,nama_select,
  nama_button) {

    // Adding new div container after last occurance of element class
    $("#groupterdampak ."+nama_element+":last").after("<div class='row "+
    nama_element+"' id='"+nama_div+"_"+nextindex +"'></div>");

    var str;
    str='<div class="col-sm-11">';

    str+='<input class="form-control inputterdampak" name="'+nama_select+'_'+nextindex+'" id="'+nama_select+'_'+nextindex+'">';

    // str+='<select class="form-control member" name="'+nama_select+'_'+nextindex+
    //   '" id="'+nama_select+'_'+nextindex+'">';

    // str+='<option value=""></option>';
    // <?php foreach ($listaplikasi as $row) { ?>
    //   str+='<option value="<?php echo $row->Nama;?>" ><?php echo $row->Nama;  ?></option>';
    // <?php } ?>
 
    // str+='</select>';
    str+='</div>';
    str+='<div class="col-sm-1">';
    str+='<button type="submit" name="'+nama_button+'_'+nextindex+'"';
    str+=' id="'+nama_button+'_'+nextindex+'" class="btn-sm btn-danger remove" >';
    str+='<i class="fas fa-minus"></i></button>';
    str+='</div>';
    str+='</div>';

    // Adding element to <div>
    $("#"+nama_div+'_'+nextindex).append(str);
 
  }

$("button.tambah").click(function(){
    var thisid = this.id;
    var split_thisid=thisid.split("_");
    var nameid=split_thisid[0];
    var tipe=split_thisid[1];
    var kelompok=split_thisid[2];

    var nama_element='element_'+tipe+kelompok;
    var nama_div='div'+tipe+kelompok;
    var nama_select=tipe+kelompok;
    var nama_button='delete_'+tipe+'_'+kelompok;
    var max = 5;

    // Finding total number of elements added
    var total_element = $("#tim"+kelompok+ " ."+nama_element).length;

    // last <div> with element class id
    var lastid = $("#tim"+kelompok+ " ."+nama_element+":last").attr("id");
    var split_id = lastid.split("_");
    var nextindex = Number(split_id[1]) + 1;

    if(total_element < max ){
      tambah_element(nama_element,nama_div,nextindex,nama_select,
        nama_button,kelompok)
    }
  });

  $('.timmember').on('click','.remove',function(){
    var id = this.id;
    var split_id = id.split("_");
    var namadiv = "#div"+split_id[1]+split_id[2]+"_"+split_id[3];
    // Remove <div> with id
    $(namadiv).remove();
    rubahmember();
  }); 


  function tambah_element(nama_element,nama_div,nextindex,nama_select,
  nama_button,kelompok) {

    // Adding new div container after last occurance of element class
    $("#tim"+kelompok+" ."+nama_element+":last").after("<div class='row "+
    nama_element+"' id='"+nama_div+"_"+nextindex +"'></div>");

    var str;
    str='<div class="col-sm-1"></div>';
    str+='<label class="col-sm-3 form-check-label"></label>';
    str+='<div class="col-sm-7">';
    str+='<div class="row">';
    str+='<div class="col-sm-11">';

    str+='<select class="form-control member" name="'+nama_select+'_'+nextindex+
      '" id="'+nama_select+'_'+nextindex+'" onchange="rubahmember()">';

    str+='<option value=""></option>';

    if(nama_select == 'mgrbnp') {
      <?php foreach ($listmgrbnp as $row) { ?>
        str+='<option value="<?php echo $row->NPP;?>"><?php echo $row->Nama.'/'.$row->NPP;?></option>';
      <?php } ?>
    }
    if(nama_select == 'amgrbnp') {
      <?php foreach ($listamgrbnp as $row) { ?>
        str+='<option value="<?php echo $row->NPP;?>"><?php echo $row->Nama.'/'.$row->NPP;?></option>';
      <?php } ?>
    }
    if(nama_select == 'mgrbsa') {
      <?php foreach ($listmgrbsa as $row) { ?>
        str+='<option value="<?php echo $row->NPP;?>"><?php echo $row->Nama.'/'.$row->NPP;?></option>';
      <?php } ?>
    }
    if(nama_select == 'amgrbsa') {
      <?php foreach ($listamgrbsa as $row) { ?>
        str+='<option value="<?php echo $row->NPP;?>"><?php echo $row->Nama.'/'.$row->NPP;?></option>';
      <?php } ?>
    }
    if(nama_select == 'mgrptm') {
      <?php foreach ($listmgrptm as $row) { ?>
        str+='<option value="<?php echo $row->NPP;?>"><?php echo $row->Nama.'/'.$row->NPP;?></option>';
      <?php } ?>
    }
    if(nama_select == 'amgrptm') {
      <?php foreach ($listamgrptm as $row) { ?>
        str+='<option value="<?php echo $row->NPP;?>"><?php echo $row->Nama.'/'.$row->NPP;?></option>';
      <?php } ?>
    }

    str+='</select>';
    str+='</div>';
    str+='<div class="col-sm-1">';
    str+='<button type="submit" name="'+nama_button+'_'+nextindex+'"';
    str+=' id="'+nama_button+'_'+nextindex+'" class="btn-sm btn-danger remove" >';
    str+='<i class="fas fa-minus"></i></button>';
    str+='</div>';
    str+='</div>';
    str+='</div>';str+='</div>';

    // Adding element to <div>
    $("#"+nama_div+'_'+nextindex).append(str);
  }

  $("#demandid").change(function(){
    var demandid=$("#demandid").val();
    
    if (demandid != '')  {
      $.ajax({
        url: "<?php echo base_url('project'); ?>/getdetaildemand",
        type: 'POST', 
        data: {demandid: $("#demandid").val()},
        dataType: "json",

        success: function(data){
          if (data.detaildemand[0] !== undefined) {
              if (data.detaildemand[0].SoIn== 'SO') $("#SO").prop("checked", true);
              if (data.detaildemand[0].SoIn== 'IN') $("#IN").prop("checked", true);
              $('#tahundemand').val(data.detaildemand[0].TahunDemand);
              $('#periodedemand').val(data.detaildemand[0].PeriodeDemand);
              $('#namademand').val(data.detaildemand[0].NamaDemand);
              $('#divisi').val(data.detaildemand[0].Divisi);
              $('#lob').val(data.detaildemand[0].LOB);
              isistatusproject(data.detaildemand[0].ProjectProcurement);
              if (data.detaildemand[0].ProjectProcurement == 'Project') {
                $("#project").prop("checked", true);
                $('#statusproject').val(data.detaildemand[0].StatusProject);
              }
              if (data.detaildemand[0].ProjectProcurement == 'Procurement') {
                $("#procurement").prop("checked", true);
                $('#statusproject').val(data.detaildemand[0].StatusProcurement);
              }
              $('#grouping').val(data.detaildemand[0].Grouping);
              if (data.detaildemand[0].Project!=null)
              $('#nmproject').val(data.detaildemand[0].Project+': '+data.detaildemand[0].Nama);
              $('#program').val(data.detaildemand[0].Program);
              $('#groupingcluster').val(data.detaildemand[0].GroupingCluster);
              $('#tipeproject').val(data.detaildemand[0].TipeProject);
              $('#corpplan').val(data.detaildemand[0].CorPlan);
              $('#narative').val(data.detaildemand[0].Narative);
              $('#mingguke').val(data.detaildemand[0].MingguEksImplementasi);
              $('#bulan').val(data.detaildemand[0].BulanEksImplementasi);
              $('#kuartal').val(data.detaildemand[0].KuartalEksImplementasi);
              $('#tahun').val(data.detaildemand[0].TahunEksImplementasi);
              $('#mingguke').attr('disabled', true);
              $('#bulan').attr('disabled', true);
              $('#kuartal').attr('disabled', true);
              if (data.detaildemand[0].MingguEksImplementasi!=0) { $('#minggucek').prop('checked', true); $('#mingguke').attr('disabled', false); }
              if (data.detaildemand[0].BulanEksImplementasi!=0) { $('#bulancek').prop("checked", true); $('#bulan').attr('disabled', false); }
              if (data.detaildemand[0].KuartalEksImplementasi!=0) { $('#kuartalcek').prop("checked", true); $('#kuartal').attr('disabled', false); }
              $('#mandays').val(data.detaildemand[0].MandaysDesain);
              $('#mandaysdev').val(data.detaildemand[0].MandaysDev);
              $('#mandaystest').val(data.detaildemand[0].MandaysTest);
              $('#mandays').val(data.detaildemand[0].EstimasiMandays);
              //$('#projectid').val(data.detaildemand[0].ProjectID);
              //$('#namaproject').val(data.detaildemand[0].NamaProject);
              
              $('#kategoriproject').val(data.detaildemand[0].ProjectCategory);
              $('#versidokproj').val(data.detaildemand[0].VersiDokProj);
              $('#tglinitialproj').val(data.detaildemand[0].TglInitialDokProj);
              $('#tglfinalproj').val(data.detaildemand[0].TglFinalDokProj);
              $('#picuser').val(data.detaildemand[0].PICUser);
              $('#uicsupport').val(data.detaildemand[0].UICSupportIT);
              $('#kategoripengembanganojk').val(data.detaildemand[0].KategoriPengembanganOJK);
              $('#jenispengembangan').val(data.detaildemand[0].JenisPengembangan);
              $('#pengembang').val(data.detaildemand[0].Pengembang);
              $('#ppjti').val(data.detaildemand[0].PPJTIPihakTerkait);
              $('#profit').val(data.detaildemand[0].ProfitEfesiensi);
              $('#lokasidc').val(data.detaildemand[0].LokasiDC);
              $('#lokasidrc').val(data.detaildemand[0].LokasiDRC);
              $('#capex').autoNumeric('set', data.detaildemand[0].EstimasiBiayaCapex);
              $('#opex').autoNumeric('set', data.detaildemand[0].EstimasiBiayaOpex);
              $('#estimasirp').autoNumeric('set', data.detaildemand[0].EstimasiRPNilai);
          } else {
            
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            //timer: 3000
          });
          Toast.fire({
              icon: 'error',
              title: '&nbsp;'+'Data Demand tidak ada',
            });
          resetisidemand();
          }
          
      },error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);

        }
      })
      
    }
    getDatatimmember($("#demandid").val());
    getDataterdampak($("#demandid").val());
});


function resetisidemand() {
  $("#demandid").val('');

    $('#namademand').val('');
    $('#divisi').val('');
    $('#lob').val('');
    $('#nmproject').val('');
    $('#program').val('');
    $("#project").prop("checked", false);
    $('#statusproject').val('');
    $("#procurement").prop("checked", false);
    $('#statusproject').val('');
    $('#grouping').val('');
    $('#groupingcluster').val('');
    $('#tipeproject').val('');
    $('#corpplan').val('');
    $('#narative').val('');
    $('#picuser').val('');
    $('#uicsupport').val('');
    $('#jenispengembangan').val('');
    $('#ppjti').val('');
    $('#pengembang').val('');
    $('#mandays').val(0);
    $('#mandaysdev').val(0);
    $('#mandaystest').val(0);
    $('#mandays').val(0);
    $('#mingguke').val('');
    $('#bulan').val('');
    $('#kuartal').val('');
    $('#minggucek').prop('checked', false); $('#mingguke').attr('disabled', true);
    $('#bulancek').prop("checked", false); $('#bulan').attr('disabled', true);
    $('#kuartalcek').prop("checked", false); $('#kuartal').attr('disabled', true);
    $('#mgrbnp_1').val('');$('#mgrbnp_2').val('');
    $('#amgrbnp_1').val('');$('#amgrbnp_2').val('');
    $('#mgrbsa_1').val('');$('#mgrbsa_2').val('');
    $('#amgrbsa_1').val('');$('#amgrbsa_2').val('');
    $('#mgrptm_1').val('');$('#mgrptm_2').val('');
    $('#amgrptm_1').val('');$('#amgrptm_2').val('');
}

  function validasi() {
    var sama=0;
    var x,y;

    var lastid = $("#timbnp .element_mgrbnp:last").attr("id");
    var split_id = lastid.split("_");
    var lastindex = Number(split_id[1]);
    for (x=1; x<=lastindex-1; x++) {
      for (y=x+1;y<=lastindex; y++) {
        if (($('#mgrbnp_'+x).val()!=null) &&  ($('#mgrbnp_'+y).val()!=null)) {
          if ($('#mgrbnp_'+x).val() == $('#mgrbnp_'+y).val()) sama=1;
        }
      }
    }

    lastid = $("#timbnp .element_amgrbnp:last").attr("id");
    split_id = lastid.split("_");
    lastindex = Number(split_id[1]);
    for (x=1; x<=lastindex-1; x++) {
      for (y=x+1;y<=lastindex; y++) {
        if (($('#amgrbnp_'+x).val()!=null) &&  ($('#amgrbnp_'+y).val()!=null)) {
          if ($('#amgrbnp_'+x).val() == $('#amgrbnp_'+y).val()) sama=2;
        }
      }
    }

    lastid = $("#timbsa .element_mgrbsa:last").attr("id");
    split_id = lastid.split("_");
    lastindex = Number(split_id[1]);
    for (x=1; x<=lastindex-1; x++) {
      for (y=x+1;y<=lastindex; y++) {
        if (($('#mgrbsa_'+x).val()!=null) &&  ($('#mgrbsa_'+y).val()!=null)) {
          if ($('#mgrbsa_'+x).val() == $('#mgrbsa_'+y).val()) sama=3;
        }
      }
    }

    lastid = $("#timbsa .element_amgrbsa:last").attr("id");
    split_id = lastid.split("_");
    lastindex = Number(split_id[1]);
    for (x=1; x<=lastindex-1; x++) {
      for (y=x+1;y<=lastindex; y++) {
        if (($('#amgrbsa_'+x).val()!=null) &&  ($('#amgrbsa_'+y).val()!=null)) {
          if ($('#amgrbsa_'+x).val() == $('#amgrbsa_'+y).val()) sama=4;
        }
      }
    }

    lastid = $("#timptm .element_mgrptm:last").attr("id");
    var split_id = lastid.split("_");
    var lastindex = Number(split_id[1]);
    for (x=1; x<=lastindex-1; x++) {
      for (y=x+1;y<=lastindex; y++) {
        if (($('#mgrptm_'+x).val()!=null) &&  ($('#mgrptm_'+y).val()!=null)) {
          if ($('#mgrptm_'+x).val() == $('#mgrptm_'+y).val()) sama=5;
        }
      }
    }

    lastid = $("#timptm .element_amgrptm:last").attr("id");
    var split_id = lastid.split("_");
    var lastindex = Number(split_id[1]);
    for (x=1; x<=lastindex-1; x++) {
      for (y=x+1;y<=lastindex; y++) {
        if (($('#amgrptm_'+x).val()!=null) &&  ($('#amgrptm_'+y).val()!=null)) {
          if ($('#amgrptm_'+x).val() == $('#amgrptm_'+y).val()) sama=6;
        }
      }
    }

    if (sama!=0) {
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      //timer: 3000
    });
    Toast.fire({
        icon: 'error',
        title: '&nbsp;'+'Tim member tidak boleh sama',
      }).then((result) => {
  if (result.value) {
    return false;
  }
})
    return false;

    
    }

    return true;
  }

    $(function () {
    $('#mytable').DataTable( {
      "processing": true, // for show progress bar
      "serverSide": false, // for process server side
       "paging": true,
       "ordering": true,
       "searching": true,
       "info" : true,
       "dom": "<'row'<'col-sm-5'B><'col-sm-3 text-center'l><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "buttons": ["copy", "csv", "excel", "pdf", "colvis"],
     } );

    $('#mytable1').DataTable( {
      "columnDefs": [
       { type: 'date-uk', targets: 0 }
     ],
      "processing": true, // for show progress bar
      "serverSide": false, // for process server side
       "paging": true,
       "ordering": true,
       "searching": true,
       "info" : true,
       "dom": "<'row'<'col-sm-5'B><'col-sm-3 text-center'l><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "buttons": ["copy", "csv", "excel", "pdf", "colvis"],
     } );

    $('#mytable2').DataTable( {
      "columnDefs": [
       { type: 'date-uk', targets: 0 }
     ],
      "processing": true, // for show progress bar
      "serverSide": false, // for process server side
       "paging": true,
       "ordering": true,
       "searching": true,
       "info" : true,
       "dom": "<'row'<'col-sm-5'B><'col-sm-3 text-center'l><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "buttons": ["copy", "csv", "excel", "pdf", "colvis"],
     } );

    $('#mytable3').DataTable( {
      "processing": true, // for show progress bar
      "serverSide": false, // for process server side
       "paging": true,
       "ordering": true,
       "searching": true,
       "info" : true,
       "dom": "<'row'<'col-sm-5'B><'col-sm-3 text-center'l><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "buttons": ["copy", "csv", "excel", "pdf", "colvis"],
     } );
  });

    function  hitungmandays() {
      var total=Number($('#mandaysdesain').val())+Number($('#mandaysdev').val())+ Number($('#mandaystest').val());
      $('#mandays').val(total);
    }

    function ubahrequire() {
      if ($('#requirementreceived').prop('checked')) $('#tglrequest').prop('readonly', false); else {
        $('#tglrequest').val('');
        $('#tglrequest').prop('readonly', true);
      }
    }

    function ubahnomordok() {
      if ($('#dokbaru').prop('checked')) {
        $('#inputsdd').val('');
        $('#inputsdd').prop('readonly', true);
        $('#versi').val('1.0');
      }  else {
        $('#inputsdd').prop('readonly', false); 
        $('#inputsdd').val('');
        $('#versi').val('');
      }
    }

    function isiminggu() {
      $("#bulan").attr('disabled', false);
    }

    function rubahmember() {
      $("#ubahmember").val('Y');
    }

    function rubahpicbsa() {
      $("#ubahpicbsa").val('Y');
    }

    function getdok(){
      if ($("#jenisdok").val()=='SDD') {
        $.ajax({
        url: "<?php echo base_url('project'); ?>/getdoksdd",
        type: 'POST', 
        data: {nomorsdd: $("#inputsdd").val()},
        dataType: "json",

        success: function(data){
          if (data[0] == undefined) {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            //timer: 3000
          });
          Toast.fire({
              icon: 'error',
              title: 'Dokumen SDD tidak ditemukan',
            });
        } else {
          $("#perihal").val(data[0].Deskripsi);
          var versi=data[0].Versi.split(".");
          var versi2=Number(versi[1])+1;
          var versi3=versi[0]+"."+versi2;
           $("#versi").val(versi3);
        } },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);

        }  
      })
    }
  }

  function editdok(Id){
    $("#aksi1").val('Edit');
    $("#iddokumen").val(Id);
    $.ajax({
        url: "<?php echo base_url('project'); ?>/getdokumen",
        type: 'POST', 
        data: {id: Id},
        dataType: "json",

        success: function(data){
          //alert(JSON.stringify(data[0]));
          if (data[0] == undefined) {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            //timer: 3000
          });
          Toast.fire({
              icon: 'error',
              title: 'Dokumen tidak ditemukan',
            });
        } else {
          $("#titlemodal1").text("Edit Dokumen");
          $("#jenisdok").val(data[0].JenisDokumen);
          if (data[0].JenisDokumen=='SDD') {
            $("#inputsdd").val(data[0].NomorDokumen);
            $("#nomordokumen").val(''); 
            $('.dokumenbiasa').hide();
            $('.dokumensdd').show(); 
          } else {
            $("#inputsdd").val('');
            $("#nomordokumen").val(data[0].NomorDokumen);
            $('.dokumenbiasa').show();
            $('.dokumensdd').hide(); 
          }
          $("#tgldokumen").val(data[0].TanggalDokumen);
          $("#perihal").val(data[0].Deskripsi);
          $("#versi").val(data[0].Versi);
          $("#divisi-modal").val(data[0].Divisi);
          $("#tgldisposisi").val(data[0].TanggalDispo);
          $("#picmgrbsa").val(data[0].MGR);
          $("#picamgrbsa").val(data[0].AMGR);
          $("#namafile").val(data[0].NamaFile);
          $('#uploadfile').next('label').html('Choose a file');

          $("#modal-dokumen").modal('show');

          $('#dokbaru').prop("checked", false);
          $('#dokbaru').attr('disabled', 'disabled');
          $('#nomordokumen').prop('readonly', true);
          $('#inputsdd').prop('readonly', true);
          $("#jenisdok").attr('disabled', 'disabled');
          $('#divisi-modal').attr('disabled', 'disabled');
          $('#tgldisposisi').prop('readonly', false); 
          $('#versi').prop('readonly', true); 
          $('#picmgrbsa').attr('disabled', 'disabled');
          $('#picamgrbsa').attr('disabled', 'disabled');

          $('#frm-divisi').show();
          $('#frm-tgldisposisi').show();
          $('#frm-picmgrbsa').show();
          $('#frm-picamgrbsa').show();
          $('#frm-dokbaru').show();
          $('#frm-versi').show();
          if ((data[0].NamaFile!=null) && (data[0].NamaFile!='')) {
            $('#grpuploadfile').hide();
            $('#grpnamafile').show();
          } else {
            $('#grpuploadfile').show();
            $('#grpnamafile').hide();
          }

          if ($("#jenisdok").val() == 'Dokumen Project') {
            $('#versi').prop('readonly', false);
            $('#tgldisposisi').prop('readonly', true);
            $('#frm-divisi').hide();
            $('#frm-tgldisposisi').hide();
            $('#frm-picmgrbsa').hide();
            $('#frm-picamgrbsa').hide();
            $('#frm-dokbaru').hide();            
          }
          if (($("#jenisdok").val() == 'SDD')) {
            $('#versi').prop('readonly', false);
            $('#tgldisposisi').prop('readonly', true);
            $('#picmgrbsa').removeAttr('disabled');
            $('#picamgrbsa').removeAttr('disabled');
            $('#frm-divisi').hide();
            $('#frm-tgldisposisi').hide();         
          }
          if (($("#jenisdok").val() == 'Memo Requirement') || ($("#jenisdok").val() == 'Lain-lain')) {
            $('#divisi-modal').removeAttr('disabled');
            $('#frm-versi').hide();
            $('#frm-picmgrbsa').hide();
            $('#frm-picamgrbsa').hide();
            $('#frm-dokbaru').hide();
          }
          if (($("#jenisdok").val() == 'Notulen Rapat') || ($("#jenisdok").val() == 'Dokumen TOR')){
            $('#frm-versi').hide();
            $('#frm-picmgrbsa').hide();
            $('#frm-picamgrbsa').hide();
            $('#frm-dokbaru').hide();
            $('#frm-divisi').hide();
          }

        } },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);

        }  
      })
  }

    function editnote(Id){
    $("#aksi2").val('Edit');
    $("#idnote").val(Id);
    $.ajax({
        url: "<?php echo base_url('project'); ?>/getnote",
        type: 'POST', 
        data: {id: Id},
        dataType: "json",

        success: function(data){
          if (data[0] == undefined) {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            //timer: 3000
          });
          Toast.fire({
              icon: 'error',
              title: 'Dokumen tidak ditemukan',
            });
        } else {
          $("#titlemodal2").text("Edit Dokumen");
          $("#title-note").val(data[0].Title);
          $("#note-modal").val(data[0].Note);
          $("#modal-note").modal('show');
         } },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);

        }  
      })
  }



function hapusdok(Id,NomorDokumen) {
Swal.fire({
  title: '',
  text: "Dokumen "+NomorDokumen+" akan dihapus?",
  showCancelButton: true,
  confirmButtonText: 'Hapus',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
          url: "<?php echo base_url('project'); ?>/hapusdok",
          type: 'GET', 
          data: {id: Id,demandid: $('#demandid').val(),nomordokumen: NomorDokumen},
          dataType: "json",
          success: function(data){
            var nmprogram="<?php echo base_url('project/loaddok'); ?>" + "?demandid="+$("#demandid").val()+"&aksi=<?php echo $aksi;?>";
            $("#tabeldok").load(nmprogram);
            var nmprogram="<?php echo base_url('project/loadhistori'); ?>" + "?demandid="+$("#demandid").val();
            $("#tabelhistori").load(nmprogram);
            Swal.fire(
              '',
              'Dokumen sudah berhasil dihapus',
              'success'
            );
          }
        });
   
  }

})
}

function hapusnote(Id) {
Swal.fire({
  title: '',
  text: "Note ini akan dihapus?",
  showCancelButton: true,
  confirmButtonText: 'Hapus',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
          url: "<?php echo base_url('project'); ?>/hapusnote",
          type: 'GET', 
          data: {id: Id,demandid: $('#demandid').val()},
          dataType: "json",
          success: function(data){
            var nmprogram="<?php echo base_url('project/loadnote'); ?>" + "?demandid="+$("#demandid").val()+"&aksi=<?php echo $aksi;?>";
            $("#tabelnote").load(nmprogram);
            var nmprogram="<?php echo base_url('project/loadhistori'); ?>" + "?demandid="+$("#demandid").val();
            $("#tabelhistori").load(nmprogram);
            Swal.fire(
              '',
              'Note sudah berhasil dihapus',
              'success'
            );
           }
        });
   
  }
})
}

function ubahbenefit() {

  var total=Number($("#benefitcommercial").autoNumeric('get')) + Number($("#benefitautomation").autoNumeric('get')) + Number($("#benefitregulatory").autoNumeric('get')) + Number($("#benefitbniimage").autoNumeric('get'));
  $('#totalbenefit').autoNumeric('set', total);

}
</script>

<script type="text/javascript">
  $('#tglinitialproj').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grptglinitialproj",
  });

  $('#tglfinalproj').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grptglfinalproj",
  });

  $('#maxreqreceived').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grpmaxreqreceived",
  });

  $('#tglrequest').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grptglrequest",
  });

  $('#tgldocumentproject').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grptgldocumentproject",
  });

  $('#tgldokumen').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grptgldokumen",
  });

  $('#tgldisposisi').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    enableOnReadonly: false,
    todayBtn: "linked",
    container: "#grptgldisposisi",
  });

  $("#btnupload").click(function(){
    var property = document.getElementById('uploadfile').files[0];  
    if (property!==undefined) {
    var form_data = new FormData();                  
    form_data.append('file', property);
    form_data.append('demandid',$("#demandid").val());

                       
    $.ajax({
        url: '<?php echo base_url('project') ?>/uploadfile', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
          if (php_script_response!=""){
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,
            //timer: 3000
          });
          Toast.fire({
              icon: 'error',
              title: php_script_response,
            });
          } else {
            $("#namafile").val(property["name"]);
            $("#grpnamafile").show();
            $("#grpuploadfile").hide();
          }
        }
     });
  }
  });

  function downloaddok(namafile) {
    window.location="<?php echo base_url('project') ?>/downloadfile?demandid="+$('#demandid').val()+"&namafile="+namafile;
  }

  $("#btndownload").click(function(){
    var namafile=$('#namafile').val();
    downloaddok(namafile);
  });

  $("#btnhapus").click(function(){
    Swal.fire({
  title: '',
  text: "File "+$('#namafile').val()+" akan dihapus?",
  showCancelButton: true,
  confirmButtonText: 'Hapus',
  reverseButtons: true
}).then((result) => {
        /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        var nomordokumen=$('#nomordokumen').val();
        if ($('#jenisdok').val()=='SDD') nomordokumen=$('#inputsdd').val();

        $.ajax({
          url: "<?php echo base_url('project'); ?>/hapusfile",
          type: 'GET', 
          data: {demandid: $("#demandid").val(),nomordokumen: nomordokumen,namafile: $('#namafile').val(),versi: $('#versi').val()},
          dataType: "json",

        });
        var nmprogram="<?php echo base_url('project/loaddok'); ?>" + "?demandid="+$("#demandid").val()+"&aksi=<?php echo $aksi;?>";
          // alert("Namaprogram:"+nmprogram);
          $("#tabeldok").load(nmprogram);
          var nmprogram="<?php echo base_url('project/loadhistori'); ?>" + "?demandid="+$("#demandid").val();
          $("#tabelhistori").load(nmprogram);
          getDatatimmember($("#demandid").val());
          getDataterdampak($("#demandid").val());

          $('#uploadfile').next('label').html('Choose a file');
          $("#namafile").val('');
          $('#grpuploadfile').show();
          $('#grpnamafile').hide();
      }
    })
    
  });


</script>
