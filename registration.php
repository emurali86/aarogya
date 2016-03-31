<?php 
         $name=$_GET["name"];
         $password=$_GET["password"];
         $password1=$_GET["password1"];
         $email=$_GET["email"];
         $phoneno=$_GET["phoneno"];
          if($_GET["password"]==$_GET["password1"])
           {	 
         $sql1="SELECT * from registration where email='$_GET[email]' AND password='$_GET[password]'"; 
        //$sql="INSERT INTO registration (name,password,conform_password,email,phoneno) VALUES ('$name','$password','$password1','$email','$phoneno')";
	//$sql1="SELECT * from registration where username='$_GET[username]' AND password='$_GET[password]'";        
        $con=mysql_connect('localhost','root','') or die("Cannot connect to mysql".mysql_error()) ;
	$db=mysql_select_db('vikky',$con) or die("Cannot select the DB:".mysql_error());
	//$rs=mysql_query($sql) or die("Cannot execute the query $sql".mysql_error());
            $res=mysql_query($sql1) or die("Cannot execute the query $sql".mysql_error()); 
            $check=mysql_fetch_array($res);  
              if($check["email"]==$email && $check["password"]==$password && $check["password1"]==$password1)
              {
               echo "ROLLNUMBER ALREADY USED...SO CHANGE USERNAME ND PASSWORD";
               include_once("registration.html"); 
               }
        
             else
               {  
             $sql="INSERT INTO registration (name,password,conform_password,email,phoneno) VALUES ('$name','$password','$password1','$email','$phoneno')";
            $rs=mysql_query($sql) or die("Cannot execute the query $sql".mysql_error()); 
              if($rs)
               {        
                ?>
		<script>
		alert('successfully registration completed...');
              window.location.href='test.html?success';
             </script>
		<?php
                //echo "Your registration is completed..";
                //include_once("test.html"); 
               }
              }
               // mysql_close($con);
           mysql_close($con);      
          }
          else
            {
             echo "enter correct password";
             include_once("registration.html");
          //  mysql_close($con);
            }
	
        //mysql_close($con);
	
?>