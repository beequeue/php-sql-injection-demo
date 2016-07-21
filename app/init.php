<?php

require_once('common.php');

// Set up our users table
query('DROP TABLE users');

query('
    CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password CHAR(32) NOT NULL
    )
');

echo 'Created users table<br/>';

$alicePassword = md5('liverpool');
$bobPassword = md5('supersecret12345');
$carolPassword = md5('4dSei;e0?sdf11eur_');

$sql = "INSERT INTO users (username, password) VALUES
    ('alice','$alicePassword'),
    ('bob', '$bobPassword'),
    ('carol', '$carolPassword')
";

query($sql);

echo 'Added Alice, Bob and Carol<br/>... ' . $sql;