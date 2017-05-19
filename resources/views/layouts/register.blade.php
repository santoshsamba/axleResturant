<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>


<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Employee Registration Form</h1>

    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">
            <form method="post" action="/register/ok">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                </div>

                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                    </div>


                    <div class="form-group">
                        <label>Gender</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" value="male"> Male
                            </label>
                            <label>
                                <input type="radio" name="gender" value="female"> Female
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
        <!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">

    <a href="#">Back to top</a>
    </p>
</footer>


</body>
</html>
