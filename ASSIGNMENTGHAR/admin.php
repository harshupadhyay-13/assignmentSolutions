<?php 
/**
 * This require statemnent requires a file which calls the class file whenever its object is created
 */
require 'includes\header.php';

$arr = new Engineering();

$branch=$arr->getBranches();

if(!($_SERVER["REQUEST_METHOD"] == "POST")):
    $result = false;
    $_POST["branch"] = "";
    $_POST["subject"] = "";
    $_POST["title"] = "";
    $_POST["intro"] = "";
    $_POST["data"] = "";
    $_POST["code"] = "";
    $_POST["implementation"] = "";
    $result= " ";
    endif;
    $ass = new Assignment();
    if(isset($_POST["branch"])):
    $branch_id=$_POST["branch"];
    $subs= $arr->getSubjects($branch_id);
    endif;

?>
<h2>Insert a assignment</h2>

<form method="post" <?php if($result  && isset($_POST["subject"]) ) :?> action="/includes/assignment.php?assignment_id=<?php echo $ass->getLatestAssignment();?>"<?php endif;?>>

<div>
    <label for="branch">Branch: </label><br>
    <?php for($i=0;$i<count($branch);$i++):?>
    <input name="branch" type = "radio" value= "<?=$branch[$i]["id"];?>" <?php if($branch[$i]["id"]==$_POST["branch"]):?>checked<?php endif;?> > <?=$branch[$i]["name"];?><br>
    <?php endfor; ?>
</div>

<div>
    <label for="subject">Subject: </label><br>
    <?php for($i=1;$i<count($subs);$i++):?>
    <input name="subject" type = "radio" <?php if(isset($_POST["subject"])):if($subs[$i]["id"]==$_POST["subject"]):?>checked<?php $subject_num = $i ;endif;endif;?> value="<?=$subs[$i]["id"]?>"> <?=$subs[$i]["name"];?><br>
    <?php endfor;?>
</div>

<div>
    <label for="prepared_by">Prepared_by: </label>
    <input name="prepared_by" <?php if($_SESSION["user"]):?>value = "<?=$_SESSION["user"];endif;?>" disable>
</div>

<div>
    <label for="title">Title: </label>
    <input name="title" <?php if($_POST["title"]):?>value="<?=$_POST["title"];endif;?>">
</div>

<div>
    <label for="intro">Intro: </label>
    <input name="intro" <?php if($_POST["intro"]):?>value="<?=$_POST["intro"];endif;?>">
</div>

<div>
    <label for="data">Data: </label>
    <input name="data" <?php if($_POST["data"]):?>value="<?=$_POST["data"];endif;?>">
</div>

<div>
    <label for="code">Code: </label>
    <input name="code" <?php if($_POST["code"]):?>value="<?=$_POST["code"];endif;?>">
</div>

<div>
    <label for="implementation">Implementation: </label>
    <input name="implementation" <?php if($_POST["implementation"]):?>value="<?=$_POST["implementation"];endif;?>">
</div>

<button type="submit">Submit</button>

</form>

<?php 
if ( (isset($_POST["branch"])) && (isset($_POST["subject"])) && (isset($subject_num))) {
    
    $branch_name = $arr->getBranch($branch_id)["name"];
    
    $branch_id = $_POST["branch"];
    $branch_name = $arr->getBranch($branch_id)["name"];
    $subject_id = $_POST["subject"];
    if(isset($subject_num)):
    $subject_name = $subs[$subject_num]["name"];
    endif;
    $dev_id = $_SESSION["id"];
    $dev_name = $_POST["prepared_by"];
    $title =  $_POST["title"];
    $intro = $_POST["intro"];
    $data = $_POST["data"];
    $code = $_POST["code"];
    $implementation = $_POST["implementation"];
    try{
        $result = !(bool)( $ass->setAssignment($branch_id,$branch_name, $subject_id,$subject_name, $dev_id,$dev_name, $title, $intro, $data, $code, $implementation));
    }
    catch(PDOExpception $e){
        echo "Error!:" . $e->getMessage();
    }
    var_dump($result);
}
require 'includes\footer.php';?>