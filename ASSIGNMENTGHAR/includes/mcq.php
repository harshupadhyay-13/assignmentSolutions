<?php
/**
 * This require statement includes header.php file which contains the basic layout, if this page is not loaded the site
 * will break
 * 
 */
require 'header.php';

$asg = new Assignment();

$Question  = $asg->getMCQ($_GET["subject_id"]);

$subjectBranch = $asg->getSubjectBranch($_GET["subject_id"]);

?>
<div class="subjectstorage">
    <H1>Multiple Type Questions of 
    <a href="allAssignment.php?subject_id=<?=$subjectBranch["subject_id"];?>">
    <?=$subjectBranch["subject"];?></a> | 
    <a href="engineering.php?branch_id=<?=$subjectBranch["branch_id"];?>">
    <?=$subjectBranch["branch"];?>
    </a></H1>

    <div class="tableFixHead " style="height:100%" >
    
    <?php for($i=1;$i<=count($Question);$i++):?>
      <div class="content" >
        
        <p><?=$i;?>. <?=$Question[$i]["question"];?></p>
<hr>
        A:<pre style="display:inline;"><?=htmlspecialchars($Question[$i]["A"]);?></pre><br>
        B:<pre style="display:inline;"><?=htmlspecialchars($Question[$i]["B"]);?></pre><br>
        C:<pre style="display:inline;"><?=htmlspecialchars($Question[$i]["C"]);?></pre><br>
        D:<pre style="display:inline;"><?=htmlspecialchars($Question[$i]["D"]);?></pre><br> 

        <strong> Answer:</strong><?=htmlspecialchars($Question[$i]["answer"]);?> <br>
        <?php if(isset($Question[$i]["explanation"]))://var_dump($Question[$i]["explanation"]);?>
          <strong>Explanation: </strong><?=htmlspecialchars($Question[$i]["explanation"]);?><br>
        <?php endif;?>

        <br>
      </div>
        <?php endfor;?>
        
    </div>
    
</div>
