<?php

if(!$dbconnection){
    $dbconnection = new DBconnection();
}
$departments = $dbconnection->getResult("SELECT * FROM department;");
?>

<h3 class="title">All Departments</h3>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Department Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($departments as $key => $value){ ?>
            <tr>
                <td><?=$value["dep_id"]?></td>
                <td><?=$value["name"]?></td>
                <td><?=$value["description"]?></td>
            </tr>
    <?php    }
    ?>

    </tbody>
</table>
