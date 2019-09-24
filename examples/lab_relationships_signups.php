<?php
// find events for a given hotel
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\{Users,Events,Hotels,Signup};
use Doctrine\ORM\Query\Expr\Join;

$qb = $entityManager->createQueryBuilder();
$qb->select('s','e')
   ->from(Signup::class, 's')
   ->innerJoin(Events::class, 'e')
   ->where($qb->expr()->like('e.eventDate', $qb->expr()->literal('2020%')));
$select = $qb->getQuery();

// this does a search by the 'id' field
foreach ($select->getResult() as $signup) {
    echo "--------------------------------------------\n";
    echo $signup->display();
}
echo "--------------------------------------------\n";
