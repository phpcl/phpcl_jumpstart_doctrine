<?php
// example using the DBAL query builder
// returns list of all users in Quebec, Canada
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';
$connection    = $entityManager->getConnection();
$dbal_qb       = $connection->createQueryBuilder();
$dbal_qb->select('u.last_name','u.first_name')
        ->from('users', 'u')
        ->orderBy('last_name', 'ASC')
        ->where(
            $dbal_qb->expr()->andX(
                $dbal_qb->expr()->eq('u.country', '?'),
                $dbal_qb->expr()->gte('u.stateProvince', '?')
        ));
echo $dbal_qb . PHP_EOL; // display the SQL generated
$stmt = $connection->prepare($dbal_qb);
$stmt->execute(['CA','QC']);
$results = $stmt->fetchAll();
// display results
printf("%20s\t%20s\n", 'Last Name','First Name');
printf("%20s\t%20s\n", str_repeat('-',20), str_repeat('-',20));
foreach ($results as $row) {
    printf("%20s\t%20s\n", $row['last_name'], $row['first_name']);
}
echo PHP_EOL;

