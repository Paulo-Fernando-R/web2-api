<?php

class DAOSupplier{

    public function listaTodos()
    {
        $lista = [];

        $pst = Conexao::getPreparedStatement(
            "select * from supplier;"
        );

        $pst->execute();


        $jsonArray = array();
        while ($row = $pst->fetchAll(PDO::FETCH_ASSOC))
        {
            $jsonArray = $row;
        }

        return $jsonArray;
       /* $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;*/
    }

    public function addSuplier(Supplier $supplier)
    {
        $sql = 'insert into supplier(name, address, phone) values(?, ?, ?);';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$supplier->getName());
        $pst->bindValue(2,$supplier->getAddress());
        $pst->bindValue(3,$supplier->getPhone());
        try{
            if($pst->execute())
            {
                return 0;
            }
            return 1;
        }
        catch(Exception $e){
            return 2;
        }
        
    }

    public function updateSuplier(Supplier $supplier)
    {
        $sql = 'update supplier set name = ?, address = ?, phone = ? where id = ?;';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$supplier->getName());
        $pst->bindValue(2,$supplier->getAddress());
        $pst->bindValue(3,$supplier->getPhone());
        $pst->bindValue(4,$supplier->getId());
        try{
            if($pst->execute())
            {
                return 0;
            }
            return 1;
        }
        catch(Exception $e){
            return 2;
        }
        
    }
}