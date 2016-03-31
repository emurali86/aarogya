<?php	
	 $email=$_GET['email'];
        $password=$_GET['password'];
        if($_GET['email']!="" && $_GET['password']!="")
            { 
                 $sql="select * from registration where email='$_GET[email]' AND password='$_GET[password]'"; 
                 $con=mysql_connect('localhost','root','') or die("Cannot connect to mysql".mysql_error()) ;
	         $db=mysql_select_db('vikky',$con) or die("Cannot select the DB:".mysql_error());     
                 $res=mysql_query($sql) or die("Cannot execute the query $sql".mysql_error());
                 $ch=mysql_fetch_array($res);
               if($ch["email"]==$email && $ch["password"]==$password)
                {
                ?>
		<script>
		alert('successfully login...');
              window.location.href='test.html?success';
             </script>
		<?php
               //echo "SUCCESSFULLY LOGIN.....".$username;
               //include_once("dataentry.html");
               }
             else
                {
                  ?>
		<script>
		alert('enter valid username and passwprd');
                window.location.href='login.html?success';
               </script>
		<?php
                 //echo "SORRY....YOU ENTERD WRONG ID AND PASSWORD....PLEASE RETRY...";
                  //echo "YOU DON'T HAVE ACCOUNT YOU CAN REGISTRER BELOW.....";  
                  //include_once("login.html"); 
                 }
       
	       mysql_close($con);
         
              }
      else
          {
            ?>
		<script>
		alert('enter valid username and passwprd');
                window.location.href='login.html?success';
               </script>
		<?php
 
            //echo "invalid data..";
           //include_once("login.html");
           }
?>