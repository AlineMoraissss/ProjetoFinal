<?php

class Banco
{
    
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitido!');
    }
    
    public static function conectar()
    {
        if(null == self::$cont)
        {
            try
            {
                if (file_exists(__DIR__ . '/.env')) {
                    $dotenvPath = __DIR__ . '/.env';
                    $dotenv = parse_ini_file($dotenvPath);
                    foreach ($dotenv as $key => $value) {
                        putenv("$key=$value");
                    }
                }
                $dbHost   = getenv('DB_HOST');
                $dbNome   = getenv('DB_DATABASE');
                $dbUsuario   = getenv('DB_USERNAME');
                $dbSenha   = getenv('DB_PASSWORD');
                // localhost do the following
                self::$cont =  new PDO( "mysql:host=".$dbHost.";"."dbname=".$dbNome, $dbUsuario, $dbSenha);
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha); 
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function desconectar()
    {
        self::$cont = null;
    }
}

?>
