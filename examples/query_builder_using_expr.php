<?php
// uses query builder to produce a list of female users who use authenticate using Facebook
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Users;

try {
    // construct query
    $qb = $entityManager->createQueryBuilder();
    $qb->select(['u'])
       ->from(Users::class, 'u')
       ->where(
           $qb->expr()->andX(
                $qb->expr()->like('u.oauth2', ':oauth2'),
                $qb->expr()->eq('u.gender', ':gender')
            )
        );

    // display SQL to be generated
    echo $qb . PHP_EOL;

    // run query
    $qb->setParameters([':oauth2' => '%facebook%', ':gender' => 'F']);
    $query = $qb->getQuery();
    foreach ($query->getResult() as $user) {
        echo "\nUSER INFO:\n";
        echo $user->display();
    }
} catch (Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo $t->getTraceAsString() . PHP_EOL;
}
echo PHP_EOL;
