<?php
class Query {
  public $connection;
  public function __construct ($db) {
    $this->connection = $db;
  }
  public function hello()
  {
    return 'hello world';
  }
  /**
   * to register user
   * @param  [array] $array [its a $_POST array]
   * @return [string]        [it will return success or failure message];
   */
  public function register_user ($array) {
    $name = $array['name'];
    $email = $array['email'];
    $password = $array['password'];
    $sql = "INSERT INTO users (name, email, password) VALUES(:name, :email, :password)";
    $statement = $this->connection->prepare($sql);
    if ($statement->execute([
      ':name' => $name,
      ':email' => $email,
      ':password' => $password
    ])) {
      return 'insert successfully';
    } else {
      return 'data didn\'t inserted';
    }
  }

  /**
   * to check password with db password. and if they both are same user will be loggedin
   * @param  [arry] $array [its a $_POST]
   * @return [void]        [it will redirect to the dashboard]
   * @return [string]        [message]
   */
  public function check_login($array) {
    $email = $array['email'];
    $password = $array['password'];
    $sql = 'SELECT * FROM users WHERE email=:email';
    $statement = $this->connection->prepare($sql);
    $statement->execute([
      ':email' => $email
    ]);
    if ($statement->rowCount()) {
      $user = $statement->fetch(PDO::FETCH_OBJ);
      return $user->password === $password ? 'login' : 'wrong';
    } else {
      return 'not-registered';
    }
  }


}