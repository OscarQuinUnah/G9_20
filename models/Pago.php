<?php

    class Pago extends Conectar{

        public function get_pagos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM pago ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }   

        public function get_pago($Numero_de_Pago){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM pago WHERE Numero_de_Pago= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_de_Pago);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_pago($Numero_de_Pago, $Fecha_de_Pago, $Monto_de_Pago, $Tipo_de_Pago, $Numero_de_Pedido, $Empresa){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO pago(Numero_de_Pago, Fecha_de_Pago, Monto_de_Pago, Tipo_de_Pago, Numero_de_Pedido, Empresa)
            VALUES (?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_de_Pago);
            $sql->bindValue(2, $Fecha_de_Pago);
            $sql->bindValue(3, $Monto_de_Pago);
            $sql->bindValue(4, $Tipo_de_Pago);
            $sql->bindValue(5, $Numero_de_Pedido);
            $sql->bindValue(6, $Empresa);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function update_pago($Numero_de_Pago, $Fecha_de_Pago, $Monto_de_Pago, $Tipo_de_Pago, $Numero_de_Pedido, $Empresa){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE pago SET Fecha_de_Pago=?, Monto_de_Pago=?, Tipo_de_Pago=?, Numero_de_Pedido=?, Empresa=? WHERE Numero_de_Pago= ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Fecha_de_Pago);
            $sql->bindValue(2, $Monto_de_Pago);
            $sql->bindValue(3, $Tipo_de_Pago);
            $sql->bindValue(4, $Numero_de_Pedido);
            $sql->bindValue(5, $Empresa);
            $sql->bindValue(6, $Numero_de_Pago);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function delete_pago($Numero_de_Pago){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM pago WHERE Numero_de_Pago=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_de_Pago);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
?>