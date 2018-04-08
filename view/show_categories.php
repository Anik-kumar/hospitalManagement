<?php

if(!$dbconnection){
    $dbconnection = new DBconnection();
}
$departments = $dbconnection->getResult("SELECT * FROM employee_catagory;");
?>

<h3 class="title">All Categories</h3>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Category Name</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($departments as $key => $value){ ?>
        <tr>
            <td><?=$value["catagory_id"]?></td>
            <td><?=$value["catagory_name"]?></td>
            <td><?=$value["category_description"]?></td>
        </tr>
    <?php    }
    ?>

    </tbody>
</table>