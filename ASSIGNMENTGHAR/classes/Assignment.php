<?php
/* * *
   * The class for all methods and properties in use for assignment table
   * 
   * * 
*/

class Assignment extends Dbh{
    
/* * *
    * private @variable to hold all column of selected row 
    * 
    * * 
*/
    private $data=[];

/* * * 
    * public GETTER method to get Assignment corresponding to passed assignment_id
    * 
    * *
*/
    public function getAssignment($assignment_id){
        
        $sql = "SELECT * FROM assignment WHERE id=? " ;

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$assignment_id]);
        return ($stmt->fetch());
    }

/* * * 
    * public GETTER method to get Assignment corresponding to passed sub_id
    * 
    * *
*/
    public function getTitle($sub_id){

        $sql = "SELECT title,id,subject_name AS subject FROM assignment WHERE subject_id = ? ORDER BY id";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$sub_id]);
        $i=1;
        while( $row = ( $stmt->fetch() ) ){
            
            $data[$i]=$row;
            $i++;
    }
    return ($data);
}

/* * * 
    * public GETTER method to get branch corresponding to passed sub_id
    * 
    * *
*/
    public function getBranch($sub_id){
        $sql = "SELECT branch_name AS name FROM assignment WHERE subject_id = ?" ;

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$sub_id]);

        return ($stmt->fetch());
    }

/* * * 
    * public GETTER method to get last 5 updated assignments 
    * 
    * *
*/
    public function getNotification(){

        $sql = "SELECT title,id,subject_name,branch_name FROM assignment ORDER BY published_at DESC LIMIT 5";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        $i=1;
        while( $row = ( $stmt->fetch() ) ){
            
            $this->data[$i]=$row;
            $i++;
    }
    return($this->data);
}
    public function getLatestAssignment(){

        $sql = "SELECT id FROM assignment ORDER BY published_at DESC LIMIT 1;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        $row=$stmt->fetch();
        return($row["id"]);
    }

    public function setAssignment($branch_id,$branch_name, $subject_id,$subject_name, $dev_id, $dev_name, $title, $intro, $data, $code, $implementation){
        $sql = "INSERT INTO `assignment` (`id`, `branch_id`, `branch_name`, `subject_id`, `subject_name`, `dev_id`, `prepared_by`, `published_at`, `title`, `intro`, `code`, `data`, `implementaion`) VALUES (NULL, :branch_id , :branch_name , :subject_id, :subject_name, :dev_id, :dev_name, CURRENT_TIMESTAMP, :title, :intro, :data, :code, :implementation);";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(array(':branch_id' => $branch_id, ':branch_name' => $branch_name, ':subject_id' => $subject_id,':subject_name' => $subject_name, ':dev_id' => $dev_id, ':dev_name' => $dev_name, ':title' => $title, ':intro' => $intro, ':data' => $data, ':code' => $code, ':implementation' => $implementation));

        return($stmt->fetch());
    }

    public function getAssignmentByType($type, $subject_id){

        $returnV=[];

        $sql = "SELECT  title , id FROM assignment WHERE ( `subject_id` = :subject_id AND `type` = :typeAss ) ORDER BY published_at;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute( array(':subject_id' => $subject_id , ':typeAss' => $type ));

        $i=1;
        while( $row = ( $stmt->fetch() ) ){

            $returnV[$i]=$row;
            $i++;
    }
    return($returnV);
    }

    public function getSubjectBranch($subject_id){

        $sql = "SELECT branch_name  AS branch , branch_id , subject_id , subject_name AS subject FROM assignment WHERE subject_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$subject_id]);

        return ($stmt->fetch());
    }

    public function getMCQ($subject_id){

        $object = [];

        $sql = "SELECT * FROM mcq WHERE subject_id = ? ORDER BY id;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$subject_id]);

        $i=1;
        while( $row = ( $stmt->fetch() ) ){

            $object[$i]=$row;
            $i++;
    }
    return($object);
    }

    public function getNumerical($subject_id){

        $object = [];

        $sql = "SELECT * FROM numerical WHERE subject_id = ? ORDER BY id;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$subject_id]);

        $i=1;
        while( $row = ( $stmt->fetch() ) ){

            $object[$i]=$row;
            $i++;
    }
    return($object);
    }

    public function getMatch($subject_id){

        $object = [];

        $sql = "SELECT * FROM match_column WHERE subject_id = ? ORDER BY id;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$subject_id]);

        $i=1;
        while( $row = ( $stmt->fetch() ) ){

            $object[$i]=$row;
            $i++;
    }
    return($object);
    }

    public function getSuggestion() {

        $data = [];
    
        $sql = "SELECT * FROM suggestion WHERE view = 0 ORDER BY id";
    
        $stmt = $this->connect()->prepare($sql);
    
        $stmt->execute();
    
        $error = $stmt->errorInfo();
        $i=1;
        while( $row = $stmt->fetch() ){
            
            $data[$i]["user"]=$row["UserN"];
            $data[$i]["suggestion"]=$row["suggestion"];
            $i++;
        }
        return($data);
    }
//end of class Assignment
}