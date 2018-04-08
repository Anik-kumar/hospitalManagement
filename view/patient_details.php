<?php

if(!$dbconnection){
    $dbconnection = new DBconnection();
}
if(isset($_GET['patient_id'])){
    $patient_id = $_GET['patient_id'];
    $error = false;
    $query = "SELECT pb.*, e.firstname as doctorFirstname, e.lastname as doctorLastname, d.name as department, r.location as roomNumber, rt.type as roomType FROM patient_biodata pb ";
    $query .= " LEFT JOIN employee e ON pb.emp_id=e.emp_id ";
    $query .= " LEFT JOIN department d ON pb.dep_id=d.dep_id ";
    $query .= " LEFT JOIN room r ON pb.room_id=r.room_id ";
    $query .= " LEFT JOIN room_type rt ON r.type_id=rt.type_id ";
    $query .= " WHERE pb.patient_id=".$patient_id;
    $patientbiodata = $dbconnection->getResult($query);

}else{
    $error =true;
}

?>

<h3 class="title">All Patients Biodata</h3>
<?php
    if($error){ ?>
        <p class="message error">Error: Please mention patient identification.</p>
        <?php 
    }else{

            $patient = $patientbiodata[0];  
?>
            <table class="table table-hover table-striped">
                <tbody>
                    <tr>
                            <th>Patient Id: </th>
                            <td><?=$patient["patient_id"]?></td>
                    </tr>
                    <tr>
                            <th>Patient Name: </th>
                            <td><?=$patient["firstname"] . " " .$patient["lastname"]?></td>
                    </tr>
                    <tr>
                            <th>Patient Department: </th>
                            <td><?=$patient["department"]?></td>
                    </tr>
                    <tr>
                            <th>Patient Age: </th>
                            <td><?=$patient["age"]?></td>
                    </tr>
                     <tr>
                            <th>Patient Doctor: </th>
                            <td><?=$patient["doctorFirstname"] . " " .$patient["doctorLastname"]?></td>
                    </tr>
                    <tr>
                            <th>Patient Gender: </th>
                            <td><?=$patient["gender"]?></td>
                    </tr>
                     <tr>
                            <th>Patient Room: </th>
                            <td><?=$patient["roomNumber"]?></td>
                    </tr>
                     <tr>
                            <th>Patient Room Type: </th>
                            <td><?=$patient["roomType"]?></td>
                    </tr>
                    <tr>
                            <th>Patient Address: </th>
                            <td><?=$patient["address"]?></td>
                    </tr>
                    <tr>
                            <th>Patient Contact no: </th>
                            <td><?=$patient["Contact_no"]?></td>
                    </tr>
<?php     }
?>
    </tbody>
</table>
