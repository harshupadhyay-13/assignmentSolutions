<?php
/**
 * This require statement includes header.php file which contains the basic layout, if this page is not loaded the site
 * will break
 * 
 */
require 'header.php';

$ass  = new Assignment();

$subject_id  = $_GET["subject_id"];

$dataTheory = $ass->getAssignmentByType(0, $subject_id);

$dataLab = $ass->getAssignmentByType(1, $subject_id);

$data = $ass->getSubjectBranch($subject_id);

?>


            <!-------here is a interesting part--------->
            <div class="subjectstorage">
                <h2> <a href="/includes/engineering.php?branch_id=<?= $data["branch_id"];?>"><?= $data["branch"];?></a> | <a href="/includes/allAssignment.php?subject_id=<?= $data["subject_id"];?>"><?= $data["subject"];?></a></h2>
                <div class="theory">

                    <div class="whats">
                        <button class="button theoy">Theory</button>
                        <div class="tableFixHead">
                            
                        <ul>
                            <?php if(isset($dataTheory)):foreach($dataTheory as $theoryAss):?>
                            <li>
                                <span class="text"><a href="/includes/assignment.php?assignment_id=<?=$theoryAss["id"];?>"><?=$theoryAss["title"];?></a></span>
                            </li>
                            <?php endforeach;endif;?>
                        </ul>
                    
                        </div>
                   </div>


                   <div class="whats">
                        <button class="button lab">Lab</button>
                        <div class="tableFixHead">

                        <ul>
                                <?php if(isset($dataLab)):foreach($dataLab as $labAss):?>
                                <li>
                                    <span class="text"><a href="/includes/assignment.php?assignment_id=<?=$labAss["id"];?>"><?=$labAss["title"];?></a></span>
                                </li>
                                <?php endforeach;endif;?>
                        </ul>
                
                        </div>
                    </div>

                    <div class="questions">

                        <a href="/includes/mcq.php?subject_id=<?= $data["subject_id"];?>">Multiple Choice Questions</a>
                        <br>
                        <a href="/includes/match.php?subject_id=<?= $data["subject_id"];?>">Match The Columns </a><br>
                        <a href="/includes/numerical.php?subject_id=<?= $data["subject_id"];?>">Numerical Questions</a>
                    </div>
                </div>
            </div>
<?php require 'footer.php';?>