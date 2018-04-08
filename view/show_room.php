<?php
	
	if(!$dbconnection){
		$dbconnection = new DBconnection();
	}

	$query = "SELECT r.*,rtyp.type as room_type FROM room r";
	$query .= " LEFT JOIN room_type rtyp ON rtyp.type_id=r.type_id";

	$showroom = $dbconnection->getResult($query);

?>

<h3 class="title">All Rooms & Details</h3>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Room ID</th>
        <th>Room No</th>
        <th>Room Type ID</th>
        <th>Room Type</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($showroom as $key => $value){ ?>
        <tr>
        	<td><?=$value["room_id"]?></td>
        	<td><?=$value["location"]?></td>
            <td><?=$value["type_id"]?></td>
            <td><?=$value["room_type"]?></td>
        </tr>
    <?php    }
    ?>

    </tbody>
</table>