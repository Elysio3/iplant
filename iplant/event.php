<?php

function getEvent($id=0): void {
    global $conn;
    $query = "SELECT * FROM event";
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

function addEvent(): void {
    global $conn;
    $name = $_POST['name'];

    if($name != null) {
        $query="INSERT INTO user (name) VALUES ('".$name."')";
        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Event ajoutee avec succes.'
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

function updateEvent($id): void {
    global $conn;
    $_PUT = array();
    parse_str(file_get_contents('php://input'), $_PUT);

    $name = $_PUT['name'];

    if($name != null) {
        $query="UPDATE event SET name='".$name. "' WHERE id=".$id;

        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Event mise a jour avec succes.'
            );
        } else {
            $response=array(
                'status' => 0,
                'status_message' =>'Echec de la mise a jour de l\'event. '. mysqli_error($conn)
            );
        }
    } else {
        $response=array(
            'status' => 0,
            'status_message' =>'Echec de la mise a jour de l\'event. '
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deleteEvent($id): void {
    global $conn;
    $query = "DELETE FROM event WHERE id=".$id;
    if(mysqli_query($conn, $query)) {
        $response=array(
            'status' => 1,
            'status_message' =>'Event supprimé avec succes.'
        );
    }
    else {
        $response=array(
            'status' => 0,
            'status_message' =>'La suppression de l\'event a echouée. '. mysqli_error($conn)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}