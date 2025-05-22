<?php
require_once "../pdo.php";

try {
    // Tạo bảng autos
    $sql = "CREATE TABLE IF NOT EXISTS autos (
        auto_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        make VARCHAR(128),
        year INTEGER,
        mileage INTEGER,
        PRIMARY KEY (auto_id)
    ) ENGINE=InnoDB CHARSET=utf8";
    $pdo->exec($sql);

    // Tạo bảng users nếu chưa có
    $sql_user = "CREATE TABLE IF NOT EXISTS users (
        user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(150) UNIQUE,
        password VARCHAR(100)
    ) ENGINE=InnoDB CHARSET=utf8";
    $pdo->exec($sql_user);

    // Chèn user mẫu
    $sql2 = "INSERT INTO users (name, email, password)
             VALUES ('umsi', 'umsi@umich.edu', 'php123')";
    $pdo->exec($sql2);

    echo "<h2>Tables created and user inserted successfully</h2>";

} catch (PDOException $e) {
    echo "<h2>Error occurred</h2>";
    echo "<pre>".$e->getMessage()."</pre>";
}
?>
