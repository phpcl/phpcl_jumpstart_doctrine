<?php
// returns list of all users in Quebec, Canada
// retrieve EntityManager
$em   = require_once __DIR__ . '/../config/bootstrap.php';
// grab Doctrine\DBAL\Connection instance
$conn = $em->getConnection();
// execute SQL
$sql  = 'SELECT `first_name`, `last_name` '
      . 'FROM `users` '
      . "WHERE `stateProvince` = 'QC' AND `country` = 'CA' "
      . 'ORDER BY `last_name`';
echo $sql . PHP_EOL; // display the SQL generated
$results = $conn->fetchAll($sql);
// display results
printf("%20s\t%20s\n", 'Last Name','First Name');
printf("%20s\t%20s\n", str_repeat('-',20), str_repeat('-',20));
foreach ($results as $row) {
    printf("%20s\t%20s\n", $row['last_name'], $row['first_name']);
}
echo PHP_EOL;
