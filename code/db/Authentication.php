<?php

include(dirname(__DIR__).'/db/Connection.php');

class Authentication
{
    static private $instance = NULL;
    static private $identity = NULL;

    private $conn = null;


    static function getInstance() : Authentication
    {
        if (self::$instance == NULL) {
            self::$instance = new Authentication();
        }
        return self::$instance;
    }

    private function __construct()
    {
        if (isset($_SESSION['identity'])) {
            self::$identity = $_SESSION['identity'];
        }
        $this->conn = Connection::getPdoInstance();

    }

    public function login(string $username, string $password) : bool
    {

        try{
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username= :username and password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch();
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        if ($user) {
            $userDto = array('id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'create_time' => $user['created'],
                'Kredit' => $user['credit'],
                'admin' => $user['admin'],);
            $_SESSION['identity'] = $userDto;
            self::$identity = $userDto;
            return true;
        } else {
            return false;
        }
    }

    public function hasIdentity() : bool
    {
        if (self::$identity == NULL) {
            return false;
        }
        return true;
    }

    public function getIdentity()
    {
        if (self::$identity == NULL) {
            return false;
        }
        return self::$identity;
    }

    public function logout()
    {
        unset($_SESSION['identity']);
        $_SESSION = array();
        session_destroy();
        self::$identity = NULL;
    }
}