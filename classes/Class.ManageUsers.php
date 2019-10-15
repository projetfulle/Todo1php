<?php 
include_once( 'class.database.php' );
class ManageUsers{
    public $link;

    function __construct(){
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }

    function registerUsers($username,$password,$ip_address,$time,$date){
        $query = $this->link->prepare("INSERT INTO users (username,password,ip_address,time,date) VALUES(?,?,?,?,?)");
        $values = array($username,$password,$ip_address,$time,$date);
        $query->execute($values);
        $counts = $query->rowCount();
        return $counts;
    }
}

$users = new ManageUsers();
echo $users->registerUsers('bob','bob','172.168.0.0','12:28','10-05-2019');

?>