<?php
/**
 * Created by PhpStorm.
 * User: slmns
 * Date: 14-12-2017
 * Time: 09:48
 */

include ('Config.php');


if (isset($_COOKIE['logged']))
    header("index.php");

// Choose content to acquire from specific table
$sql = "SELECT admin.userName, admin.password FROM admin";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($_POST['submit']) {
    //get username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // the password is explorerone and the password is password.

    if ($username==$row[userName] && $password==$row[password]){
        setcookie('logged','1');
        header("Location: Index.php"); //Redirect to Index page
    }
    else echo "Wrong combinaton!";
}

?>

<html>
<body>
<form action="Login.php" method="post">
    <label>Username</label><input type="text" name="username" /><br />
    <label>Password</label><input type="password" name="password" /><br />
    <input type="submit" name="submit" value="Login" />
</form>
</body>
</html>

