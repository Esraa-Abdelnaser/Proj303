<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<title>Sweet & Salt Restaurant</title>
<body>
<div class="container">
                
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-5">
                            <form id="contactForm1" action="/updateProd" method="POST" novalidate="novalidate">
                            {{csrf_field()}}
                            <div class="text-center" >
                                <h2 class="section-heading text-uppercase" >Update Products</h2>
                            </div>
                            <div class="form-group">
                                <input name="name" value="{{$products->name}}" class="form-control" id="name" type="text" placeholder="Name *" required="required" data-validation-required-message="Please enter Name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input name="price" value="{{$products->price}}" class="form-control" id="price" type="text" placeholder="Price *" required="required" data-validation-required-message="Please enter price." />
                                <p class="help-block text-danger"></p>
                            
                                <button class="btn btn-primary btn-xl " type="submit">Update New Product</button>
                             </div>
                             <input type="hidden" name="np" value="{{$products->id}}">
                             </form>   
                        </div>
                        </body>
                        </html>