<?php

$host = "localhost";
$user = "root";
$pass = "ghbdtn";
$dbname = "shopping";

// Create connection
try {
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
  $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  // sql

  $sql = "INSERT INTO categories(name, status) VALUES('earth', 1), ('mars', 1), ('jupiter', 1)";

  $DBH->exec($sql);

  echo "Table updated successfully\n\n";
}
catch(PDOException $e) {
    echo "SQL, у нас проблемы.\n" . $e->getMessage();
    file_put_contents('PDOErrors.log', $e->getMessage(), FILE_APPEND);
}
finally {
    $DBH = null;
}
