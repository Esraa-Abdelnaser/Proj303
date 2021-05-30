<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Sweet & Salt Restaurant</title>
</head>

<body>
    <div class="container">

        <div class="row align-items-stretch mb-5">
            <div class="col-md-5">
                <form action="/storeProd" method="POST">
                    {{csrf_field()}}
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Create Products</h2>
                    </div>
                    <div class="form-group">
                        <input name="name" class="form-control" minlength="1" maxlength="20" id="name" type="text" placeholder="Name *" required="required" data-validation-required-message="Please enter name." />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input name="price" class="form-control" min="1" max="100" id="price" type="number" placeholder="Price *" required="required" data-validation-required-message="Please enter price." />
                        <p class="help-block text-danger"></p>

                        <button class="btn btn-primary btn-xl " type="submit">Create New Product</button>
                    </div>
                </form>
                <form action="/mas">

                    <button class="btn btn-primary btn-xl " type="submit">HOME</button>
                </form>
            </div>
        </div>
</body>

</html>