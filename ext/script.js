$(document).ready(function () {
    // this is the url for my json i could have chosen another table or multiple tables if i wanted.
    var url = "http://localhost:8888/Exam/explore_california_api.php/states";

    // the $ symbol is for jQuery not for php variable.
    $.get(url,function (data) {
        // parse JSON data
        var states = JSON.parse(data);
        // create a table with JSON
        var table = "<table class='table'>";
        table += "<thead>";
        table += "<tr>";
        table += "<th> stateId </th>";
        table += "<th> stateName </th>";
        table += "</tr>";
        table += "</thead>";
        // <> stand for html tags.


        table += "<tbody>";

        // a for loop, så we run through the whole table.
        for (var i = 0; i < states.length; i++){
            table += "<tr>";
            table += "<td>" + states[i].stateId +"</td>";
            table += "<td>" + states[i].stateName +"</td>";
            table += "<tr>";

        }
        table += "</tbody>";
        table += "</table>";

        // append table to html DOM manipulation
        $("#table").append(table);

        // to use this chrome extension you should first go to your chrome browser and click on extensions.
        // Then click on "load unpacked extension" and find this folder.

    });

});