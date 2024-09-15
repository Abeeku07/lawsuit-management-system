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
                    <a href="{{ route('lawsuits.index') }} "> 
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Lawsuits</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('courts.index') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Court</span>
                    </a>
                </li>

                <li>
                <a href="{{ route('applicants.index') }}">
                        <span class="icon">
                            <ion-icon name="log-in-outline"></ion-icon>
                        </span>
                        <span class="title">Applicants</span>
                    </a>
                </li>

                <li>
                <a href="{{ route('defendants.index') }}">
                        <span class="icon">
                            <ion-icon name="log-in-outline"></ion-icon>
                        </span>
                        <span class="title">Defendants</span>
                    </a>
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

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">courts</div>
                        <div class="cardName"></div>
                        
                    </div>

                    <!-- <div class="iconBx">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </div> -->
                </div>

                <div class="card"  >
                    <div>
                        <div class="numbers">laws</div>
                        <div class="cardName"></div>
                        <div class="cardName"></div> 
                    </div>

                    <!-- <div class="iconBx">
                        <ion-icon name="add-outline"></ion-icon>
                    </div> -->
                </div>
               

                <div class="card">
                    <div>
                        <div class="numbers">contact</div>
                        <div class="cardName"></div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">settings</div>
                        <div class="cardName"></div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cog-outline"></ion-icon>
                    </div>
                </div>
            </div>

         

              




</body>

</html>