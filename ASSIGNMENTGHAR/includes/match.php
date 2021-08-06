<?php
/**
 * This require statement includes header.php file which contains the basic layout, if this page is not loaded the site
 * will break
 * 
 */
require 'header.php';

$asg = new Assignment();

$Match  = $asg->getMatch($_GET["subject_id"]);

$subjectBranch = $asg->getSubjectBranch($_GET["subject_id"]);

?>
<div class="subjectstorage ">
    <h1>Match The Columns of <a href="allAssignment.php?subject_id=<?=$subjectBranch["subject_id"];?>"><?=$subjectBranch["subject"];?></a> | <a href="engineering.php?branch_id=<?=$subjectBranch["branch_id"];?>"><?=$subjectBranch["branch"];?></a></h1>
<br>
    <p>Match the following with most appropriate option:</p><br>
    <div class="tableFixHead " style="height:inherit">

    <?php for($i=1;$i<=count($Match);$i++):?>
        <strong>Question Number:<?=$i;?></strong>
    <table style="table-layout:auto;">
        <tr>
            <th>Column A:</th>
            <th>Column B:</th>
        </tr>

        <?php for($j=1;$j<=5;$j++):?>

        <tr>
        <td><strong><?="A".$j?></strong><?="   :   ".$Match[$i]["A".$j];?></td>
        <td><strong><?="B".$j?></strong><?="   :   ".$Match[$i]["B".$j];?></td>
        </tr>

        <?php endfor;?>
    </table>
    <button onclick="myFunction()">Try it</button><br>

        <div id="myDIV">
        Answer: <?=$Match[$i]["answer"];?>
        </div><br>

    <?php endfor;?>

        </div>

</div>