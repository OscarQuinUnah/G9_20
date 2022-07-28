<?php
    Class Cliente extends Conectar{

        Public function get_clientes(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM clientes";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_cliente($Numero_Cliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM clientes WHERE Numero_Cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_Cliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_cliente($Numero_Cliente, $Nombre, $Apellidos, $Fecha_registro, $Direccion_Cliente, $RTN, $Email){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO clientes (Numero_cliente, Nombre, Apellidos, Fecha_registro, Direccion_cliente, RTN, Email)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_Cliente);
            $sql->bindValue(2, $Nombre);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $Fecha_registro);
            $sql->bindValue(5, $Direccion_Cliente);
            $sql->bindValue(6, $RTN);
            $sql->bindValue(7, $Email);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_cliente($Numero_Cliente, $Nombre, $Apellidos, $Fecha_registro, $Direccion_Cliente, $RTN, $Email){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" UPDATE clientes SET Nombre = ?, Apellidos = ?, Fecha_registro = ?, Direccion_Cliente = ?, RTN = ?, Email = ?
            WHERE Numero_Cliente = ?;";
            $sql=$conectar->prepare($sql);
            
            $sql->bindValue(1, $Nombre);
            $sql->bindValue(2, $Apellidos);
            $sql->bindValue(3, $Fecha_registro);
            $sql->bindValue(4, $Direccion_Cliente);
            $sql->bindValue(5, $RTN);
            $sql->bindValue(6, $Email);
            $sql->bindValue(7, $Numero_Cliente);
            $sql->execute();
            
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_cliente($Numero_Cliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM clientes WHERE Numero_Cliente = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_Cliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>