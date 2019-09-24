<?php
// uses query builder to produce info on a list of events
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Events;

// list of events
$list = [
    'TRE-LOV-YL-643',
    'GRE-BEN-XB-676',
    'CAT-LOV-WU-329',
    'DOG-IND-MG-583',
    'WIN-LOV-ZZ-132',
    'TRE-IND-AN-342'
];


// construct query
$qb = $entityManager->createQueryBuilder();
$qb->select(['e'])
   ->from(Events::class, 'e')
   ->orderBy('e.eventName')
   ->where($qb->expr()->in('e.eventKey', $list));

// display SQL to be generated
echo $qb . PHP_EOL;

// run query
$query = $qb->getQuery();
foreach ($query->getResult() as $item) {
    echo $item->display();
}
echo PHP_EOL;
