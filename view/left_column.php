<div id="left-column" class="border-1">
    <ul>
        <li><a href="<?=ROOT_URL?>">Home</a></li>
        <li><a href="<?=ROOT_URL?>?page=department">Department</a>
            <ul>
                <li><a href="<?=ROOT_URL?>?page=department&action=add">Add New Department</a></li>
                <li><a href="<?=ROOT_URL?>?page=department&action=show">Show Departments</a></li>
            </ul>
        </li>
        <li><a href="<?=ROOT_URL?>?page=category">Employee Category</a>
            <ul>
                <li><a href="<?=ROOT_URL?>?page=category&action=add">Add New Category</a></li>
                <li><a href="<?=ROOT_URL?>?page=category&action=show">Show Categories</a></li>
            </ul>
        </li>
        <li><a href="<?=ROOT_URL?>?page=employee">Employee</a>
            <ul>
                <li><a href="<?=ROOT_URL?>?page=employee&action=add">Add New Employee</a></li>
                <li><a href="<?=ROOT_URL?>?page=employee&action=show">Show Employees</a></li>
                <li><a href="<?=ROOT_URL?>?page=employee&action=search">Search Employee</a></li>
            </ul>
        </li>
        <li><a href="<?=ROOT_URL?>?page=patient">Patient</a>
            <ul>
                <li><a href="<?=ROOT_URL?>?page=patient&action=add">Add New Patient</a></li>
                <li><a href="<?=ROOT_URL?>?page=patient&action=show">Show Patients</a></li>

            </ul>
        </li>
        <li><a href="<?=ROOT_URL?>?page=room">Room</a>
            <ul>
                <li><a href="<?=ROOT_URL?>?page=room&action=add">Add New Room</a></li>
                <li><a href="<?=ROOT_URL?>?page=room&action=show">Show Room</a></li>
            </ul>
        </li>
        <li><a href="<?=ROOT_URL?>?page=room">Room</a>
            <ul>
                <li><a href="<?=ROOT_URL?>?page=roomtype&action=add">Add New Room Type</a></li>
                <li><a href="<?=ROOT_URL?>?page=roomtype&action=show">Show Room</a></li>
            </ul>
        </li>
        <li><a href="<?=ROOT_URL?>?page=room">Schedule</a>
            <ul>
                <li><a href="<?=ROOT_URL?>?page=schedule&action=add">Add New Schedule</a></li>
                <li><a href="<?=ROOT_URL?>?page=schedule&action=show">Show Schedules</a></li>
            </ul>
        </li>


    </ul>


<form name="search-form" action="<?=ROOT_URL?>?page=search&action=show" method="post" style="margin-left: 15px;">
        <div class="row">
            <div class="col-lg-11">
                <div class="input-group">
                    <input type="text" class="form-control" name="search-key" placeholder="Search Employee">
                    <span class="input-group-btn">
                        <input type="hidden" name="redirect-on-success" value="<?=SITE_URL.ROOT_URL."?page=search&action=show"?>" />
                        <input type="hidden" name="submit-form" value="searchWithKeyWords" />

                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>

