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
            <form action="<?php echo base_url('project') ?>/demand" method="get" name="frmfilter">
            <div class="card card-progo collapsed-card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-filter mr-1"></i>
                      Filter
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" id="my-card-widget">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
           
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="periodedemand">Periode Demand</label>
                        <input type="text" class="form-control" id="periodedemand" name="periodedemand" placeholder="Tahun" value="<?php echo $tahun; ?>">
                    </div>
                    <div class="form-group">
                        <label for="demand">Demand</label>
                        <input type="text" class="form-control" id="demand" name="demand"placeholder="Demand" value="<?php echo $demand; ?>">
                    </div>
                    <div class="form-group">
                    <label for="procurement">Project/Procurement</label>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="projectprocurement" value="Project" id="project" onclick="ubah_status('Project')" <?php if ($projectprocurement == 'Project') echo 'checked'; ?>>
                          <label class="form-check-label" for="project">Project</label>
                        </div>
                      </div>
                      <div class="com-sm-3">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="projectprocurement" value="Procurement" id="procurement" onclick="ubah_status('Procurement')" <?php if ($projectprocurement == 'Procurement') echo 'checked'; ?> >
                          <label class="form-check-label" for="procurement">Procurement</label>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="statusproject">Status Project/Procurement</label>
                      <select class="form-control" id="statusproject" name="statusproject">
                        <option value="" <?php if ($statusproject == '') echo 'selected';  ?>></option>
                           <?php
                           if ($projectprocurement == 'Procurement') {
                            if (!empty($liststatusprocurement)) {
                              foreach ($liststatusprocurement as $row) { ?>
                                <option value="<?php echo $row->Kode.'. '.$row->Nama;?>" <?php if ($statusproject == $row->Kode.'. '.$row->Nama) echo 'selected';  ?>><?php echo $row->Kode.'. '.$row->Nama;  ?></option>
                              <?php  
                              } }

                           } elseif ($projectprocurement == 'Project'){ 
                            if (!empty($liststatusproject)) {
                              foreach ($liststatusproject as $row) { ?>
                                <option value="<?php echo $row->Nama;?>" <?php if ($statusproject == $row->Nama) echo 'selected';  ?>><?php echo $row->Kode.'-'.$row->Nama;  ?></option>
                              <?php  
                              } }
                            } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="lineofbusiness">Line of Business</label>
                      <select class="form-control" id="lineofbusiness" name="lineofbusiness">
                        <option value="" <?php if ($lineofbusiness == '') echo 'selected';  ?>></option>
                        <?php
                        if (!empty($listlob)) {
                          foreach ($listlob as $row) { ?>
                            <option value="<?php echo $row->Kode;?>" <?php if ($lineofbusiness == $row->Kode) echo 'selected';  ?>><?php echo $row->Kode.' - '.$row->Nama;  ?></option>
                          <?php  
                          }
                        } ?>
                      ?> 
                      </select>
                    </div>
                                       
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="jenisdemand">Jenis Demand</label>
                        <select class="form-control" id="tipedemand" name="tipedemand">
                          <option value="" <?php if ($tipedemand == '') echo 'selected';  ?>></option>
                          <option value="SO" <?php if ($tipedemand == 'SO') echo 'selected';  ?>>Sign Off Tahun Ini</option>
                          <option value="IN" <?php if ($tipedemand == 'IN') echo 'selected';  ?>>Insersi Tahun Ini</option>
                          <option value="CO" <?php if ($tipedemand == 'CO') echo 'selected';  ?>>Carry Over</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <select class="form-control" id="divisi" name="divisi">
                          <option value="" <?php if ($divisi == '') echo 'selected';  ?>></option>
                          <?php
                          if (!empty($listdivisi)) {
                            foreach ($listdivisi as $row) { ?>
                              <option value="<?php echo $row->Kode;?>" <?php if ($divisi == $row->Kode) echo 'selected';  ?>><?php echo $row->Kode.' - '.$row->Nama;  ?></option>

                            <?php  
                            }
                          } ?>
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sektor">Sektor</label>
                        <select class="form-control" id="sektor" name="sektor">
                          <option value="" <?php if ($sektor == '') echo 'selected';  ?>></option>
                          <?php
                          if (!empty($listsektor)) {
                            foreach ($listsektor as $row) { ?>
                              <option value="<?php echo $row->Nama;?>" <?php if ($sektor == $row->Nama) echo 'selected';  ?>><?php echo $row->Nama;  ?></option>

                            <?php  
                            }
                          } ?>
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="implementasi">Ekspektasi Implementasi</label>
                      <div class="row">
                      <div class="col-sm-6">
                        <select class="form-control" id="implementasi" name="implementasi">
                          <option value="" <?php if ($implementasi == '') echo 'selected';  ?>></option>
                          <option value="Q1" <?php if ($implementasi == 'Q1') echo 'selected';  ?>>Q1-Kuartal 1</option>
                          <option value="Q2" <?php if ($implementasi == 'Q2') echo 'selected';  ?>>Q2-Kuartal 2</option>
                          <option value="Q3" <?php if ($implementasi == 'Q3') echo 'selected';  ?>>Q3-Kuartal 3</option>
                          <option value="Q4" <?php if ($implementasi == 'Q4') echo 'selected';  ?>>Q4-Kuartal 4</option>
                          <option value="01" <?php if ($implementasi == '01') echo 'selected';  ?>>Januari</option>
                          <option value="02" <?php if ($implementasi == '02') echo 'selected';  ?>>Februari</option>
                          <option value="03" <?php if ($implementasi == '03') echo 'selected';  ?>>Maret</option>
                          <option value="04" <?php if ($implementasi == '04') echo 'selected';  ?>>April</option>
                          <option value="05" <?php if ($implementasi == '05') echo 'selected';  ?>>Mei</option>
                          <option value="06" <?php if ($implementasi == '06') echo 'selected';  ?>>Juni</option>
                          <option value="07" <?php if ($implementasi == '07') echo 'selected';  ?>>Juli</option>
                          <option value="08" <?php if ($implementasi == '08') echo 'selected';  ?>>Agustus</option>
                          <option value="09" <?php if ($implementasi == '09') echo 'selected';  ?>>September</option>
                          <option value="10" <?php if ($implementasi == '10') echo 'selected';  ?>>Oktober</option>
                          <option value="11" <?php if ($implementasi == '11') echo 'selected';  ?>>November</option>
                          <option value="12" <?php if ($implementasi == '12') echo 'selected';  ?>>Desember</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="thnimplementasi" name="thnimplementasi"placeholder="Tahun" value="<?php echo $thnimplementasi; ?>">
                      </div>
                      <input type="text" class="form-control" id="id" name="id"value="<?php echo $id; ?>" style="display: none">
                    </div>
                  </div>
                  
                  </div>
                </div>
                
              </div>
              <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="clearfilter()">Clear filter</button>
                    &nbsp;
                    <button type="submit" class="btn btn-primary float-right">Tampilkan</button>
                    &nbsp;
              </div>
            </div>
            </form>

          </section>
        </div>

        <div class="row">
          <section class="col-lg-12">
            <div class="card card-progo">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-table mr-1"></i>
                      Data Result
                </h3>
                <div class="card-tools">
                </div>
              </div>
              <div id="result">
              </div>
              <div id="loading">
              </div>
            </div>
            </section>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>



<script>
  $(document).ready(function (e) {
    <?php if ($alert) echo 'showMessage();' ?>
     getData();
    // showPage();
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

  function getData() {
    $("#result").load("<?php echo base_url('project'); ?>/getlistdemand",{periodedemand: '<?php echo $tahun;?>',demand: '<?php echo $demand;?>',divisi: '<?php echo $divisi;?>',statusproject: '<?php echo $statusproject;?>',tipedemand: '<?php echo $tipedemand;?>',sektor: '<?php echo $sektor;?>',implementasi: '<?php echo $implementasi;?>',thnimplementasi: '<?php echo $thnimplementasi;?>',projectprocurement: '<?php echo $projectprocurement;?>',lineofbusiness: '<?php echo $lineofbusiness;?>',cari: '<?php echo $cari;?>'});

    $("#loading").addClass("overlay");
    $("#loading").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');

  }

  function Removeclass() {
    $('#loading').removeClass('overlay');
    $('#loading').fadeOut();    
  }

  function showPage() {
    document.getElementById("div-loading").style.display = "none";
    document.getElementById("div-content").style.display = "block";
  }

  $('#my-card-widget').CardWidget('collapse');

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

  function clearfilter() {
      $("#tahunlaporan").val('2021');
      $("#demand").val('');
      $("#divisi").val('');
      $("#statusproject").val('');
      $("#tipedemand").val('');
      $("#sektor").val('');
      $("#implementasi").val('');
      $("#thnimplementasi").val('');
      $("#lineofbusiness").val('');
      $('input:radio[name="projectprocurement"]').prop('checked', false);
      $('input:radio[name="projectprocurement"]').removeAttr('checked');
     };

  function ubah_status(x) {
    $('#statusproject').empty();
    $('#statusproject').append('<option value=""></option>');
    if (x == 'Project') {
      <?php if (!empty($liststatusproject)) {
      foreach ($liststatusproject as $row) { ?>
        $('#statusproject').append('<option value="<?php echo $row->Nama;?>"><?php echo $row->Kode.'-'.$row->Nama;  ?></option>');
      <?php } }?>
    }
    if (x == 'Procurement') {
      <?php if (!empty($liststatusprocurement)) {
      foreach ($liststatusprocurement as $row) { ?>
        $('#statusproject').append('<option value="<?php echo $row->Kode.'. '.$row->Nama;?>"><?php echo $row->Kode.'-'.$row->Nama;  ?></option>');
      <?php } }?>
    }
  } 

</script>
