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
    padding: 35px;
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
  <section class="content content_content" style="width: 80%; margin: auto;">
    <section class="invoice">
        <!-- title row -->
        <div class="row">
        <?php  
        $i = session()->get('user_id');
        $j = session()->get('user_id');  ?>   
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
                          @if(session()->has('user_name') ) 
                          <th>Quantity</th> 
                          <th>Order</th> 
                          @endif
                          @if($i=='1')
                          <th>Update</th>
                          <th>Delete</th>
                          @endif
                        </tr>
                    </thead>
                    <tbody>
                        <!-- نفس صفحة الفاتورة بس هنا بطبع المنيو -->
                        @for ($i = 0; $i < count($products); $i++) 
                        
                        <tr>
                               <td >{{$products[$i]->name}}</td>
                               <td>{{$products[$i]->price}}</td>
                               <td> one size</td>
                               @if(session()->has('user_name') ) 
                               <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="np" value="{{$products[$i]->id}}">
                                        <input type="hidden" name="nc" value="{{$j}}">
                                        <div class="dd">
                                        
                                           <td><input  class="ii" type="number" name="num" min="1" max="50" value="0"> </td>

                                            <td> <button  class="btn btn-primary">Add To Cart <i class="fa fa-shopping-cart"></i></button></td>
                                </form>
                                @endif  
                                <?php  $user_id = session()->get('user_id');  ?>  
                                @if($user_id=='1')
                                           <form action="/dataOfProduct" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="np" value="{{$products[$i]->id}}">
                                            <input type="hidden" name="nc" value="{{$j}}">  
                                            <td><button  class="btn btn-primary">
                                            Update Product
                                            </button></td>
                                                </form>   

                                            <form action="/deleteProduct" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="np" value="{{$products[$i]->id}}">
                                            <input type="hidden" name="nc" value="{{$j}}">  
                                            <td><button  class="btn btn-primary">
                                            Delete Product 
                                            </button></td>
                                            </form>
                                 @endif 
                        
                        @endfor
                        </tr>    
                    </tbody>
                </table>
                @endif          
            </div>
        </div>

        <script>

            function checkInp() {
                
                // var x=document.forms["myForm"]["age"].value;
                // if (isNaN(x)) 
                // {
                //     alert("Must input numbers");
                //     return false;
                // }
            
            
        </script>   
</body>


</html>