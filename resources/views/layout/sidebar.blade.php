<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Management</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                             <ion-icon name="infinite-outline"></ion-icon>
                            
                            


                        </span>
                        <span class="title">Case Management</span>
                    </a>
                </li>

                <li>
    <a href="{{ route('home') }}">
        <span class="icon">
            <ion-icon name="home-outline"></ion-icon>
        </span>
        <span class="title">Home</span>
    </a>
</li>

<li>
    <a href="{{ route('lawsuits.index') }}">
        <span class="icon">
            <ion-icon name="library-outline"></ion-icon>
        </span>
        <span class="title">Lawsuits</span>
    </a>
</li>

<li>
    <a href="{{ route('courts.index') }}">
        <span class="icon">
            <ion-icon name="business-outline"></ion-icon>
        </span>
        <span class="title">Court</span>
    </a>
</li>

<li>
    <a href="{{ route('applicants.index') }}">
        <span class="icon">
            <ion-icon name="person-outline"></ion-icon>
        </span>
        <span class="title">Applicants</span>
    </a>
</li>

<li>
    <a href="{{ route('defendants.index') }}">
        <span class="icon">
            <ion-icon name="person-outline"></ion-icon>
        </span>
        <span class="title">Defendants</span>
    </a>
</li>

<!-- Logout Link -->
<li>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="icon">
            <ion-icon name="log-out-outline"></ion-icon>
        </span>
        <span class="title">Logout</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>


               


              
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <!-- <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div> -->

                <div class="user">
                <img src="{{ asset('images/Ghana flag2.png') }}" alt="image of Ghana's flag">

                    
                </div>
            </div>
           


</body>

</html>