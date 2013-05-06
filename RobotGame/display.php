<?php
    // Send variables for the MySQL database class.
    $database = mysql_connect('localhost', 'lssclanu_anthony', 'residentevil4') or die('Could not connect: ' . mysql_error());
    mysql_select_db('lssclanu_anthonybarranco') or die('Could not select database');
 
    $query = "SELECT * FROM `highscores` ORDER by `score` DESC LIMIT 5";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
 
    $num_results = mysql_num_rows($result);  
	echo "       High Scores \n";
    for($i = 0; $i < $num_results; $i++)
    {
         $row = mysql_fetch_array($result);
		 $p = $row['player'];
		 $s = $row['score'];
		 echo sprintf("%-15s[ %2.2s ] seconds left\n", $p, $s);
        
    }
	
?>