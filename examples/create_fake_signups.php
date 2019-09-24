<?php
// create events and assign to a hotel
$em = require_once __DIR__ . '/../config/bootstrap.php';
use Application\Entity\{Events,Users,Signup};

// init vars
$max = 1000;     // # signups

// get list of event IDs
$conn = $em->getConnection();
$stmt = $conn->query('SELECT id FROM events');
$eventIdList = array_column($stmt->fetchAll(), 'id');

// get list of user IDs
$stmt = $conn->query('SELECT id FROM users');
$userIdList = array_column($stmt->fetchAll(), 'id');

try {

    // truncate events table
    $conn->exec('DELETE FROM signup');

    // loop through and create events
    echo "\nCreating Signups: ";
    for ($x = 0; $x < $max; $x++) {
        // lookup event
        $eventId = $eventIdList[array_rand($eventIdList)];
        $event = $em->find(Events::class, $eventId);
        // lookup user
        $userId = $userIdList[array_rand($userIdList)];
        $user = $em->find(Users::class, $userId);
        // create Signup
        $signup = new Signup();
        $signup->setEvent($event);
        $signup->setUser($user);
        // store
        $em->persist($signup);
        echo '.';
    }
    echo PHP_EOL;

    // flush work buffer
    $em->flush();

    // create SELECT query
    $qb = $em->createQueryBuilder();
    $qb->select('s')
       ->from(Signup::class, 's');

    // display SQL to be generated
    echo $qb . PHP_EOL;

    // run query
    $select = $qb->getQuery();
    foreach ($select->getResult() as $signup) echo $signup->display();

} catch (Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo $t->getTraceAsString() . PHP_EOL;
}
echo PHP_EOL;
