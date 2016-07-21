<?php

// Connect to MySQL
$link = mysqli_connect(
    getenv('DB_PORT_3306_TCP_ADDR'),
    getenv('DB_ENV_MYSQL_USER'),
    getenv('DB_ENV_MYSQL_PASSWORD'),
    'myapp'
);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

function query($sql)
{
    global $link;
    return mysqli_query($link, $sql);
}