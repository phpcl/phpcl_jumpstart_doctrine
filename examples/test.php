<?php
// retrieve EntityManager
$em   = require_once __DIR__ . '/../config/bootstrap.php';
// grap Doctrine\DBAL\Connection instance
$conn = $em->getConnection();
// execute SQL
$sql  = 'SELECT `propertyKey`, `hotelName` '
      . 'FROM `hotels` '
      . 'ORDER BY `hotelName` ASC LIMIT 10';
$results = $conn->fetchAll($sql);
// display results
printf("%8s\t%s\n", 'Key','Hotel Name');
printf("%8s\t%s\n", '--------','----------------');
foreach ($results as $row)
    printf("%8s\t%s\n", $row['propertyKey'], $row['hotelName']);

