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
    require_once("../models/Producto_Negocio.php");

    $producto = new Productos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

        case "GetProductos":
            $datos=$producto->get_productos();
            echo json_encode($datos);
        break;

        case "GetProducto":
            $datos=$producto->get_producto($body["NumeroDePedido"]);
            echo json_encode($datos);
        break;

        case "InsertProducto":
            $datos=$producto->insert_producto($body["NumeroDePedido"],$body["NombreArticulo"],$body["PrecioUnitario"],$body["FechaDePedido"],$body["CantidadDeArticulo"],$body["MontoTotal"],$body["AplicaImpuesto"]);
            echo json_encode("Producto de Negocio Agregado");
        break;

        case "UpdateProducto":
            $datos=$producto->update_producto($body["NombreArticulo"],$body["PrecioUnitario"],$body["FechaDePedido"],$body["CantidadDeArticulo"],$body["MontoTotal"],$body["AplicaImpuesto"],$body["NumeroDePedido"]);
            echo json_encode("Producto de Negocio Actualizado");
        break;

        case "DeleteProducto":
            $datos=$producto->delete_producto($body["NumeroDePedido"]);
            echo json_encode("Producto de Negocio Eliminado");
        break;

    }
?>