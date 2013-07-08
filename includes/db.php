	<?php
define("HOST", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "");
define("DB_NAME", "portfolio");

//This class represents the database connection to mysql db
class Database{
    
    private $sqliConnection;
    
    public function __construct(){
        
        //establish connection to database using db-specific driver
        $this->sqliConnection = new mysqli(HOST,USER_NAME, PASSWORD, DB_NAME);
    
        if($this->sqliConnection->connect_error){
        
           die("Connection error " . $this->sqliConnection->connect_error);
        
        }
        
    }
    public function close(){
        
        $this->sqliConnection->close();  
        
    }

    //Excute query and return the result set
    //This result set is meant to be passed in to the fetch_array method
    public function query($sSQL){
         
        $resResult = $this->sqliConnection->query($sSQL);
        
        if(!$resResult){
        
            die("Query fails " . $sSQL);
        
        }
        
        return $resResult; 
    }
    
    //Precondition: the result set passed in must be returned from
    //the query() method
    public function fetch_array($resResult){
        
        return $resResult->fetch_array(MYSQLI_ASSOC);
        
    }  

    //this method returns the last auto-increment number
    public function get_insert_id(){

        return $this->sqliConnection->insert_id;

    }

}

?>