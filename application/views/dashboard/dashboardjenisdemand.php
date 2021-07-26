                <div class="row" id="divjenisdemand">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="JenisDemandChart" width="400" height="400"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <table class="text-xs" style="width:100%">
                      <thead>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Jenis Demand</th>
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
                        if (!empty($datajenisdemand)) {
                        foreach ($datajenisdemand as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')"><?php echo $row->jenis; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('4','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="row" id="divjenisdemandproject">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="JenisDemandProjectChart" width="400" height="400"></canvas>
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
                        if (!empty($datajenisdemand1)) {
                        foreach ($datajenisdemand1 as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')"><?php echo $row->jenis; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('4','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                 <div class="row" id="divjenisdemandprocurement">
                  <div class="col-sm-8">
                    <div class="chart">
                      <canvas id="JenisDemandProcurementChart" width="400" height="400"></canvas>
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
                        if (!empty($datajenisdemand2)) {
                        foreach ($datajenisdemand2 as $row) 
                        { $total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')"><?php echo $row->jenis; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('4','<?php echo $row->tipe; ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php $x+=1; } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables">Total</th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('4','All','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div> 

<script >

  $(document).ready(function (e) {

  ubahproject4();
  Removeclass4();
});  

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($datajenisdemand as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->jenis.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->jenis.'"';
    }
  }

?>

var configjenisdemand = {
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
          label: 'Jenis Demand'
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
      }
    };

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($datajenisdemand1 as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->jenis.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->jenis.'"';
    }
  }

?>

var configjenisdemandproject = {
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
      }
    };  

  <?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($datajenisdemand2 as $row) {
    if ($cnt==0) {
      $isidata='"'.$row->jumlah.'"';
      $labeldata='"'.$row->jenis.'"'; 
      $cnt=1;
    } else {
      $isidata=$isidata.',"'.$row->jumlah.'"';
      $labeldata=$labeldata.',"'.$row->jenis.'"';
    }
  }

?>

var configjenisdemandprocurement = {
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
          label: 'Jenis Demand'
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
      }
    };
  
  var ctx = document.getElementById('JenisDemandChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configjenisdemand);

  var ctx = document.getElementById('JenisDemandProjectChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configjenisdemandproject);

  var ctx = document.getElementById('JenisDemandProcurementChart').getContext('2d');
  window.myBar1 = new Chart(ctx, configjenisdemandprocurement);

</script>                