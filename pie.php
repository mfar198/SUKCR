<html>
<?php
include('../functions.php');
$approved = mysqli_query ($db, "SELECT COUNT(*) AS totalapproved FROM forms WHERE status='approved'");
$app = mysqli_fetch_assoc($approved);


$rejected = mysqli_query ($db, "SELECT COUNT(*) AS totalrejected FROM forms WHERE status='rejected'");
$rej = mysqli_fetch_assoc($rejected);


$pending = mysqli_query ($db, "SELECT COUNT(*) AS totalpending FROM forms WHERE status='pending'");
$p = mysqli_fetch_assoc($pending);

    
$approve =  $app['totalapproved'];
$reject  =  $rej['totalrejected'];
$pendings=  $p['totalpending'];
$totalforms = $app['totalapproved'] + $rej['totalrejected'] +$p['totalpending'];
    
?>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'Number'],
          ['Pending',     <?php echo $p['totalpending']; ?>],
          ['Rejected',  <?php echo $rej['totalrejected']; ?>],
          ['Approved',      <?php echo $app['totalapproved']; ?>]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>