<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<title>Sweet & Salt Restaurant</title>
<style>
body{
  background-image:url('assets/img/food.jpg');
  background-size: 100%;
  background-repeat:repeat
}
.invoice {
    position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 150px 25px;
    opacity: 80%;
}
.page-header {
    margin: 10px 0 20px 0;
    font-size: 22px;
}

.q{
    font-size:20px;
    color:black;
}
</style>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
  <section class="content content_content" style="width: 70%; margin: auto;">
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-4">
                <h2 class="page-header">
                     Date Of Order:
                    <span class="pull-right" style="font-size:20px"> {{date('d/m/y h:i:s')}}</span>
                </h2>
            </div>
            <div class="col-xs-4" style="width:700px "></div>    
            <div class="col-xs-4">
                <a class="navbar-brand js-scroll-trigger" href=""><img src="assets/img/homelogo.png" style="width:75px ; height:60px" alt="" /></a>
            </div>    
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <i class="fa fa-store"></i><strong>Sweet & Salt Restaurant</strong>
                    <br>
                    <i class="fa fa-phone"></i>Phone:123456789
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
                To 
                <address>
                    <strong>{{ucfirst(session()->get('user_name')) }}</strong>
                    <br>
                    <i class="fa fa-map-marker"></i>Address: {{session()->get('user_adress') }}
                    <br>
                    <i class="fa fa-phone"></i>Phone: {{session()->get('user_phone') }}
                    <br>
                    <i class="fa fa-envelope"></i>Email: {{session()->get('user_email') }}
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
                <br>
                <b>Order ID:</b> 4F3S8J
                <br>
                <b>Payment Due:</b> {{date('d/m/y')}}
                <br>
            </div>
        </div>
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
            @if($products->count()>0 && $order->count()>0 && $products->count()==$order->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Order Name</th>
                          <th>Price</th>  
                          <th>Quantity</th>
                          <th>Sub-Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                   
                   
                        @for ($i = 0; $i < count($products); $i++) 
                        
                        <tr>
                               <td >{{$products[$i]->name}}</td>
                               <td>{{$products[$i]->price}}</td>
                               <td>{{$order[$i]->quantity}}</td>
                               <td>{{$order[$i]->sub_price}}</td>  
                        </tr>  
                        @endfor  
                    </tbody>
                </table>
                     
            </div>
        </div>
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Total Price:</th>
                                <td> {{$total}}</td>
                            </tr>
                        </tbody>
                    </table>
                            
                </div>
            </div>
        </div>
        <!-- this row will not appear when printing -->
        <div class="row no-print" style="margin-left:85%">
            <div class="col-xs-12">
                <br>
                <button class="btn btn-warning"  onclick="showAlert()" data-dismiss="modal" type="button" style="width:120px">
                    </i>
                    ORDER NOW
                </button>
            </div>
                
          @else
              <div class="alert alert-danger q" style="width:255px ;margin-left:40% ; margin-top:20px"> THERE ARE NO ORDERS </div>
        @endif          
        </div>
         
        <div class="row no-print" style="margin-left:40%">    
                <div class="col-xs-12">
                    <br>
                    <div  id="suc" role="alert"></div>    
                </div>
        </div>            
    </section>
  </section>
        <script>
            function showAlert() {
            
            document.getElementById('suc').innerHTML= "Your order will arrive in minutes";
            
              
            }
            $(document).ready(function(){
              $("button").click(function(){
              $("#suc").addClass("alert alert-primary q");
            });
          });
            
        </script>   
</body>
</html>