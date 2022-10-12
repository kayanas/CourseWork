<?php
include "./models/Db.php";

class Shop
{

    public $id;
    public $name;
    public $sales_field;
    public $accepts_card;
    public $items_quantity;
    public $logo;


    function __construct($id = null, $name = null, $sales_field = null, $accepts_card = null, $items_quantity = null, $logo = null)
    {

        $this->id = $id;
        $this->name = $name;
        $this->sales_field = $sales_field;
        $this->accepts_card = $accepts_card;
        $this->items_quantity = $items_quantity;
        $this->logo = $logo;
    }

    public static function all()
    {
        $shops = [];
        $db = new Db();
        $sql = "SELECT * FROM `shops`";
        $result = $db->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $shops[] = new Shop($row['id'], $row['name'], $row['sales_field'], $row['accepts_card'], $row['items_quantity'], $row['logo']);
        }

        $db->conn->close();
        return $shops;
    }

    public static function create()
    {
        $db = new Db();
        $stmt = $db->conn->prepare("INSERT INTO `shops`(`name`, `sales_field`, `accepts_card`, `items_quantity`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssii", $_POST['name'], $_POST['sales_field'], $_POST['accepts_card'], $_POST['items_quantity']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function find($id)
    {
        $shop = new Shop();
        $db = new Db();
        $sql = "SELECT * FROM `shops` WHERE `id` = " . $id;
        $result = $db->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $shop = new Shop($row['id'], $row['name'], $row['sales_field'], $row['accepts_card'], $row['items_quantity']);
        }

        $db->conn->close();
        return $shop;
    }

    public static function update()
    {
        $db = new Db();
        $stmt = $db->conn->prepare("UPDATE `shops` SET `name`=?,`sales_field`=?,`accepts_card`=?,`items_quantity`=? WHERE `id` = ?");
        $stmt->bind_param("ssiii", $_POST['name'], $_POST['sales_field'], $_POST['accepts_card'], $_POST['items_quantity'], $_POST['id']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function sort()
    {
        $shops = [];
        $db = new Db();
        $end = "";
        switch ($_GET['sort']) {
            case 'id asc':
                $end = "`id` asc";
                break;
            case 'id desc':
                $end = "`id` desc";
                break;
            case 'title asc':
                $end = "title asc";
                break;
            case 'title desc':
                $end = "title desc";
                break;
        }

        $sql = "SELECT * FROM `shops` ORDER BY " . $end;
        $result = $db->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $shops[] = new Shop($row['id'], $row['name'], $row['sales_field'], $row['accepts_card'], $row['items_quantity'],$row['logo']);
        }

        $db->conn->close();
        return $shops;
    }

    public static function filter()
    {
        $shops = [];
        $db = new Db();
        $sql = "SELECT * FROM `shops` WHERE `name` LIKE '%" . $_GET['search'] . "%' ";
        $result = $db->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $shops[] = new Shop($row['id'], $row['name'], $row['sales_field'], $row['accepts_card'], $row['items_quantity']);
        }

        $db->conn->close();
        return $shops;
    }

    public static function destroy($id)
    {
        $db = new Db();
        $stmt = $db->conn->prepare("DELETE FROM `shops` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public function __toString()
    {
        return "<br>Įmonės pavadinimas - " . $this->name . ", prekių asortimentas - " . $this->sales_field . ", kiekis - " . $this->items_quantity . ". Atsiskaitymo būdai - " . $this->accepts_card . "." . "<br>";
    }
}
