<?php

        session_start();
        require_once('php/CreateDb.php');
        $database = new CreateDb("Productdb","users");
        // $sql = "SELECT * FROM users WHERE user_name='mohsinali' AND password='ali97730';";
        // $result = mysqli_query($database->con, $sql);

        // print_r($result);


        if (isset($_POST['uname']) && isset($_POST['password'])) {

                function validate($data){
               $data = trim($data);
                   $data = stripslashes($data);
                   $data = htmlspecialchars($data);
                   return $data;
                }
        
                $uname = validate($_POST['uname']);
                $pass = validate($_POST['password']);
        
                if (empty($uname)) {
                        header("Location: login.php?error=User Name is required");
                    exit();
                }else if(empty($pass)){
                header("Location: login.php?error=Password is required");
                    exit();
                }else{
                        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass';";
        
                        $result = mysqli_query($database->con, $sql);
                  
                        if (mysqli_num_rows($result) === 1) {
                                $row = mysqli_fetch_assoc($result);
                    if ($row['user_name'] === $uname && $row['password'] === $pass) {
                            $_SESSION['user_name'] = $row['user_name'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['id'] = $row['id'];
                            header("Location: admin.php");
                                exit();
                    }else{
                                        header("Location: login.php?error=Incorect User name or password");
                                exit();
                                }
                        }else{
                                header("Location: login.php?error=Incorect User name or password");
                        exit();
                        }
                }
                
        }else{
                header("Location: admin.php");
                exit();
        }




?>
