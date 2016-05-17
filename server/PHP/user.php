<?php

class User
{
    private $db;

    function __construct($connection)
    {
        $this->db = $connection;
    }


    /**
     *
     * Allows users to register
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $phone
     * @param $password
     * @return mixed
     */
    public function register($firstName, $lastName, $email, $phone, $password)
    {

        try {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = $this->db->prepare("INSERT INTO users ( email, lastName, firstName, phone, password_hash ) VALUES (:firstName,:lastName,:email,:phone,:password)");
//            $sql = $this->db->prepare("INSERT INTO users (firstName, lastName, email, phone, password_hash) VALUES ()");
            if (!$sql) {
                die($this->db->errorInfo());
            }
            $sql->execute(array(
                ":firstName" => $firstName,
                ":lastName" => $lastName,
                ":email" => $email,
                ":phone" => $phone,
                ":password" => $password_hash
            ));
            var_dump($this->db->errorInfo());
            echo "\n\n\nInsert ID is : {$this->db->lastInsertId()}\n\n\n\n\n";
            return $sql;
        } catch (PDOException $e) {

            die("Error! :" . $e->getMessage() . "</br>");
        }
    }

    /**
     * Allows users to login
     * @param $postEmail
     * @param $postPassword
     */
    public function login($postEmail,$postPassword)
    {

        // Goes into the database of users and get the email associated with what the user put in to sign in
        $emailQuery = $this->db->prepare("SELECT email FROM hotspots.users WHERE email = " . $postEmail);
        $emailQuery ->execute();
        $dbEmail = $emailQuery->fetch(PDO::FETCH_COLUMN);
        // Goes into the database in the users table users and get the password hash associated with what the user used to sign in
        $passwordQuery= $this->db->prepare("SELECT password_hash FROM hotspots.users WHERE  email = ". $postEmail);
        $passwordQuery->execute();
        $dbPassword = $passwordQuery->fetch(PDO::FETCH_COLUMN);
        $queryID = $this->db->prepare("SELECT id FROM hotspots.users WHERE  email = " . $postEmail);
        $queryID->execute();
        $dbID = $queryID->fetch(PDO::FETCH_COLUMN);

        if($postEmail == $dbEmail){
        echo "workin";
    } else {
            echo "not working";
        }



        var_dump($dbEmail);
        var_dump($dbPassword);

        echo gettype($dbPassword);

        // Form error handling
        if (!$dbEmail || !$dbPassword) { //if the password or the email do not have anything in them
            echo "There is no user on this system with that username";
            die("Query Failed");
            exit();
        } else  if(!password_verify($postPassword,$dbPassword)) {
            echo "Failed login";
            exit();
        }else {

            $_SESSION['userid'] = $dbID;
            $_SESSION['email'] = $dbEmail;
            $_SESSION['password'] = $dbPassword;

            setcookie("id",$dbID,strtotime('+ 15 days'),"/","",true);
            setcookie("password",$dbPassword,strtotime('+ 15 days'),"/","",true);

            exit();
        }
    }


    /**
     * Allows users to safely logout
     * @param $id
     * @param $email
     */
    public function logout($id,$email){

        $_Session = array();
        if($_SESSION['userid'] = $id && $_SESSION['email'] = $email && $_SESSION['password'] = $password){

            setcookie("userid" ,'', strtotime( '-1 days' ), '/');
            setcookie( "email",'', strtotime( '-1 days' ), '/');
            setcookie( "password" ,'', strtotime( '-1 days' ), '/');
        }

        session_destroy();

        if(isset($_SESSION['userid']) || isset($_SESSION['email']) || isset($_SESSION['password'])){

        } else {
            echo 'Go back to the login page';
            exit();
        }

    }
}