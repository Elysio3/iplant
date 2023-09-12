<?php

function getLocation($id=0): void {
    global $conn;
    $query = "SELECT * FROM location";
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

function addLocation(): void {
    global $conn;
    $name = $_POST['name'];
    $address = $_POST['address'];
    $id_user = $_POST['id_user'];

    if($email != null) {
        $query="INSERT INTO user (name, address, id_user) VALUES ('".$name."', '".$address."', '".$id_user."')";
        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Location ajoutee avec succes.'
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

function updateLocation($id): void {
    global $conn;
    $_PUT = array();
    parse_str(file_get_contents('php://input'), $_PUT);

    $name = $_POST['name'];
    $address = $_POST['address'];
    $id_user = $_POST['id_user'];

    if($name != null && $address != null && $id_user != null) {
        $query="UPDATE location SET name='".$name. "', address='".$address. "', id_user='".$id_user. "' WHERE id=".$id;

        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Location mise a jour avec succes.'
            );
        } else {
            $response=array(
                'status' => 0,
                'status_message' =>'Location de la mise a jour de l\'user. '. mysqli_error($conn)
            );
        }
    } else {
        $response=array(
            'status' => 0,
            'status_message' =>'Echec de la mise a jour de la location. '
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deleteLocation($id): void {
    global $conn;
    $query = "DELETE FROM location WHERE id=".$id;
    if(mysqli_query($conn, $query)) {
        $response=array(
            'status' => 1,
            'status_message' =>'Localisation supprimé avec succes.'
        );
    }
    else {
        $response=array(
            'status' => 0,
            'status_message' =>'La suppression de la localisationr a echouée. '. mysqli_error($conn)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
