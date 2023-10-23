<?php

    namespace App\Kernel;
    require_once('dbconnect.php');
   
    class Update {

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

        public function Update($idname, $data, $id) {

            $this->connect();

            $field = array_keys($data);
            $field_processor = implode(',', $field);

            $bind = array_values($data);
            $bind_processor = '.'.implode(',', $field);

            $query = "UPDATE $this->table SET $field_processor = $bind_processor WHERE $idname = $id";

            $this->Execute($query);
        }

    }

    $obj = new Update('projects');
    $obj->Update('ProjectId', array('ProjectName' => 'Dumb'), '2');
?>
