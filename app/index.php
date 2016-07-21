<?php

require_once('common.php');

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

?>
<html>
<head><title>Really Insecure PHP Page</title></head>
<body style="padding:50px">

<h1>Really Insecure PHP Page :(</h1>

<form method="post">
    <label for="username">Enter your username</label>
    <input name="username" type="text" value="<?=$username?>"/>
    <br/>
    <label for="password">Enter your password</label>
    <input name="password" type="text" value="<?=$password?>"/>
    <br/>
    <p>Try putting <tt style="background-color:#ccc;">anything') or true; -- </tt> in the password box (including the trailing space)...</p>
    <input type="submit"/>
</form>

<?php

if ($username) {

    $sql = "SELECT * FROM users
        WHERE username = '$username'
        AND password = MD5('$password')
    ";

    echo '<div style="background-color:yellow; margin:20px 0; padding:10px"><pre>'.$sql.'</pre></div>';

    $result = query($sql);

    echo '<h2>Result</h2><pre>';
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            var_dump($row);
        }
        mysqli_free_result($result);
    }
    echo '</pre>';
}

?>

</body>
</html>