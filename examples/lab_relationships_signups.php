<?php
// find events for a given hotel
$em = require_once __DIR__ . '/../config/bootstrap.php';

use Application\Entity\{Users,Events,Hotels,Signup};
use Doctrine\ORM\EntityRepository;
$factory = $em->getMetadataFactory();
$meta    = $factory->getMetadataFor(Signup::class);
$repo    = new EntityRepository($em, $meta);
$list    = $repo->findAll();
// inside the loop, only display events for the year 2020
$year    = '2020';
foreach ($list as $signup) {
    if (strpos($signup->getEvent()->getEventDate(), $year)) {
        echo "--------------------------------------------\n";
        echo $signup->display();
    }
}
echo "--------------------------------------------\n";
