<?php

require_once('DBconnection.php');
$connection = new DBconnection();

$employee = $connection->getResult("SELECT * FROM employee");

?>

<h3 class="title">Add Working Schedule</h3>
<form class="form-horizontal" action="<?=ROOT_URL."?".$_SERVER['QUERY_STRING']?>" method="post" >
	<div class="form-group">
		<label for="emp-id" class="col-sm-4 control-label">Employee</label>
		<div class="col-sm-8">
			<select class="form-control" name="employee1">
				<?php
					foreach ($employee as $key => $value) {
				?>
					<option value="<?=$value["emp_id"]?>"><?=$value["firstname"]." ".$value["lastname"]?></option>
				<?php
					}
				?>
			</select>
		</div>
		
	</div>

	<div class="form-group">
        <label for="Day-name" class="col-sm-4 control-label">Day</label>
        <div class="col-sm-8">
            <select class="form-control" name="day">
                <option value="saturday"> Saturday</option>
                <option value="sunday"> Sunday</option>
                <option value="monday"> Monday</option>
                <option value="tuesday"> Tuesday</option>
                <option value="wednesday"> Wednesday</option>
                <option value="thursday"> Thusday</option>
                <option value="friday"> Friday</option>   
            </select>
           
        </div>
    </div>
    <div class="form-group">
        <label for="time1" class="col-sm-4 control-label">Start Time</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="stime" id="schedule-start-time" placeholder="enter start time of employee">
        </div>
    </div>
    <div class="form-group">
        <label for="time2" class="col-sm-4 control-label">End Time</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="etime"  id="schedule-end-time" placeholder="enter end time of employee">
        </div>
    </div>
    <div class="form-group">
        <label for="location-name" class="col-sm-4 control-label">Location</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="location-num" placeholder="enter location of work">
        </div>
    </div>
    <div class="form-group">
        <label for="responsibility" class="col-sm-4 control-label">Responsibility</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="responsibility" placeholder="enter details of responsibility">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">

            <input type="hidden" name="redirect-on-success" value="<?=SITE_URL.ROOT_URL."?page=schedule&action=show"?>" />
            <input type="hidden" name="submit-form" value="addWorkSchedule" />
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>