<?php
    
    if(!$dbconnection){
        $dbconnection = new DBconnection();
    }

    $query = "SELECT ws.*,e.firstname, e.lastname, e.gender  FROM working_schedule ws";
    $query .= " LEFT JOIN employee e ON e.emp_id=ws.emp_id";

    $schedule = $dbconnection->getResult($query);

?>

<h3 class="title">All Schedule Details</h3>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Empolyee Name</th>
        <th>Day</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Location</th>
        <th>Responsibility</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($schedule as $key => $value){ ?>
        <tr>
            <td><?=$value["firstname"]. " " .$value["lastname"]?></td>
            <td><?=$value["day"]?></td>
            <td><?=$value["starttime"]?></td>
            <td><?=$value["endtime"]?></td>
            <td><?=$value["location"]?></td>
            <td><?=$value["responsibility"]?></td>
        </tr>
    <?php    }
    ?>

    </tbody>
</table>