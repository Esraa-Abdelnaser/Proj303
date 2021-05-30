<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Sweet & Salt Restaurant</title>
    <style>
        body {
            background-image: url('assets/img/food.jpg');
            background-size: 100%;
            background-repeat: repeat
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

        .q {
            font-size: 20px;
            color: black;
        }
    </style>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <!-- i refer to customer id -->
    <?php $i = session()->get('user_id');
    $j = session()->get('user_name'); ?>
    <section class="content content_content" style="width: 70%; margin: auto;">
        <section class="invoice">

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
                        <!-- هنا ببقى بنده على السيشن عشان اجيب منه بيانات اليوزر -->
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
            <!-- هنا بعمل جدول يعرض فيه الفاتورة -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    @if($products->count()>0 )
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub-Total</th>
                                <th style="color:red;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- هنا بستقبل الاراي واخد منها الطلبات اللي الكاستمر طلبها -->
                            <?php $sum = 0 ?>
                            @for ($i = 0; $i < count($products); $i++) <!-- هنا بيجمع اسعار كل طلب عشان يعرض التوتال -->
                                <?php $sum += $products[$i]->pivot->sub_price ?>
                                <tr>
                                    <td>{{$products[$i]->name}}</td>
                                    <td>{{$products[$i]->price}}</td>
                                    <!-- هنا بيعرض الكوانتيتي والساب برايس بطريقة مختلفه عشان هم بيفوت فالجدول -->
                                    <td>{{$products[$i]->pivot->quantity}}</td>
                                    <td>{{$products[$i]->pivot->sub_price}}</td>
                                    <td>
                                        <?php $user_id = session()->get('user_id');  ?>
                                        <form action="/delete_order" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="np" value="{{$products[$i]->id}}">
                                            <input type="hidden" name="nc" value="{{$user_id}}">
                                            <input type="hidden" name="id_order" value="{{$products[$i]->pivot->id}}">
                                            <button class="btn btn-warning" data-dismiss="modal" style="width:120px">
                                                </i>
                                                Delete order
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Total Price:</th>
                                    <!-- بيعرض المجموع الكلي -->
                                    <td> {{$sum}}</td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="row no-print" style="margin-left:85%">
                <div class="col-xs-12">
                    <br>
                    <form action="/delete_allorders" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="nc" value="{{$user_id}}">
                        <button class="btn btn-warning" onclick="showAlert()" data-dismiss="modal" style="width:120px">
                            </i>
                            ORDER NOW
                        </button>
                    </form>

                </div>

                @else
                <div class="alert alert-danger q" style="width:255px ;margin-left:40% ; margin-top:20px"> THERE ARE NO ORDERS </div>
                @endif
            </div>

            <div class="row no-print" style="margin-left:40%">
                <div class="col-xs-12">
                    <br>
                    <div id="suc" role="alert"></div>
                </div>
            </div>
        </section>
    </section>
    <script>
        // هنا بيعرض رسالة ان الاوردر هيوصل 
        function showAlert() {

            document.getElementById('suc').innerHTML = "Your order will arrive in minutes";


        }
        $(document).ready(function() {
            $("button").click(function() {
                $("#suc").addClass("alert alert-primary q");
            });
        });
    </script>
</body>

</html>