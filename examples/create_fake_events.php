<?php
// create events and assign to a hotel
$em = require_once __DIR__ . '/../config/bootstrap.php';
use Application\Entity\{Events,Hotels};

// init vars
$max = 100;     // # events

//*** build Event *********************************************************
/*
"Event" : {
    'eventKey'    : <char(16>,
    'event_name'  : <varchar(128)>,
    'propertyKey' : <char(16)>,
    'event_date'  : <char(16)>
}
*/
function makeEvent()
{
    $event   = [];
    $alpha   = range('A','Z');
    $events1 = ['Dog','Cat','Horticulture','Tree','Flower','Conservation','Green Energy','Solar Energy','Wind Power'];
    $events2 = ['Lovers','Promotion','Industry','Benefit','Research'];
    $events3 = ['Conference','Event','Showcase','Symposium','Show','Summit','Meeting','Seminar'];
    $parts = [
        $events1[array_rand($events1)],
        $events2[array_rand($events2)],
        $events3[array_rand($events3)]
    ];
    $key = strtoupper(substr($parts[0], 0, 3))
         . '-'
         . strtoupper(substr($parts[1], 0, 3))
         . '-'
         . $alpha[array_rand($alpha)]
         . $alpha[array_rand($alpha)]
         . '-'
         . rand(100,999);
    return [
        'key' => strtoupper($key),
        'name' => implode(' ', $parts),
        'date' => randDate(TRUE, 2)
    ];
}
function randDate($future = TRUE, $distance = 5)
{
    if ($future) {
        $year = date('Y') + rand(1, $distance);
    } else {
        $year = date('Y') - rand(1, $distance);
    }
    $month = rand(1,12);
    switch ($month) {
        case 2 :
            $day = rand(1,28);
            break;
        case  4 :
        case  6 :
        case  9 :
        case 11 :
            $day = rand(1,30);
            break;
        default :
            $day = rand(1,31);
            break;
    }
    return new DateTime(sprintf('%4d-%02d-%02d', $year, $month, $day));
}

// get list of hotel IDs
$conn = $em->getConnection();
$stmt = $conn->query('SELECT id FROM hotels');
$hotelIdList = array_column($stmt->fetchAll(), 'id');

try {

    // truncate events table
    $conn->exec('DELETE FROM events');

    // loop through and create events
    for ($x = 0; $x < $max; $x++) {
        // generate random event data
        $data = makeEvent();
        // lookup hotel
        $hotelId = $hotelIdList[array_rand($hotelIdList)];
        $hotel = $em->find(Hotels::class, $hotelId);
        // create Event
        $event = new Events();
        $event->setEventKey($data['key']);
        $event->setEventName($data['name']);
        $event->setEventDate($data['date']);
        $event->setHotel($hotel);
        // store
        $em->persist($event);
        echo "\nCreated Event: " . $data['name'];
    }
    echo PHP_EOL;

    // flush work buffer
    $em->flush();

    // create SELECT query
    $qb = $em->createQueryBuilder();
    $qb->select('e')
       ->from(Events::class, 'e');

    // display SQL to be generated
    echo $qb . PHP_EOL;

    // run query
    $select = $qb->getQuery();
    echo "\nEVENT INFO: \n";
    foreach ($select->getResult() as $event) echo $event->display();

} catch (Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo $t->getTraceAsString() . PHP_EOL;
}
echo PHP_EOL;
