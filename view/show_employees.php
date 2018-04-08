<?php

if(!$dbconnection){
    $dbconnection = new DBconnection();
}
$query = "SELECT e.*,ecn.contract_type, ecn.startdate, ecn.endtime, ecn.salary, ecat.catagory_name, d.name as dept_name  FROM employee e ";
$query .= " LEFT JOIN employment_contract ecn ON e.contract_id=ecn.contract_id";
$query .= " LEFT JOIN employee_catagory ecat ON ecat.catagory_id=e.catagory_id ";
$query .= " LEFT JOIN department d ON d.dep_id=e.dep_id";
$employees = $dbconnection->getResult($query);

?>

<h3 class="title">All Employees</h3>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Employee ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Category</th>
        <th>Department</th>
        <th>Gender</th>
        <th>Contract Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Salary</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($employees as $key => $value){ ?>
        <tr>
            <td><?=$value["emp_id"]?></td>
            <td><?=$value["firstname"]?></td>
            <td><?=$value["lastname"]?></td>
            <td><?=$value["catagory_name"]?></td>
            <td><?=$value["dept_name"]?></td>
            <td><?=($value["gender"]==="M" ? "Male":"Female")?></td>
            <td><?=getContractType($value["contract_type"])?></td>
            <td><?=$value["startdate"]?></td>
            <td><?=$value["endtime"]?></td>
            <td><?=$value["salary"]?></td>
            <td><?=$value["email"]?></td>
        </tr>
    <?php    }
    ?>

    </tbody>
</table>
