

<h3 class="title">Add New Room Type</h3>
<form class="form-horizontal" action="<?=ROOT_URL."?".$_SERVER['QUERY_STRING']?>" method="post" >
	<div class="form-group">
        <label for="room-name" class="col-sm-4 control-label">Room Type</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="room-type-name" name="type" placeholder="Enter the name of room">
        </div>
    </div>

	<div class="form-group">
        <label for="room-cost" class="col-sm-4 control-label">Cost</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="room-typecost" name="cost" placeholder="Enter the cost of room">
        </div>
    </div>

    <div class="form-group">
        <label for="max-capacity" class="col-sm-4 control-label">Capacity</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="maximum-capacity" name="max-capacity" placeholder="Please enter max bed number">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">

            <input type="hidden" name="redirect-on-success" value="<?=SITE_URL.ROOT_URL."?page=roomtype&action=show"?>" />
            <input type="hidden" name="submit-form" value="addNewRoomType" />
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>