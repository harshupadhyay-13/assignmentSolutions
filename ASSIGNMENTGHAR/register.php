<?php 
/**
 * This require statemnent requires a file which calls the class file whenever its object is created
 */
require 'includes\header.php';

$user = new User();

if(!($_SERVER["REQUEST_METHOD"] == "POST")):
    $_POST["name"] = "";
    $_POST["role"] = "";
    $_POST["dob"] = "";
    $_POST["email"] = "";
    $_POST["roll_num"] = "";
    $_POST["pic"] = "";
    $_POST["insta"] = "";
    $_POST["github"] = "";
    $_POST["twitter"] = "";
    $checkUser = true;
endif;

?>
<h2>Registration of new developer</h2>

<form <?php if($checkUser):?>action="contact.php"<?php endif;?> method="post">

    <label for="name">Name: </label>
    <input name= "name" <?php if(isset($_POST["name"])):?>value= "<?=$_POST["name"];endif;?>" required><br>

    <label for="Role">Role: </label>
    <input name= "role" <?php if(isset($_POST["role"])):?>value= "<?=$_POST["role"];endif;?>" required><br>

    <label for="dob">Date of Birth: </label>
    <input name= "dob" type = "date"<?php if(isset($_POST["dob"])):?>value= "<?=$_POST["dob"];endif;?>" required><br>

    <label for="roll_num">Roll Number: </label>
    <input name= "roll_num" <?php if(isset($_POST["roll_num"])):?>value= "<?=$_POST["roll_num"];endif;?>" required><br>

    <label for="email">Email: </label>
    <input name= "email" <?php if(isset($_POST["email"])):?> value= "<?=$_POST["email"];endif;?>"required><br>

    <label for="pic">Picture to be displayed: </label>
    <input name= "Pic" type="file" <?php if(isset($_POST["pic"])):?>value= "<?=$_POST["pic"];endif;?>" required><br>

    <label for="insta">Instagram handle's Link: </label>
    <input name= "insta" <?php if(isset($_POST["insta"])):?>value= "<?=$_POST["insta"];endif;?>"required><br>

    <label for="github">GitHub Account link: </label>
    <input name= "github" <?php if(isset($_POST["github"])):?>value= "<?=$_POST["github"];endif;?>" required><br>

    <label for="twitter">Twitter Handle's Link: </label>
    <input name= "twitter" <?php if(isset($_POST["twitter"])):?>value= "<?=$_POST["twitter"];endif;?>" required><br>

    <button type="submit" value = true onclick = submit()>Submit</button>

<script>
    function submit(){
        <?php
        if( (isset($_POST["name"]) ) && (isset($_POST["role"]) ) && (isset($_POST["dob"]) ) && (isset($_POST["email"]) )&& (isset($_POST["roll_num"]) ) && (isset($_POST["pic"]) ) && (isset($_POST["insta"] ) ) && (isset($_POST["github"] ) ) && (isset( $_POST["twitter"] ) ) ):
        $checkUser = $user->registerUser($_POST["name"], $_POST["role"], $_POST["dob"], $_POST["email"], $_POST["roll_num"], $_POST["pic"], $_POST["insta"], $_POST["github"], $_POST["twitter"]);
        var_dump($checkUser);
        endif;?>
    }
</script>

</form>