<?php 

$kuartal=array();
$status=array();

if (!empty($statuseksp)) {
    foreach ($statuseksp as $row) {
      array_push($kuartal,$row->tahun."-"."Q".$row->kuartal);
      array_push($status,$row->group2);
   }
    $kuartal=array_unique($kuartal);
    $status=array_unique($status);
    sort($kuartal);
    sort($status);
    $kuartalJ1=json_encode($kuartal);
    $jumlahK1=count($kuartal);
    $jumlahS1=count($status);

    $isidata1=array();
    for ($x=0; $x<$jumlahK1; $x++) {
      for ($y=0; $y<$jumlahS1; $y++) {
        $isidata1[$x][$y]=0;
      }
    }

    foreach ($statuseksp as $row) {
      $x1=-1;$y1=-1;
      for ($x=0; $x<$jumlahK1; $x++) {
        for ($y=0; $y<$jumlahS1; $y++) {
          if ($kuartal[$x]==$row->tahun."-"."Q".$row->kuartal) $x1=$x;
          if ($status[$y]==$row->group2) $y1=$y; 
        }
      }
      if (($x1!=-1) and ($y1!=-1)) {
        $isidata1[$x1][$y1]=$row->jumlah;
      }
   }
 }

$kuartal1=array();
$status1=array();

if (!empty($statuseksp1)) {
    foreach ($statuseksp1 as $row) {
      array_push($kuartal1,$row->tahun."-"."Q".$row->kuartal);
      array_push($status1,$row->group2);
   }
    $kuartal1=array_unique($kuartal1);
    $status1=array_unique($status1);
    sort($kuartal1);
    sort($status1);
    $kuartalJ2=json_encode($kuartal1);
    $jumlahK2=count($kuartal1);
    $jumlahS2=count($status1);

    $isidata2=array();
    for ($x=0; $x<$jumlahK2; $x++) {
      for ($y=0; $y<$jumlahS2; $y++) {
        $isidata2[$x][$y]=0;
      }
    }

    foreach ($statuseksp1 as $row) {
      $x1=-1;$y1=-1;
      for ($x=0; $x<$jumlahK2; $x++) {
        for ($y=0; $y<$jumlahS2; $y++) {
          if ($kuartal1[$x]==$row->tahun."-"."Q".$row->kuartal) $x1=$x;
          if ($status1[$y]==$row->group2) $y1=$y; 
        }
      }
      if (($x1!=-1) and ($y1!=-1)) {
        $isidata2[$x1][$y1]=$row->jumlah;
      }
   }
 }

$kuartal2=array();
$status2=array();

if (!empty($statuseksp2)) {
    foreach ($statuseksp2 as $row) {
      array_push($kuartal2,$row->tahun."-"."Q".$row->kuartal);
      array_push($status2,$row->group2);
   }
    $kuartal2=array_unique($kuartal2);
    $status2=array_unique($status2);
    sort($kuartal2);
    sort($status2);
    $kuartalJ2=json_encode($kuartal2);
    $jumlahK3=count($kuartal2);
    $jumlahS3=count($status2);

    $isidata3=array();
    for ($x=0; $x<$jumlahK3; $x++) {
      for ($y=0; $y<$jumlahS3; $y++) {
        $isidata3[$x][$y]=0;
      }
    }

    foreach ($statuseksp2 as $row) {
      $x1=-1;$y1=-1;
      for ($x=0; $x<$jumlahK3; $x++) {
        for ($y=0; $y<$jumlahS3; $y++) {
          if ($kuartal2[$x]==$row->tahun."-"."Q".$row->kuartal) $x1=$x;
          if ($status2[$y]==$row->group2) $y1=$y; 
        }
      }
      if (($x1!=-1) and ($y1!=-1)) {
        $isidata3[$x1][$y1]=$row->jumlah;
      }
   }

   
}

  $color=array();
  $color=['rgba(0, 192, 239,0.7)','rgba(0, 166, 90,0.7)','rgba(245, 105, 84,0.7)',"rgba(255, 99, 132,0.7)","rgba(255, 159, 64,0.7)","rgba(255, 205, 86,0.7)","rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)","rgba(153, 102, 255,0.7)"];

?>

                <div class="row" id="divstatuseksp">
                  <div class="col-sm-12">
                    <div class="chart">
                      <canvas id="StatusEksChart" style="width: 1024px!important; height: 430px!important"></canvas>
                    </div>
                  </div>
                  <!-- <div class="col-sm-2">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php for($y=0;$y<$jumlahS1;$y++) { ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $color[$y];?>">
                              </div>
                            </div>
                          </td>
                          <td class="td-datatables"><?php echo substr($status[$y],2);?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div> -->
                </div>

                <div class="row" id="divstatusekspproject">
                  <div class="col-sm-12">
                    <div class="chart">
                      <canvas id="StatusEksProjectChart"></canvas>
                    </div>
                  </div>
                  <!-- <div class="col-sm-2">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php for($y=0;$y<$jumlahS2;$y++) { ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $color[$y];?>">
                              </div>
                            </div>
                          </td>
                          <td class="td-datatables"><?php echo substr($status1[$y],2);?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div> -->
                </div>

                 <div class="row" id="divstatusekspprocurement">
                  <div class="col-sm-12">
                    <div class="chart">
                      <canvas id="StatusEksProcurementChart"></canvas>
                    </div>
                  </div>
                  <!-- <div class="col-sm-2">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php for($y=0;$y<$jumlahS3;$y++) { ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $color[$y];?>">
                              </div>
                            </div>
                          </td>
                          <td class="td-datatables"><?php echo substr($status2[$y],2);?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div> -->
                </div> 

<script >

  $(document).ready(function (e) {

  ubahproject5();
  Removeclass5();
});  

      var configstatuseks = {
      plugins: [ChartDataLabels],
      type: 'bar',
      data: {
        labels: [<?php for ($x=0;$x<$jumlahK1; $x++) {
            if ($x!=0) echo ',';
            echo '"'.substr($kuartal[$x],5).'-'.substr($kuartal[$x],0,4).'"';
          }?>],        
        datasets: [
          <?php for ($y=0;$y<$jumlahS1; $y++) { ?>
          {
          data: [ <?php for ($x=0;$x<$jumlahK1; $x++) {
             if ($x!=0) echo ',';
             echo '"'.$isidata1[$x][$y].'"';              
          } ?> ],
          backgroundColor: [ <?php for ($x=0;$x<$jumlahK1; $x++) {
            if ($x!=0) echo ',';
             echo '"'.$color[$y].'"';  
          }?> ],
          label: <?php echo '"'.substr($status[$y],2).'"'; ?>
          },
          <?php } ?>

        ]

      },
      options: {
        responsive: true,
        legend: {
          display: true,
          position: 'bottom',
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

   var configstatuseksproject = {
      plugins: [ChartDataLabels],
      type: 'bar',
      data: {
        labels: [<?php for ($x=0;$x<$jumlahK2; $x++) {
            if ($x!=0) echo ',';
            echo '"'.substr($kuartal1[$x],5).'-'.substr($kuartal1[$x],0,4).'"';
          }?>],        
        datasets: [
          <?php for ($y=0;$y<$jumlahS2; $y++) { ?>
          {
          data: [ <?php for ($x=0;$x<$jumlahK2; $x++) {
             if ($x!=0) echo ',';
             echo '"'.$isidata2[$x][$y].'"';              
          } ?> ],
          backgroundColor: [ <?php for ($x=0;$x<$jumlahK2; $x++) {
            if ($x!=0) echo ',';
             echo '"'.$color[$y].'"';  
          }?> ],
          label: <?php echo '"'.substr($status1[$y],2).'"'; ?>
          },
          <?php } ?>

        ]

      },
      options: {
        responsive: true,
        legend: {
          display: true,
          position: 'bottom',
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

   var configstatuseksprocurement = {
      plugins: [ChartDataLabels],
      type: 'bar',
      data: {
        labels: [<?php for ($x=0;$x<$jumlahK3; $x++) {
            if ($x!=0) echo ',';
            echo '"'.substr($kuartal2[$x],5).'-'.substr($kuartal2[$x],0,4).'"';
          }?>],        
        datasets: [
          <?php for ($y=0;$y<$jumlahS3; $y++) { ?>
          {
          data: [ <?php for ($x=0;$x<$jumlahK3; $x++) {
             if ($x!=0) echo ',';
             echo '"'.$isidata3[$x][$y].'"';              
          } ?> ],
          backgroundColor: [ <?php for ($x=0;$x<$jumlahK3; $x++) {
            if ($x!=0) echo ',';
             echo '"'.$color[$y].'"';  
          }?> ],
          label: <?php echo '"'.substr($status2[$y],2).'"'; ?>
          },
          <?php } ?>

        ]

      },
      options: {
        responsive: true,
        legend: {
          display: true,
          position: 'bottom',
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
  
  var ctx = document.getElementById('StatusEksChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configstatuseks);

  var ctx = document.getElementById('StatusEksProjectChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configstatuseksproject);

  var ctx = document.getElementById('StatusEksProcurementChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configstatuseksprocurement);

</script>                