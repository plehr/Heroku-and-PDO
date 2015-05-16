<?php
$dbstr = getenv('DATABASE_URL');
$dbstr = substr("$dbstr", 11);
$dbstrarruser = explode(":", $dbstr);
$dbstrarrport = explode("/", $dbstrarruser[2]);
$dbstrarrhost = explode("@", $dbstrarruser[1]);
$dbpassword = $dbstrarrhost[0];
$dbhost = $dbstrarrhost[1];
$dbport = $dbstrarrport[0];
$dbuser = $dbstrarruser[0];
$dbname = $dbstrarrport[1];
unset($dbstrarrport);
unset($dbstrarruser);
unset($dbstrarrhost);
unset($dbstr);
/*
echo $dbname . " - name<br>";
echo $dbhost . " - host<br>";
echo $dbport . " - port<br>";
echo $dbuser . " - user<br>";
echo $dbpassword . " - passwd<br>";
*/
$dsn = "pgsql:host=" . $dbhost . ";dbname=" . $dbname . ";user=" . $dbuser . ";port=" . $dbport . ";sslmode=require;password=" . $dbpassword . ";";
$db = new PDO($dsn);


$query = "SELECT * FROM table;";
$result = $db->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row["row1"] . "</td>";
    echo "<td>" . $row["row2"] . "</td>";
    echo "</tr>";
}
$result->closeCursor();

?>