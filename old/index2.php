<?php

error_reporting(E_ALL & ~E_NOTICE);

require_once("functions/constants.php");
require_once("functions/helper.php");
require_once("functions/form_submit.php");

if(isset($_GET)){
    $query_params = $_GET;
}
else{
    $query_params = array();
}
//print_r($query_params);
$error_flag = false;
if(count($query_params)==0){
    $query_params["page"] = "home";
}
$page = "";
if(array_key_exists("page", $query_params)){
    if(trim($query_params["page"])!=""){
        if(array_key_exists("action", $query_params)){
            if(trim($query_params["action"])!=""){
                $fileName = getPageLink($query_params["page"], $query_params["action"]);
                if($fileName){
                    $page = $fileName;
                    if (!checkIfViewFileExists($page)) {
                        $error_flag = true;
                    }
                }else{
                    $error_flag = true;
                }
            }else{
                $error_flag = true;
            }
        }else{
            $fileName = getPageLink($query_params["page"], "");
            if($fileName){
                $page = $fileName;
                if (!checkIfViewFileExists($page)) {
                    $error_flag = true;
                }
            }else{
                $error_flag = true;
            }
        }
    }else{
        $error_flag = true;
    }
}else{
    echo "Not In Array";
    $error_flag = true;
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hospital Management</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/bootstrap-3.3.7/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/styles.css" />
        <link rel="stylesheet" href="assets/bootstrap-datetimepicker.css" />

        <script src="assets/jquery-2.2.4.js"></script>
        <script type="text/javascript" src="assets/moment.js"></script>
        <script type="text/javascript" src="assets/bootstrap-3.3.7/js/bootstrap.js"></script>
        <script type="text/javascript" src="assets/bootstrap-datetimepicker.js"></script>

        <script type="text/javascript" src="assets/script.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#employee-contract-startdate').datetimepicker({format: 'Y-MM-DD'});
                $('#employee-contract-enddate').datetimepicker({format: 'Y-MM-DD'});
            });
        </script>

    </head>
    <body>
        <div id="wrapper" class="container">
            <?php require_once(HEADER_SECTION);?>
            <div id="main-content" class="border-1">
                <?php require_once(LEFT_SECTION); ?>
                <div id="right-column" class="border-1">
                    <div id="content" class="border-1">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <?php

                                    echo $page.": ".$error_flag."<br />";
                                    if($error_flag==true){ ?>
                                        <p class="message error">Error: Requested page is not available.</p>
                                    <?php }
                                    else{
                                        include($page);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once(FOOTER_SECTION); ?>
        </div>

    </body>
</html>