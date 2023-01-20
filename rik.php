<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        form{
            text-align: center;
            border: 3px;
            font-weight: bold;
            background-color: plum;
            border-radius:5px ;
        }
        input, button{
            width:60%;
            margin:10px;
            padding:10px
       

        } 
      
     
    
    </style>
    <title>Simple form</title>
</head>
<body>
  <?php
  $name =$surname =$email =$impactcourse = $tel= $info="";
  $nameErr =$surnameErr=$emailErr =$impactcourseErr =$info="";
  
  if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $name= test_input($_POST["name"]);
    $surname= test_input($_POST["surname"]);
    $email= test_input($_POST["email"]);
    $impactcourse= test_input($_POST["impactcourse"]);
    $info= test_input($_POST["info"]);
 
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
 <p><span>*required field</span></p>
     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        Name:<input type="text" name="name"> <span><?php echo $nameErr ?></span><br></br>
        Surname: <input type="text" name="surname"> <span><?php echo $surnameErr ?></span><br></br>
        Email: <input type="email" name="email"> <span><?php echo $emailErr ?></span> <br></br>
        Impact Course: <input type="text" name="impactcourse"> <span><?php echo $impactcourseErr ?></span> <br></br>
        Additional Info: <textarea  name="info" cols="50" rows="5"></textarea> <br></br>
        <input type="submit">
    </form>
<?php 
echo"<h2>Your Input:</h2>";
echo "Your name is".  $name;
echo "<br>";
echo "Your surname is ". $surname;
echo "<br>";
echo "Your email is " .  $email;
echo "<br>";
echo "Youur course is " . $impactcourse;
echo "<br>";
echo "Aditional info " . $info;
echo $info;
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name =$_REQUEST["name"];
    if(empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }
    if(empty($_POST["surname"])) {
        $surnameErr ="Surname is required";
    } else {
        $surname = test_input($_POST["surname"]);
    }
    if(empty($_POST["email"])) {
        $emailErr= "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
    if(empty($_POST["impactcourse"])) {
        $impactcourseErr= "You must specify a course";
    } else {
        $impactcourse= test_input($_POST["impactcourse"]);
    }
    if(empty($_POST["info"])) {
   
        $info= test_input($_POST["info"]);
    }
    

   
    
}
 ?>

 

</body>
</html>