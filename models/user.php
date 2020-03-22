<?php
    include("models/dbabstract.php");

    class User {
        private $db;  

        public function __construct(){
            $this->db = new DBAbstract("localhost", "root", "", "rosenpi");
        }

        public function getUser($id, $type) {
            $result = $this->db->sqlSelect("SELECT * FROM user");
            if ($result != false && $result->num_rows != 0) { 
                $fila = $result->fetch_object();
                $_SESSION["id"] = $fila->id;
                $_SESSION["tipo"] = $fila->tipo;
                $userOk = true;
            } else {
                $userOk = false;
            }
            return $userOk;
        }

        public function get($id) {
            $result = $this->db->sqlSelect("SELECT * FROM user WHERE id = '$id'");
            return $result;

        }

        public function getAll() {
            $result = $this->db->sqlSelect("SELECT * FROM user");
            return $result;

        }

        public function insert($data) {
            
            $sql = "INSERT INTO user (id, name, password, image, type) VALUES ('".$data['id']."', '".$data['name']."','".$data['password']."', '".$data['image']."', '".$data['type']."')";
            $result = $this->db->sqlOther($sql);
            if ($result == 1) {
                return true;
            } else {
                return false;
            }

        }

        public function delete($id) {
            
            $result = $this->db->sqlOther("DELETE FROM user WHERE id='$id'");
            if ($result == 1) {
                return true;
            } else {
                return false;
            }
            return true;

        }

        public function update($data) {
            $id = $data["id"];
            $name = $data["name"];
            $password = $data["password"];
            $image = $data["image"];
            $type = $data["type"];
            
            $result = $this->db->sqlOther("UPDATE user SET id='$id', name='$name', password='$password', image='$image', type='$type' WHERE id ='$id'");
            if($result == 1){
                return true;
            }else {
                return false;
            }
            return true;
        }
    }