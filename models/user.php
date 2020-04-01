<?php
    include_once("dbabstract.php");

    class User {
        private $db;  

        public function __construct(){
            $this->db = new DBAbstract();
        }

        public function findUser($name, $password) {
            $result = $this->db->sqlSelect("SELECT * FROM user WHERE name='$name' and password='$password'");
            if ($result != false && count($result) != 0) { 
                return $result;
            } else {
                return null;
            }
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
