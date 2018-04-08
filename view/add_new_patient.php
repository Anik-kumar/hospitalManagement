<?php
	require_once('DBconnection.php');

	$dbconnection = new DBconnection();
	$empid = $dbconnection->getResult("SELECT * FROM employee");
	$depid = $dbconnection->getResult("SELECT * FROM department");
	$roomid = $dbconnection->getResult("SELECT * FROM room");
	$rtype = $dbconnection->getResult("SELECT * FROM room_type");

?>

<h3 class="title">Add New Patient Biodata</h3>
<form class="form-horizontal" action="<?=ROOT_URL."?".$_SERVER['QUERY_STRING']?>" method="post">
	<div class="form-group">
        <label for="employee-id" class="col-sm-4 control-label">Employee ID</label>
        <div class="col-sm-8">
            <select class="form-control" name="employee-id">
                <?php
                    foreach($empid as $key=>$value){
                ?>
                        <option value="<?=$value["emp_id"]?>"><?=$value["firstname"]." ".$value["lastname"]?></option>

                <?php
                    }
                ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label for="department-id" class="col-sm-4 control-label">Department</label>
        <div class="col-sm-8">
            <select class="form-control" name="department-id">
                <?php
                    foreach($depid as $key=>$value){
                ?>
                        <option value="<?=$value["dep_id"]?>"><?=$value["name"]?></option>
                <?php
                    }
                ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label for="room-id" class="col-sm-4 control-label">Room</label>
        <div class="col-sm-8">
            <select class="form-control" name="room-id">
                <?php
                    foreach($roomid as $key=>$value){
                ?>
                        <option value="<?=$value["room_id"]?>"><?=$value["room_id"]?></option>
                <?php
                    }
                ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label for="room-type" class="col-sm-4 control-label">Room Type</label>
        <div class="col-sm-8">
            <select class="form-control" name="room-type">
                <?php
                    foreach($rtype as $key=>$value){
                ?>
                        <option value="<?=$value["type_id"]?>"><?=$value["type"]?></option>
                <?php
                    }
                ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label for="patient-fname1" class="col-sm-4 control-label">Patient First-Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="patient-fname" name="patient-fname" placeholder="Please enter patients first name">
        </div>
    </div>
    <div class="form-group">
        <label for="patient-lname2" class="col-sm-4 control-label">Patient Last-Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="patient-lname" name="patient-lname" placeholder="Please enter patient last name">
        </div>
    </div>

    <div class="form-group">
        <label for="patient-age3" class="col-sm-4 control-label">Patient Age</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="patient-age" name="patient-age" placeholder="Please enter patient age">
        </div>
    </div>

    <div class="form-group">
        <label for="patient-gender4" class="col-sm-4 control-label">Patient Gender</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="patient-gender" name="patient-gender" placeholder="Please enter patient gender">
        </div>
    </div>

    <div class="form-group">
        <label for="patient-address5" class="col-sm-4 control-label">Patient Address</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="patient-address" name="patient-address" placeholder="Please enter patient address">
        </div>
    </div>

    <div class="form-group">
        <label for="patient-contact6" class="col-sm-4 control-label">Patient Contact No</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="patient-contact" name="patient-contact" placeholder="Please enter patient contact">
        </div>
    </div>

    <div class="form-group">
        <label for="patient-problem7" class="col-sm-4 control-label">Patient Problem</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="patient-problem" name="patient-problem" placeholder="Please enter patient problem">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <input type="hidden" name="redirect-on-success" value="<?=SITE_URL.ROOT_URL."?page=patient&action=show"?>" />
            <input type="hidden" name="submit-form" value="addNewPatientData" />
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>
