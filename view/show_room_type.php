<?php
	
	if(!$dbconnection){
		$dbconnection = new DBconnection();
	}

	$showroom = $dbconnection->getResult("SELECT * FROM room_type");

?>

<h3 class="title">Rooms Type Details</h3>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Room Type ID</th>
        <th>Room Type</th>
        <th>Cost</th>
        <th>Capacity</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($showroom as $key => $value){ ?>
        <tr>
        	<td><?=$value["type_id"]?></td>
        	<td><?=$value["type"]?></td>
            <td><?=$value["cost"]?></td>
            <td><?=$value["max_capacity"]?></td>
        </tr>
    <?php    }
    ?>

    </tbody>
</table>