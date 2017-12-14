$(document).ready(function () {
    var url = "http://localhost:8888/Exam/explore_california_api.php/states";

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


        table += "<tbody>";

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

    });

});