<?php

namespace App\Kernel;
require_once('dbconnect.php');

class Delete {

    use DbConnect;
    public $table;

    public function __construct($table) {
        $this->table = $table;
    }

    public function Execute($query, $param) {
        try {

            $statement = $this->pdo->prepare($query);
            $statement->execute($param);

            echo $statement->rowCount(); 

        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function Delete($idname, $id) {

        $this->connect();
        $query = "DELETE FROM $this->table WHERE $idname = $id";

        $this->Execute($query, $param);
    }
}

$obj = new Delete('projects');
$obj->Delete('ProjectID', '10');
?>
