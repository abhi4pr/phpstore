    <?php

        session_start();

        $id = $_GET['id'];

        if(isset($_GET['id'])){

        include('connect.php');
        require('vendor/autoload.php');

        $query = "SELECT * from orders WHERE email = '".$_SESSION['email']."' AND id ='".$id."'";
        
        $result = mysqli_query($connect,$query);
        
        while($row=mysqli_fetch_array($result)){

          $id = $row['id'];
          $products = $row['products'];
          $pmode = $row['pmode'];
          $grand_total = $row['grand_total'];
        }  
            $html='<h3>your invoice id is = '.$id.'</h3>';
            $html.='<h3>your products are = '.$products.'</h3>';
            $html.='<h3>your payment mode is = '.$pmode.'</h3>';
            $html.='<h3>your grand total is = '.$grand_total.'</h3>';

        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file=time().'.pdf';
        $mpdf->output($file,'D');

        }
    ?>