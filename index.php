<?php

if (!isset($_COOKIE['logged']))
    header("Location: Login.php");  //It redirects the user to your login page


// We reference our css in the html head.
?>


    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="tablelayout.css">

</head>

<body>
<?php
/**
 * Created by PhpStorm.
 * User: Abdulmuaz alshaikhli
 * Date: 11-12-2017
 * Time: 16:52
 */

include ('Config.php');





?>

<h1> Tour table </h1>
<table id="TourTable">

    <tr id="tr1">

        <td onclick="sortTable(0)">   TourName    </td>
        <td onclick="sortTable(1)">   Description  </td>
        <td onclick="sortTable(2)">   Price  </td>
        <td onclick="sortTable(3)">   Keywords</td>
        <td onclick="sortTable(4)">   Image  </td>
        <td onclick="sortTable(0)">   PackageId    </td>
        <td onclick="sortTable(1)">   PackageTitle  </td>
        <td onclick="sortTable(2)">   PackageDescription  </td>
        <td onclick="sortTable(3)">   PackageGraphic </td>

    </tr>

    <?php


    // Choose content to acquire from specific table
    $sql = "SELECT tours.tourName, tours.description, tours.price, tours.keywords, tours.graphic,
 packages.packageId, packages.packageTitle, packages.packageDescription, packages.packageGraphic 
 FROM tours
 RIGHT JOIN packages ON tours.tourId = packages.packageId";

    // dont understand "Avanceret 2", but i have used jQuery in my chrome extension

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr id='tr2'>";

            echo "<td class='td1'>";
            echo $row[tourName];
            echo "</td>";
            echo "<td class='td1'>";
            echo $row[description];
            echo "</td>";
            echo "<td class='td1'>";
            echo $row[price];
            echo "</td>";
            echo "<td class='td1'>";
            echo $row[keywords];
            echo "</td>";
            echo "<td class='td1'><img src='images/$row[graphic]'>";
            echo "</td>";
            echo "<td class='td1'>";
            echo $row[packageId];
            echo "</td>";
            echo "<td class='td1'>";
            echo $row[packageTitle];
            echo "</td>";
            echo "<td class='td1'>";
            echo $row[packageDescription];
            echo "</td>";
            echo "<td class='td1'><img src='images/$row[packageGraphic]'>";
            echo "</img>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
    ?>

</table>


</body>
</html>
