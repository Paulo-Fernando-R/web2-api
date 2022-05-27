<?php

class DAOUser
{
    public function listaTodos($user)
    {
        $lista = [];

        $pst = Conexao::getPreparedStatement(
            "select  u.id, u.name
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

    public function inclui(User $user)
    {
        $sql = 'insert into user (name, username, password) values(?, ?, ?);';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$user->getName());
        $pst->bindValue(2,$user->getUsername());
        $pst->bindValue(3,$user->getPassword());
        
        if($pst->execute())
        {
            return true;
        }
        return false;
        
    }

    public function login (User $user)
    {
        $sql = 'select id, name from user where username = ? and password = ?';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$user->getUsername());
        $pst->bindValue(2,$user->getPassword());
        $pst->execute();
        $jsonArray = array();
        $count = 0;
        while ($row = $pst->fetchAll(PDO::FETCH_ASSOC))
        {
            $jsonArray = $row;
            $count +=1;
        }

        return $jsonArray;

    }
}