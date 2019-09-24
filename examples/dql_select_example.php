<?php
// executes a DQL statement to get a list of hotels in Victoria, Australia
$em = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\Hotels;

try {
    // construct query
    $dql = 'SELECT h FROM ' . Hotels::class . ' AS h WHERE h.locality = :loc AND h.country = :cty';
    // run query
    $query = $em->createQuery($dql);
    $query->setParameters([':loc' => 'Quebec', ':cty' => 'CA']);
    foreach ($query->getResult() as $hotel) {
        echo $hotel->display();
    }
} catch (Throwable $t) {
    echo $t->getMessage();
}
echo PHP_EOL;
