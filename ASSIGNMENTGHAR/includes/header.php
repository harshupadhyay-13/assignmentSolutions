<?php 
/**
 * This require statemnent requires a file which calls the class file whenever its object is created
 */
require 'init.php';

/**
 * @object $arr is object of Engineering class
 */
$arr = new Engineering();

/**
 * @param $branch is object of Engineering class
 */
$branch=$arr->getBranches();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lovers+Quarrel&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="/style.css">
    
   
</head>

<body ><div class="background">
       <div class="cube"></div>
       <div class="cube"></div>
       <div class="cube"></div>
       <div class="cube"></div>
      <div class="cube"></div>
    </div>
    <section>
        <div class="container">
            <header>
                <div class="logo">
                    <img src="/Picture.png" alt="logo" >
                </div>
            
                <div class="auth">
                    <p>
                        <?php 
                        session_start();
                        if ( Auth::isLoggedIn() ) :?> 
                            <a href="/admin.php"> Admin : <?= $_SESSION["user"]?>  </a> | 
                            <a href="/logout.php">Log Out</a>

                        <?php endif;?>
                    </p>
                </div>
                
                <ul>
                    <li>
                        <a href="/home.php"class="active">HOME</a>
                    </li>

                    <li>
                        <a href="#">BRANCHES</a>

                        <ul class="drop">
                        <?php for($i=0;$i<count($branch);$i++):?>
                            <li>
                                <a href="/includes/engineering.php?branch_id=<?=$branch[$i]["id"]?>"><?=$branch[$i]["name"]?></a>
                            </li>
                        <?php endfor; ?>
                        </ul>
                    </li>

                    <li>
                        <a href="/about.php">ABOUT</a>
                    </li>

                    <li>
                        <a href="/contact.php">CONTACT</a>
                    </li>
                </ul>

            </header>