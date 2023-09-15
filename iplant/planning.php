<?php

function getPlanning($id=0): void {
    global $conn;
    $query = "SELECT * FROM planning";
    if($id != 0) {
        $query .= " WHERE id=".$id." LIMIT 1";
    }
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function addPlanning(): void {
    global $conn;
    $id_plant = $_POST['id_plant'];
    $id_event = $_POST['id_event'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $repeated = $_POST['repeated'];

    if($id_plant != null || $id_event != null || $date != null || $hour != null || $repeated != null) {
        $query="INSERT INTO planning (id_plant, id_event, moisture, hour, repeated) VALUES ('".$id_plant."', '".$id_event."', '".$moisture."', '".$hour."', '".$repeated."')";

        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Planning ajoutee avec succes.'
            );
        } else {
            $response=array(
                'status' => 0,
                'status_message' =>'ERREUR!.'. mysqli_error($conn)
            );
        }
    } else {
        $response=array(
            'status' => 0,
            'status_message' =>'ERREUR! valeurs renseignées erronées'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function updatePlanning($id): void {
    global $conn;
    $_PUT = array();
    parse_str(file_get_contents('php://input'), $_PUT);

    $id_plant = $_POST['id_plant'];
    $id_event = $_POST['id_event'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $repeated = $_POST['repeate'];

    if($id_plant != null || $id_event != null || $date != null || $hour != null || $repeated != null) {
        $query="UPDATE planning SET" .
            "id_plant='".$id_plant. "', id_event='".$id_event. "', date='".$date. "', hour='".$hour. "', repeated='".$repeated.
            "' WHERE id=".$id;

        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Planning mise a jour avec succes.'
            );
        } else {
            $response=array(
                'status' => 0,
                'status_message' =>'Planning de la mise a jour de l\'user. '. mysqli_error($conn)
            );
        }
    } else {
        $response=array(
            'status' => 0,
            'status_message' =>'Echec de la mise a jour du planning. '
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deletePlanning($id): void {
    global $conn;
    $query = "DELETE FROM planning WHERE id=".$id;
    if(mysqli_query($conn, $query)) {
        $response=array(
            'status' => 1,
            'status_message' =>'planning supprimé avec succes.'
        );
    }
    else {
        $response=array(
            'status' => 0,
            'status_message' =>'La suppression du planning a echouée. '. mysqli_error($conn)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}