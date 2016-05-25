<?php

class User {
  private $db;

  function __construct($connection) {
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
  public function register($firstName, $lastName, $email, $phone, $password) {

    try {


      //Uses bycrypt
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = $this->db->prepare("INSERT INTO hotspots.members( firstName, lastName, email, phone, password_hash ) VALUES (:firstName,:lastName, :email,:phone,:password)");
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
  public function login($postEmail, $postPassword) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $statement = $this->db->prepare('SELECT email,firstName, password_hash FROM hotspots.members WHERE email = ?');
      $statement->bindParam(1, $postEmail);
      $statement->execute();


      $data = $statement->fetch();
      global $name;
      $name = $data["firstName"];
      if (!empty($data)) {

        $db_hashed_pw = $data["password_hash"];
        if (password_verify($postPassword, $db_hashed_pw)) {
          echo $name;
          $_SESSION['logged_in'] = true;
          header("Location:  http://{$_SERVER['HTTP_HOST']}/index.php");
          exit;
        } else {
          echo "NAH UR NOT";
          echo '<span class="error"> Invalid password</span>';
        }
      } else {
        echo "INVALID EMAIL";
      }

      exit;

      //post password is raw password, password is the hashed version from the database
      $username = $postEmail;
      $password = password_hash($postPassword, PASSWORD_DEFAULT);

      //$qry = $this->db->prepare('SELECT * FROM hotspots.members WHERE email = :username and password_hash = :password');
      $qry = $this->db->prepare('SELECT * FROM hotspots.members');

      //$qry->execute(array(
      //  ':username' => $username,
      //  ':password' => $password
      //)); // run query
//      echo $username . " ". $password;
      $data = $qry->fetchAll(PDO::FETCH_ASSOC);
      echo "<br>before:<br>";
      echo print_r($data);
      echo "<br>after:<br>";
      EXIT;
      echo password_verify($postPassword, $password);
    }
  }


  /**
   * Allows users to safely logout
   * @param $id
   * @param $email
   */
  public function logout($id, $email) {

    $_Session = array();
    if ($_SESSION['userid'] = $id && $_SESSION['email'] = $email && $_SESSION['password'] = $password) {

      setcookie("userid", '', strtotime('-1 days'), '/');
      setcookie("email", '', strtotime('-1 days'), '/');
      setcookie("password", '', strtotime('-1 days'), '/');
    }

    $name = '';
    session_destroy();

    if (isset($_SESSION['userid']) || isset($_SESSION['email']) || isset($_SESSION['password'])) {
      $_SESSION = null;

      //TODO something to do if any are still set
    } else {
      echo 'Go back to the login page';
      exit();
    }

  }


}