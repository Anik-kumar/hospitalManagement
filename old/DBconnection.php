<?php



class DBconnection
{
    private $connection;
    private $host;
    private $user;
    private $password;
    private $databaseName;
    private $port;
    private $debug;
    private $status_fatal;

    function __construct() {
        //echo "<br />>>>>>>>>>> DBconnection : Constructor";
        $this->connection = false;
        $this->host = 'localhost'; //hostname
        $this->user = 'root'; //username
        $this->password = ''; //password
        $this->databaseName = 'project'; //name of your database
        $this->port = '3306';
        $this->debug = true;
        $this->connect();

    }

    function __destruct() {
        $this->disconnect();
    }

    public function connect() {
        //echo "<br />>>>>>>>>>> DBconnection : connect()";
        if ($this->connection==false) {  // !false = true | !true == false
            try {
                $this->connection = mysqli_connect($this->host, $this->user, $this->password);
                mysqli_select_db($this->connection, $this->databaseName);
                mysqli_set_charset($this->connection, 'utf8');

                if ($this->connection==false) {
                    $this->status_fatal = true;
                    //echo '<br />>>>>>>>>>> DBconnection : Connection BDD failed';
                    die();
                }
                else {
                    $this->status_fatal = false;
                }
            }
            catch (Exception $e) {
                //echo '<br />>>>>>>>>>> DBconnection : Database Error : ' . $e->getMessage();
                die();
            }

            if (!$this->connection) {
                $this->status_fatal = true;
                //echo '<br />>>>>>>>>>> DBconnection : Database Error: Connection failed';
                die();
            }
            else {
                $this->status_fatal = false;
            }
        }

        return $this->connection;
    }

    protected function disconnect() {
        //echo '<br />>>>>>>>>>> DBconnection : disconnect()';
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }

    public function getconnection()
    {
        return $this->connection;
    }

    /*function getOne($query) { // getOne function: when you need to select only 1 line in the database
        $cnx = $this->connection;
        if (!$cnx || $this->status_fatal) {
            echo 'GetOne -> Connection BDD failed';
            die();
        }

        $cur = mysqli_query($query, $cnx);

        if ($cur == FALSE) {
            $errorMessage = @mysqli_last_error($cnx);
            $this->handleError($query, $errorMessage);
        }
        else {
            $this->Error=FALSE;
            $this->BadQuery="";
            $tmp = mysqli_fetch_array($cur, mysqli_ASSOC);

            $return = $tmp;
        }

        mysqli_free_result($cur);
        return $return;
    }*/

    function getResult($query) {
        //echo '<br />>>>>>>>>>> DBconnection : getOne()';
        $cnx = $this->connection;
        if (!$cnx || $this->status_fatal) {
            //echo 'GetOne -> Connection BDD failed';
            die();
        }

        $cur = mysqli_query($cnx,$query);
        if ($cur == FALSE) {
            $errorMessage = mysqli_error($cnx);
            $this->handleError($query, $errorMessage);
        }
        else {
            $temp = array();
            while ($row = mysqli_fetch_array($cur, MYSQLI_ASSOC)) {
                array_push($temp, $row);
            }
            $return = $temp;
        }
        mysqli_free_result($cur);
        return $return;
    }

    function execute($query){
        $cnx = $this->connection;
        $return = true;
        if (!$cnx || $this->status_fatal) {
            //echo 'execute -> Connection BDD failed';
            die();
        }

        $cur = mysqli_query($cnx, $query);
        if ($cur == FALSE) {
            $errorMessage = mysqli_error($cnx);
            $this->handleError($query, $errorMessage);
            $return = false;
        }
        mysqli_free_result($cur);
        return $return;
    }

     function selectSingleValue($query, $column){
        $cnx = $this->connection;
        $return = "";
        if (!$cnx || $this->status_fatal) {
            //echo 'GetOne -> Connection BDD failed';
            die();
        }

        $cur = mysqli_query($cnx,$query);
        if ($cur == FALSE) {
            $errorMessage = mysqli_error($cnx);
            $this->handleError($query, $errorMessage);
        }
        else {
            $row = mysqli_fetch_object($cur);
            $return = $row->$column;
        }
        mysqli_free_result($cur);
        return $return;
    }

    function handleError($query, $errorMessage){
        $html = "<div style='background: #fbe1e1;padding: 10px 20px;border: 1px solid #b70909;'>";
        $html .= "<p style='margin: 5px 0px;'>Error in query: <u style='color: red;'>".$query."</u></p>";
        $html .= "<p style='margin: 5px 0px;'>mysqli Error Message: <u style='color: red;'>".$errorMessage."</u></p></div>";

        echo $html;
    }

}

?>