<?php

require_once('DBconnection.php');
$connection = new DBconnection();

$roomtype = $connection->getResult("SELECT * FROM room_type");

?>

<h3 class="title">Add New Room</h3>
<form class="form-horizontal" action="<?=ROOT_URL."?".$_SERVER['QUERY_STRING']?>" method="post" >
	<div class="form-group">
		<label for="room-type" class="col-sm-4 control-label">Room Type</label>
		<div class="col-sm-8">
			<select class="form-control" name="type_id">
				<?php
					foreach ($roomtype as $key => $value) {
				?>
					<option value="<?=$value["type_id"]?>"><?=$value["type"]?></option>
				<?php
					}
				?>
			</select>
		</div>
		
	</div>

	<div class="form-group">
        <label for="location-name" class="col-sm-4 control-label">Location</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="room-location" name="location" placeholder="1st disit is level and 2nd-3rd is room number">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">

            <input type="hidden" name="redirect-on-success" value="<?=SITE_URL.ROOT_URL."?page=room&action=show"?>" />
            <input type="hidden" name="submit-form" value="addNewRoom" />
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>