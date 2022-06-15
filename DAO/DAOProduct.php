<?php

class DAOProduct{

    public function listaTodos()
    {
        $lista = [];

        $pst = Conexao::getPreparedStatement(
            "select * from product;"
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

    public function addProduct(Product $product)
    {
        $sql = 'insert into product(name, value) values(?, ?);';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$product->getName());
        $pst->bindValue(2,$product->getValue());
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

    public function updateProduct(Product $product)
    {
        $sql = 'update  product set name = ?, value = ? where id = ?;';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$product->getName());
        $pst->bindValue(2,$product->getValue());
        $pst->bindValue(3,$product->getId());
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