
 <!-- Content Wrapper. Contains page content -->
<!--  
status demand
  grpsektor 1
  projectprocurement 1
  loading1
  divstatusChart

ekspektasi implementasi
  grpsektor 2
  projectprocurement 2
  loading2
  divimplementasiChart

line of business
  grpsektor 3
  projectprocurement 3
  loading3
  divlineofbusinessChart

Jenis Demand SO/IN/CO
  grpsektor 4
  projectprocurement 4
  loading4
  divjenisdemandChart

group sektor
  divgrpsektorChart
  loading7

status eksp implementasi
  grpsektor 5
  projectprocurement 5
  loading5
  diveksimplementasiChart

demand divisi/sektor
  divisi

status divisi
  projectprocurement 6
  divisi
  loading6
  divstatusdivisiChart


-->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard BNP</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard BNP</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6">
            <div class="card card-progo">
              <div class="card-header">
                <h3 class="card-title">
                Status Demand</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <select class="form-control" id="grpsektor1" name="grpsektor1" onchange="ubahgrpsektor1()">
                      <option value="All">All</option>
                      <?php 
                      if (!empty($listgrpsektor)) {
                        foreach ($listgrpsektor as $row) { ?>
                      <option value="<?php echo $row->group2;?>"><?php echo $row->group2;?></option>
                        <?php } 
                      }?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control" id="projectprocurement1" name="projectprocurement1" onchange="ubahproject1()">
                      <option value="All">All</option>
                      <option value="Project">Project</option>
                      <option value="Procurement">Procurement</option>
                    </select>
                  </div>
                </div>
                <br>
                <div id="loading1">
                </div>
                <div id="divstatusChart">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                Ekspektasi Implementasi</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <select class="form-control" id="grpsektor2" name="grpsektor2" onchange="ubahgrpsektor2()">
                      <option value="All">All</option>
                      <?php 
                      if (!empty($listgrpsektor)) {
                        foreach ($listgrpsektor as $row) { ?>
                      <option value="<?php echo $row->group2;?>"><?php echo $row->group2;?></option>
                        <?php } 
                      }?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control" id="projectprocurement2" name="projectprocurement2" onchange="ubahproject2()">
                      <option value="All">All</option>
                      <option value="Project">Project</option>
                      <option value="Procurement">Procurement</option>
                    </select>
                  </div>
                </div>
                <br>
                <div id="loading2">
                </div>
                <div id="divimplementasiChart">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                Line of Business</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <select class="form-control" id="grpsektor3" name="grpsektor3" onchange="ubahgrpsektor3()">
                      <option value="All">All</option>
                      <?php 
                      if (!empty($listgrpsektor)) {
                        foreach ($listgrpsektor as $row) { ?>
                      <option value="<?php echo $row->group2;?>"><?php echo $row->group2;?></option>
                        <?php } 
                      }?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control" id="projectprocurement3" name="projectprocurement3" onchange="ubahproject3()">
                      <option value="All">All</option>
                      <option value="Project">Project</option>
                      <option value="Procurement">Procurement</option>
                    </select>
                  </div>
                </div>
                <br>
                <div id="loading3">
                </div>
                <div id="divlineofbusinessChart">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                Jenis Demand</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <select class="form-control" id="grpsektor4" name="grpsektor4" onchange="ubahgrpsektor4()">
                      <option value="All">All</option>
                      <?php 
                      if (!empty($listgrpsektor)) {
                        foreach ($listgrpsektor as $row) { ?>
                      <option value="<?php echo $row->group2;?>"><?php echo $row->group2;?></option>
                        <?php } 
                      }?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control" id="projectprocurement4" name="projectprocurement4" onchange="ubahproject4()">
                      <option value="All">All</option>
                      <option value="Project">Project</option>
                      <option value="Procurement">Procurement</option>
                    </select>
                  </div>
                </div>
                <br>
                <div id="loading4">
                </div>
                <div id="divjenisdemandChart">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                Status Group Sektor</h3>
              </div>
              <div class="card-body">
                <br>                
                <div id="loading7">
                </div>
                <div id="divgrpsektorChart">
                </div>              

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                Status Ekspektasi Implementasi </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <select class="form-control" id="grpsektor5" name="grpsektor5" onchange="ubahgrpsektor5()">
                      <option value="All">All</option>
                      <?php 
                      if (!empty($listgrpsektor)) {
                        foreach ($listgrpsektor as $row) { ?>
                      <option value="<?php echo $row->group2;?>"><?php echo $row->group2;?></option>
                        <?php } 
                      }?>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <select class="form-control" id="projectprocurement5" name="projectprocurement5" onchange="ubahproject5()">
                      <option value="All">All</option>
                      <option value="Project">Project</option>
                      <option value="Procurement">Procurement</option>
                    </select>
                  </div>
                </div>
                <br>                
                <div id="loading5">
                </div>
                <div id="diveksimplementasiChart">
                </div>              

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                Demand Divisi/Sektor</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <select class="form-control" id="divisisektor" name="divisisektor" onchange="ubahdivisi()">
                      <option value="divisi">Divisi</option>
                      <option value="sektor">Sektor</option>
                      <option value="grpsektor">Group Sektor</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="chart" id="divdemanddivisi" width="400" height="400">
                      <canvas id="DemandDivisiChart"></canvas>
                    </div>
                    <div class="chart" id="divdemandsektor" width="300" height="300">
                      <canvas id="DemandSektorChart"></canvas>
                    </div>
                    <div class="chart" id="divdemandgrpsektor" width="300" height="300">
                      <canvas id="DemandGrpSektorChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                Status Divisi</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <select class="form-control" id="projectprocurement6" name="projectprocurement6" onchange="ubahproject6()">
                      <option value="All">All</option>
                      <option value="Project">Project</option>
                      <option value="Procurement">Procurement</option>
                    </select>
                  </div>
                  <div class="col-sm-5">
                    <select class="form-control" id="divisi" name="divisi" onchange="ubahstatdivisi()">
                      <option value="All">All</option>
                      <?php if (!empty($listdivisi)) {
                        foreach ($listdivisi as $row) { ?>
                          <option value="<?php echo $row->Kode;?>"><?php echo $row->Kode.'-'.$row->Nama;?></option>
                      <?php } }?>
                    </select>
                  </div>
                </div>
                <br>
                <div id="loading6">
                </div>
                <div id="divstatusdivisiChart">
                </div>
              </div>
            </div>
          </div>
        </div>   

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/datalabels/chartjs-plugin-datalabels.min.js"></script>

<script>
$(document).ready(function (e) {
  $('#divdemandsektor').hide();
  $("#divdemandgrpsektor").hide();

  $("#divdemandproject").hide();
  $("#divdemandprocurement").hide();

  $("#divimplementasiproject").hide();
  $("#divimplementasiprocurement").hide();

  $("#divstatusekspproject").hide();
  $("#divstatusekspprocurement").hide();

  getData1();
  getData2();
  getData3();
  getData4();
  getData5();
  getData6();
  getData7();
});


function getData1() {
    var nmprogram="<?php echo base_url('dashboard'); ?>/statusgrpsektor"+
    "?grpsektor="+encodeURIComponent($("#grpsektor1").val())+"&projectprocurement="+$("#projectprocurement1").val();
    $("#divstatusChart").load(nmprogram);

    $('#loading1').fadeIn(0);
    $("#loading1").addClass("overlay");
    $("#loading1").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');
  }

 function Removeclass1() {
    $('#loading1').removeClass('overlay');
    $('#loading1').fadeOut();    
  }

function ubahgrpsektor1() {
  getData1();
}

function getData2() {
    var nmprogram="<?php echo base_url('dashboard'); ?>/statusimplementasi"+
    "?grpsektor="+encodeURIComponent($("#grpsektor2").val())+"&projectprocurement="+$("#projectprocurement2").val();
    $("#divimplementasiChart").load(nmprogram);

    $('#loading2').fadeIn(0);
    $("#loading2").addClass("overlay");
    $("#loading2").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');

  }

 function Removeclass2() {
    $('#loading2').removeClass('overlay');
    $('#loading2').fadeOut();    
  }

function ubahgrpsektor2() {
  getData2();
}

function getData3() {
    var nmprogram="<?php echo base_url('dashboard'); ?>/lineofbusiness"+
    "?grpsektor="+encodeURIComponent($("#grpsektor3").val())+"&projectprocurement="+$("#projectprocurement3").val();
    $("#divlineofbusinessChart").load(nmprogram);

    $('#loading3').fadeIn(0);
    $("#loading3").addClass("overlay");
    $("#loading3").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');

  }

 function Removeclass3() {
    $('#loading3').removeClass('overlay');
    $('#loading3').fadeOut();    
  }

function ubahgrpsektor3() {
  getData3();
}

function getData4() {
    var nmprogram="<?php echo base_url('dashboard'); ?>/jenisdemand"+
    "?grpsektor="+encodeURIComponent($("#grpsektor4").val())+"&projectprocurement="+$("#projectprocurement4").val();
    $("#divjenisdemandChart").load(nmprogram);

    $('#loading4').fadeIn(0);
    $("#loading4").addClass("overlay");
    $("#loading4").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');

  }

 function Removeclass4() {
    $('#loading4').removeClass('overlay');
    $('#loading4').fadeOut();    
  }

function ubahgrpsektor4() {
  getData4();
}

function getData5() {
    var nmprogram="<?php echo base_url('dashboard'); ?>/statuseksimplementasi"+
    "?grpsektor="+encodeURIComponent($("#grpsektor5").val())+"&projectprocurement="+$("#projectprocurement5").val();
    $("#diveksimplementasiChart").load(nmprogram);

    $('#loading5').fadeIn(0);
    $("#loading5").addClass("overlay");
    $("#loading5").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');

  }

 function Removeclass5() {
    $('#loading5').removeClass('overlay');
    $('#loading5').fadeOut();    
  }

function ubahgrpsektor5() {
  getData5();
}

function getData6() {
    var nmprogram="<?php echo base_url('dashboard'); ?>/statusdivisi"+
    "?divisi="+$("#divisi").val();
    $("#divstatusdivisiChart").load(nmprogram);

    $('#loading6').fadeIn(0);
    $("#loading6").addClass("overlay");
    $("#loading6").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');

  }

  function Removeclass6() {
    $('#loading6').removeClass('overlay');
    $('#loading6').fadeOut();    
  }

function ubahstatdivisi() {
  getData6();
} 

function getData7() {
    var nmprogram="<?php echo base_url('dashboard'); ?>/statusgrpsektornew";
    $("#divgrpsektorChart").load(nmprogram);

    $('#loading7').fadeIn(0);
    $("#loading7").addClass("overlay");
    $("#loading7").html('<i class="fas fa-3x fa-spinner fa-spin"></i>');

  }

  function Removeclass7() {
    $('#loading7').removeClass('overlay');
    $('#loading7').fadeOut();    
  }

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($demanddivisi as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->divisi.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->divisi.'"';
    }
  }

?>
    var configdemanddivisi = {
      plugins: [ChartDataLabels],
      type: 'bar',
      data: {
        datasets: [{
          data: [ <?php echo $isidata; ?> ],
          backgroundColor: ['rgba(0, 192, 239,0.7)','rgba(0, 166, 90,0.7)',
              'rgba(245, 105, 84,0.7)',
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              'rgba(0, 192, 239,0.7)','rgba(0, 166, 90,0.7)',
              'rgba(245, 105, 84,0.7)',
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)"],
          borderColor: ['rgb(0, 192, 239)','rgb(0, 166, 90)',
              'rgb(245, 105, 84)',
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              'rgb(0, 192, 239)','rgb(0, 166, 90)',
              'rgb(245, 105, 84)',
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)"],
          label: 'Demand Divisi'
        }],
        labels: [<?php echo $labeldata; ?>]
      },
      options: {
        responsive: true,
        legend: {
          display: false,
          // position: 'bottom',
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    };

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($demandsektor as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->sektor.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->sektor.'"';
    }
  }

?>
    var configdemandsektor = {
      plugins: [ChartDataLabels],
      type: 'bar',
      data: {
        datasets: [{
          data: [ <?php echo $isidata; ?> ],
          backgroundColor: ['rgba(0, 192, 239,0.7)','rgba(0, 166, 90,0.7)',
              'rgba(245, 105, 84,0.7)',
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              'rgba(0, 192, 239,0.7)','rgba(0, 166, 90,0.7)',
              'rgba(245, 105, 84,0.7)',
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)"],
          borderColor: ['rgb(0, 192, 239)','rgb(0, 166, 90)',
              'rgb(245, 105, 84)',
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              'rgb(0, 192, 239)','rgb(0, 166, 90)',
              'rgb(245, 105, 84)',
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)"],
          label: 'Demand Sektor'
        }],
        labels: [<?php echo $labeldata; ?>]
      },
      options: {
        responsive: true,
        legend: {
          display: false,
          // position: 'bottom',
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    };

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($demandgrpsektor as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->grpsektor.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->grpsektor.'"';
    }
  }

?>
var configdemandgrpsektor = {
      plugins: [ChartDataLabels],
      type: 'bar',
      data: {
        datasets: [{
          data: [ <?php echo $isidata; ?> ],
          backgroundColor: ['rgba(0, 192, 239,0.7)','rgba(0, 166, 90,0.7)',
              'rgba(245, 105, 84,0.7)',
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              'rgba(0, 192, 239,0.7)','rgba(0, 166, 90,0.7)',
              'rgba(245, 105, 84,0.7)',
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)",
              "rgba(255, 99, 132,0.7)",
              "rgba(255, 159, 64,0.7)",
              "rgba(255, 205, 86,0.7)",
              "rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)",
              "rgba(153, 102, 255,0.7)"],
          borderColor: ['rgb(0, 192, 239)','rgb(0, 166, 90)',
              'rgb(245, 105, 84)',
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              'rgb(0, 192, 239)','rgb(0, 166, 90)',
              'rgb(245, 105, 84)',
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)"],
          label: 'Demand Sektor'
        }],
        labels: [<?php echo $labeldata; ?>]
      },
      options: {
        responsive: true,
        legend: {
          display: false,
          // position: 'bottom',
        },
        animation: {
          animateScale: true,
          animateRotate: true
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
      }
    };

  var ctx = document.getElementById('DemandDivisiChart').getContext('2d');
  window.myBar2 = new Chart(ctx, configdemanddivisi);

  var ctx = document.getElementById('DemandSektorChart').getContext('2d');
  window.myBar2 = new Chart(ctx, configdemandsektor);

  var ctx = document.getElementById('DemandGrpSektorChart').getContext('2d');
  window.myBar2 = new Chart(ctx, configdemandgrpsektor);

 
function ubahdivisi() {
  if ($("#divisisektor").val()=='divisi') {
    $("#divdemanddivisi").show(); 
    $("#divdemandsektor").hide();
    $("#divdemandgrpsektor").hide();
  }
  if ($("#divisisektor").val()=='sektor') {
    $("#divdemanddivisi").hide(); 
    $("#divdemandsektor").show();
    $("#divdemandgrpsektor").hide();
  }
  if ($("#divisisektor").val()=='grpsektor') {
    $("#divdemanddivisi").hide(); 
    $("#divdemandsektor").hide();
    $("#divdemandgrpsektor").show();
  }
}

function ubahproject1() {
  if ($("#projectprocurement1").val()=='All') {
    $("#divdemandall").show(); 
    $("#divdemandproject").hide();
    $("#divdemandprocurement").hide();
  }
  if ($("#projectprocurement1").val()=='Project') {
    $("#divdemandall").hide(); 
    $("#divdemandproject").show();
    $("#divdemandprocurement").hide();
  }
  if ($("#projectprocurement1").val()=='Procurement') {
    $("#divdemandall").hide(); 
    $("#divdemandproject").hide();
    $("#divdemandprocurement").show();
  }
}


function ubahproject2() {
  if ($("#projectprocurement2").val()=='All') {
    $("#divimplementasi").show(); 
    $("#divimplementasiproject").hide();
    $("#divimplementasiprocurement").hide();
  }
  if ($("#projectprocurement2").val()=='Project') {
    $("#divimplementasi").hide(); 
    $("#divimplementasiproject").show();
    $("#divimplementasiprocurement").hide();
  }
  if ($("#projectprocurement2").val()=='Procurement') {
    $("#divimplementasi").hide(); 
    $("#divimplementasiproject").hide();
    $("#divimplementasiprocurement").show();
  }
}

function ubahproject3() {
  if ($("#projectprocurement3").val()=='All') {
    $("#divlineofbusiness").show(); 
    $("#divlineofbusinessproject").hide();
    $("#divlineofbusinessprocurement").hide();
  }
  if ($("#projectprocurement3").val()=='Project') {
    $("#divlineofbusiness").hide(); 
    $("#divlineofbusinessproject").show();
    $("#divlineofbusinessprocurement").hide();
  }
  if ($("#projectprocurement3").val()=='Procurement') {
    $("#divlineofbusiness").hide(); 
    $("#divlineofbusinessproject").hide();
    $("#divlineofbusinessprocurement").show();
  }
}

function ubahproject4() {
  if ($("#projectprocurement4").val()=='All') {
    $("#divjenisdemand").show(); 
    $("#divjenisdemandproject").hide();
    $("#divjenisdemandprocurement").hide();
  }
  if ($("#projectprocurement4").val()=='Project') {
    $("#divjenisdemand").hide(); 
    $("#divjenisdemandproject").show();
    $("#divjenisdemandprocurement").hide();
  }
  if ($("#projectprocurement4").val()=='Procurement') {
    $("#divjenisdemand").hide(); 
    $("#divjenisdemandproject").hide();
    $("#divjenisdemandprocurement").show();
  }
}

function ubahproject5() {
  if ($("#projectprocurement5").val()=='All') {
    $("#divstatuseksp").show(); 
    $("#divstatusekspproject").hide();
    $("#divstatusekspprocurement").hide();
  }
  if ($("#projectprocurement5").val()=='Project') {
    $("#divstatuseksp").hide(); 
    $("#divstatusekspproject").show();
    $("#divstatusekspprocurement").hide();
  }
  if ($("#projectprocurement5").val()=='Procurement') {
    $("#divstatuseksp").hide(); 
    $("#divstatusekspproject").hide();
    $("#divstatusekspprocurement").show();
  }
}

function ubahproject6() {
  if ($("#projectprocurement6").val()=='All') {
    $("#divstatusdivisi").show(); 
    $("#divstatusdivisiproject").hide();
    $("#divstatusdivisiprocurement").hide();
  }
  if ($("#projectprocurement6").val()=='Project') {
    $("#divstatusdivisi").hide(); 
    $("#divstatusdivisiproject").show();
    $("#divstatusdivisiprocurement").hide();
  }
  if ($("#projectprocurement6").val()=='Procurement') {
    $("#divstatusdivisi").hide(); 
    $("#divstatusdivisiproject").hide();
    $("#divstatusdivisiprocurement").show();
  }
}

function detaildashboard (jenis,var1,var2) {
  var str;
  var projectprocurement;
  var divisi;
  var grpsektor;

  <!--  Status Demand -->
  if (jenis==1) { 
    projectprocurement=$("#projectprocurement1").val();
    grpsektor=encodeURIComponent($("#grpsektor1").val());
    if (projectprocurement=="All") projectprocurement="";
    str="<?php echo base_url('dashboard') ?>/detaildashboard?groupstatus="+var1+"&projectprocurement="+projectprocurement+"&grpsektor="+grpsektor;}

  <!--  Ekspektasi Implementasi -->
  if (jenis==2) {
    projectprocurement=$("#projectprocurement2").val();
    if (projectprocurement=="All") projectprocurement="";
    grpsektor=encodeURIComponent($("#grpsektor2").val());
    if (var1=="All") var1="";
    if (var2=="All") var2="";
    str="<?php echo base_url('dashboard') ?>/detaildashboard?implementasi="+var1+"&thnimplementasi="+var2+"&projectprocurement="+projectprocurement+"&groupstatus=All"+"&grpsektor="+grpsektor; }

  <!--  Line of Business -->  
  if (jenis==3) {
    projectprocurement=$("#projectprocurement3").val();
    grpsektor=encodeURIComponent($("#grpsektor3").val());
    if (projectprocurement=="All") projectprocurement="";
    if (var1=='All') var1='';
    str="<?php echo base_url('dashboard') ?>/detaildashboard?lob="+var1+"&projectprocurement="+projectprocurement+"&groupstatus=All&grpsektor="+grpsektor;}

  <!--  Jenis Demand SO/IN/CO -->  
  if (jenis==4) {
    projectprocurement=$("#projectprocurement4").val();
    grpsektor=encodeURIComponent($("#grpsektor4").val());
    if (projectprocurement=="All") projectprocurement="";
    if (var1=='All') var1='';
    str="<?php echo base_url('dashboard') ?>/detaildashboard?tipe="+var1+"&projectprocurement="+projectprocurement+"&groupstatus=All&grpsektor="+grpsektor;}

  <!--  Status Divisi -->  
  if (jenis==5) {
    projectprocurement=$("#projectprocurement6").val();
    divisi=$("#divisi").val();
    if (projectprocurement=="All") projectprocurement="";
    if (divisi=='All') divisi='';
    str="<?php echo base_url('dashboard') ?>/detaildashboard?groupstatus="+var1+"&projectprocurement="+projectprocurement+"&divisi="+divisi+"&grpsektor=All";}    

  window.open(str);
}

</script>
