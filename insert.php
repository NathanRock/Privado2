<?php

    namespace App\Kernel;
    require_once('dbconnect.php');
   
    class Insert {

        use DbConnect;
        public $table;

        public function __construct($table){

            $this->table = $table;

        }

        public function Execute($query, $param){

            try {

                $statement = $this->pdo->prepare($query);
                $statement->execute($param);

            }catch(PDOException $e){
                
                die('Error:' . $e->getMessage());

            }

        }

          /** /
         * @param array $data [ field => values ]
         * Ex: (Name => 'Nathan', Manager => 'Arthur')
         */

        public function Insert($data) {

            $this->connect();

            $data_processor = array_keys($data);

            $fields = implode(',', $data_processor);
            $binds = implode(',',array_pad([], count($data), '?'));

            $query = "INSERT INTO $this->table ($fields) VALUES ($binds)";

            $this->Execute($query, array_values($data));
        }

    }
?>
