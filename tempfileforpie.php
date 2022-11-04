$canceledsum=mysql_query("SELECT COUNT(*) AS totalcanceled FROM nabidka WHERE status='canceled'");
$d=mysql_fetch_assoc($canceledsum);
echo $d['totalcanceled'];

SELECT COUNT(*)
FROM yourtable
WHERE status='canceled'

$approved = mysqli_query ($db, "SELECT COUNT(*) AS totalapproved FROM forms WHERE status='approved'");
$app = mysqli_fetch_assoc($approved);
echo $app['totalapproved'];

$rejected = mysqli_query ($db, "SELECT COUNT(*) AS totalrejected FROM forms WHERE status='rejected'");
$rej = mysqli_fetch_assoc($rejected);
echo $rej['totalrejected'];

$pending = mysqli_query ($db, "SELECT COUNT(*) AS totalpending FROM forms WHERE status='pending'");
$p = mysqli_fetch_assoc($pending);
echo $p['totalpending'];
////////////////////////////////////////////////////////////////////

<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "theme2",
	animationEnabled: true,
	title: {
		text: "World Energy Consumption by Sector - 2012"
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

<?php
 
$dataPoints = array( 
	array("label"=>"Approved", "y"=> $app['totalapproved']),
	array("label"=>"Rejected", "y"=> $rej['totalrejected']),
	array("label"=>"Pending", "y"=> $p['totalpending']),
)
 
?>