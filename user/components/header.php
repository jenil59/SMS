<?php
    if(!isset($_SESSION['login-username']))
    {
        header('Location : ../');
    }
 ?>

<header>
                <div class="logo-bar">
                    <div class="logo">
                        <img src="./components/assets/images/img/logo-2.png" height="50px" width="250px" alt="">
                    </div>
                    <div class="search-box">
                        <form action="./category.php" method="get">
                            <input type="text" name="search-query" id="" placeholder="Search" class="search-input">
                            <input type="submit" class="btn btn-search" value="Search">
                        </form>
                    </div>
                    <div class="logo-right">

                        <div class="wrapper">
                            <div id="location-box">
                                <div class="icon-box">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <p>
                                    <small>location</small><br> surat,gujrat
                                </p>
                            </div>
                            <div id="wishlist">
                                <i class="fas fa-heart"></i>
                                <span>wishlist</span>

                            </div>
                            <div id="user-box">
                                <div class="first">
                                    <div class="icon-box">
                                        <img src="./components/assets/images/user/uimg.png" alt="" srcset="">
                                    </div>
                                    <p>
                                    <span class="material-icons-round">expand_more</span>
                                    </p>
                                </div>
                                <div class="second">
                                    <div class="item"><b>Hello , <?php echo $_SESSION['login-username']; ?></b></div>
                                    <div class="item"><a href="./logout.php"> <span class="material-icons-round">logout</span>Logout</a></div>
                                    <div class="item"><a href="./"><span class="material-icons-round">settings</span>Settings</a></div>
                                    <div class="item"><a href="./sellerportal"><span class="material-icons-round">warehouse</span>sellerportal</a></div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="nav-bar">

                    <div class="nav-list">
                        <a href="./" class="nav-item">Home</a>

                        <div  class="nav-item">Shop

                            <div class="dropdown dropdown-mega">
                                <div class="wrapper">
                                    <div class="upperbox">
                                        <div class="title">
                                            books
                                        </div>
                                        <div class="inner-list">
                                            <ul>
                                                <li><a href="">New arivlas</a></li>
                                                <li><a href="">refrence books</a></li>
                                                <li><a href="">social books</a></li>
                                                <li><a href="">technical books</a></li>
                                                <li><a href="">history books</a></li>
                                                <li><a href="">comics</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="upperbox">
                                        <div class="title">
                                            Instruments
                                        </div>
                                        <div class="inner-list">
                                            <ul>
                                                <li><a href="">All Instruments</a></li>
                                                <li><a href="">new arrivals</a></li>
                                                <li><a href="">drawing Instruments</a></li>
                                                <li><a href="">electrical Instruments</a></li>
                                                <li><a href="">project Instruments</a></li>
                                                <li><a href="">other Instruments</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="upperbox">
                                        <div>
                                            <div class="title">
                                                notes
                                            </div>
                                            <div class="inner-list">
                                                <ul>
                                                    <li><a href="">exam notes</a></li>
                                                    <li><a href="">upsc notes</a></li>
                                                    <li><a href="">new notes</a></li>
                                                    <li><a href="">other notes</a></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="upperbox">
                                        <div class="title">
                                            gadgets
                                        </div>
                                        <div class="inner-list">
                                            <ul>
                                                <li><a href=""> new gadgets</a></li>
                                                <li><a href="">mechanical gadgets</a></li>
                                                <li><a href="">electrical gadgets</a></li>
                                                <li><a href="">project gadgets</a></li>
                                                <li><a href="">experimetal gadgets</a></li>
                                                <li><a href="">other gadgets</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="upperbox">
                                        <div class="title">
                                            papers
                                        </div>
                                        <div class="inner-list">
                                            <ul>
                                                <li><a href="">exam papers</a></li>
                                                <li><a href="">trial papers</a></li>
                                                <li><a href="">mock test papers</a></li>
                                                <li><a href="">practice papers</a></li>
                                                <li><a href="">mcq's papers</a></li>
                                                <li><a href="">other papers</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                        <a href="./category.php" class="nav-item">Books</a>
                        <a href="./category.php" class="nav-item">Materials</a>
                       
                        <a href="./category.php" class="nav-item">Intruments</a>
                        <div href=" " class="nav-item">Customer care

                            <div class="dropdown dropdown-single">

                                <div class="wrapper">
                                    <ul>
                                        <li><a href="#">about us</a></li>
                                        <li><a href="#">contact us</a></li>
                                        <li><a href="#">fAQs</a></li>
                                        <li><a href="#">feeddback</a></li>
                                        <li><a href="#">help</a></li>
                                        <li>
                                            <a href="#">support</a>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                        </div>

                </div>
                <div class="back_blend"></div>
            </header>