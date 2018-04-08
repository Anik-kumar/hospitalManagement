<h3 class="title">Add New Category</h3>
<form class="form-horizontal" action="<?=ROOT_URL."?".$_SERVER['QUERY_STRING']?>" method="post">
    <div class="form-group">
        <label for="category-name" class="col-sm-4 control-label">Category Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="category-name" name="category-name" placeholder="Please enter category name">
        </div>
    </div>
    <div class="form-group">
        <label for="category-description" class="col-sm-4 control-label">Description</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="category-description" name="category-description" placeholder="Please enter category description">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">

            <input type="hidden" name="redirect-on-success" value="<?=SITE_URL.ROOT_URL."?page=category&action=show"?>" />
            <input type="hidden" name="submit-form" value="addNewCategory" />
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>
