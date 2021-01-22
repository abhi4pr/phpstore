<?php include("header.php"); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="media-box">
            <div class="media-icon pull-left"><i class="icon-bargraph"></i> </div>
            <div class="media-info">
              <h5>Total Leads</h5>
              <h3>1530</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="media-box bg-sea">
            <div class="media-icon pull-left"><i class="icon-wallet"></i> </div>
            <div class="media-info">
              <h5>Total Payment</h5>
              <h3>$8,530</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="media-box bg-blue">
            <div class="media-icon pull-left"><i class="icon-basket"></i> </div>
            <div class="media-info">
              <h5>Total Sales</h5>
              <h3>935</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="media-box bg-green">
            <div class="media-icon pull-left"><i class="icon-layers"></i> </div>
            <div class="media-info">
              <h5>New Orders</h5>
              <h3>5324</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7">
          <div class="chart-box">
            <h4>Product Sales</h4>
            <div class="chart">
              <div id="container"></div>
              <!--for values check "Product Sales" chart on char-function.js--> 
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="chart-box">
            <h4>Sales Overview</h4>
            <div class="chart">
              <div id="container1"></div>
              <!--for values check "Sales Overview" chart on char-function.js--> 
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="chart-box">
            <h4>Recent Messages</h4>
            <div class="message-widget"> <a href="#">
              <div class="user-img pull-left"> <img src="dist/img/img1.jpg" class="img-circle img-responsive" alt="User Image"> <span class="profile-status online pull-right"></span> </div>
              <div class="mail-contnet">
                <h5>Florence Douglas</h5>
                <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">9:30 AM</span> </div>
              </a> <a href="#">
              <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> <span class="profile-status invisable pull-right"></span> </div>
              <div class="mail-contnet">
                <h5>Florence Douglas</h5>
                <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">10:30 AM</span> </div>
              </a> <a href="#">
              <div class="user-img pull-left"> <img src="dist/img/img4.jpg" class="img-circle img-responsive" alt="User Image"> <span class="profile-status offline pull-right"></span> </div>
              <div class="mail-contnet">
                <h5>Florence Douglas</h5>
                <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">12:30 AM</span> </div>
              </a> </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="chart-box">
            <h4>Recent Orders</h4>
            <div class="table-block">
              <div class="info-block">
                <p>Total paid invoices 5340, unpaid 130. <span class="pull-right"><a href="app/invoice.html">Invoice Summary <i class="fa fa-long-arrow-right"></i></a></span> </p>
              </div>
              <div class="table-responsive">
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>SKU</th>
                      <th>Invoice#</th>
                      <th>Customer Name</th>
                      <th>Status</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-truncate">OV-101777</td>
                      <td class="text-truncate"><a href="#">VIO-0035421</a></td>
                      <td class="text-truncate">Florence Douglas</td>
                      <td class="text-truncate"><span class="lable-tag tag-success">Paid</span></td>
                      <td class="text-truncate">$ 653.00</td>
                    </tr>
                    <tr>
                      <td class="text-truncate">OV-101775</td>
                      <td class="text-truncate"><a href="#">VIO-0028954</a></td>
                      <td class="text-truncate">Dr. Douglas</td>
                      <td class="text-truncate"><span class="lable-tag tag-unpaid">Overdue</span></td>
                      <td class="text-truncate">$ 421.00</td>
                    </tr>
                    <tr>
                      <td class="text-truncate">OV-101687</td>
                      <td class="text-truncate"><a href="#">VIO-0025864</a></td>
                      <td class="text-truncate">Andrew Florence</td>
                      <td class="text-truncate"><span class="lable-tag tag-success">Paid</span></td>
                      <td class="text-truncate">$ 632.00</td>
                    </tr>
                    <tr>
                      <td class="text-truncate">OV-101657</td>
                      <td class="text-truncate"><a href="#">VIO-0085815</a></td>
                      <td class="text-truncate">Florence Sr.</td>
                      <td class="text-truncate"><span class="lable-tag tag-success">Paid</span></td>
                      <td class="text-truncate">$ 285.00</td>
                    </tr>
                    <tr>
                      <td class="text-truncate">OV-101625</td>
                      <td class="text-truncate"><a href="#">VIO-0053812</a></td>
                      <td class="text-truncate">Florence Douglas</td>
                      <td class="text-truncate"><span class="lable-tag tag-warning">Overdue</span></td>
                      <td class="text-truncate">$ 538.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </section>
    <!-- content --> 
  </div>
  <!-- content-wrapper --> 
  
<?php include("footer.php"); ?>