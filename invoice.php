    <?php

        session_start();

        include('connect.php');
        require('vendor/autoload.php');

        $order_id = $_GET['order_id'];

        $html = '    <div class="myaccount-table table-responsive text-center">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>                                            
                    <th>Price</th>                                            
                    <th>Pay mode</th>
                    <th>Order date</th>                                          
                </tr>
            </thead>
            <tbody>';
            $query = "SELECT * from order_items WHERE email = '".$_SESSION['email']."' AND order_id = '".$order_id."'";
                $result = mysqli_query($connect,$query);
                    while($row=mysqli_fetch_assoc($result)){

                $html.='<tr>
                    <td>'.$row['order_id'].'</td>
                    <td>'.$row['product_id'].'</td>
                    <td>'.$row['qty'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['pmode'].'</td>
                    <td>'.$row['order_on'].'</td>
                </tr>';
                    }
            $html.='<tr></tr>';        
            $html.='</tbody>
        </table>
    </div>';

        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file=time().'.pdf';
        $mpdf->output($file,'D');

    ?>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css" />