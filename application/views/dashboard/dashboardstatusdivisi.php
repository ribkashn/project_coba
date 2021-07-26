                <div class="row" id="divstatusdivisi">
                  <div class="col-sm-10">
                    <div class="chart">
                      <canvas id="statusdivisiChart"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-2">
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
                        if (!empty($datastatusdivisi)) {
                        foreach ($datastatusdivisi as $row) 
                        { if (($row->group!='') or ($row->jumlah!=0)) {
                        	$total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')"><?php echo $row->group; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php  $x+=1; } } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables"><a href="javascript:" onclick="detaildashboard('3','All')">Total</a></th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('5','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="row" id="divstatusdivisiproject">
                  <div class="col-sm-10">
                    <div class="chart">
                      <canvas id="StatusDivisiProjectChart"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-2">
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
                        if (!empty($datastatusdivisi1)) {
                        foreach ($datastatusdivisi1 as $row) 
                        { if (($row->group!='') or ($row->jumlah!=0)) {
                        	$total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')"><?php echo $row->group; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php  $x+=1; } } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables"><a href="javascript:" onclick="detaildashboard('3','All')">Total</a></th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('5','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="row" id="divstatusdivisiprocurement">
                  <div class="col-sm-10">
                    <div class="chart">
                      <canvas id="StatusDivisiProcurementChart"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-2">
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
                        if (!empty($datastatusdivisi2)) {
                        foreach ($datastatusdivisi2 as $row) 
                        { if (($row->group!='') or ($row->jumlah!=0)) {
                        	$total+=$row->jumlah;
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')"><?php echo $row->group; ?></a></td>
                          <td class="td-datatables" style="text-align: right"><a href="javascript:" onclick="detaildashboard('5','<?php echo urlencode($row->group); ?>')"><?php echo $row->jumlah;?></a></td>
                        </tr>
                      <?php  $x+=1; } } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="th-datatables"></th>
                          <th class="th-datatables"><a href="javascript:" onclick="detaildashboard('5','All')">Total</a></th>
                          <th class="th-datatables"  style="text-align: right"><a href="javascript:" onclick="detaildashboard('5','All')"><?php echo $total;?></a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>


<script>
$(document).ready(function (e) {

  ubahproject6();
  Removeclass6();
});

<?php 
  $isidata='';
  $labeldata='';
  $cnt=0;
  foreach ($datastatusdivisi as $row) {
  	if (($row->group!='') or ($row->jumlah!=0)) {
	    if ($cnt==0) {
	      $isidata='"'.$row->jumlah.'"';
	      $labeldata='"'.$row->group.'"'; 
	      $cnt=1;
	    } else {
	      $isidata=$isidata.',"'.$row->jumlah.'"';
	      $labeldata=$labeldata.',"'.$row->group.'"';
	    }
	}
  }

?>

    var configstatusdivisi = {
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
          label: 'Status Divisi'
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
  foreach ($datastatusdivisi1 as $row) {
  	if (($row->group!='') or ($row->jumlah!=0)) {
	    if ($cnt==0) {
	      $isidata='"'.$row->jumlah.'"';
	      $labeldata='"'.$row->group.'"'; 
	      $cnt=1;
	    } else {
	      $isidata=$isidata.',"'.$row->jumlah.'"';
	      $labeldata=$labeldata.',"'.$row->group.'"';
	    }
	  }
	}

?>

    var configstatusdivisiproject = {
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
          label: 'Status Divisi'
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
  foreach ($datastatusdivisi2 as $row) {
  	if (($row->group!='') or ($row->jumlah!=0)) {
	    if ($cnt==0) {
	      $isidata='"'.$row->jumlah.'"';
	      $labeldata='"'.$row->group.'"'; 
	      $cnt=1;
	    } else {
	      $isidata=$isidata.',"'.$row->jumlah.'"';
	      $labeldata=$labeldata.',"'.$row->group.'"';
	    }
	  }
	}

?>

    var configstatusdivisiprocurement = {
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
          label: 'Status Divisi'
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


  var ctx = document.getElementById('statusdivisiChart').getContext('2d');
  window.myBar2 = new Chart(ctx, configstatusdivisi);

  var ctx = document.getElementById('StatusDivisiProjectChart').getContext('2d');
  window.myBar2 = new Chart(ctx, configstatusdivisiproject);

  var ctx = document.getElementById('StatusDivisiProcurementChart').getContext('2d');
  window.myBar2 = new Chart(ctx, configstatusdivisiprocurement);


</script>