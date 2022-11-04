<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "sukcr");
$output = '';
if(isset($_POST["query"]))
{
$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM forms 
	WHERE name LIKE '%".$search."%'
	OR username LIKE '%".$search."%' 
	OR tel LIKE '%".$search."%' 
	OR jawatan LIKE '%".$search."%' 
	OR email LIKE '%".$search."%' OR unitbahagian LIKE '%".$search."%'
	 OR jenkenderaan LIKE '%".$search."%'
	 OR tarikh LIKE '%".$search."%' OR masa LIKE '%".$search."%' OR butir LIKE '%".$search."%' OR status LIKE '%".$search."%' ORDER BY id DESC
	";
}
else
{
 $query = "
  SELECT * FROM forms ORDER BY id DESC";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
            <th>Name</th>
            <th>Unit atau Bahagian</th>
            <th>Jenis Kenderaan</th>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Status</th>
            <th colspan="1">View</th>
			<th colspan="1">Action</th>
            <th colspan="1"></th>
		</tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
            <td>'.$row["name"].'</td>
            <td>'.$row["unitbahagian"].'</td>
            <td>'.$row["tarikh"].'</td>
            <td>'.$row["masa"].'</td>
            <td>'.$row["status"].'</td>
            <td>
				<a href="../ADMIN/viewadmin.php?id=<?php echo $row["id"]; ?>" class="view_btn">View</a>
			</td>
			<td>
				<a href="../functions.php?approve=<?php echo $row["id"]; ?>" class="approve_btn">Approve</a>
			</td>
			<td>
				<a href="../functions.php?reject=<?php echo $row["id"]; ?>"class="reject_btn">Reject</a>
			</td>
            
		</tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}



?>