<?php
/**
 * This require statement includes header.php file which contains the basic layout, if this page is not loaded the site
 * will break
 * 
 */
require 'header.php';

$asg = new Assignment();

$numericalObj  = $asg->getNumerical($_GET["subject_id"]);

$subjectBranch = $asg->getSubjectBranch($_GET["subject_id"]);

?>
<div class="subjectstorage">

<h1 >Numericals of 
    <a href="allAssignment.php?subject_id=<?=$subjectBranch["subject_id"];?>">
    <?=$subjectBranch["subject"];?>
    </a> | <a href="engineering.php?branch_id=<?=$subjectBranch["branch_id"];?>">
    <?=$subjectBranch["branch"];?>
    </a>
</h1>

    <?php for($i=1;$i<=count($numericalObj);$i++):?>

        <div ><br>
            <p>Question Number:
                <?=$i;?>    
                <?=$numericalObj[$i]["Statement"];?>
            </p>

            <button onclick="myFunction()">Try it</button>
            
            <br>

            <div id="myDIV">
            Answer: <?=$numericalObj[$i]["Answer"];?>
            <br>
            Explanation: <?=$numericalObj[$i]["Explanation"];?>

            </div>

        </div>
        <?php endfor;?>
</div>
