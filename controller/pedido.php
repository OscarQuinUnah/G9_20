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
    require_once("../models/pedido.php");

    $pedidos = new pedido();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

        case "GetPedidos":
            $datos=$pedidos->get_pedidos();
            echo json_encode($datos);
        break;

        case "GetPedido":
            $datos=$pedidos->get_pedido($body["NumeroPedido"]);
            echo json_encode($datos);
        break;

        case "InsertPedido":
            $datos=$pedidos->insert_pedido($body["NumeroPedido"],$body["NumeroCliente"],$body["Empresa"],$body["FechaPedido"],$body["Direccion"],$body["TipodePago"],$body["MontoTotal"]);
            echo json_encode("Pedido agregado Exitosamente");
        break;

        case "UpdatePedido":
            $datos=$pedidos->update_pedido($body["NumeroPedido"],$body["NumeroCliente"],$body["Empresa"],$body["FechaPedido"],$body["Direccion"],$body["TipodePago"],$body["MontoTotal"]);
            echo json_encode("Pedido actualizado Exitosamente");
        break;

        case "DeletePedido":
            $datos=$pedidos->delete_pedido($body["NumeroPedido"]);
            echo json_encode("Pedido eliminado Exitosamente");
        break;

    }
?>