<?php
/** 
 * Public class to interact with review table
 * 
*/
class Review extends Dbh{

/**
 *  Public array to store columns of perspective table corresponding to the review_id column
 * 
*/
    public $about = [];

/**
 * public constructor which returns review, name, title, pic of a reviewer corresponding to the reveiw_id passed
 * 
 */
    public function __construct($id) {

        $sql = "SELECT * FROM perspective WHERE id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        while( $row = $stmt->fetch() ){
            
            $this->about["review"]=$row["review"];
            $this->about["name"]=$row["name"];
            $this->about["title"]=$row["title"];
        }
    }

/**
 * public @method ReviewCount(), it returns the id of the last review 
 * 
 */
    public function ReviewCount(){

        $sql = "SELECT id FROM perspective ORDER BY id DESC LIMIT 1";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        return($stmt->fetch());
}

}