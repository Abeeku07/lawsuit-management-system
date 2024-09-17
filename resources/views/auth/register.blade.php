<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Register</title>
</head>
<body class="text-bg-secondary p-5">

    <div class="container-sm mt-4">
        <h2 class="mb-3">Register</h2>

        <form action="{{ route('auth.register') }}" method="POST">
            @csrf

            <div class="col-sm-4 mb-3">
                <x-textfield type="text" name="name" label="" placeholder="Enter your full name" :value="old('name')" />
            </div>

            <div class="col-sm-4 mb-3">
                <x-textfield type="email" name="email" label="" placeholder="Enter your email" :value="old('email')" />
            </div>

            <div class="col-sm-4 mb-3">
                <x-textfield type="password" name="password" label="" placeholder="Enter your password" />
            </div>

            <div class="col-sm-4 mb-3">
                <x-textfield type="password" name="password_confirmation" label="" placeholder="Confirm your password" />
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <!-- Link to login page -->
        <h5><p class="mt-3">
        Don't have an account?
        <a href="{{ route('auth.register') }}" class="btn btn-primary">Sign Up</a>
    </p></h5>

    </div>

</body>
</html>
