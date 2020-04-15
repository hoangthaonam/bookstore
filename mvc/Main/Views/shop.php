
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="./">Trang chủ</a>
            <span class="breadcrumb-item active">Cửa hàng</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h2>Bookstore gợi ý bạn đọc</h2>
            <div class="recomended-sec">
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
                </div>
            </div>
            <h2>Sách Tại Bookstore</h2>
            <div class="recent-book-sec">
                <div class="row">
                    <?php  
                        while ($row = mysqli_fetch_array($data["all_books"])) {
                            echo '
                            <div class="col-md-3">
                                <div class="item">
                                    <img src="images/books/'.$row["images"].'" alt="img">';
                            if(strlen($row["name"])>20)
                                echo '<h3>'.mb_substr($row["name"], 0, 17, 'UTF-8').'...</h3>';
                            else 
                                echo '<h3>'.$row["name"].'</h3>';
                                    
                            echo '
                                    <h6><span class="price">'.$row['price'].'đ</span> / <a href="./Main/Details/load/'.$row["id"].'">Xem Chi Tiết</a></h6>
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
                    <!-- <div class="col-md-3">
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
                </div>
                <div class="btn-sec">
                    <button class="btn gray-btn">load More books</button>
                </div>
            </div>
        </div>
    </section>