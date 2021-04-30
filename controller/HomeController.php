<?php

class HomeController
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllUsers()
    {

        $sql = "Select * from `users` WHERE `status` = 'ACTIVE' ";
        $result = $this->conn->query($sql);

        $list = array();

        while ($item = $result->fetch(PDO::FETCH_ASSOC))
            $list[] = $item;
        return $list;
    }

    public function addUser($id, $name, $password)
    {
        $sql = "INSERT INTO `users` (`id`,`username`,`password`) Values (:id, :name, :password);";

        $stmt = $this->conn->prepare($sql);  #First prepare the sql statement

        #Bind the given parameters

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {  # If it executed means query runs successfully then @return true
            return true;
        } else {
            return false;
        }
    }
}
