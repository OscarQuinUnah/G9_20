<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
      }
        header('Access-Control-Allow-Origin: *');     
        header('Content-Type: application/json');

        require_once("../config/conexion.php");
        require_once("../models/Pago.php");

        $pago= new Pago();

        $body = json_decode(file_get_contents("php://input"), true);

        switch($_GET["opc"]){

            case "GetPagos":
                $datos=$pago-> get_pagos();
                echo json_encode($datos);
            break;

            case "GetPago":
                $datos=$pago->get_pago($body["Numero_de_Pago"]);
                echo json_encode($datos);
            break;

            case "InsertPago":
                $datos=$pago->insert_pago($body["Numero_de_Pago"],$body["Fecha_de_Pago"],$body["Monto_de_Pago"],$body["Tipo_de_Pago"],$body["Numero_de_Pedido"],$body["Empresa"]);
                echo json_encode("Pago Agregado Exitosamente");
            break;

            case "UpdatePago":
                $datos=$pago->update_pago($body["Numero_de_Pago"],$body["Fecha_de_Pago"],$body["Monto_de_Pago"],$body["Tipo_de_Pago"],$body["Numero_de_Pedido"],$body["Empresa"]);
                echo json_encode("Pago Modificado Exitosamente");
            break;

            case "DeletePago":
                $datos=$pago->delete_pago($body["Numero_de_Pago"]);
                echo json_encode("Pago Eliminado Exitosamente");
            break;

            
        }
?>