<?php require 'includes\header.php';?>
            
               
        <div class="flexcontainer">
            <div class="content">
                <h2>
                <ul class="text-effect">
                        <li>W</li>
                        <li>E</li>
                        <li>L</li>
                        <li>C</li>
                        <li>O</li>
                        <li>M</li>
                        <li>E</li>
                    </ul>
                </h2>
                <p>We provide exemplanry assignments, to give feel how 10 on 10 assignments look alike. Napping the whole assignment is not promoted in anyway. Students should read and then try writing by their own.</p>
                <a href="about.php">read more</a>
            </div>
            <div class="whatsnew">
                <h2>what's new!</h2>
                <div class="tableFixHead">
                <marquee direction="up" >
                <?php $ass = new Assignment();
                    $title = $ass->getNotification();
                    ?>

                    <ul>
                        <?php for($i=1;$i<=count($title);$i++):?>
                        
                        <li>
                        <span class="text"><a href="includes/assignment.php?assignment_id=<?=$title[$i]["id"]?>"><?=$title[$i]["title"]?><br></a></span>
                        </li>
                        
                        <?php endfor;?>
                    </ul>
                </marquee>
                </div>
           </div>
        </div>
        
        <div class="imgbx">
                <img src="shadow.png" alt="">
            </div>

<?php require 'includes\footer.php';?>