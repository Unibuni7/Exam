<?php
/**
 * Created by PhpStorm.
 * User: slmns
 * Date: 14-12-2017
 * Time: 10:13
 */

header("Access-Control-Allow-Origin: *");


// get the HTTP method, path and body of the request

$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));



include ('Config.php');



// To use the Api you have to say: http://localhost:apache-port/Exam/explore_california_api.php/table_name/id
// you can remove the id part if you want to see the whole table.

// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));

// create sql statement
if ($table == admin)  {
    $sql = "SELECT * from `$table`".($key ? "WHERE adminId = $key" : '');
} elseif ($table == explorers) {
    $sql = "SELECT * from `$table`".($key ? "WHERE explorerId = $key" : '');
} elseif ($table == packages) {
    $sql = "SELECT * from `$table`".($key ? "WHERE packageId = $key" : '');
} elseif ($table == states) {
    $sql = "SELECT * from `$table`".($key ? "WHERE stateId = $key" : '');
} elseif ($table == packages) {
    $sql = "SELECT * from `$table`".($key ? "WHERE packageId = $key" : '');
} elseif ($table == tours) {
    $sql = "SELECT * from `$table`".($key ? "WHERE tourId = $key" : '');
}

// execute

// excecute SQL statement
$result = $conn->query($sql);

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die($conn->error);
}

// encode resultset to json
if (!$key) echo '[';
while ($row = $result->fetch_assoc()) {
    echo ($count > 0 ? ',' : ''). json_encode($row);
    $count++;
}
if (!$key) echo "]";




// close mysql connection
$conn->close();



?>