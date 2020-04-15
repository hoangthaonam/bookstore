
        <div class="container">
            <a class="breadcrumb-item" href="./Main">Trang chủ</a>
            <span class="breadcrumb-item active">Tài khoản của tôi</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container account" style="">
            <div class="row">
                <div class="user_bar col-sm-3">
                    <div class="user border border-left-0 border-top-0">
                        <img src="images/account/<?php echo $data["infor"]["images"] ?>" alt="avatar">
                        <p><?php echo $data["infor"]["name"] ?></p>
                    </div>
                    <div class="left_bar_menu">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" href="#change_infor" data-toggle="pill"><i class="fas fa-info-circle"></i>Thông tin</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#change_avt" data-toggle="pill"><i class="fas fa-images"></i>Thay avt</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#change_pwd" data-toggle="pill"><i class="fas fa-key"></i>Đổi mật khẩu</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#my_order" data-toggle="pill"><i class="fas fa-file-invoice"></i>Đơn hàng của tôi</a>
                            </li>
                          </ul>
                    </div>
                </div>
                <div class="tab-content col-sm-9">
                    <div class="tab-pane active" id="change_infor">
                        <form action="./Main/MyAccount/updateAccount/<?php echo $data["infor"]["id"] ?>" enctype="multipart/form-data" method="POST">
                          <div class="form-group">
                            <label for="name">Họ tên:</label>
                            <span style="color: red">*</span>
                            <input type="name" class="form-control" value="<?php echo $data["infor"]["name"] ?>" name="name" required>
                          </div>
                          <div class="form-group">
                            <label for="age">Tuổi:</label>
                            <span style="color: red">*</span>
                            <input type="age" class="form-control" value="<?php echo $data["infor"]["age"] ?>" name="age" required>
                          </div>
                          <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <span style="color: red">*</span>
                            <input type="address" class="form-control" value="<?php echo $data["infor"]["address"] ?>" name="address" required>
                          </div>
                          <div class="form-group">
                            <label for="ph-number">Số điện thoại:</label>
                            <span style="color: red">*</span>
                            <input type="ph-number" class="form-control" value="<?php echo $data["infor"]["phone"] ?>" name="phone" required>
                          </div>
                          <div class="form-group">
                            <label for="email">Email:</label>
                            <span style="color: red">*</span>
                            <input type="email" class="form-control" value="<?php echo $data["infor"]["email"] ?>" name="email" required>
                          </div>
                          <div class="form-group">
                              <button class="btn d-inline" name="btnUpdate">Cập nhật</button>
                              <button class="btn d-inline black">Trở lại</button>
                          </div>
                        </form>
                    </div>
                    <div class=" tab-pane" id="change_avt">
                        <form action="./Main/MyAccount/updateImages/<?php echo $data["infor"]["id"] ?>" enctype="multipart/form-data" method="POST">
                          
                          <div class="form-group">
                            <label for="images">Chọn hình khác:</label>
                            <input type="file" class="form-control"  name="up_images" required="required">
                          </div>
                          <div class="form-group">
                              <button class="btn d-inline" name="btnUpdateImages">Cập nhật</button>
                              <button class="btn d-inline black">Trở lại</button>
                          </div>
                        </form>
                    </div>
                    <div class=" tab-pane" id="change_pwd">
                        <form action="./Main/MyAccount/changePassword/<?php echo $data["infor"]["id"] ?>" method="POST">
                          <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <span style="color: red">*</span>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="old_pwd" required>
                          </div>
                          <div class="form-group">
                            <label for="pwd">Mật khẩu mới:</label>
                            <span style="color: red">*</span>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name ="new_pwd" required>
                          </div>
                          <div class="form-group">
                            <label for="pwd">Nhập lại mật khẩu mới:</label>
                            <span style="color: red">*</span>
                            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="re_pwd" required>
                          </div>
                          <div class="form-group">
                              <button class="btn d-inline" name="btnChangePass">Đổi mật khẩu</button>
                              <button class="btn d-inline black">Trở lại</button>
                          </div>
                        </form>
                    </div>
                    <div class=" tab-pane" id="my_order">
                        <table class="table table-striped table-hover table-responsive" style="text-align: center;">
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $i = 0;
                              while ($row = mysqli_fetch_array($data["bill"])) {
                                # code...
                                
                                echo '
                                  <tr>
                                    <td>'.++$i.'</td>';
                                    if(strlen($row["bookname"])>20)
                            echo '<td>'.mb_substr($row["bookname"], 0, 17, 'UTF-8').'...</td>';
                        else 
                            echo '<td>'.$row["bookname"].'</td>';
                                echo '
                                    <td>'.$row["bookprice"].'</td>
                                    <td>'.$row["number"].'</td>
                                    <td>'.$row["amount"].'</td>';
                                    if($row["billstatus"]==1) echo '<td>Chờ Xác Nhận</td>';
                                    elseif ($row["billstatus"]==2) echo '<td>Đang Vận Chuyển</td>';
                                    elseif ($row["billstatus"]==3) echo '<td>Hoàn Thành</td>';
                                    elseif ($row["billstatus"]==4) echo '<td>Đã Hủy</td>';
                                    echo '
                                    <td>'.date("d/m/Y",strtotime($row["daycreate"])).'</td>
                                    <td>';if($row["billstatus"]==1) echo '<a href="./Main/Bill/removeBill/'.$row["bill_id"].'"><i class="fas fa-trash"></i></a>';
                                    echo '</td>
                                </tr>
                                ';
                              } ?>
                                
                            </tbody>
                        </table> 
                    </div>
                </div>  
            </div>
        </div>
    </section>
