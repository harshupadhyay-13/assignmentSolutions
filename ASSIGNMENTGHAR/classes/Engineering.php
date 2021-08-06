<?php
/**
 * Class with all the methods interacting with central column tables
 * 
*/
class Engineering extends Dbh{

/**
 *  GETTER method fetching every branch name 
 * 
*/
    public function getBranches(){

        $sql = "SELECT name , id FROM branch ORDER BY id";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        $i=0;

        while($row=$stmt->fetch()){
            $branch[$i]=$row;
            $i++;
        }
        
        return($branch);
    }

/** 
 * GETTER method fetching name column data where id is equal to branch_id
 * 
*/
    public function getBranch($branch_id) {

        $sql = "SELECT name FROM branch WHERE id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$branch_id]);

        return ($stmt->fetch());
    }

/**
 *  GETTER method fetching subject_name and branch_id where matching subject_id 
 * 
*/
    public function getSubjects($branch_id){

        $subs=[];

        $sql = "SELECT name , id FROM subject WHERE branch_id=? ORDER BY id";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$branch_id]);

        $i=1;
        while( $row = ( $stmt->fetch() ) ){
            
            $subs[$i]=$row;
            $i++;
        }

    return ( $subs);
    }

}
?>