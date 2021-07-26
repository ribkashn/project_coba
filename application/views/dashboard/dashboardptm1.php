        <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                  CR Release by Divisi
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="CRreleaseDiv" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables" style="width: 8%"></th>
                          <th class="th-datatables">Divisi</th>
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
                        if (!empty($crreleasediv)) {
                        foreach ($crreleasediv as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->divisi); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x%15];?>">
                              </div>
                            </div>
                          </a></td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->divisi); ?>')"><?php echo $row->divisi; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->divisi); ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables"><a href="javascript:" onclick="detaildashboard('1','All')">Total</a></th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('1','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                  CR Release by Dev Group
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="CRreleaseDev" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables" style="width: 8%"></th>
                          <th class="th-datatables">Developmen</th>
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
                        if (!empty($crreleasedev)) {
                        foreach ($crreleasedev as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('2','<?php echo urlencode($row->maingroup); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x%15];?>">
                              </div>
                            </div>
                          </a></td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('2','<?php echo urlencode($row->maingroup); ?>')"><?php echo substr($row->maingroup,0,3); ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('2','<?php echo urlencode($row->maingroup); ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables"><a href="javascript:" onclick="detaildashboard('2','All')">Total</a></th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('2','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                  CR Release by Date
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="CRtglrelease" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables" style="width: 8%"></th>
                          <th class="th-datatables">Tanggal Promote</th>
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
                        if (!empty($crtglrelease)) {
                        foreach ($crtglrelease as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('3','<?php echo urlencode($row->tanggal); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x%15];?>">
                              </div>
                            </div>
                          </a></td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('3','<?php echo urlencode($row->tanggal); ?>')"><?php echo $row->tanggal; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('3','<?php echo urlencode($row->tanggal); ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables"><a href="javascript:" onclick="detaildashboard('3','All')">Total</a></th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('3','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                  CR Release by Category
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="CRreleasekategori" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables" style="width: 8%"></th>
                          <th class="th-datatables">Kategori</th>
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
                        if (!empty($crreleasekategori)) {
                        foreach ($crreleasekategori as $row) 
                        { $total+=$row->jumlah;
                          $kategori=$row->projectcategory;
                          if ($row->projectcategory=='Business Meeting/Plan') $kategori='Business Meeting';
                          if ($row->projectcategory=='KAF (Komite Anti Fraud)') $kategori='KAF';
                          if ($row->projectcategory=='Radisi/Direksi/Management') $kategori='Radisi'; 
                          ?>

                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('4','<?php echo urlencode($row->projectcategory); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x%15];?>">
                              </div>
                            </div>
                          </a></td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('4','<?php echo urlencode($row->projectcategory); ?>')"><?php echo $kategori; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('4','<?php echo urlencode($row->projectcategory); ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables"><a href="javascript:" onclick="detaildashboard('4','All')">Total</a></th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('4','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        

<script>
$(document).ready(function (e) {

});

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($crreleasediv as $row) {
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

var configcrreleasediv = {
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
  foreach ($crreleasedev as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.substr($row->maingroup,0,3).'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.substr($row->maingroup, 0,3).'"';
    }
  }
?>

var configcrreleasedev = {
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
  foreach ($crtglrelease as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->tanggal.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->tanggal.'"';
    }
  }
?>

var configcrtglrelease = {
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
        },
        scales: {
            xAxes: [{
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
  foreach ($crreleasekategori as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->projectcategory.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->projectcategory.'"';
    }
  }
?>

var configcrreleasekategori = {
      plugins: [ChartDataLabels],
      type: 'pie',
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
        },
      }
    };



var ctx = document.getElementById('CRreleaseDiv').getContext('2d');
  window.myBar2 = new Chart(ctx, configcrreleasediv);

var ctx = document.getElementById('CRreleaseDev').getContext('2d');
  window.myBar2 = new Chart(ctx, configcrreleasedev);

var ctx = document.getElementById('CRtglrelease').getContext('2d');
  window.myBar2 = new Chart(ctx, configcrtglrelease);

var ctx = document.getElementById('CRreleasekategori').getContext('2d');
  window.myBar2 = new Chart(ctx, configcrreleasekategori);

</script>    