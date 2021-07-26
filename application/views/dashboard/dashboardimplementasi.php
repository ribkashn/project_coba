                <div class="row" id="divimplementasi">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="ImplementasiChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Eks Implementasi</th>
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
                        if (!empty($dataimplementasi)) {
                        foreach ($dataimplementasi as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')"><?php echo 'Q'.$row->kuartal.'-'.$row->tahun; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('2','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div class="row" id="divimplementasiproject">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="ImplementasiprojectChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Eks Implementasi</th>
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
                        if (!empty($dataimplementasi1)) {
                        foreach ($dataimplementasi1 as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')"><?php echo 'Q'.$row->kuartal.'-'.$row->tahun; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('2','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="row" id="divimplementasiprocurement">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="ImplementasiprocurementChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Eks Implementasi</th>
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
                        if (!empty($dataimplementasi2)) {
                        foreach ($dataimplementasi2 as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')"><?php echo 'Q'.$row->kuartal.'-'.$row->tahun; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('2','<?php echo 'Q'.$row->kuartal; ?>','<?php echo $row->tahun; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('2','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

<script>
$(document).ready(function (e) {

  ubahproject2();
  Removeclass2();
});   


<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($dataimplementasi as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"Q'.$row->kuartal.'-'.$row->tahun.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"Q'.$row->kuartal.'-'.$row->tahun.'"';
    }
  }

?>
    var configImplementasi = {
      plugins: [ChartDataLabels],
      type: 'horizontalBar',
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
          label: 'Ekspektasi Implementasi'
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
          xAxes: [
            {
              display: true,
              ticks: {
                beginAtZero: true
              }
            }
          ]
        },
      }
    };


<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($dataimplementasi1 as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"Q'.$row->kuartal.'-'.$row->tahun.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"Q'.$row->kuartal.'-'.$row->tahun.'"';
    }
  }

?>
    var configImplementasiProject = {
      plugins: [ChartDataLabels],
      type: 'horizontalBar',
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
          label: 'Ekspektasi Implementasi'
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
          xAxes: [
            {
              display: true,
              ticks: {
                beginAtZero: true
              }
            }
          ]
        },
      }
    };    

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($dataimplementasi2 as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"Q'.$row->kuartal.'-'.$row->tahun.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"Q'.$row->kuartal.'-'.$row->tahun.'"';
    }
  }

?>
    var configImplementasiProcurement = {
      plugins: [ChartDataLabels],
      type: 'horizontalBar',
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
          label: 'Ekspektasi Implementasi'
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
          xAxes: [
            {
              display: true,
              ticks: {
                beginAtZero: true
              }
            }
          ]
        },        
      }
    };


  var ctx = document.getElementById('ImplementasiChart').getContext('2d');
  window.myDoughnut2 = new Chart(ctx, configImplementasi);

  var ctx = document.getElementById('ImplementasiprojectChart').getContext('2d');
  window.myDoughnut2 = new Chart(ctx, configImplementasiProject);

  var ctx = document.getElementById('ImplementasiprocurementChart').getContext('2d');
  window.myDoughnut2 = new Chart(ctx, configImplementasiProcurement);

</script>