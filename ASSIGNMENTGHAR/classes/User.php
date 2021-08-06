<?php

/**
 * User
 *
 * A person or entity that can log in to the site
 */
class User extends Dbh
{
    /**
     * Unique identifier
     * @var integer
     */
    public $id;

    /**
     * Unique username
     * @var string
     */
    public $username;

    /**
     * Password
     * @var string
     */
    public $password;

    /**
     * Authenticate a user by username and password
     *
     * @param object $conn Connection to the database
     * @param string $username Username
     * @param string $password Password
     *
     * @return boolean True if the credentials are correct, null otherwise
     */
    public function authenticate($username, $password)
    {
        $sql = "SELECT email  AS username , roll_num AS password , name, id
                FROM developer
                WHERE email = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$username]);

        $dev=[];
        $dev=$stmt->fetch();
        $_SESSION["user"] = $dev['name'];
        $_SESSION["username"] = $dev['username'];
        $_SESSION["id"] = $dev['id'];

        if ( $dev ) {
            return ($password == $dev["password"]);
        }
    }
    public function registerUser( $name, $role, $dob, $email, $roll_num, $pic, $insta, $github, $twitter){
         $sql  = "INSERT INTO developer (id, name, role, dob, email, roll_num, pic, insta, github, twitter) VALUES ( NULL, :name, :role, :dob, :email, :roll_num, :pic, :insta, :github, :twitter);";

         $stmt = $this->connect()->prepare($sql);

         $stmt->execute(array(':name' => $name, ':role' => $role, ':dob' => $dob, ':email' => $email, ':roll_num' => $roll_num, ':pic' => $pic, ':insta' => $insta, ':github' => $github, ':twitter' => $twitter));

         return($stmt->fetch());
    }
}
