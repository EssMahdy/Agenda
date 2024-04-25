<?php

include 'connect.php';

$query_events = "SELECT date, start, end FROM creneaux";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$events = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $date = $row_events['date'];
    $start = $row_events['start'];
    $end = $row_events['end'];
    
    $events[] = [
        'date' => $date, 
        'start' => $start, 
        'end' => $end, 
        ];
}

echo json_encode($events);