<?php      

    include('connect.php');  
    session_start();
    $uname = $_POST['username'];  
    $email = $_POST['email'];
    $pass = $_POST['password'];  
    $role = $_POST['role'];
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $pass;
	
      
        //to prevent from mysqli injection  
        $uname = stripcslashes($uname); 
        $email = stripcslashes($email); 
        $pass = stripcslashes($pass); 
        $role=stripcslashes($role);
       		
        $uname = mysqli_real_escape_string($con, $uname);  
        $email = mysqli_real_escape_string($con, $email); 
        $pass= mysqli_real_escape_string($con, $pass); 
        $role= mysqli_real_escape_string($con, $role); 		
        
        if($role=="1")
        { 
            $sql = "insert into admin values('','$uname','$email','$pass')"; 
            $result = mysqli_query($con, $sql);
            header("location:admin.php");

        }
            
        else{
            $sql = "insert into users values('','$uname','$email','$pass')"; 
            $result = mysqli_query($con, $sql);
            header("location:users.php");
        }
		mysqli_close($con);
?>  