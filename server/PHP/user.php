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

      if (!empty($data)) {
        $db_hashed_pw = $data["password_hash"];

        if (password_verify($postPassword, $db_hashed_pw)) {
          $_SESSION['logged_in'] = true;
          $_SESSION["username"] = $data["firstName"];

          header("Location:  http://{$_SERVER['HTTP_HOST']}/index.php");
          exit();
        } else {
          echo '<span class="error"> Invalid password</span>';
        }
      } else {
        echo "INVALID EMAIL";
      }
      exit();
    }
  }


  /**
   * Allows users to safely logout
   * @param $id
   * @param $email
   */
  // public function logout($id, $email) {
  //
  //   $_Session = array();
  //
  //   if(session_destroy()){
  //     header("Location: index.php");
  //     $msg = "Logged Out";
  //     echo '<span>' . $msg .'</span>';
  //   }
  //   if ($_SESSION['userid'] = $id && $_SESSION['email'] = $email && $_SESSION['password'] = $password) {
  //
  //     setcookie("userid", '', strtotime('-1 days'), '/');
  //     setcookie("email", '', strtotime('-1 days'), '/');
  //     setcookie("password", '', strtotime('-1 days'), '/');
  //   }
  //
  //
  //   if (isset($_SESSION['userid']) || isset($_SESSION['email']) || isset($_SESSION['password'])) {
  //     $_SESSION = null;
  //
  //   } else {
  //     echo 'Go back to the login page';
  //     exit();
  //   }
  // }


  public function logout($id, $email) {

    if (session_destroy()) {
      header("Location: index.php");
      $msg = "Logged Out";
      echo '<span>' . $msg . '</span>';
    }
    if ($_SESSION['userid'] = $id && $_SESSION['email'] = $email && $_SESSION['password'] = $password) {

      setcookie("userid", '', strtotime('-1 days'), '/');
      setcookie("email", '', strtotime('-1 days'), '/');
      setcookie("password", '', strtotime('-1 days'), '/');
    }


    if (isset($_SESSION['userid']) || isset($_SESSION['email']) || isset($_SESSION['password'])) {
      $_SESSION = null;

    } else {
      echo 'Go back to the login page';
      exit();
    }

  }
}
