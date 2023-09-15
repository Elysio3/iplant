<?php

function getRecord($id=0): void {
    global $conn;
    $query = "SELECT * FROM record";
    if($id != 0) {
        $query .= " WHERE id_plant=".$id;
    }
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function addRecord(): void {
    global $conn;
    $id_plant = $_POST['id_plant'];
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $luminosity = $_POST['luminosity'];

    if($id_plant != null || $temperature != null || $humidity != null || $luminosity != null) {
        $query="INSERT INTO record (date, id_plant, temperature, humidity, luminosity) VALUES (CURRENT_TIMESTAMP, ".$id_plant.", '".$temperature."', '".$humidity."', '".$luminosity."')";
        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Record ajoutee avec succes.'
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

function updateRecord($id): void {
    global $conn;
    $_PUT = array();
    parse_str(file_get_contents('php://input'), $_PUT);

    $date = $_POST['date'];
    $id_plant = $_POST['id_plant'];
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $luminosity = $_POST['luminosity'];

    if($date != null || $id_plant != null || $temperature != null || $humidity != null || $luminosity != null) {
        $query="UPDATE location SET" .
        "date='".$date. "', id_plant='".$id_plant. "', temperature='".$temperature. "', humidity='".$humidity. "', luminosity='".$luminosity.
            "' WHERE id=".$id;

        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Record mise a jour avec succes.'
            );
        } else {
            $response=array(
                'status' => 0,
                'status_message' =>'Record de la mise a jour de l\'user. '. mysqli_error($conn)
            );
        }
    } else {
        $response=array(
            'status' => 0,
            'status_message' =>'Echec de la mise a jour du record. '
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deleteRecord($id) : void {
    global $conn;
    $query = "DELETE FROM record WHERE id=".$id;
    if(mysqli_query($conn, $query)) {
        $response=array(
            'status' => 1,
            'status_message' =>'record supprimé avec succes.'
        );
    }
    else {
        $response=array(
            'status' => 0,
            'status_message' =>'La suppression du record a echouée. '. mysqli_error($conn)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}