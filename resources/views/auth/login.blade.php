    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body class="text-bg-secondary p-3">

    <!-- form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-5">
                <h1 class="text-center">Case Management System</h1> <!-- Centered h1 heading -->
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <x-textfield type="email" name="email" label="" placeholder="Please enter your email" />
                    <x-textfield type="password" name="password" label="" placeholder="Please enter your password" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <h5>
    <p class="mt-3">
        Don't have an account?
        <a href="{{ route('auth.register') }}" class="btn btn-primary">Sign Up</a>
    </p>
</h5>

            </div>
        </div>
      
    </div>

</body>

</html>



