<h3 class="title">Add New Department</h3>
<form class="form-horizontal" action="<?=ROOT_URL."?".$_SERVER['QUERY_STRING']?>" method="post">
    <div class="form-group">
        <label for="department-name" class="col-sm-4 control-label">Department Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="department-name" name="department-name" placeholder="Please enter department name">
        </div>
    </div>
    <div class="form-group">
        <label for="department-description" class="col-sm-4 control-label">Description</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="department-description" name="department-description" placeholder="Please enter department description">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">

            <input type="hidden" name="redirect-on-success" value="<?=SITE_URL.ROOT_URL."?page=department&action=show"?>" />
            <input type="hidden" name="submit-form" value="addNewDepartment" />
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>
