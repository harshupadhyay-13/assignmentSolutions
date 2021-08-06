<?php
/**
 * This require statement includes header.php file which contains the basic layout, if this page is not loaded the site
 * will break
 * 
 */
 require 'header.php';
/**
 * @object $ass is object of Assignment class
 * 
 */
 $ass = new Assignment();

/**
 * @param $title is the array holding data returned by getTitle method, which is passed with sub_id 
 * 
 */
 $title = $ass->getTitle($_GET["subject_id"]);

?>

<div class="subjectstorage">

<h2> <?=$title["1"]["subject"]; ?> </h2>

    <div class="tableFixHead">
        <div class="subjectcontent ">

             <?php for($i=1;$i<=count($title);$i++):?>

            <div class="subject ">
                <h2><a href="assignment.php?assignment_id=<?=$title[$i]["id"]?>">
                <?=$title[$i]["title"];?></a></h2>
            </div>

            <?php endfor; ?>
        </div>
    </div>
</div>

 <?php require 'footer.php';?>



 