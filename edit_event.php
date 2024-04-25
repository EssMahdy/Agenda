<?php
    session_start();

    include_once './connect.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $data_start = str_replace('/', '-', $dados['start']);
    $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

    $data_end = str_replace('/', '-', $dados['end']);
    $data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

    $query_event = "UPDATE creneaux SET date=:date, start=:start, end=:end WHERE id=:id";

    $update_event = $conn->prepare($query_event);
    $update_event->bindParam(':date', $data_start_conv);
    $update_event->bindParam(':start', $data_start_conv);
    $update_event->bindParam(':end', $data_end_conv);
    $update_event->bindParam(':id', $dados['id']);

    if ($update_event->execute()) {
        $retorna = ['sit' => true, 'message' => '<div class="alert alert-success" role="alert">Event successfully updated!</div>'];
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Event successfully updated!</div>';
    } else {
        $retorna = ['sit' => false, 'message' => '<div class="alert alert-danger" role="alert">Error: Event was not updated!</div>'];
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);
?>

