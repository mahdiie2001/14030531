<?php
class User {
    private $email;
    private $password;
    private $fullName;
    private $csvFile = 'users.csv';

    public function __construct($email, $password, $fullName) {
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->fullName = $fullName;
    }

    public function register() {
        $file = fopen($this->csvFile, 'a');
        fputcsv($file, [$this->email, $this->password, $this->fullName]);
        fclose($file);
    }

    public static function login($email, $password) {
        $file = fopen('users.csv', 'r');
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($data[0] == $email && password_verify($password, $data[1])) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['fullName'] = $data[2];
                return true;
            }
        }
        fclose($file);
        return false;
    }

    public static function logout() {
        session_start();
        session_destroy();
    }
}
