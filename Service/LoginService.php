<?php

namespace Service {

    use mysqli;

    class LoginService {

        private static mysqli $connection;
        private static string $username;
        private static string $password;

        public static function initialize(mysqli $connection, string $username, string $password): void {
            self::$connection = $connection;
            self::$username = $username;
            self::$password = $password;

            LoginService::loginCheck();
        }

        public static function loginCheck(): bool {
            if (!isset(self::$connection, self::$username, self::$password)) {
                return false;
            }

            $data = mysqli_query(self::$connection, self::query(self::$username, self::$password));
            $result = mysqli_fetch_array($data);
            $cek = mysqli_num_rows($data);

            if ($cek > 0) {
                $_SESSION['username'] = self::$username;
                $_SESSION['id'] = $result['id'];
                header("location:../Login-Register/LoginForm.php?pesan=success&role={$result['role']}");
                return true;
            } else {
                header ("location:../Login-Register/LoginForm.php?pesan=gagal");
                return false;
            }
        }

        private static function query($username, $password): string {
            return "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        }
    }
}




