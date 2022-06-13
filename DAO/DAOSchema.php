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

    public function addUserInSchema($idUser, $idSchema)
    {
        $sql = 'insert into userschema(iduser, idschema) values(?, ?);';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$idUser);
        $pst->bindValue(2,$idSchema);
        try{
            if($pst->execute())
            {
                return 0;
            }
            return 1;
        }
        catch(PDOException){
            return 2;
        }
        
    }

    public function addSchema(Schema $schema)
    {
        $sql = 'insert into schems(name, description, minvalue, iduser) values(?, ?, ?, ?);';

        $pst = Conexao::getPreparedStatement($sql);
        $pst->bindValue(1,$schema->getName());
        $pst->bindValue(2,$schema->getDescription());
        $pst->bindValue(3,$schema->getMinvalue());
        $pst->bindValue(4,$schema->getIduser());
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