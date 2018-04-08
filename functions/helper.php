<?php




function getPageLink($page, $action){
    $pageMapping = array(
        "department" => array(
            "add" => "view/add_department_form.php",
            "show" => "view/show_departments.php",
            "home" => "view/show_departments.php",
        ),
        "category" => array(
            "add" => "view/add_new_category.php",
            "show" => "view/show_categories.php",
            "home" => "view/show_categories.php",
        ),
        "employee" => array(
            "add" => "view/add_new_employee.php",
            "show" => "view/show_employees.php",
            "search" => "view/search_employees.php",
            "home" => "view/show_employees.php",

        ),
        "schedule" => array(
            "add" => "view/add_working_schedule.php" , 
            "show" => "view/working_schedule.php", 
            "home" => "view/working_schedule.php",

        ),
        "room" => array(
            "add" => "view/add_new_room.php" , 
            "show" => "view/show_room.php", 
            "search" => "view/search_room.php",
            "home" => "view/show_room.php",

        ),
        "roomtype" => array(
            "add" => "view/add_new_room_type.php" , 
            "show" => "view/show_room_type.php", 
            "home" => "view/show_room_type.php",

        ),
        "patient" => array(
            "add" => "view/add_new_patient.php" , 
            "show" => "view/show_patients.php", 
            "home" => "view/show_patients.php",
            "details" => "view/patient_details.php",
        ),
        "search" => array(
            "show" => "view/show_search_result.php" 
            ),
        


    );
    $page = trim($page);
    $action = trim($action);

   // echo "<br />Page: ".$page." - Action:".$action."<br />";
   // print_r($pageMapping);
    //print_r(PAGE_MAPPING);
    if(array_key_exists($page, $pageMapping)){
        if($action==""){
            if(is_array($pageMapping[$page])){
                return $pageMapping[$page]["home"];
            }else{
                return $pageMapping[$page];
            }

        }else{
            if(array_key_exists($action, $pageMapping[$page])){
                return $pageMapping[$page][$action];
            }else{
                return false;
            }
        }

    }else{
        return false;
    }
}



function checkIfViewFileExists($filePath){
    //echo ">> filePath: ". $filePath;

    if (file_exists($filePath)) {
      //  echo " ---> Found: <br />";
        return true;
    }else {
        //echo " ---> Not Found: <br />";
        return false;
    }
}



function getContractType($type){
    $contractTypes = array(
        "F"=>"Full-Time",
        "P"=>"Permanent",
        "Pa"=>"Part-Time",
    );
    if(array_key_exists($type, $contractTypes)){
        return $contractTypes[$type];
    }else{
        return "";
    }
}


function getUUID() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}