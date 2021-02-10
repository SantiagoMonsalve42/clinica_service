<?php

if (isset($_POST['idhistoria'])) {
    require '../DAO/citaDAO.php';
    $conf = new config();
    $link = $conf->con();
    $hisDAO = new historiaDAO();

    $id_historia = $_POST['idhistoria'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $motConsulta = $_POST['motivo_consulta'];
    $enfermedades = $_POST['enfermedades'];
    $alergias = $_POST['alergias'];
    $medicamentos = $_POST['medicamentos'];
    $antPersonales = $_POST['antecedentes_personales'];
    $antFamiliares = $_POST['antecedentes_familiares'];

    $hisDAO = new citaDAO();
    if ($link->affected_rows > 0) {
        $resul = $hisDAO->update($id_historia, $peso, $altura, $motConsulta, $enfermedades, $alergias, $medicamentos,
            $antPersonales, $antFamiliares);
        echo $resul;
    }
}
?>