<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

if((isset($_GET['productid']))&(isset($_GET['orderid']))&(isset($_GET['userid']))){
    $pid = $_GET['productid'];
    $oid = $_GET['orderid'];
    $uid = $_GET['userid'];

    $productsql = "SELECT P.*, O.*, U.* FROM Product P, Orders O, Users U WHERE P.ProductID = '$pid' AND O.OrderID = '$oid' AND U.UserID = '$uid'";
    $presult = $conn->query($productsql);

    
    if ($presult->num_rows> 0)
    {
        while($row = $presult->fetch_assoc())
        {
            $products[]=$row;
            
        }
    }
    else
    {
    echo "Product Not Found";
    header("Location:./orders.php?message=productnotfound");
    } 
   

    $title = "Update Order Status";
    include 'header.php';
    
    ?>
    <div class="user-content">
    <?php foreach ($products as $products): ?>
        <center><h3><?php echo $products["ProductName"]?></h3>   
        <img src="./../<?php echo $products["filepath"]?>"/>
        <p><?php echo $products["ProductDesc"]?></p>
        <hr>
        <i></b><p>Ordered By <?php echo $products["FirstName"]." ".$products["LastName"]?> at <?php echo $products["OrderDate"]?></p></i>
        <p><b>Order Status:</b><?php echo $products["OrderStatus"]?>&nbsp;&nbsp;<b>Payment Method:</b><?php echo $products["PaymentMethod"]?></p>
        <p><b>Quantity: <?php echo $products["Quantity"]?></p>
        <p><b>Total: Rs.<?php echo $products["Amount"]?>.00</b></p>
        
        

    <?php 
    $currentstatus = $products["OrderStatus"];
    endforeach;?>

        <form method = "post" action="">
            <label for="orderstatus">Order Status:</label><br>
            Select:<select name="status">
            <option value="<?php echo $currentstatus;?>"><?php echo $currentstatus;?></option>
            <option value="Declined">Declined</option>
            <option value="Confirmed">Confirmed</option>
            <option value="Delivered">Delivered</option>
            </select>
            <input type="submit" name = "sbmt" value="Update Order Status">
        </form>
        </center>

        </div>
        
<?php 
    if (isset($_POST["sbmt"])) {
        $status = $_POST["status"];


        $updatesql = "UPDATE Orders SET OrderStatus='$status' WHERE OrderID=$oid" ;
        if($conn->query($updatesql)){
                echo "Order Status updated";
                header("Location:./orders.php?message=orderstatusupdated");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./orders.php?message=orderstatusfailed");
        }
   

        
        
} 

}else{
    header("Location:./myorders.php?message=accessesdenied");
}


$conn->close();
include 'footer.php';
?>