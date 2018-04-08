<?php

require_once('DBconnection.php');
print_r($_SESSION);
$dbconnection = new DBconnection();

$submitForm = trim($_POST["submit-form"]);


switch($submitForm){

    case "addNewDepartment":
        addNewDepartment($dbconnection);
        echo 'addNewDepartment';
        break;
    case "addNewCategory":
        addNewCategory($dbconnection);
        break;
    case "addNewEmployee":
        addNewEmployee($dbconnection);
        break;
    case "addNewRoom":
        addNewRoom($dbconnection);
        break;
    case 'addNewRoomType':
        addNewRoomType($dbconnection);
        break;
    case 'addNewPatientData':
        addNewPatientData($dbconnection);
        break;
    case 'addWorkSchedule':
        addWorkSchedule($dbconnection);
        break;
    default:
        break;
}
// add soeme system log on every entry
function addNewDepartment($dbconnection){
    $actionSuccessful = false;

    $departmentName = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['department-name']));
    $departmentDescription = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['department-description']));
    if($departmentName == "" || $departmentDescription==""){

    }else{
        $query = "INSERT INTO department (name, description) VALUES ('".$departmentName."', '".$departmentDescription."')";
        echo $query;
        $dbconnection->execute($query);
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $dbconnection->addSystemLog(array("emp_id"=>$_SESSION['login_employee_id'], "action"=>"New Department Added", "log_details"=>$_SESSION['login_employee_name']. " added a new department(".$departmentName.")."));    
        }
        
        header( "Location: ".$_POST["redirect-on-success"]);
        exit();
    }
}


function addNewCategory($dbconnection){
    $categoryName = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['category-name']));
    $categoryDescription = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['category-description']));
    if($categoryName == "" || $categoryDescription==""){
        // error
    }else{
        $query = "INSERT INTO employee_catagory (catagory_name, category_description) VALUES ('".$categoryName."', '".$categoryDescription."')";
        $dbconnection->execute($query);
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $dbconnection->addSystemLog(array("emp_id"=>$_SESSION['login_employee_id'], "action"=>"New Employee Category Added", "log_details"=>$_SESSION['login_employee_name']. " added a new employee category(".$categoryName.")."));    
        }
        header( "Location: ".$_POST["redirect-on-success"]);
        exit();
    }
}

function addNewEmployee($dbconnection){
    $catagory_id = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['catagory_id']));
    $dep_id =  mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['dep_id']));
    $contract_type = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['contract_type']));
    $contract_startdate = date('Y-m-d',strtotime(mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['employee-contract-startdate']))));
    $contract_enddate = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['employee-contract-enddate']));
    if($contract_enddate!=""){
        $contract_enddate = date('Y-m-d', strtotime($contract_enddate));
    }
    $salary = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['employee-salary']));
    $firstname = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['employee-firstname']));
    $lastname = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['employee-lastname']));
    $gender = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['gender']));
    $address = mysqli_real_escape_string($dbconnection->getconnection(),trim($_POST['employee-address']));
    $guid = getUUID();
    $username = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['employee-username']));
    $userpass = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['employee-password']));
    $usermail = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['employee-email']));
    if($contract_type!="" && $contract_startdate!="" && $salary!=""){
        $dbconnection->execute("INSERT INTO employment_contract (guid, contract_type, startdate, endtime, salary) VALUES ('".$guid."','".$contract_type."', '".$contract_startdate."', '".$contract_enddate."', ".$salary." )");
        $emp_contract_id = $dbconnection->selectSingleValue("SELECT contract_id FROM employment_contract WHERE guid='".$guid."' LIMIT 0, 1;", "contract_id");

        if($emp_contract_id!="" && $catagory_id!="" && $dep_id!="" && $firstname!="" && $lastname!="" && $gender!="" && $address!=""){
            $dbconnection->execute("INSERT INTO employee (catagory_id, contract_id, dep_id, firstname, lastname, gender, address, uuid, uname, uupass, email ) VALUES (".$catagory_id.", ".$emp_contract_id.",".$dep_id.", '".$firstname."', '".$lastname."', '".$gender."', '".$address."', '".getUUID()."', '".$username."', '".md5($userpass)."', '".$usermail."');");
            
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                $dbconnection->addSystemLog(array("emp_id"=>$_SESSION['login_employee_id'], "action"=>"New Employee Added", "log_details"=>$_SESSION['login_employee_name']. " added a new employee (".$firstname." ".$lastname.")."));    
            }    
            header( "Location: ".$_POST["redirect-on-success"]);
            exit();
        }
    }

}
// check kor , add new employee



function addNewRoom($dbconnection){
    $roomtype_id = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['type_id']));
    $location = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['location']));

        if($roomtype_id!="" && $location!="")
        {
            $dbconnection->execute("INSERT INTO room (type_id, location) VALUES(".$roomtype_id.", ".$location.");");
            // add kor log
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){ // tui kor ame dakhtaci// agula to na korleo hobe. ata better add kor. same vabe sob gula te add korbo .. ha. ra ar akta page korbi jata system log do dakhab. // ok am bar hochi. aktu pora phn dichi/
                $dbconnection->addSystemLog(array("emp_id"=>$_SESSION['login_employee_id'], "action"=>"New Room Added", "log_details"=>$_SESSION['login_employee_name']. " added a new room (".$location.")."));    
            }
            header( "Location: ".$_POST["redirect-on-success"]);
            exit();
        }

}

function addNewRoomType($dbconnection){
    $Rtype = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['room_type']));
    $Rcost = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['cost']));
    $Rcapacity = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['max_capacity']));

    if($Rtype!=""  &&  $Rcost!=""  &&  $Rcapacity!=""){
        $dbconnection->execute("INSERT INTO room_type(type, cost, max_capacity) VALUES(".$Rtype.", ".$Rcost.", ".$Rcapacity.")");

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                $dbconnection->addSystemLog(array("emp_id"=>$_SESSION['login_employee_id'], "action"=>"New RoomType Added", "log_details"=>$_SESSION['login_employee_name']. " added a new room type (".$type.")."));    
            } 
        header( "Location: ".$_POST["redirect-on-success"]);
        exit();
    }
}

function addNewPatientData($dbconnection){
    $empid = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['employee-id']));
    $depid = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['department-id']));
    $roomid = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['room-id']));
    $roomtype = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['room-type']));
    $patientfname = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['patient-fname']));
    $patientlname = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['patient-lname']));
    $patientage = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['patient-age']));
    $patientgender = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['patient-gender']));
    $patientaddress = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['patient-address']));
    $patientcontact = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['patient-contact']));
    $patientproblem = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['patient-problem']));

    if($patientfname!=""  &&  $patientlname!=""  &&  $patientage!="" &&  $patientgender!=""  &&  $patientaddress!=""  && $empid!="" && $depid!="" && $roomid!=""  && $roomtype!=""){
        $dbconnection->execute("INSERT INTO patient_biodata(emp_id, dep_id, room_id, roomtype_id, firstname, lastname, age, gender, address, Contact_no, problem) VALUES(".$empid.", ".$depid.", ".$roomid.", ".$roomtype.", '".$patientfname."', '".$patientlname."', ".$patientage.", '".$patientgender."', '".$patientaddress."', ".$patientcontact.", '".$patientproblem."')");

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                $dbconnection->addSystemLog(array("emp_id"=>$_SESSION['login_employee_id'], "action"=>"New Patient Added", "log_details"=>$_SESSION['login_employee_name']. " added a new patient (".$firstname." ".$lastname.")."));    
            } 
        header( "Location: ".$_POST["redirect-on-success"]);
        exit();
    }
}
// wait 

function addWorkSchedule($dbconnection){
    $employeeid = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['employee1']));
    $day = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['day']));
    $stime = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['stime']));
    $etime = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['etime']));
    $slocation = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['location-num']));
    $respons = mysqli_real_escape_string($dbconnection->getconnection(), trim($_POST['responsibility']));

    if($employeeid!=""  &&  $day!=""  &&  $stime!=""  &&  $etime!=""){
        $query = "INSERT INTO working_schedule(emp_id, day, starttime, endtime, location, responsibility) VALUES(".$employeeid.", '".$day."', '".$stime."', '".$etime."', '".$slocation."', '".$respons."')";

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                $dbconnection->addSystemLog(array("emp_id"=>$_SESSION['login_employee_id'], "action"=>"New Schedule Added", "log_details"=>$_SESSION['login_employee_name']. " added a new schedule (".$day." ".$starttime." ".$endtime.")."));    
            } 
        echo $query."<br />";
        $dbconnection->execute($query);
        header( "Location: ".$_POST["redirect-on-success"]);
        exit();
    }
}