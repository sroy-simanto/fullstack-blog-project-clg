<?php 

    define("DB_HOST", 'localhost');
    define("DB_USERNAME", 'root');
    define("DB_PASSWORD", '');
    define("DB_NAME", 'tinygone_blog');

    try {
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "success";
    }catch(PDOException $e) {
        die("ERROR: Could not connect. " . $e -> getMessage());
    }

?>