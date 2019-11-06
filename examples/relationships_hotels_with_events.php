<?php
// uses repository to displays hotels holding events
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';
use Application\Entity\Events;
use Doctrine\ORM\EntityRepository;
$factory  = $entityManager->getMetadataFactory();
$metaData = $factory->getMetadataFor(Events::class);
$repository = new EntityRepository($entityManager, $metaData);

try {
    // display results
    echo "--------------------------------------------------\n";
    printf("%35s | %s\n", 'EVENT', 'HOTEL');
    echo "--------------------------------------------------\n";
    $list = $repository->findAll();
    foreach ($list as $event) {
        $eventName = $event->getEventName();
        $hotelName = $event->getHotel()->getHotelName();
        printf("%35s | %s\n", $eventName, $hotelName);
    }

} catch (Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo $t->getTraceAsString() . PHP_EOL;
}
echo PHP_EOL;
