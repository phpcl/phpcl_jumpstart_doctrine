<?php
// example using the DBAL query builder
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';
$connection    = $entityManager->getConnection();
$dbal_qb       = $connection->createQueryBuilder();

$dbal_qb->select('e.event_name','e.event_date','h.hotelName')
        ->from('events', 'e')
        ->innerJoin('e', 'hotels', 'h', 'e.hotels_id = h.id')
        ->where(
            $dbal_qb->expr()->andX(
                $dbal_qb->expr()->eq('h.country', '?'),
                $dbal_qb->expr()->eq('h.stateProvince', '?')
            )
        );

echo $dbal_qb . PHP_EOL;
$stmt = $connection->prepare($dbal_qb);
$stmt->execute(['AU','NSW']);
var_dump($stmt->fetchAll());
echo PHP_EOL;

