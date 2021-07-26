                <div class="row" id="divdemandall">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="StatusDemandChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Status</th>
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
                        if (!empty($datastatusdemand)) {
                        foreach ($datastatusdemand as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')"><?php echo $row->group; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')"><?php echo $row->jumlah;?></a></td>
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


                <div class="row" id="divdemandproject">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="StatusDemandProjectChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Status</th>
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
                        if (!empty($datastatusdemand1)) {
                        foreach ($datastatusdemand1 as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')"><?php echo $row->group; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')"><?php echo $row->jumlah;?></a></td>
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

                <div class="row" id="divdemandprocurement">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="StatusDemandProcurementChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Status</th>
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
                        if (!empty($datastatusdemand2)) {
                        foreach ($datastatusdemand2 as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')"><?php echo $row->group; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('1','<?php echo urlencode($row->group); ?>')"><?php echo $row->jumlah;?></a></td>
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


<script>
$(document).ready(function (e) {

  ubahproject1();
  Removeclass1();
});

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($datastatusdemand as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->group.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->group.'"';
    }
  }

?>

    var configStatusDemand = {
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
          label: 'Status Demand',
          
        }],
        labels: [<?php echo $labeldata; ?>]
      },
      options: {
        responsive: true,
        legend: {
          display: false,
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
  foreach ($datastatusdemand1 as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->group.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->group.'"';
    }
  }

?>

    var configStatusDemandProject = {
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
          label: 'Status Demand',
          
        }],
        labels: [<?php echo $labeldata; ?>]
      },
      options: {
        responsive: true,
        legend: {
          display: false,
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
  foreach ($datastatusdemand2 as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->group.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->group.'"';
    }
  }

?>

    var configStatusDemandProcurement = {
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
          label: 'Status Demand',
          
        }],
        labels: [<?php echo $labeldata; ?>]
      },
      options: {
        responsive: true,
        legend: {
          display: false,
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    };


  var ctx = document.getElementById('StatusDemandChart').getContext('2d');
  window.myDoughnut1 = new Chart(ctx, configStatusDemand);

  var ctx = document.getElementById('StatusDemandProjectChart').getContext('2d');
  window.myDoughnut1 = new Chart(ctx, configStatusDemandProject);

  var ctx = document.getElementById('StatusDemandProcurementChart').getContext('2d');
  window.myDoughnut1 = new Chart(ctx, configStatusDemandProcurement);




</script>                