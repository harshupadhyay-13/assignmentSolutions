
<?php require 'includes\header.php'; ?>

<div class="main center">

                <?php for($i=1;$i<=4;$i++):?>

                <div class="card">
                <?php $obj= new Dev($i);
                      $developer=$obj->dev;?>
                <img src="<?=($developer['pic']);?>" height = "140px" width = "200px" alt="">
                    <h1> <?= $developer["name"]; ?> 
                    </h1>
                    <h3> <?= $developer["role"];?> </h3>
                    <h4> <?= $developer["email"]; ?> </h4>
                    
                    <div class="icon">
                        <a href="<?=$developer['insta'];?>" class="fa fa-instagram fa-2x"></a>
                        <a href="<?=$developer['github'];?>" class="fa fa-github fa-2x"></a>
                        <a href="<?=$developer['twitter'];?>" class="fa fa-twitter fa-2x"></a>
                    </div>

                </div>

                <?php endfor;?>
                
</div>
<?php require 'includes\footer.php';?>
