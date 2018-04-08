<?php

if(!$dbconnection){
    $dbconnection = new DBconnection();
}
$patientbiodata = $dbconnection->getResult("SELECT * FROM patient_biodata;");

$dotor = true;
?>

<h3 class="title">All Patients Biodata</h3>

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
        foreach($patientbiodata as $key => $value){  ?>
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
