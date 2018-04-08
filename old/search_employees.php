
<?php

	$con = mysqli_connect("localhost", "root", "") or die("Database not Connected");
	mysqli_select_db($con,"project") or die("Database not selected");
	$output = '';


	if (isset($_POST['searchVal'])) {
		$searchq = $_POST['searchVal'];
		$searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

		$query = mysqli_query($con, "SELECT * FROM employee WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%'") or die("Could not search");
		$count = mysqli_num_rows($query);
		if($count == 0){
			$output = "There was no search results.";
		}
		else{
			while($row = mysqli_fetch_array($query)){
				$fname = $row['firstname'];
				$lname = $row['lastname'];

				$output .= '<div> '.$fname.' '.$lname.'</div>';
			}
		}
	}

	echo "$output";
?>

