<?php
/**
 * Created by PhpStorm.
 * User: st496
 * Date: 01.02.2019
 * Time: 20:55
 */
class dbInserts
{
    public function register(string $username, string $email, string $password) : bool
    {

        try {
            $conn = Connection::getPdoInstance();

            $id = null;
            $credit = 0;
            $admin = 0;
            $date = date('Y-m-d H:i:s');

            $stmt = $conn->prepare("insert into user values (:id, :username, :email, :password, :create_time, :kredit,:admin)");
            $stmt->bindParam(':id',  $id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':create_time', $date);
            $stmt->bindParam(':kredit', $credit);
            $stmt->bindParam(':admin', $admin);
            $stmt->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }
}