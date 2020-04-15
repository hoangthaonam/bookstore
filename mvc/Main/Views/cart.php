    

    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="./">Trang chủ</a>
            <span class="breadcrumb-item active">Giỏ hàng</span>
        </div>
    </div>
    <section class="static cart-sec">
        <div class="container">
            <table class="table table-striped table-hover table-responsive-sm" style="text-align: center;">
                <thead class="thead-light">
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th style="padding-right: 95px">Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        $sum = 0;
                        if(!empty($data["cart"]))
                        {
                            $arr = array();
                            foreach ($data["cart"] as $book_id => $book) {
                                # code...
                                $arr[$i]=$book_id;
                                $i++;
                                echo '
                                    <tr>
                                    <td><input type="checkbox" id="row'.$book_id.'"></td>
                                    <td>'.$i.'</td>
                                    <td>'.$book["name"].'</td>
                                    <td><img src ="images/books/'.$data["images"][$book_id].'" style="width: 60px;"/></td>
                                    <td id="price'.$book_id.'">'.$book["price"].'</td>
                                    <td><div class="def-number-input number-input safari_only">
                                      <button onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown(); changePrice('.$book_id.'); " class="minus"></button>


                                      <input class="quantity" min="1" max="'.$data["number"][$book_id].'" name="sl'.$book_id.'" value="'.$book["number"].'" type="number" onchange="changePrice('.$book_id.');" id="qtity_book'.$book_id.'" name="qtity_book'.$book_id.'">



                                      <button onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp(); changePrice('.$book_id.'); " class="plus"></button>
                                    </div></td>
                                    <td id="total'.$book_id.'">'.$book["price"]*$book["number"].'đ</td>
                                    <td>
                                        <div class="option">
                                            <a href="javascript:void(0)" onclick = updateItem('.$book_id.','.$_SESSION["id"].')><i class="fas fa-save"></i></a>
                                             <a href="./Main/Cart/removeItem/'.$_SESSION["id"].'/'.$book_id.'"><i class="fas fa-trash"></i></a>

                                        </div>
                                    </td>
                                </tr>
                                ';
                            }
                        }
                        
                            ?>
                        
                </tbody>
            </table>
            <div>
             </div>
            <div class="pull-right">
                <?php 
                if(isset($arr)){
                    $array = json_encode($arr);
                echo '<a href="javascript:void(0)" onclick=" Order('.$array.')"><button class="btn btn-warning pull-right d-inline">Đặt hàng</button></a>';
                }
                else echo "Giỏ hàng trống";
                 ?>
                
            </div>
        </div>
    </section>