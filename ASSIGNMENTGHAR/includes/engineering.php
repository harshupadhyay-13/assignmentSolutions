<?php 
/** * 
 * 
 * Main engineering branch list page  
 *
 * It gets the branch id from the GET array using the $_GET super global with index "id" 
 * 
 * This require statement includes header.php file which contains the basic layout, if this page is not loaded the site
 * will break
 * 
 */ 
require 'header.php';
$branch_id=$_GET["branch_id"];

/* * *
   * @object $obj of Engineering class
   * *
*/
$obj = new Engineering();

/* * *
   * string @variable branch to hold the name of branch returned by GETTER method getBranch passed 
   * with branch_id and index key "name"
   * *
*/
$branch_name = $obj->getBranch($branch_id)["name"];

/* * * 
   * 2-D array @variable subs to hold the name of subject returned by GETTER method 
   * getSubjects passed with branch_id.
   * Moreover it is a associative array on 2nd Dimension meaning of which it holds key values 
   * name and id which correspond to subject_name and subject_id back in database.
   * * 
*/
$subs= $obj->getSubjects($_GET["branch_id"]);

?>

            <div class="subjectstorage ">
                <h2> <?php echo $branch_name; ?> </h2>
                <div class="tableFixHead">
                <div class="subjectcontent ">
                    <?php for($i=1;$i<=count($subs);$i++):?>

                    <div class="subject ">
                        <h2><a href="allAssignment.php?subject_id=<?=$subs[$i]["id"]?>">
                                <?=$subs[$i]["name"];?> </a>
                        </h2>
                    </div>

                    <?php endfor; ?>
                </div>
                </div>
            </div>

 <?php require 'footer.php';?>