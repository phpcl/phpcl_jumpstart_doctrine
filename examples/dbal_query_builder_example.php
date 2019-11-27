<?php
// example using the DBAL query builder
// returns list of all events scheduled for the year 2021 in Australia
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';
$connection    = $entityManager->getConnection();
$dbal_qb       = $connection->createQueryBuilder();
$dbal_qb->select('e.event_name','e.event_date','h.hotelName')
        ->from('events', 'e')
        ->innerJoin('e', 'hotels', 'h', 'e.hotel_id = h.id')
        ->where(
            $dbal_qb->expr()->andX(
                $dbal_qb->expr()->eq('h.country', '?'),
                $dbal_qb->expr()->gte('e.event_date', '?')
        ));
echo $dbal_qb . PHP_EOL; // display the SQL generated
$stmt = $connection->prepare($dbal_qb);
$stmt->execute(['AU','2021-01-01']);
var_dump($stmt->fetchAll());
echo PHP_EOL;

