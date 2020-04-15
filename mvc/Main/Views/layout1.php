<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/bookstore/" />
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><a href="./" class="web-url">www.bookstore.com</a></div>
                    <div class="col-md-6">
                        <h5>A room without books is like a body without a soul!</h5></div>
                    <div class="col-md-3">
                        <span class="ph-number">Liên hệ : 0377 901 258</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="navbar-item <?php if($data["page"]=="index") echo  "active"?>">
                                <a href="./" class="nav-link">Trang chủ</a>
                            </li>
                            <li class="navbar-item <?php if($data["page"]=="shop") echo  "active"?>">
                                <a href="./Main/Shop" class="nav-link">Cửa hàng</a>
                            </li>
                            <li class="navbar-item <?php if($data["page"]=="intro") echo  "active"?>">
                                <a href="./Main/Intro" class="nav-link">Giới thiệu</a>
                            </li>
                            <li class="navbar-item <?php if($data["page"]=="contact") echo  "active"?>">
                                <a href="./Main/Contact" class="nav-link">Liên hệ</a>
                            </li>
                            
                            <?php  
                                 if(isset($_SESSION["id"]))
                                    {
                                        echo '<li class="navbar-item">
                                        <a href="./Main/MyAccount/load/'.$_SESSION["id"].'" class="nav-link">'.$_SESSION["username"].'</a>
                                        </li>
                                        ';
                                        echo '<li class="navbar-item">
                                        <a href="./Main/Logout" class="nav-link">Đăng Xuất</a>
                                        </li>
                                        ';
                                    }
                                    else 
                                    {
                                        echo '<li class="navbar-item">
                                        <a href="./Main/Login" class="nav-link">Đăng Nhập</a>
                                        </li>
                                        ';
                                    }
                            ?>
                        </ul>
                        <div class="cart my-2 my-lg-0">
                            <span>
                                <a href='./Main/Cart/load/<?php if(isset($_SESSION["id"]))echo $_SESSION["id"]; else echo " "?>' class="dropdown"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></span>
                                <?php if(isset($_SESSION["quantity"]) && $_SESSION["quantity"]!=0)
                                echo '<span class="quntity">'.$_SESSION["quantity"].'</span>';
                                 ?>
                            
                        </div>
                        <form method="POST" action="./Main/Shop/find" class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm..." aria-label="Search" name="txt_search">
                            <button name="btn_Search"><span class="fa fa-search"></span></button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- <?php 
        $_SESSION['bookstore']  = $_SERVER['HTTP_HOST'];
        $_SESSION['uribookstore']  = $_SERVER['REQUEST_URI'];
        $_SESSION['lastloginbookstore'] = strtotime(date("YmdHis"));
    ?> -->
    <div class="Content Here">
    <?php  
        require_once $data["page"].'.php';
    ?>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4>Địa chỉ Shop</h4>
                        <h6>160 Trường Chinh, TP.Pleiku, Tỉnh Gia Lai</h6>
                        <h6>Call : 0377901258</h6>
                        <h6>Email : info@bookstore.com</h6>
                    </div>
                    <div class="timing">
                        <h4>Thời gian mở cửa</h4>
                        <h6>Thứ 2 đến Thứ 6: 7am - 10pm</h6>
                        <h6>​​Thứ 7: 8am - 10pm</h6>
                        <h6>​Chủ nhật: 8am - 11pm</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navigation">
                        <h4>Điều hướng</h4>
                        <ul>
                            <li><a href="./">Trang chủ</a></li>
                            <li><a href="./Main/Shop">Cửa hàng</a></li>
                            <li><a href="./Main/Intro">Giới thiệu</a></li>
                            <li><a href="./Main/Contact">Liên hệ</a></li>
                            <li><a href="./Main/Login">Đăng nhập</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Liên hệ nhanh</h3>
                        <h6>Khách hàng có ý kiến gì hãy phản hồi với chúng tôi để chúng tôi có thể phục vụ tốt hơn. Xin cảm ơn!</h6>
                        <form method="POST" action="./Main/Contact/Create">
                            <div class="row">
                                <div class="col-md-6">
                                    <input <?php if(isset($_SESSION["username"])) echo 'value = "'.$_SESSION["username"].'"'; else echo 'placeholder="Name"'; ?> name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" <?php if(isset($_SESSION["username"])) echo 'value = "'.$_SESSION["email"].'"'; else echo 'placeholder="Email"'; ?> name="email" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Nội dung" name="content"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn black" name="btn_Send">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>www.bookstore.com</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="share align-middle">
                            <span class="fb"><a href="https://www.facebook.com/hoangthaonam.pk.gl"><i class="fa fa-facebook-official"></i></a></span>
                            <span class="instagram"><a href="https://www.instagram.com/hoangthaonam"><i class="fa fa-instagram"></i></span>
                            <span class="twitter"><a href="https://twitter.com/hoangthaonam"><i class="fa fa-twitter"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript" src="js/custombyme.js"></script>
</body>

</html>