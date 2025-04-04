<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;    
    private $pdo;

    public function __construct(){
        $dns    = "mysql:dbname=usuarioetimpwiii;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";
        
        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);           
            return true;
        } catch (\Throwable $th) {           
            return false;
        }   
    }

    public function cadastrar($nome, $email, $senha){
        //primeiro passo: criar a consulta sql
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        
        //segundo passo: passar a consulta para o metdo prepare do PDO
        $stmt = $this->pdo->prepare($sql);

        //terceiro passo: para cada apelido, passar o valor correspondente
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        //quarto passo: executar o comando
        return $stmt->execute();
    }

    public function chkUser($email){
        //passo 1: criar a consulta sql
        $sql = "SELECT * FROM usuarios WHERE email = :e";

        //passo 2: passar a consulta para o método prepare do PDO
        $stmt = $this->pdo->prepare($sql);

        //passo 3: para cada apelido, passar o valor correspondente
        $stmt->bindValue(":e", $email);
        
        //passo 4: executar o comando
        $stmt->execute();

        if( $stmt->rowCount() > 0 ){
            return true;
        }else{
            return false;
        }    
    }

    public function chkPass($email, $senha){
        //passo 1: criar a consulta sql
        $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";

        //passo 2: passar a consulta para o método prepare do PDO
        $stmt = $this->pdo->prepare($sql);

        //passo 3: para cada apelido, passar o valor correspondente
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        
        //passo 4: executar o comando
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            return $stmt->fetch();
        }else{
            return false;
        }     
    }
}