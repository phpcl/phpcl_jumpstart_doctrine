<?php
// uses DBAL to perform an insert
$em    = require_once __DIR__ . '/../config/bootstrap.php';
$conn  = $em->getConnection();
$date  = sprintf('2020-%02d-%02d %02d:00:00', rand(1,12), rand(1,28), rand(8,20));
$hId   = rand(1,95);
$key   = 'NIN-NIN-ERS-' . rand(100,999);

$data = [
  'event_key'  => $key,
  'event_name' => 'Ninety Nine Percenters',
  'event_date' => $date1,
  'hotel_id'   => $hId
];

// use connection to insert
$conn->insert('events', $data);

// confirm insert
$sql = 'SELECT * FROM events WHERE event_key = ' . $conn->quote($key);
$stmt = $conn->query($sql);
var_dump($stmt->fetchAll());
echo PHP_EOL;

// use DBAL to perform an update
$identify = ['event_key' => $key];
$data = [
  'event_date' => $date2,
];
$conn->update('events', $data, $identify);

// confirm update
$sql = 'SELECT * FROM events WHERE event_key = ' . $conn->quote($key);
$stmt = $conn->query($sql);
var_dump($stmt->fetchAll());
echo PHP_EOL;
