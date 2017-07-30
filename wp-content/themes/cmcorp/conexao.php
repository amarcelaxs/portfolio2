<!--?php


require_once("ErrorHandler.php");
class Conexao {

    function getConnection() {
        try{
            
            $pdo = new PDO("mysql:host=localhost;dbname=listas_email","root","");
           //$pdo = new PDO("mysql:host=listas_email.mysql.dbaas.com.br;dbname=listas_email","listas_email","q1W@e3r4t5");
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
           return $pdo;
            echo  'teste1';
        }catch(PDOException $e){
            echo $e->getMessage(); 
        //    echo  'teste2';
        }
        return $pdo;  
    }
}
?-->


       