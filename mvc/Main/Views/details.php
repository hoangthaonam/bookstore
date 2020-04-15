
    
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="./">Trang chủ</a>
            <span class="breadcrumb-item active">Xem sản phẩm</span>
        </div>
    </div>
    <section class="product-sec">
        <div class="container">
            <?php  
            $row = $data["book"];
            echo '<h1>'.$data["book"]["name"].'</h1>
            <div class="row">
                <div class="col-md-6 slider-sec">
                    <!-- main slider carousel -->
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="images/books/'.$data["book"]["images"].'" class="img-fluid" style="width: 360px; height: 581px">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">
                                <img src="images/product2.jpg" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img src="images/product3.jpg" class="img-fluid">
                            </div>
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators list-inline">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="images/books/'.$data["book"]["images"].'" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="images/product2.jpg" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="images/product3.jpg" class="img-fluid">
                            </a>
                            </li>
                        </ul>
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class="col-md-6 slider-content">
                    <p>'.$data["book"]["des"].'ádas</p>
                    <ul>
                        <li>
                            <span class="name">Giá</span><span class="clm">:</span>
                            <span class="price text-danger">'.$data["book"]["price"].'</span>
                        </li>
                    </ul>
                    <div class="btn-sec">
                        <a href="./Main/Cart/addCart/'.$data["book"]["id"].'"><button class="btn ">Thêm vào giỏ hàng</button></a>
                         
                    </div>
                </div>
            </div>';
            ?>
            <!-- <h1>7 Day Self publish How to Write a Book</h1>
             <div class="row">
                <div class="col-md-6 slider-sec">
                    
                    <div id="myCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="images/product1.jpg" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">
                                <img src="images/product2.jpg" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img src="images/product3.jpg" class="img-fluid">
                            </div>
                        </div> -->
                        <!-- main slider carousel nav controls -->
                        <!-- <ul class="carousel-indicators list-inline">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="images/product1.jpg" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="images/product2.jpg" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="images/product3.jpg" class="img-fluid">
                            </a>
                            </li>
                        </ul>
                    </div> -->
                    <!--/main slider carousel-->
                <!-- </div> -->
                <!-- <div class="col-md-6 slider-content">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. Lorem Ipsum has been the book. </p>
                    <p>t has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and</p>
                    <ul>
                        <li>
                            <span class="name">Giá</span><span class="clm">:</span>
                            <span class="price">60000đ</span>
                        </li> -->
                        <!-- <li>
                            <span class="name">Print List Price</span><span class="clm">:</span>
                            <span class="price">$10.99</span>
                        </li>
                        <li>
                            <span class="name">Kindle Price</span><span class="clm">:</span>
                            <span class="price final">$3.37</span>
                        </li>
                        <li><span class="save-cost">Save $7.62 (69%)</span></li> -->
                    <!-- </ul>
                    <div class="btn-sec">
                        <button class="btn ">Thêm vào giỏ hàng</button>
                        <a href="order.html"><button class="btn black">Mua ngay</button></a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <section class="related-books">
        <div class="container">
            <h2>Bookstore gợi ý bạn đọc</h2>
            <div class="recomended-sec">
                <div class="row">
                    <?php  
                        while ($row=mysqli_fetch_array(($data["sg_book"])))
                        {
                        echo '
                        <div class="col-lg-3 col-md-6">
                            <div class="item">
                                <img src="images/books/'.$row["images"].'" alt="img">
                                ';
                        if(strlen($row["name"])>20)
                            echo '<h3>'.mb_substr($row["name"], 0, 17, 'UTF-8').'...</h3>';
                        else 
                            echo '<h3>'.$row["name"].'</h3>';
                        echo '
                                <h6><span class="price">'.$row['price'].'đ</span> / <a href="./Main/Details/load/'.$row["id"].'">Xem Chi Tiết</a></h6>';
                                if($row["status"] == 1)
                                echo ' 
                                <span class="sale">Sale !</span>';
                                elseif ($row["status"] == 0) {
                                    echo '<span class="sale">NEW</span>';
                                }
                        echo '
                                <div class="hover">
                                    <a href="./Main/Details/load/'.$row["id"].'">
                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>