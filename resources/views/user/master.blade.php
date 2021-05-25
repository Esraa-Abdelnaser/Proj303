<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sweet & Salt Restaurant</title>
        <link rel="icon" href="assets/img/home.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        
        
    </head>
    <body id="page-top">

        <?php  
                // i will refer to user id
               $i = session()->get('user_id');
               // j will refer to user name
               $j = session()->get('user_name');
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <!-- photo of logo -->
                <a class="navbar-brand js-scroll-trigger" href=""><img src="assets/img/homelogo.png" style="width:75px ; height:75px" alt="" /></a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                    <!-- button to  Services-->
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <!-- button to  Offers  -->
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Offers</a></li>
                        
                        <li class="nav-item">
                            <!-- button to  menu  -->
                            <form action="/menu" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="nc" value="{{$i}}">  
                            <button type="submit" style="padding:5px" class="btn btn-primary bb" href="/menu">
                            MENU
                            </button>    
                            </form>
                            
                        </li>       
                        <li class="nav-item">   
                           <!-- button to  Cart  -->
                            <form action="/calc" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="nc" value="{{$i}}">    
                            <button type="submit" style="padding:5px" class="btn btn-primary bb" href="/calc">
                            Cart <i class="fas fa-shopping-cart"></i>
                                <sup><span class="badge badge-secondary">{{session()->get('numOfOrders')}}</span></sup></button>  
                            </form>

                            <!-- button to  create product only for admin has id=1  -->
                            @if($i=='1')     
                                        <li class="nav-item">
                                       <form action="/create_products" method="GET">
                                       {{csrf_field()}}
                                       <input type="hidden" name="nc" value="{{$i}}">  
                                       <button type="submit" style="padding:5px" class="btn btn-primary bb" href="/storeProd">
                                       Create Products
                                        </form>
                                   </li>
                            @endif 

                             <!-- هنا بعمل شرط بقول ان لو هو بيقرا اسم فالصفحة فحطلي تسجيل خروج  -->          
                            @if(session()->has('user_name') ) 
                            <li class="nav-item">
                                <form action="/sign_out" method="GET">
                                {{csrf_field()}}
                                <button type="submit" style="padding:5px" class="btn btn-primary bb" href="/sign_out">
                                Sign-Out
                                </form>
                            </li>
                            <!-- هنا بقوله لو مكنش فيه اسم فحطلي زرار تسجيل دخول   --> 
                            @else    
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Sign Up/In</a></li>
                            @endif  
                    </ul>
                </div>
            </div>
        </nav>
   
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Welcome To Our Resturant</div>
                      <!-- هنا بقوله اعرضلي الاسم لو هو موجود ورحب به  -->
                <div class="masthead-subheading">It's Nice To Meet You
                
                        {{ucfirst(session()->get('user_name')) }}
                        
                 </div>
                 <!-- زرار بيوديني للخدمات -->
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">SHOW OUR SERVICES</a>
            </div>
        </header>  
            
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                     <h2 class="section-heading text-uppercase" style="margin-bottom:5px; font-size:50;  ">
                     <img  src="assets/img/menu1.png" alt=""/>Services</h2>
                        <hr style="text-align:center; width:350px;margin-bottom:30px;">
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                        <img src="assets/img/dinner.png" alt="">
                        </span>
                        <h4 class="my-3">Main Meals</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <img src="assets/img/cake-slice (1).png" alt="">
                        </span>
                        <h4 class="my-3">Desserts</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <img src="assets/img/coffee.png" alt="">
                        </span>
                        <h4 class="my-3">Soft Drinks</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- OFFERS-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    
                    <h2 class="section-heading text-uppercase" style="margin-bottom:5px; font-size:50;  ">
                    <img  src="assets/img/hot-sale.png" alt=""/>Offers</h2>
                    <hr style="text-align:center; width:250px;margin-bottom:40px;">
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/pizza.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Pizza</h4>
                                    
                            </div>
                            <div class="timeline-body"><p class="text-muted">One Pizza By <span class="badge badge-secondary">80 L.E</span> Not <span class="badge badge-secondary"><del style="">100 L.E</del></span></p></div>
                            <br><br>
                            
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/hamburger.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Burger</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">One Burger By <span class="badge badge-secondary">50 L.E</span> Not <span class="badge badge-secondary"><del style="">60 L.E</del></span></p></div>
                            <br><br>
                            
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/cakes.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Cake</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">One Cake By <span class="badge badge-secondary">150 L.E</span> Not <span class="badge badge-secondary"><del style="">200 L.E</del></span></p></div>
                            <br><br>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- هنا بقوله شوف الاول لو فيه اسم يعني كده هو فيه حد عامل تسجيل دخول فاخفي تسجيل الدخول  -->
        @if(! session()->has('user_name') ) 
        <section class="page-section" id="contact">
            <div class="container">
                
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-5">
                        <!-- ده فورم للساين اب -->
                            <form id="contactForm1" action="/store_customers" method="POST" novalidate="novalidate">
                             {{csrf_field()}}
                            <div class="text-center" >
                                <h2 class="section-heading text-uppercase" >SignUp</h2>
                            </div>
                            <div class="form-group">
                            <!-- الفكرة ازاي ببعت البيانات دي للداتا بيز اللي بخدها من الفورم؟
                            هو اني ببعت اسم الانبوت ده في خانة ال نيم وبعدها هناك فالكنترولر باخدها بامر اسمه ريكويست وهكذا باقي الخانات -->
                                <input name="name" class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your Name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input name="pass" class="form-control" id="pass" type="password" placeholder="Your Password *" required="required" data-validation-required-message="Please enter your Password." />
                                <p class="help-block text-danger"></p>
                            </div>    
                            <div class="form-group">
                                <input name="email" class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input name="phone" class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div> <br>
                            <div class="form-group mb-md-0">
                                <input name="adress" class="form-control" id="adress" type="text" placeholder="Your Adress *" required="required" data-validation-required-message="Please enter your Adress." />
                                <p class="help-block text-danger"></p>
                            </div>    
                                <br>
                            <div class="text-center">
                                <div id="success"></div>
                                <button class="btn btn-primary btn-xl " type="submit">Create New Account</button>
                             </div>
                             </form>   
                        </div>
                                
                            <!--add col-md-2 to make space between to sign-->
                            <div class="col-md-2"></div>
                                
                        <div class="col-md-5">
                            <form id="contactForm1" action="/signin" method="POST" novalidate="novalidate">
                               {{csrf_field()}}
                            <div class="text-center">
                                <h2 class="section-heading text-uppercase" style="margin-top:80px">SignIn</h2>
                            </div>
                            <div class="form-group">
                                <input name="name2" class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your Name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input name="pass2" class="form-control" id="pass" type="password" placeholder="Your Password *" required="required" data-validation-required-message="Please enter your Password." />
                                <p class="help-block text-danger"></p>
                            </div>
                                  
                            <div class="text-center">
                                <div></div>
                                <button class="btn btn-primary btn-xl " type="submit">SignIn</button>
                             </div>
                            </form> 
                        </div>
                            
                    </div>
                    
                
            </div>
        </section>
        @endif
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Sweet & Salt Restaurant 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
    
            
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
        <script>
            function showAlert() {
            @if(session()->has('user_name') ) 
           
            @else    
              var myText = "Please SignIN first";
              alert (myText);
              
            @endif  
            }
            
        </script>     
    </body>
</html>
