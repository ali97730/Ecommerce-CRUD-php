<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Productdb",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (25) NOT NULL,
                             product_price FLOAT,
                             product_image VARCHAR (100)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
    public function deleteData($id){
        $sql="DELETE FROM $this->tablename WHERE id=$id LIMIT 1;";
        mysqli_query($this->con, $sql);
    }

    public function updateData($id,$name,$price,$img){
        $sql = "UPDATE $this->tablename SET product_name = '$name' , product_price='$price' , product_image = '$img' WHERE id=$id ; ";
        mysqli_query($this->con, $sql);
    }
    
    public function addData($name,$price,$img){
        $sql = "INSERT INTO $this->tablename (product_name,product_price,product_image) VALUES ('$name','$price','$img');";
        $result = mysqli_query($this->con, $sql);
        if($result === FALSE) {
            die("Uh oh something went wrong");
        }else{
            return $result;
        }
       
    }

    public function getUser($uname,$pass){
        $sql = "SELECT user_name,password FROM $this->tablename WHERE user_name='$uname' AND password='$pass';";

        $result = mysqli_query($this->con, $sql);

        if($result){
            return $result;
        }else{
            return 0;
        }
    }
  
    
}



