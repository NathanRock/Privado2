<?php

   namespace App\Kernel;
   use PDO;

   trait DbConnect {
       
       private $pdo;
   
       public function connect() {
   
           $servername = 'localhost';
           $dbname = 'portfoliodb';
           $username = 'superadmin';
           $password = 'dinossauro01';
   
           try {

               $this->pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
               $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
               echo 'Conexão estabelecida com sucesso';
   
           } catch(PDOException $e) {
   
               die('Erro: ' . $e->getMessage());
   
           }
       }
   }
   
?>
