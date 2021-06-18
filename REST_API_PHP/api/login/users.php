<?php



class User{
 
    // database connection 
    private $conn;
    private $table_name = "user";
 
    // object properties
    public $user_id;
    public $username;
    public $phone;
    public $password;
 
    // constructor with $db  database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //user signup 
    function signup(){
    
     
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username,phone=:phone,password=:password";


    
        
        $stmt = $this->conn->prepare($query);

    
        
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
    
    
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":phone", $this->phone);

        if($this->isAlreadyExist()){
            return false;
        }
    
    
        if($stmt->execute()){
            $this->user_id = $this->conn->lastInsertId();
            return true;
        }
    
        return true;
        
    }

    // login 
    function login(){
         
        $query = "SELECT
                    `user_id`, `username`, `password`, `phone`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='".$this->username."' AND password='".$this->password."'";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->execute();
        return $stmt;
    }

    //Notify if User  Already exists during SignUp
    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."'";
        
        $stmt = $this->conn->prepare($query);
       
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}