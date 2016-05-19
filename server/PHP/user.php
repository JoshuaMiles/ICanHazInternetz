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
            //Uses bycrypt
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = $this->db->prepare("INSERT INTO users ( email, firstName, lastName, phone, password_hash ) VALUES (:email,:firstName,:lastName,:phone,:password)");
            if (!$sql) {
                die($this->db->errorInfo());
            }
            $sql->execute(array(
                ":email" => $email,
                ":firstName" => $firstName,
                ":lastName" => $lastName,
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
    public function login($postEmail, $postPassword)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //post password is raw password, password is the hashed version from the database

            $username = $postEmail;
            $password = password_hash($postPassword, PASSWORD_DEFAULT);

            $qry = $this->db->prepare('SELECT * FROM hotspots.users WHERE username = :username and password = :password');

            $qry->execute(array(
                ':username' => $username,
                ':password' => $password
            )); // run query

            if (($qry->rowCount() > 0) && password_verify($postPassword, $password)) {

                $_SESSION['logged_in'] = true;

                header("Location:  http://{$_SERVER['HTTP_HOST']}/index.html");
                exit();
            } else {
                echo "Login failed";
                //TODO need to do error handling. Add a span in case
            }
        }
    }


    /**
     * Allows users to safely logout
     * @param $id
     * @param $email
     */
    public function logout($id, $email)
    {

        $_Session = array();
        if ($_SESSION['userid'] = $id && $_SESSION['email'] = $email && $_SESSION['password'] = $password) {

            setcookie("userid", '', strtotime('-1 days'), '/');
            setcookie("email", '', strtotime('-1 days'), '/');
            setcookie("password", '', strtotime('-1 days'), '/');
        }

        session_destroy();

        if (isset($_SESSION['userid']) || isset($_SESSION['email']) || isset($_SESSION['password'])) {
            //TODO something to do if any are still set
        } else {
            echo 'Go back to the login page';
            exit();
        }

    }
}