<?php
    session_start();

    include_once './connect.php';

    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $start_date = str_replace('/', '-', $data['start']);
    $start_date_conv = date("Y-m-d H:i:s", strtotime($start_date));

    $end_date = str_replace('/', '-', $data['end']);
    $end_date_conv = date("Y-m-d H:i:s", strtotime($end_date));

    $query_event = "INSERT INTO creneaux (date, start, end) VALUES (:date, :start, :end)";

    $insert_event = $conn->prepare($query_event);
    $insert_event->bindParam(':date', $start_date_conv);
    $insert_event->bindParam(':start', $start_date_conv);
    $insert_event->bindParam(':end', $end_date_conv);

    if ($insert_event->execute()) {
        $response = ['status' => true, 'message' => '<div class="alert alert-success" role="alert">Event successfully registered!</div>'];
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Event successfully registered!</div>';
    } else {
        $response = ['status' => false, 'message' => '<div class="alert alert-danger" role="alert">Error: Event was not registered successfully!</div>'];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>
