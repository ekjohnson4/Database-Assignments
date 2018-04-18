<?php
    $link = mysql_connect("cs-sql2014.ua-net.ua.edu", "jsburgin", "11484207");
    if (!$link) {
        die('Not connected: '.mysql_error());
    }
    mysql_select_db('jsburgin') or die('Could not select database...');
    $query1 = "select * from artist";
    $query2 = "select * from record";
    $query3 = "select * from song";
    $query4 = "select * from artist_record";
    $query5 = "select * from artist_song";
    $query6 = "select * from record_song";
    $query7 = "select * from employee";
    $query8 = "select * from purchase";
    $query9 = "select * from purchase_record";
    $query10 = "select * from exchange";
    $query11 = "select * from timesheet";
    $result1 = mysql_query($query1);
    $result2 = mysql_query($query2);
    $result3 = mysql_query($query3);
    $result4 = mysql_query($query4);
    $result5 = mysql_query($query5);
    $result6 = mysql_query($query6);
    $result7 = mysql_query($query7);
    $result8 = mysql_query($query8);
    $result9 = mysql_query($query9);
    $result10 = mysql_query($query10);
    $result11 = mysql_query($query11);
    if (!$result1 || !$result2 || !$result3 || !$result4 || !$result5
       || !$result6 || !$result7 || !$result8 || $result9 || !$result10
       || !$result11) {
        die('SQL error: '.mysql_error());
    }
    function createHeaders($result) {
        $header = mysql_fetch_assoc($result);
        echo "<tr>";
        foreach ($header as $cname => $cvalue) {
            echo "<td><strong>" . $cname . "</strong></td>";
        }
        echo "</tr>";
        return $header;
    }
    function fillTable($resume, $result) {
        echo "<tr>";
        foreach ($resume as $cname => $cvalue) {
            echo "<td>" . $cvalue . "</td>";
        }
        echo "</tr>";
        while($row = mysql_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $cname => $cvalue) {
                echo "<td>" . $cvalue . "</td>";
            }
            echo "</tr>";
        }
    }
    echo "<table border='1'>";
    $resume = createHeaders($result1);
    fillTable($resume, $result1);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> ARTIST </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result2);
    fillTable($resume, $result2);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> RECORD </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result3);
    fillTable($resume, $result3);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> SONG </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result4);
    fillTable($resume, $result4);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> ARTIST_RECORD </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result5);
    fillTable($resume, $result5);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> ARTIST_SONG </h2>";
    $resume = createHeaders($result6);
    fillTable($resume, $result6);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> RECORD_SONG </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result7);
    fillTable($resume, $result7);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> EMPLOYEE </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result8);
    fillTable($resume, $result8);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> PURCHASE </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result9);
    fillTable($resume, $result9);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> PURCHASE_RECORD </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result10);
    fillTable($resume, $result10);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> EXCHANGE </h2>";
    echo "<table border='1'>";
    $resume = createHeaders($result11);
    fillTable($resume, $result11);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> TIMESHEET </h2>";
    echo "<table border='1'>";
    mysql_free_result($result1);
    mysql_free_result($result2);
    mysql_free_result($result3);
    mysql_free_result($result4);
    mysql_free_result($result5);
    mysql_free_result($result6);
    mysql_free_result($result7);
    mysql_free_result($result8);
    mysql_free_result($result9);
    mysql_free_result($result10);
    mysql_free_result($result11);
    mysql_close($link);
?>
