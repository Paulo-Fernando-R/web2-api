<?php

class DAOUser
{
    public function listaTodos($user)
    {
        $lista = [];

        $pst = Conexao::getPreparedStatement(
            "select s.id as sid, u.id as uid, u.name
            from user as u 
            inner join userschema as us
            on us.iduser = u.id
            inner join schems as s 
            on s.id = us.idschema
            where s.id = ?;"
        );

        $pst->bindValue(1, $user);
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