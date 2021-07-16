<?php      
    include('connect.php');
    session_start();
    
    $_SESSION['email'] = $_POST['email'];  
    $_SESSION['password'] = $_POST['password'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password);  
      
		$sql1 = "select * from admin where a_mail = '$email' and a_password = '$password'";  
	
        $result1 = mysqli_query($con, $sql1);  
		
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);  
        $count1 = mysqli_num_rows($result1);  
          
        if($count1 == 1){  
            //echo "<h1><center> Login successful </center></h1>"; 
            header("location:admin.php"); 
            
        }  
             
	  else{
        $sql = "select * from users where u_mail = '$email' and u_password = '$password'";  
	
        $result = mysqli_query($con, $sql);  
		
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            //echo "<h1><center> Login successful </center></h1>"; 
            header("location: users.php"); 
            
        } 
        else{  
            echo "<h1> Login failed. Invalid email or password.</h1>";  
        } 
            
	  }
      
      
?>  