<?php
  include('Session.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Invoice</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
		<script src="../../bootstrap/js/jquery.min.js"></script>
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/sidenav.css">
    <link rel="stylesheet" href="../../css/home.css">
    <script src="../../js/manage_invoice.js"></script>
    <script src="../../js/restrict.js"></script>
  </head>
  <body>
    <!-- including side navigations -->
    <script type="text/javascript">
      var pid = "none";
      function showhide(id) {
        var elements = document.getElementById(id).childNodes;
        var menu = elements[3];
        var arrow = ((elements[1].childNodes)[4].childNodes)[1];
        if(menu.style.display == 'block') {
          menu.style.display = "none";
          arrow.style.transform = "rotate(0deg)";
          elements[1].style.color = "#eeeeee";
        }
        else {
          menu.style.display = "block";
          arrow.style.transform = "rotate(270deg)";
          elements[1].style.color = "#ff5252";
        }
        if(pid == id)
          pid = "none";
        if(pid != "none") {
          elements = document.getElementById(pid).childNodes;
          menu = (document.getElementById(pid).childNodes)[3];
          arrow = ((elements[1].childNodes)[4].childNodes)[1];
          if(menu.style.display == 'block') {
            menu.style.display = "none";
            arrow.style.transform = "rotate(0deg)";
            elements[1].style.color = "#eeeeee";
          }
        }
        pid = id;
      }

      function showOptions() {
        var flag = document.getElementById('options');
        if(flag.style.display == 'block') {
          flag.style.display = "none";
          document.getElementById('mark').style.display = "none";
        }
        else {
          flag.style.display = "block";
          document.getElementById('mark').style.display = "block";
        }
      }
    </script>
    <?php
       require "sidenav.php";
    ?>
    <!-- End Slidebar -->
    <div class="container-fluid">
      <div class="container">

        <!-- header section -->
        <?php
          require "../../php/header.php";
          createHeader('address-book', 'Manage Invoice', 'Manage Existing Invoice');
        ?>
        <!-- header section end -->

        <!-- form content -->
        <div class="row">

          <div class="col-md-12 form-group form-inline">
            <label class="font-weight-bold" for="">Search :&emsp;</label>
            <input type="number" class="form-control" id="by_invoice_number" placeholder="By Invoice Nuber" onkeyup="searchInvoice(this.value, 'INVOICE_ID');">
            &emsp;<input type="text" class="form-control" id="by_customer_name" placeholder="By Customer Name" onkeyup="searchInvoice(this.value, 'NAME');">
            &emsp;<label class="font-weight-bold" for="">By Invoice Date :&emsp;</label>
            <input type="date" class="form-control" id="by_date" onchange="searchInvoice(this.value, 'INVOICE_DATE');">
            &emsp;<button class="btn btn-success font-weight-bold" onclick="refresh();"><i class="fa fa-refresh"></i></button>
          </div>

          <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
          </div>


          <div class="col col-md-12 table-responsive">
            <div class="table-responsive">
            	<table class="table table-bordered table-striped table-hover">
            		<thead>
            			<tr>
            				<th>SL.</th>
            				<th>Invoice No</th>
            				<th>Customer Name</th>
            				<th>Date</th>
                    <th>Total Amount</th>
                    <th>Total Discount</th>
                    <th>Net Total</th>
                    <th>Action</th>
            			</tr>
            		</thead>
                <tbody id="invoices_div">
                  <?php
                    require '../../php/manage_invoice.php';
                    showInvoices();
                  ?>
                </tbody>
            	</table>
            </div>
          </div>

        </div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
    </div>
  </body>
</html>
