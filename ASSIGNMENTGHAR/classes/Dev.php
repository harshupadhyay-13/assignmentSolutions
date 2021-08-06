<?php
/**
 * Public class to interact with developer table
 *
 */
class Dev extends Dbh{

/**
 *  Public array to store columns of developer table corresponding to the developer_id column
 * 
*/
    public $dev = [];

/**
 * constructor which gets start as the object of self class is created
 * 
*/
    public function __construct($id) {
        
        $sql = "SELECT * FROM developer WHERE id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        while( $row = $stmt->fetch() ){
            
            $this->dev["name"]=$row["name"];
            $this->dev["role"]=$row["role"];
            $this->dev["email"]=$row["email"];
            $this->dev["pic"]=$row["pic"];
            $this->dev["insta"]=$row["insta"];
            $this->dev["github"]=$row["github"];
            $this->dev["twitter"]=$row["twitter"];

        }
    }
//end of class
}