<?php
// uses DBAL to perform an insert
$em   = require_once __DIR__ . '/../config/bootstrap.php';
$conn = $em->getConnection();
$hId  = rand(1,95);
$key  = 'UND-BNK-LOV-801';
$date = sprintf('2020-%02d-%02d %02d:00:00', rand(1,12), rand(1,28), rand(8,20));

$data = [
  'event_key'  => $key,
  'event_name' => 'Underground Bunker Lovers',
  'event_date' => $date,
  'hotel_id'   => $hId
];

// use connection to insert
$conn->insert('events', $data);

// confirm insert
$stmt = $conn->query('SELECT * FROM events WHERE event_key = ' . $conn->quote($key));
var_dump($stmt->fetchAll());
echo PHP_EOL;
