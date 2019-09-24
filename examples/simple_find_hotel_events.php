<?php
// find events for a given hotel
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\{Events,Hotels};
use Doctrine\ORM\Query\Expr\Join;

$qb = $entityManager->createQueryBuilder();
$qb->select('e','h')
   ->from(Events::class, 'e')
   ->innerJoin(Hotels::class, 'h')
   ->where($qb->expr()->eq('h.country', '?0'));
$qb->setParameters(['CA']);
$select = $qb->getQuery();

// this does a search by the 'id' field
foreach ($select->getResult() as $event) {
    echo "--------------------------------------------\n";
    echo $event->display();
}
echo "--------------------------------------------\n";
