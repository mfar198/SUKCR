<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=sukcr", "root", "");

if($_POST["query"] != '')
{
	$search_array = explode(",", $_POST["query"]);
	$search_text = "'" . implode("', '", $search_array) . "'";
	$query = "
	SELECT * FROM forms 
	WHERE Status IN (".$search_text.") 
	ORDER BY ID DESC
	";
}
else
{
	$query = "SELECT * FROM forms ORDER BY ID DESC";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
            <td>'.$row["name"].'</td>
            <td>'.$row["tel"].'</td>
            <td>'.$row["jawatan"].'</td>
            <td>'.$row["unitbahagian"].'</td>
            <td>'.$row["jenkenderaan"].'</td>
            <td>'.$row["tarikh"].'</td>
            <td>'.$row["masa"].'</td>
            <td>'.$row["butir"].'</td>
            <td>'.$row["status"].'</td>
			<td>
				<a href="functions.php?approve= echo .$row["id"]; " class="approve_btn">Approve</a>
			</td>
			<td>
				<a href="functions.php?reject= echo .$row["id"]; " class="reject_btn">Reject</a>
			</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="5" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;


?>