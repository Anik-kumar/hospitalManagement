<?php
require_once('DBconnection.php');

$dbconnection = new DBconnection();

$departments = $dbconnection->getResult("SELECT * FROM department");
$emp_categories = $dbconnection->getResult("SELECT * FROM employee_catagory");
?>
<h3 class="title">Add New Employee</h3>
<form class="form-horizontal" action="<?=ROOT_URL."?".$_SERVER['QUERY_STRING']?>" method="post">
    <div class="form-group">
        <label for="employee-type" class="col-sm-4 control-label">Employee Type</label>
        <div class="col-sm-8">
            <select class="form-control" name="catagory_id">
                <?php
                    foreach($emp_categories as $key=>$value){
                ?>
                        <option value="<?=$value["catagory_id"]?>"><?=$value["catagory_name"]?></option>
                <?php
                    }
                ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label for="department-name" class="col-sm-4 control-label">Department</label>
        <div class="col-sm-8">
            <select class="form-control" name="dep_id">
                <?php
                foreach($departments as $key=>$value){
                    ?>
                    <option value="<?=$value["dep_id"]?>"><?=$value["name"]?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="employee-firstname" class="col-sm-4 control-label">Contract Type</label>
        <div class="col-sm-8">
            <select class="form-control" name="contract_type">
                <option value="F">Full-Time</option>
                <option value="P">Permanent</option>
                <option value="Pa">Part-Time</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="employee-contract-startdate" class="col-sm-4 control-label">Contract Start Date</label>
        <div class="col-sm-8">
            <div class='input-group date' id='employee-contract-startdate'>
                <input type='text' class="form-control" name="employee-contract-startdate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>

            <!--<input type="text" class="form-control" id="employee-contract-startdate" name="employee-contract-startdate" placeholder="Please enter employee contract start date">-->
        </div>
    </div>
    <div class="form-group">
        <label for="employee-contract-enddate" class="col-sm-4 control-label">Contract End Date</label>
        <div class="col-sm-8">
            <div class='input-group date' id='employee-contract-enddate'>
                <input type='text' class="form-control" name="employee-contract-enddate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>

            <!-- <input type="text" class="form-control" id="employee-contract-enddate" name="employee-contract-enddate" placeholder="Please enter employee contract end date">-->
        </div>
    </div>
    <div class="form-group">
        <label for="employee-salary" class="col-sm-4 control-label">Employee Salary(monthly)</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="employee-salary" name="employee-salary" placeholder="Please enter employee salary">
        </div>
    </div>
    <div class="form-group">
        <label for="employee-firstname" class="col-sm-4 control-label">First Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="employee-firstname" name="employee-firstname" placeholder="Please enter employee firstname">
        </div>
    </div>
    <div class="form-group">
        <label for="employee-lastname" class="col-sm-4 control-label">Last Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="employee-lastname" name="employee-lastname" placeholder="Please enter employee lastname">
        </div>
    </div>
    <div class="form-group">
        <label for="department-name" class="col-sm-4 control-label">Gender</label>
        <div class="col-sm-8">
            <select class="form-control" name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="employee-lastname" class="col-sm-4 control-label">Address</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="employee-address" rows="3" placeholder="Please enter employee address"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="employee-username" class="col-sm-4 control-label">UserName</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="employee-lastname" name="employee-username" placeholder="Please enter employee user-name">
        </div>
    </div>
    <div class="form-group">
        <label for="employee-lastname" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="employee-lastname" name="employee-password" placeholder="Please enter employee password">
        </div>
    </div>
    <div class="form-group">
        <label for="employee-lastname" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="employee-lastname" name="employee-email" placeholder="Please enter employee email">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">

            <input type="hidden" name="redirect-on-success" value="<?=SITE_URL.ROOT_URL."?page=employee&action=show"?>" />
            <input type="hidden" name="submit-form" value="addNewEmployee" />
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>
