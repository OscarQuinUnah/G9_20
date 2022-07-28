<?php
    class pedido extends Conectar{

        public function get_pedidos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM pedido ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }   

        public function get_pedido($NumeroPedido){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM pedido WHERE NumeroPedido= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroPedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_pedido($NumeroPedido, $NumeroCliente, $Empresa, $FechaPedido, $Direccion, $TipodePago, $MontoTotal ){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO pedido(NumeroPedido, NumeroCliente, Empresa, FechaPedido, Direccion, TipodePago, MontoTotal)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroPedido);
            $sql->bindValue(2, $NumeroCliente);
            $sql->bindValue(3, $Empresa);
            $sql->bindValue(4, $FechaPedido);
            $sql->bindValue(5, $Direccion);
            $sql->bindValue(6, $TipodePago);
            $sql->bindValue(7, $MontoTotal);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function update_pedido($NumeroPedido, $NumeroCliente, $Empresa, $FechaPedido, $Direccion, $TipodePago, $MontoTotal){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE pedido SET NumeroCliente=?, Empresa=?, FechaPedido=?, Direccion=?, TipodePago=?, MontoTotal=? WHERE NumeroPedido = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroCliente);
            $sql->bindValue(2, $Empresa);
            $sql->bindValue(3, $FechaPedido);
            $sql->bindValue(4, $Direccion);
            $sql->bindValue(5, $TipodePago);
            $sql->bindValue(6, $MontoTotal);
            $sql->bindValue(7, $NumeroPedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function delete_pedido($NumeroPedido){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM pedido WHERE NumeroPedido =?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroPedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }
    } 

?>