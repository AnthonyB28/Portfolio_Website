 <?php
/****************
* File: displaytables.php
* Date: 1.13.2009
* Author: design1online.com, LLC
* Purpose: display all table structure for a specific database
****************/

//connection variables
$host = "localhost";
$database = "lssclanu_anthonybarranco";
$user = "lssclanu_anthony";
$pass = "residentevil4";

//connection to the database
mysql_connect($host, $user, $pass)
or die ('cannot connect to the database: ' . mysql_error());

//select the database
mysql_select_db($database)
or die ('cannot select database: ' . mysql_error());

//loop to show all the tables and fields
$loop = mysql_query("SHOW tables FROM $database")
or die ('cannot select tables');

while($table = mysql_fetch_array($loop))
{

    echo "
        <table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" width=\"20%\">
            <tr bgcolor=\"#666666\">
                <td colspan=\"2\" align=\"center\"><b><font color=\"#FFFFFF\">" . $table[0] . "</font></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Score</td>
            </tr>";

    $i = 0; //row counter
    $row = mysql_query("SELECT * FROM " . $table[0])
    or die ('cannot select table fields');
    while ($col = mysql_fetch_array($row))
    {
        echo "<tr";

        if ($i % 2 == 0)
            echo " bgcolor=\"#CCCCCC\"";

        echo ">
            <td>" . $col['player'] . "</td>
            <td>" . $col['score'] . "</td>
        </tr>";

        $i++;
    } //end row loop

    echo "</table><br/><br/>";
} //end table loop

?>