                <div class="row" id="divgrpsektor">
                  <div class="col-sm-12">
                    <div class="chart">
                      <canvas id="grpsektorChart" style="width: 1024px!important; height: 500px!important"></canvas>
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
                        
                        $status= array('On Progress','Done','No Req','Cancel','Procurement');
                        for ($x=0;$x<5;$x++) {
                          ?>
                        <tr>
                          <td class="td-datatables" style="width: 8%">
                            <a href="javascript:" onclick="detaildashboard('7','<?php echo $status[$x]; ?>')">
                            <div class="progress">
                              <div class="progress-bar" style="width: 100%;background-color: <?php echo $backgroundColor[$x];?>">
                              </div>
                            </div>
                          </a>
                          </td>
                          <td class="td-datatables"><a href="javascript:" onclick="detaildashboard('7','<?php echo $status[$x]; ?>')"><?php echo $status[$x]; ?></a></td>
                        
                        </tr>
                      <?php  } ?>
                      </tbody>
                    </table>
                  </div> -->
                </div>



<script>
$(document).ready(function (e) {
  Removeclass7();
});


<?php 
$color=array();
  $color=['rgba(0, 192, 239,0.7)','rgba(0, 166, 90,0.7)','rgba(245, 105, 84,0.7)',"rgba(255, 99, 132,0.7)","rgba(255, 159, 64,0.7)","rgba(255, 205, 86,0.7)","rgba(75, 192, 192,0.7)",
              "rgba(54, 162, 235,0.7)","rgba(153, 102, 255,0.7)"];
  $jumlah=0;
  if (!empty($datagrpsektor))  $jumlah=5;
?>

    var configgrpsektor = {
      plugins: [ChartDataLabels],
      type: 'bar',
      data: {
        labels: [<?php for ($x=0;$x<$jumlah; $x++) {
            if ($x!=0) echo ',';
            echo '"'.$datagrpsektor[$x]->groupsektor.'"';
          }?>],        
        datasets: [
          {
          data: [ <?php  echo '"'.$datagrpsektor[0]->onprogress.'","'.$datagrpsektor[1]->onprogress.'","'.$datagrpsektor[2]->onprogress.'","'.$datagrpsektor[3]->onprogress.'","'.$datagrpsektor[4]->onprogress.'"';?> ],
          backgroundColor: [ <?php echo '"'.$color[0].'","'.$color[0].'","'.$color[0].'","'.$color[0].'","'.$color[0].'"';  ?> ],
          label: <?php echo '"'.$status[0].'"'; ?>
          },
          {
          data: [ <?php  echo '"'.$datagrpsektor[0]->done.'","'.$datagrpsektor[1]->done.'","'.$datagrpsektor[2]->done.'","'.$datagrpsektor[3]->done.'","'.$datagrpsektor[4]->done.'"';?> ],
          backgroundColor:  [ <?php echo '"'.$color[1].'","'.$color[1].'","'.$color[1].'","'.$color[1].'","'.$color[1].'"';   ?> ],
          label: <?php echo '"'.$status[1].'"'; ?>
          },
          {
          data: [ <?php  echo '"'.$datagrpsektor[0]->noreq.'","'.$datagrpsektor[1]->noreq.'","'.$datagrpsektor[2]->noreq.'","'.$datagrpsektor[3]->noreq.'","'.$datagrpsektor[4]->noreq.'"'; ?> ],
          backgroundColor: [ <?php echo '"'.$color[2].'","'.$color[2].'","'.$color[2].'","'.$color[2].'","'.$color[2].'"';  ?> ],
          label: <?php echo '"'.$status[2].'"'; ?>
          },
          {
          data: [ <?php  echo '"'.$datagrpsektor[0]->cancel.'","'.$datagrpsektor[1]->cancel.'","'.$datagrpsektor[2]->cancel.'","'.$datagrpsektor[3]->cancel.'","'.$datagrpsektor[4]->cancel.'"';?> ],
          backgroundColor: [ <?php echo '"'.$color[3].'","'.$color[3].'","'.$color[3].'","'.$color[3].'","'.$color[3].'"';  ?> ],
          label: <?php echo '"'.$status[3].'"'; ?>
          },
          {
          data: [ <?php  echo '"'.$datagrpsektor[0]->procurement.'","'.$datagrpsektor[1]->procurement.'","'.$datagrpsektor[2]->procurement.'","'.$datagrpsektor[3]->procurement.'","'.$datagrpsektor[4]->procurement.'"';?> ],
          backgroundColor: [ <?php echo '"'.$color[4].'","'.$color[4].'","'.$color[4].'","'.$color[4].'","'.$color[4].'"';  ?> ],
          label: <?php echo '"'.$status[4].'"'; ?>
          },
         
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
    


  var ctx = document.getElementById('grpsektorChart').getContext('2d');
  window.myBar2 = new Chart(ctx, configgrpsektor);

</script>