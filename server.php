<html>
<head>
	<link rel="stylesheet" type="text/css" href="foundation.css" />
	
</head>
<body>
	<h1>LOGIN SUCCESSFULL</h1>



<?php
print_r($_FILES);
print_r($_POST);
	

if($_POST['submitted']==1) {  
    if ($_POST["name"]){  
        $name = $_POST["name"]; 
    }  
    else{ 
         $err = "Please enter name"; 
    }

    if ($name{0}!=ctype_upper($name{0})) {
    	

    	 if (isset($err)){  
            $err = $err . " & first letter caps";  
            
        }else{  
            $err = "first letter caps";  
            
        }  
    	
    }
    if ($_POST["dob"]){  
        $dob = $_POST["dob"]; 
    }
     else{  
        if (isset($err)){  
            $err = $err . " & dob";  
            
        }else{  
            $err = "Please enter dob";  
            
        }  
    }  

    if (!preg_match("/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/", $dob)) {
    	//echo "invalid date"; 
    }


    
    if (isset($_POST["gender"])){  
        $gender = $_POST["gender"]; 
    }
     else{  
        if (isset($err)){ 
            $err = $err . " & gender";  

             
        }else{  
            $err = "Please enter gender";  
            
        }  
    }  

    if ($_POST["frn"]){  
        $rn = $_POST["frn"]; 
    }
     else{  
        if (isset($err)){
            $err = $err . " & rn";  
              
        }else{  
            $err = "Please enter rn";  
             
        }  
    }  

    if (strlen($rn)>11){
    	if (isset($err)){
            $err = $err . " & rn should be 10 digit";  
              
        }else{  
            $err = "rn should be 10 digit";  
             
        }  
    	
    }
    if (isset($_POST["dept"])){  
        $dept = $_POST["dept"]; 
    }
    else $dept=NULL;

     if ($_POST["email"]){  
        $email = $_POST["email"]; 
    }
     else{  
        if (isset($err)){
            $err = $err . " & email";  
              
        }else{  
            $err = "Please enter email";  
             
        }  
    }  
    if ($_POST["school"]){  
        $school = $_POST["school"]; 
    }
    if (isset($_POST["ra"])){  
        $ra = $_POST["ra"]; 
    }
    else $ra=NULL;

    if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
   if (isset($err)){
            $err = $err . " & invalid email";  
              
        }else{  
            $err = "invalid email";  
             
        }    	
    }

    if ($_POST["pass"]){  
        $pass = $_POST["pass"]; 
    }
     else{  
        if($err){ 
            $err = $err . " & pass";  
              
        }else{  
            $err = "Please enter pass";  
              
        }  
    }  

    if ($_POST["cpass"]){  
        $cpass = $_POST["cpass"]; 
    }
     else{  
        if (isset($err)){ 
            $err = $err . " & confirm pass";  
              
        }else{  
            $err = "Please confirm pass";  
             
        }  
    }  
$i=0;
    if (isset($_POST["delta"])){$i++; $delta=true;}else $delta=false;
    if (isset($_POST["spider"])){$i++;$spider=true;}else $spider=false;
    if (isset($_POST["rmi"])){$i++;$rmi=true;}else $rmi=false;
    if (isset($_POST["design"])){$i++;$design=true;}else $design=false;
    if ($i<3) { 
     if (isset($err)){ 
            $err = $err . " & min 3";  
            
        }else{  
            $err = "min 3";  
              
        }   }

$fileName =NULL;
$tmpName  =NULL;
$fileSize =NULL;
$fileType =NULL;
$content=NULL;
if(isset($_POST['upload']) && $_FILES['file']['size'] > 0)
{
$fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

echo "<br>File $fileName uploaded<br>";
}  

if(isset($err)){ echo "$err </br>";}

  else {echo "Form submitted";


   $db = mysqli_connect("localhost", "root", "","delta");


   if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql="INSERT INTO user VALUES('$name','$dob','$gender','$rn','$dept','$email','$delta','$spider','$rmi','$design','$ra','$school',PASSWORD('$pass'),'$fileName','$content','$fileType','$fileSize','$tmpName')";

  echo "</br>";
  
  if (!mysqli_query($db,$sql))
  {
  die('Error: ' . mysqli_error($db));
  }
echo "Response Recorded";

mysqli_close($db);}

    

}  

?>
</body>
</html>