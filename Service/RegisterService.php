<?php

namespace Service {

    use mysqli;

    class RegisterService {

        private static string $username;
        private static string $password;
        private static mysqli $connection;

        public static function initialize(mysqli $connection ,string $username, string $password): void
        {
            self::$username = $username;
            self::$password = $password;
            self::$connection = $connection;

            RegisterService::registerCheck();
        }

        public static function registerCheck(): bool
        {
            if (!isset(self::$password, self::$connection, self::$username)) {
                return false;
            }

            mysqli_query(self::$connection, self::setQuery(self::$username, self::$password));

            return true;
        }

        public static function setQuery(string $username, string $password): string {
            return "INSERT INTO users VALUES(DEFAULT, '$username', '$password', 'user')";
        }
    }
}