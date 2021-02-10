<?php

include('header.php');
include('connect.php');

$MERCHANT_KEY = "EOQ6ZDy2";
$SALT = "jFdrP6QzU7"; 
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";   // For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";      // For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
      || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">

    <br/>
    <?php if($formError) { ?>
  
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm" class="fpf" style="margin:50px;">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>

        <?php  
          $query = "SELECT * from customers WHERE email = '".$_SESSION['email']."'";
            $run = mysqli_query($connect,$query);
             while($row = mysqli_fetch_assoc($run)){
                $id = $row['id'];
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                $number = $row['number'];
                $address = $row['address'];
             }
        ?>     
        </tr>
        <tr>
          <?php
           error_reporting(0);
            $sql = "SELECT * from cart WHERE email='".$_SESSION['email']."'";
            $run = mysqli_query($connect,$sql);
              while($row = mysqli_fetch_assoc($run)){
                $grand_total += $row['total_price'];
            }
          ?>  
          <td>Amount: </td>
          <td><input name="amount" class="form-control" value="<?php echo $grand_total; ?>" readonly="" /></td>
          <td>First Name: </td>
          <td><input name="firstname" class="form-control" id="firstname" value="<?php echo $username; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" class="form-control" id="email" value="<?php echo $email; ?>" readonly="" /></td>
          <td>Phone: </td>
          <td><input name="phone" class="form-control" value="<?php echo $number; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo">Product Information</textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="http://localhost/phpstore/pay2.php" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="http://localhost/phpstore/pay3.php" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
        
        <tr>
        <?php
         $x=0;
          $sql = "SELECT * from cart WHERE email='".$_SESSION['email']."'";
          $run = mysqli_query($connect,$sql);
            while($row = mysqli_fetch_array($run)){
          $x++;    
          echo '<td><input type="hidden" name="udf'.$x.'" value="'.$row["pid"].'"></td>';
          }
        ?>  
        </tr>

        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" class="btn theme-btn--dark1 btn--md" value="Pay" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>

<?php include('footer.php'); ?>