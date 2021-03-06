<?php

/**
 * This class is used to instantiate a user so that when enever an action of user is needed, this class is called.
 */
class User {
  private $email;
  private $authed = false;
  private $firstName;
  private $lastName;
  private $phone;

  //Constructor used to build an object which takes a pdo which can be usesd throughout the entire class
  function __construct($email) {
    $this->email = $email;
  }


  /**
   *
   * A function which allows users to enter their details and register into the systems database
   * @param $firstName
   * @param $lastName
   * @param $email
   * @param $phone
   * @param $password
   * @return mixed
   */
  public static function register($firstName, $lastName, $email, $phone, $password) {

    global $db;

    try {
      //Uses bycrypt to hash the password
      $password_hash = crypt($password, 'ripemd160');
      // The sql statement being prepared with whichever pdo object is being inserted
      $sql = $db->prepare("INSERT INTO n8598177.members( firstName, lastName, email, phone, password_hash ) VALUES (:firstName,:lastName, :email,:phone,:password)");
      if (!$sql) {
        die($db->errorInfo());
      }
//      Inside of the array each individual argument is inserted into the specfic index value before the command is executed
      $sql->execute(array(
        ":firstName" => $firstName,
        ":lastName" => $lastName,
        ":email" => $email,
        ":phone" => $phone,
        ":password" => $password_hash
      ));

      $user = new User($email);
      $user->authed = true;

      //Redirect upon success
      header("Location:/n8598177/index.php");

    } catch (PDOException $e) {
      // if there is an error it is caught and returned
      echo("Error! :" . $e->getMessage() . "</br>");
      return false;
    }
  }

  public function isAuthed() {
    return $this->authed;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  /**
   * Allows users to login
   * @param $postEmail
   * @param $postPassword
   */
  public function login($postPassword) {

    global $db;
    $statement = $db->prepare('SELECT email,firstName, password_hash FROM n8598177.members WHERE email = ?');
    $statement->bindParam(1, $this->email);
    $statement->execute();

    $data = $statement->fetch();

    $toCompare = crypt($postPassword, 'ripemd160');

    if (!empty($data)) {
      if ($data["password_hash"] == $toCompare) {
        $_SESSION['email'] = $data['email'];

        $this->authed = true;
        header("Location:/n8598177/index.php");
      }
    }
  }

  public static function fromSession() {
    global $db;
    // $_SESSION['email'] implies logged in
    $statement = $db->prepare('SELECT email,firstName, lastName, password_hash, phone FROM n8598177.members WHERE email = ?');
    $statement->bindParam(1, $_SESSION['email']);
    $statement->execute();

    $data = $statement->fetch();
    $user = new User($_SESSION['email']);
    $user->firstName = $data['firstName'];
    $user->lastName = $data['lastName'];
    $user->phone = $data['phone'];

    return $user;
  }


  public function logout() {
    // If you have the ability to session destroy, do it
    if (session_destroy()) {
      // Changes the location of the now logged out user
      header("Location: /index.php");
      header("Refresh:0");
      $msg = "Logged Out";
      echo '<span>' . $msg . '</span>';
    }
    unset($this);
  }
}
