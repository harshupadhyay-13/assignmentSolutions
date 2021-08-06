<?php 
/* * * 
   * Main assignment page  
   *
   * It gets the subject id from the GET array using the $_GET super global with index "id" 
   * *
*/

/**
 * This require statement includes header.php file which contains the basic layout, if this page is not loaded the site
 * will break
 * 
 */
require 'header.php';

/**
 * @param $assignment_id is to hold assignment_id which is a value of associated global variable $_GET with key assignment_id
 * 
*/ 
$assignment_id = $_GET["assignment_id"];

/**
 * @object $obj is object of Assignment class
 *
*/
$obj = new Assignment(); 

/** 
 * A array to hold the returned data from getAssignment method passed with current assignment_id
 *
*/
$data = $obj->getAssignment($assignment_id);

/** 
 * A array to hold the returned data from getTitle method passed with subject_id
 *
*/
$page = $obj->getTitle($data["subject_id"]);

/** 
 * A array to hold the returned data from getAssignment method passed with preceding assignment_id
 *
*/
$before = $obj->getAssignment($assignment_id-1);

/** 
 * A array to hold the returned data from getAssignment method passed with succeding assignment_id
 *
*/
$after = $obj->getAssignment($assignment_id+1);

/**
 * @param $code is holding data of code
 * 
 * Explicitly passing string from database to htmlspecialchars() function inorder to convert all the speacial 
 * characters to html entities
 * 
 * This will prevent from XSS attacks(cross origin attacks)
 */
$code = htmlentities($data["code"]);
$Data = htmlspecialchars($data["data"]);
?>

<div class=" subjectstorage ">
            
   <h2><span class = "BranchName"><?= $data["title"]; ?></span><br> |
   <a href="allAssignment.php?subject_id=<?=$data["subject_id"]?>">
   <?= $data["subject_name"]; ?></a> |
   <a href="engineering.php?branch_id=<?=$data["branch_id"]?>">
   <?= $data["branch_name"]; ?></a>
   <hr></h2>
      
      <div class=" tableFixHead ">                  
         <?= $data["intro"]; ?><br>
<?php if(isset($code)):?>
         <pre>
            <strong><?=$code; ?>
            </strong>
         </pre>

<?php endif;?><br>

         <i><?= $data["data"];?></i>
         <br>
            <?=$data["implementaion"]; ?><br><br>
            Last updated at: <?= $data["published_at"]; ?>
         <br>
            
            <?= "This assignment is prepared by : "?>
            <a href="../contact.php"><?= $data["prepared_by"]; ?></a><br>
      </div>
   
   <div class="pagination">

         <?php if( ($data["subject_id"] == $before["subject_id"]) && ($data["branch_id"] == $before["branch_id"])):?>
               <a class="prev" href="assignment.php?assignment_id=<?=($assignment_id-1)?>">❮</a>
         <?php endif; ?>
         
         <?php for($i=0;$i<count($page);$i++):?>
         
               <p>
                  <a href="assignment.php?assignment_id=<?=$page[$i+1]["id"]?>" class="pDOT">
                     <?php if($assignment_id==$page[$i+1]["id"]):?> 
                              <b> <?=" ".($i+1)." ";?> </b>
                     <?php else:?>
                              <?=" ".($i+1)." ";?>
                     <?php endif;?>
                  </a>
               </p>
                     
         <?php endfor; ?>
                     
         <?php if( ($data["subject_id"] == $after["subject_id"]) && ($data["branch_id"] == $after["branch_id"])): ?>
               <a class="next" href="assignment.php?assignment_id=<?=($assignment_id+1)?>">❯</a>
         <?php endif; ?>

   </div>
</div>

<?php 
/* * *
   * destructing the @object of Assignment class
   * *
*/
$obj=0;
?>

<?php require 'footer.php';?>