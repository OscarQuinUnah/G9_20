<?php

    class Productos extends Conectar{

        public function get_productos(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Producto";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_producto($NumeroDePedido){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Producto WHERE NumeroDePedido = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroDePedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_producto($NumeroDePedido, $NombreArticulo, $PrecioUnitario, $FechaDePedido, $CantidadDeArticulo, $MontoTotal, $AplicaImpuesto){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO Producto(NumeroDePedido, NombreArticulo, PrecioUnitario, FechaDePedido, CantidadDeArticulo, MontoTotal, AplicaImpuesto)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroDePedido);
            $sql->bindValue(2, $NombreArticulo);
            $sql->bindValue(3, $PrecioUnitario);
            $sql->bindValue(4, $FechaDePedido);
            $sql->bindValue(5, $CantidadDeArticulo);
            $sql->bindValue(6, $MontoTotal);
            $sql->bindValue(7, $AplicaImpuesto);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_producto($NumeroDePedido, $NombreArticulo, $PrecioUnitario, $FechaDePedido, $CantidadDeArticulo, $MontoTotal, $AplicaImpuesto){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE Producto SET NombreArticulo = ?, PrecioUnitario = ?, FechaDePedido = ?, CantidadDeArticulo = ?, MontoTotal = ?, AplicaImpuesto = ?
            WHERE NumeroDePedido = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroDePedido);
            $sql->bindValue(2, $NombreArticulo);
            $sql->bindValue(3, $PrecioUnitario);
            $sql->bindValue(4, $FechaDePedido);
            $sql->bindValue(5, $CantidadDeArticulo);
            $sql->bindValue(6, $MontoTotal);
            $sql->bindValue(7, $AplicaImpuesto);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_producto($NumeroDePedido){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM Producto WHERE NumeroDePedido = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroDePedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>