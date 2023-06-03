<?php
namespace Helper {

    use mysqli;

    ConnectionUtil::initialize("localhost", "root", "pwduas123", "mindfulspace");

    class ConnectionUtil {

        private static string $db_host;
        private static string $db_user;
        private static string $db_pass;
        private static string $db_name;

        public static function initialize(string $db_host, string $db_user, string $db_pass, string $db_name): void {
            self::$db_host = $db_host;
            self::$db_user = $db_user;
            self::$db_pass = $db_pass;
            self::$db_name = $db_name;
        }

        public static function connect(): mysqli {

            $connect = mysqli_connect(self::$db_host, self::$db_user, self::$db_pass, self::$db_name);

            if (mysqli_connect_error() || !isset(self::$db_host, self::$db_pass, self::$db_user, self::$db_name)) {
                exit("Koneksi gagal: " . mysqli_connect_error());
            }

            return $connect;
        }

    }

}

