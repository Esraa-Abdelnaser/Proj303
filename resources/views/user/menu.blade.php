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
        <?php  $j = session()->get('user_id');  ?>   
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
            @if($products->count()>0 )
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Price</th> 
                          <th>Size</th>
                          <th>Quantity</th> 
                          <th>Order</th> 
                        </tr>
                    </thead>
                    <tbody>
                        
                        @for ($i = 0; $i < count($products); $i++) 
                        
                        <tr>
                               <td >{{$products[$i]->name}}</td>
                               <td>{{$products[$i]->price}}</td>
                               <td> one size</td>
                               <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="np" value="{{$products[$i]->id}}">
                                        <input type="hidden" name="nc" value="{{$j}}">
                                        <div class="dd">
                                        
                                           <td><input  class="ii" type="number" name="num" min="0" max="50" value="0"> </td>

                                            <td> <button  class="btn btn-primary">Add To Cart <i class="fas fa-shopping-cart"></i></button></td>
                                </form>
                        </tr>  
                        @endfor  
                    </tbody>
                </table>
                @endif          
            </div>
        </div>
</body>
</html>