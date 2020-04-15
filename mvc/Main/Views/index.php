
    <section class="slider">
        <div class="container">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="slide">
                        <img src="images/slide1.jpg"     alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Chào mừng bạn đến với BookStore</h3>
                                <h5>Tham gia khám phá những tựa sách hay nhất cùng với BookStore</h5>
                                <a href="./Main/Shop" class="btn">Vào Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="images/index_obama.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Barack Obama</h3>
                                <h5>"Việc đọc rất quan trọng. Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn"</h5>
                                <a href="./Main/Shop" class="btn">Vào Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="images/slide3.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Victor Hugo</h3>
                                <h5>"Chính từ sách mà những người khôn ngoan tìm được sự an ủi khỏi những rắc rối của cuộc đời"</h5>
                                <a href="./Main/Shop" class="btn">Vào Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="images/slide4.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Sưu tầm</h3>
                                <h5>"Đọc sách cho tâm trí cũng cần như thể dục cho cơ thể"</h5>
                                <a href="./Main/Shop" class="btn">Vào Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Gợi ý đọc sách-->
    <section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>Bookstore gợi ý bạn đọc</h2>
                <hr>
            </div>
            <div class="row">
                <?php
                    while ($row=mysqli_fetch_array(($data["book"])))
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
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="images/truong.jpg" alt="img">
                        <h3>Trường Mẫu Giáo Uyên...</h3>
                        <h6><span class="price">60900đ</span> / <a href="#">Mua ngay</a></h6>
                        <div class="hover">
                            <a href="product-single.html">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!--Giới thiệu-->
    <section class="about-sec">
        <div class="about-img">
            <figure style="background:url(./images/about-img.jpg)no-repeat;"></figure>
        </div>
        <div class="about-content">
            <?php
                echo '
                <h1>'.$data["intro"]["title"].'</h1>
                <p>'.mb_substr($data["intro"]["content"],0,600,'UTF-8').'...</p>
                ';

            ?>
            <div class="btn-sec">
                <a href="./Main/Shop" class="btn yellow">Vào Shop</a>
                <a href="./Main/Intro" class="btn black">Xem Thêm</a>
            </div>
        </div>
    </section>
    <!--Gần đây-->
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>Sách tại BookStore</h2>
                <hr>
            </div>
            <div class="row">
                <?php  
                    while ($row = mysqli_fetch_array($data["tenbook"])) {                 
                    echo '
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="item">
                                <img src="images/books/'.$row["images"].'" alt="img" style>';
                    if(strlen($row["name"])>20)
                        echo '<h3>'.mb_substr($row["name"], 0, 17, 'UTF-8').'...</h3>';
                    else 
                        echo '<h3>'.$row["name"].'</h3>';                               
                    echo '
                                <h6><span class="price">'.$row["price"].'</span> / <a href="./Main/Details/load/'.$row["id"].'">Xem Chi Tiết</a></h6>
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
                <!-- <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item">
                        <img src="images/s1.jpg" alt="img">
                        <h3>Hài Hước Một Chút ...</h3>
                        <h6><span class="price">41700đ</span> / <a href="#">Mua ngay</a></h6>
                        <div class="hover">
                            <a href="product-single.html">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div> -->
                <!-- <img src="" style="width: "> -->
            </div>
            <div class="btn-sec">
                <a href="./Main/Shop" class="btn gray-btn">Xem tất cả</a>
            </div>
        </div>
    </section>
    <section class="features-sec">
        <div class="container">
            <ul>
                <li>
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <h3>Mua sắm an toàn</h3>
                    <h5>Đảm bảo mua sắm an toàn</h5>
                    <h6>BookStore cam kết sản phẩm của Cửa hàng 100% là sản phẩm thật và sản phẩm đến tay Khách hàng cũng là sản phẩm thật</h6>
                </li>
                <li>
                    <span class="icon return"><i class="fa fa-reply-all" aria-hidden="true"></i></span>
                    <h3>Cập nhật hàng ngày</h3>
                    <h5>Đảm bảo số lượng sách</h5>
                    <h6>BookStore luôn thực hiện cập nhật các loại sách mới mỗi ngày để đáp ứng nhu cầu đọc sách của Khách hàng</h6>
                </li>
                <li>
                    <span class="icon chat"><i class="fa fa-comments" aria-hidden="true"></i></span>
                    <h3>Hỗ trợ 24/7</h3>
                    <h5>Hỗ trợ trực tuyến</h5>
                    <h6>BookStore thực hiện việc hỗ trợ trực tuyến 24/7 nhằm giải đáp mọi thắc mắc của khách hàng liên quan đến sản phẩm của BookStore</h6>
                </li>
            </ul>
        </div>
    </section>
    <section class="testimonial-sec">
        <div class="container">
            <div id="testimonal" class="owl-carousel owl-theme">
                <div class="item">
                    <h3>Shop này sách bao hay mấy bạn ơi. Chưa kể chủ shop cũng đẹp zai không kém.</h3>
                    <div class="box-user">
                        <h4 class="author">Hoàng Thao Nam</h4>
                        <span class="country">Gia Lai</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Shop này toàn sách mới, giá cả lại hợp lý. Mọi người nên mua ủng hộ Shop nhé.</h3>
                    <div class="box-user">
                        <h4 class="author">Nam Hoàng Thao</h4>
                        <span class="country">Hà Nội</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Shop làm ăn uy tín, giao hàng nhanh mà sản phẩm thì đảm bảo chất lượng.</h3>
                    <div class="box-user">
                        <h4 class="author">Hoàng Nam Thao</h4>
                        <span class="country">TP.Hồ Chí Minh</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Shop này chuyên nghiệp quá, gói sách cẩn thận lắm. Đúng là đáng đồng tiền bát gạo mà.</h3>
                    <div class="box-user">
                        <h4 class="author">Nam Thao Hoàng</h4>
                        <span class="country">Đà Nẵng</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-quote">
            <img src="images/left-quote.png" alt="quote">
        </div>
        <div class="right-quote">
            <img src="images/right-quote.png" alt="quote">
        </div>
    </section>
    