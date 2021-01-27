
<?php
include 'connect.php';

//Get payment information from PayPal 
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];

if(!empty($txn_id)){
    //Check if payment data exists with the same TXN ID.
    $paymentResult = $connect->query("SELECT * FROM payments WHERE txn_id = '".$txn_id."'");
    if($paymentResult->num_rows > 0){
        //payment information
        $paymentRow = $paymentResult->fetch_assoc();
        $payment_id = $paymentRow['payment_id'];
        
        //order items details
        $orderItemResult = $connect->query("SELECT p.name, i.quantity, i.gross_amount FROM order_items as i LEFT JOIN products as p ON p.id = i.item_number WHERE payment_id = '".$payment_id."'");
?>
    <h1>Your payment has been successful.</h1>
    <h2>Payment ID: <?php echo $payment_id; ?></h2>
    <h2>Payment Gross: <?php echo '$'.$paymentRow['payment_gross'].' '.$paymentRow['currency_code']; ?></h2>
    <?php if($orderItemResult->num_rows > 0){ ?>
    <h3>Order Items</h3>
    <table style="width:50%">
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Quantity</th> 
            <th>Gross Amount</th>
        </tr>
    <?php $i=0; while($item = $orderItemResult->fetch_assoc()){ $i++; ?>
        <tr>
            <td align="center"><?php echo $i; ?></td>
            <td align="center"><?php echo $item['name']; ?></td>
            <td align="center"><?php echo $item['quantity']; ?></td> 
            <td align="center"><?php echo '$'.$item['gross_amount'].' '.$paymentRow['currency_code']; ?></td>
        </tr>
    <?php } ?>
    </table>
    <?php } ?>
   
<?php }else{ ?>
    <h1>Your payment has been successful.</h1>
    <h2>TXN ID: <?php echo $txn_id; ?></h2>
    <h2>Payment Gross: <?php echo '$'.$payment_gross.' '.$currency_code; ?></h2>
<?php } }else{ ?>
    <h1>Your payment has failed.</h1>
<?php } ?>
<a href="shop.php">Back to products</a>