<?php

class DAOSchema
{
    public function listaTodos()
    {
        $lista = [];

        $pst = Conexao::getPreparedStatement(
            "select s.id, s.name, s.description, s.minvalue from schems as s;"
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

    /*public function inclui(User $user)
    {
        $sql = 'insert into cliente (idUsuario, nome, telefone) values(?, ?, ?);';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$cliente->getIdUsuario());
        $pst->bindValue(2,$cliente->getNome());
        $pst->bindValue(3,$cliente->getTelefone());
        
        if($pst->execute())
        {
            return true;
        }
        return false;
        
    }*/
}