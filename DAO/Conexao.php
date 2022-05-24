<?php
class Conexao
{
    private static $dmn = 'mysql:host=localhost;dbname=web2db;port3306';
    private static $usuario = 'root';
    private static $senha = '';
    private static $conexao = null;

    public static function getConexao ()
    {
        if(Conexao::$conexao == null)
        {
            try {
                Conexao ::$conexao = new PDO(Conexao::$dmn, Conexao::$usuario, Conexao::$senha);
            } catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
            
        }
        return Conexao::$conexao;
    }

    public static function getPreparedStatement($sql) : PDOStatement
    {
        $pst = null;

        if (Conexao::getConexao() != null) 
        {
            try {
                $pst = Conexao::$conexao->prepare($sql);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $pst;
    }
}