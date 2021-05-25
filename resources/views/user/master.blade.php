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
        <!-- Navigation-->

        <?php  $i = session()->get('user_id');
               $j = session()->get('user_name');
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href=""><img src="assets/img/homelogo.png" style="width:75px ; height:75px" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Menu</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Offers</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        @if(session()->has('user_name') ) 
                            <li class="nav-item">
                                <form action="/sign_out" method="GET">
                                {{csrf_field()}}
                                <button type="submit" style="padding:5px" class="btn btn-primary bb" href="/sign_out">
                                Sign-Out
                                </form>
                            </li>
                        @else    
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Sign Up/In</a></li>
                        @endif  
                        
                        <li class="nav-item">
                            
                            <form action="/menu" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="nc" value="{{$i}}">  
                            <button type="submit" style="padding:5px" class="btn btn-primary bb" href="/menu">
                            MENU
                            </button>    
                            </form>
                            
                        </li>       
                        <li class="nav-item">   
                            <?php  $i = session()->get('user_id');  ?>
                            <form action="/calc" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="nc" value="{{$i}}">    
                            <button type="submit" style="padding:5px" class="btn btn-primary bb" href="/calc">
                            Cart <i class="fas fa-shopping-cart"></i>
                                <sup><span class="badge badge-secondary">{{session()->get('numOfOrders')}}</span></sup></button>  
                            </form>
                            
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
                                       
                            
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Welcome To Our Resturant</div>
                      
                <div class="masthead-subheading">It's Nice To Meet You
                
                        {{ucfirst(session()->get('user_name')) }}
                        
                 </div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">SHOW OUR SERVICES</a>
            </div>
        </header>
            
        <!--session for customer id-->    
            
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
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" style="margin-bottom:5px; font-size:50;  ">
                    <img  src="assets/img/menu3.png" alt=""/>Menu</h2>
                        <hr style="text-align:center; width:250px;margin-bottom:40px;">
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/HD.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Pizza</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/d88.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Burger</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/pex.jpeg" style="height:225px" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Pasta</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/cola.jpg" style="height:217px" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">coca-cola</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/manga.jpg" style="height:217px" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Mango</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/coffee2.jpeg" style="height:216px" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Coffee</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal7">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/donuts2.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Donuts</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal8">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/cake2.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Cake</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal9">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/cheese.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Cheese Cake</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
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
                            <button type="submit" class="portfolio-link btn btn-warning" data-toggle="modal" href="#portfolioModal1">  
                               Order Me 
                            </button>
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
                            <button type="submit" class="portfolio-link btn btn-warning" data-toggle="modal" href="#portfolioModal2">  
                               Order Me 
                            </button>
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
                            <button type="submit" class="portfolio-link btn btn-warning" data-toggle="modal" href="#portfolioModal8">  
                               Order Me 
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><img  src="assets/img/planning.png" alt=""/>Team</h2>
                    <h3 class="section-subheading text-muted">This Project By:</h3>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/girl1.png" alt="" />
                            <h4>Noura Abdelnaser</h4>
                            <p class="text-muted">Front-End Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/girl.png" alt="" />
                            <h4>Esraa Abdelnaser</h4>
                            <p class="text-muted">Back-End Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">
                        <i class="fas fa-store"></i><strong> Sweet & Salt Restaurant</strong> <br>
                        <i class="fas fa-phone-alt"></i> Phone:123456789 <br>
                        <i class="fas fa-map-marker-alt"></i> Address:Eltahrer ST9 <br>
                        <i class="fas fa-envelope"></i> Email:Sweet&Salt@gmail.com
                        <br>
                        
                    </p></div>
                </div>
            </div>
        </section>
        <!--  Clients
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/envato.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/designmodo.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/themeforest.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/creative-market.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-5">
                            <form id="contactForm1" action="/store_customers" method="POST" novalidate="novalidate">
                             {{csrf_field()}}
                            <div class="text-center" >
                                <h2 class="section-heading text-uppercase" >SignUp</h2>
                            </div>
                            <div class="form-group">
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
        <!-- Portfolio Modals-->
        
        <!-- Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Pizza</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/HD.jpg" alt="" style="width:300px"/>
                                    
                                    <ul class="list-inline">
                                    <h5 >Details:</h5>
                                        <li>Size: one size</li>
                                        <li>Price: 80 L.E</li>
                                    </ul>
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                        
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="1">
                                            <input type="hidden" name="nc"
                                            value="{{$i}}">
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                    <br>    
                                    <p id="demo"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
             </div>
            </div>
        </div>
        <!-- Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Burger</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/d88.jpg" style="width:300px" alt="" />
                                    <p>Details:</p>
                                    <ul class="list-inline">
                                        <li>Size: one size</li>
                                        <li>Price: 50 L.E</li>
                                    </ul>
                                   
                                   
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="2"> 
                                            <input type="hidden" name="nc"
                                            value="{{$i}}" >
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Pasta</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/pex.jpeg" style="width:300px" alt="" />
                                    <p>Details:</p>
                                    <ul class="list-inline">
                                        <li>Size: one size</li>
                                        <li>Price: 50 L.E</li>
                                    </ul>   
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="3"> 
                                            <input type="hidden" name="nc" 
                                            value="{{$i}}">
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">coca-cola</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/cola.jpg" style="width:300px" alt="" />
                                    <ul class="list-inline">
                                        <li>Size: one size</li>
                                        <li>Price: 6 L.E</li>
                                    </ul>
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="4"> 
                                            <input type="hidden" name="nc" 
                                            value="{{$i}}">
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Mango</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/manga.jpg" style="width:300px" alt="" />
                                    <ul class="list-inline">
                                        <li>Size: one size</li>
                                        <li>Price: 20 L.E</li>
                                    </ul>
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="5"> 
                                            <input type="hidden" name="nc" 
                                            value="{{$i}}">
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Coffee</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/coffee2.jpeg" style="width:300px" alt="" />
                                    <ul class="list-inline">
                                        <li>Size: one size</li>
                                        <li>Price: 20 L.E</li>
                                    </ul>
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="6"> 
                                            <input type="hidden" name="nc" 
                                            value="{{$i}}">
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- Modal 7-->
        <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Donuts</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/donuts2.jpg" style="width:300px" alt="" />
                                    <ul class="list-inline">
                                        <li>Size: one size</li>
                                        <li>Price: 10 L.E</li>
                                    </ul>
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="7"> 
                                            <input type="hidden" name="nc" 
                                            value="{{$i}}">
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 8-->
        <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Cake</h2>
                                    <img class="img-fluid d-block mx-auto"  src="assets/img/cake2.jpg" style="width:300px" alt="" />
                                    <ul class="list-inline">
                                        <li>Size: one size</li>
                                        <li>Price: 30 L.E</li>
                                    </ul>
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="8"> 
                                            <input type="hidden" name="nc"
                                            value="{{$i}}">
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 9-->
        <div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Cheese cake</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/cheese.jpg" style="width:300px" alt="" />
                                    <ul class="list-inline">
                                        <li>Size: one size</li>
                                        <li>Price: 40 L.E</li>
                                    </ul>
                                    <form action="/store_order" method="POST">
                                        {{csrf_field()}}
                                        <div class="dd">
                                            Quantity: &nbsp;<input  class="ii" type="number" name="num" min="1" max="50" value="0">
                                            <input type="hidden" name="np" value="9"> 
                                            <input type="hidden" name="nc" value="{{$i}}">
                                            <!--@if(isset($customer)){{$customer[0]->id}}@endif-->
                                            
                                        </div>
                                        <br><br>
                                        <!--<a href="/pizza/{{1}}" class="btn btn-primary" onclick="showAlert()">Order Me</a> -->
                                        <button  class="btn btn-primary" onclick="showAlert()">
                                          Add To Cart <i class="fas fa-shopping-cart"></i> </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
            
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
