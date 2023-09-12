<?php
function getPlant($id=0): void {
    global $conn;
    $query = "SELECT * FROM plant";
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

function addPlant(): void {
    global $conn;
    $name = $_POST['name'];
    $id_location = $_POST['id_location'];

    if($id_location != null && $id_location != null) {
        $query="INSERT INTO plant (name, id_location) VALUES ('".$name."', '".$id_location."')";
        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Plant ajoutee avec succes.'
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

function updatePlant($id): void {
    global $conn;
    $_PUT = array();
    parse_str(file_get_contents('php://input'), $_PUT);

    $name = $_POST['name'];
    $id_location = $_POST['id_location'];

    if($id_location != null && $id_location != null) {
        $query="UPDATE plant SET id_location='".$id_location. "', name='".$name. "' WHERE id=".$id;

        if(mysqli_query($conn, $query)) {
            $response=array(
                'status' => 1,
                'status_message' =>'Plant mise a jour avec succes.'
            );
        } else {
            $response=array(
                'status' => 0,
                'status_message' =>'Echec de la mise a jour de la plant. '. mysqli_error($conn)
            );
        }
    } else {
        $response=array(
            'status' => 0,
            'status_message' =>'Echec de la mise a jour de la plant. '
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deletePlant($id): void {
    global $conn;
    $query = "DELETE FROM plant WHERE id=".$id;
    if(mysqli_query($conn, $query)) {
        $response=array(
            'status' => 1,
            'status_message' =>'Plant supprimé avec succes.'
        );
    }
    else {
        $response=array(
            'status' => 0,
            'status_message' =>'La suppression de la plant. '. mysqli_error($conn)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}