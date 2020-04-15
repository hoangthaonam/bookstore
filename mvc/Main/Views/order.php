
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.html">Trang chủ</a>
            <span class="breadcrumb-item active">Đặt hàng</span>
        </div>
    </div>
    <section class="static cart-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                        <form action="/action_page.php">
                          <div class="form-group">
                            <label for="name">Họ tên:</label>
                            <input type="name" class="form-control" value="<?php echo $data["account"]["name"] ?>"  id="name">
                          </div>
                          <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <input type="address" class="form-control" value="<?php echo $data["account"]["address"] ?>" id="address">
                          </div>
                          <div class="form-group">
                            <label for="ph-number">Số điện thoại:</label>
                            <input type="ph-number" class="form-control" value="<?php echo $data["account"]["phone"] ?>" id="ph-number">
                          </div>
                        </form>
                        <table class="table table-striped table-hover table-responsive-sm" style="text-align: center;">
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // print_r($data["books"]); 
                                $i = 0;
                                $total = 0;
                                $_SESSION["bill"]=$data["books"];
                                    while ($book=each($data["books"])) {
                                        # code...
                                        
                                        echo '
                                        <tr>
                                            <td>'.++$i.'</td>
                                            <td>'.$book[1]["name"].'</td>
                                            <td>'.$book[1]["price"].'</td>
                                            <td>'.$book[1]["number"].'</td>
                                            <td>'.$book[1]["price"]*$book[1]["number"].'</td>
                                        </tr>
                                        ';
                                        $total += $book[1]["price"]*$book[1]["number"];

                                    }
                                ?>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>Hài Hước Một Chút ...</td>
                                    <td>41700đ</td>
                                    <td>1</td>
                                    <td>41700đ</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Hài Hước Một Chút ...</td>
                                    <td>41700đ</td>
                                    <td>1</td>
                                    <td>41700đ</td>
                                </tr> -->
                            </tbody>
                        </table> 
                </div>
                <div class="col-sm-4">
                    <table class="table">
                        <tr>
                            <td>Tổng tiền hàng:</td>
                            <td><?php echo $total; ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Phí vận chuyển:</td>
                            <td>0đ</td>
                        </tr>
                        <tr>
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="text-danger">41700đ</strong></td>
                        </tr> -->
                    </table>
                    <div>
                        <a href="./Main/Bill/addBill/"><button class="btn btn-warning pull-right" >Xác nhận</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
