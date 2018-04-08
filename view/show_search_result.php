<?php
	require_once('DBconnection.php');

if(!$dbconnection){
    $dbconnection = new DBconnection();
}
$searchResultFlag = false;
// check search key;
$searchKey = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['search-key'])); 
if(strlen($searchKey)>0){
    // employee search
    $searchEmployeeQuery = "SELECT * FROM employee WHERE firstname LIKE '%".$searchKey."%' OR lastname LIKE '%".$searchKey."%' OR address LIKE '%".$searchKey."%' OR email LIKE '%".$searchKey."%';";
    $searchResultEmployee = $dbconnection->getResult($searchEmployeeQuery);

    //  patient a search
    $searchPatientQuery = "SELECT * FROM patient_biodata WHERE firstname LIKE '%".$searchKey."%' OR lastname LIKE '%".$searchKey."%' OR address LIKE '%".$searchKey."%';";
    $searchResultPatient = $dbconnection->getResult($searchPatientQuery);
}else{

}

echo "<br />Search :" . $searchResultFlag;

if(count($searchResultEmployee)>0){
	// display employee list which are in searchResultEmployee
?>
	<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Employee ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($searchResultEmployee as $key => $value){ ?>
        <tr>
            <td><?=$value["emp_id"]?></td>
            <td><?=$value["firstname"]?></td>
            <td><?=$value["lastname"]?></td>
            <td><?=($value["gender"]==="M" ? "Male":"Female")?></td>
            <td><?=$value["email"]?></td>
        </tr>
    <?php    }
    ?>

    </tbody>
</table>
<?php	
}

echo "<br />Patient: <br />";

if(count($searchResultPatient)>0){
	// display patient list which are in searchResultPatient 
	?>

	<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>PatientId</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Contact No</th>
            <th >Details</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($searchResultPatient as $key => $value){  ?>
            <tr>
                <td><?=$value["patient_id"]?></td>
               
                <td><?=$value["firstname"]?></td>
                <td><?=$value["lastname"]?></td>
                <td><?=$value["age"]?></td>
                <td><?=$value["gender"]?></td>
                <td><?=$value["address"]?></td>
                <td><?=$value["Contact_no"]?></td>
                <td><a href="<?=ROOT_URL?>?page=patient&action=details&patient_id=<?=$value['patient_id']?>">Patient Details</a></td>
            </tr>
    <?php    }
    ?>

    </tbody>
</table>
	<?php
}

?>
