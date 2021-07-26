                <div class="row" id="divlineofbusiness">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="LineofBusinessChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">LOB</th>
                          <th class="th-datatables">Jml</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $backgroundColor=array (
                          "rgba(0, 192, 239,0.7)","rgba(0, 166, 90,0.7)",
                          "rgba(245, 105, 84,0.7)",
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
                          "rgba(153, 102, 255,0.7)");
                        $total=0;$x=0;
                        if (!empty($datalineofbusiness)) {
                        foreach ($datalineofbusiness as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')"><?php echo $row->LOB.'-'.$row->nama; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('3','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="row" id="divlineofbusinessproject">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="LineofBusinessProjectChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Line of Business</th>
                          <th class="th-datatables">Jml</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $backgroundColor=array (
                          "rgba(0, 192, 239,0.7)","rgba(0, 166, 90,0.7)",
                          "rgba(245, 105, 84,0.7)",
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
                          "rgba(153, 102, 255,0.7)");
                        $total=0;$x=0;
                        if (!empty($datalineofbusiness1)) {
                        foreach ($datalineofbusiness1 as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')"><?php echo $row->LOB; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('3','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                 <div class="row" id="divlineofbusinessprocurement">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="LineofBusinessProcurementChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Line of Business</th>
                          <th class="th-datatables">Jml</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $backgroundColor=array (
                          "rgba(0, 192, 239,0.7)","rgba(0, 166, 90,0.7)",
                          "rgba(245, 105, 84,0.7)",
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
                          "rgba(153, 102, 255,0.7)");
                        $total=0;$x=0;
                        if (!empty($datalineofbusiness2)) {
                        foreach ($datalineofbusiness2 as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')"><?php echo $row->LOB; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('3','<?php echo $row->LOB; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('3','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div> 

<script >

  $(document).ready(function (e) {

  ubahproject3();
  Removeclass3();
});  

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($datalineofbusiness as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->LOB.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->LOB.'"';
    }
  }

?>

var configlineofbusiness = {
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
              "rgba(153, 102, 255,0.7)"],
          borderColor: ['rgb(255, 255, 255)','rgb(255, 255, 255)',
              'rgb(255, 255, 255)',
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)"],
          label: 'Line of Business'
        }],
        labels: [<?php echo $labeldata; ?>],
      },
      options: {
        responsive: true,
        legend: {
          display: false,
          //position: 'right',
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

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($datalineofbusiness1 as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->LOB.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->LOB.'"';
    }
  }

?>

var configlineofbusinessproject = {
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
              "rgba(153, 102, 255,0.7)"],
          borderColor: ['rgb(255, 255, 255)','rgb(255, 255, 255)',
              'rgb(255, 255, 255)',
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)"],
          label: 'Line of Business'
        }],
        labels: [<?php echo $labeldata; ?>],
      },
      options: {
        responsive: true,
        legend: {
          display: false,
          //position: 'right',
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

  <?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($datalineofbusiness2 as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->LOB.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->LOB.'"';
    }
  }

?>

var configlineofbusinessprocurement = {
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
              "rgba(153, 102, 255,0.7)"],
          borderColor: ['rgb(255, 255, 255)','rgb(255, 255, 255)',
              'rgb(255, 255, 255)',
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)",
              "rgb(255, 255, 255)"],
          label: 'Line of Business'
        }],
        labels: [<?php echo $labeldata; ?>],
      },
      options: {
        responsive: true,
        legend: {
          display: false,
          //position: 'right',
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
  
  var ctx = document.getElementById('LineofBusinessChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configlineofbusiness);

  var ctx = document.getElementById('LineofBusinessProjectChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configlineofbusinessproject);

  var ctx = document.getElementById('LineofBusinessProcurementChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configlineofbusinessprocurement);

</script>                