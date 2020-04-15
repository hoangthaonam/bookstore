
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="./" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Quay Lại Trang Chủ</a>
            <ol class="breadcrumb">
                <li><a href="./Admin">Dashboard</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Tổng Số Tài Khoản</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo $data["numaccount"]; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Số Thành Viên</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $data["nummember"]; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Số Quản Trị Viên</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $data["numadmin"]; ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->
    <!-- <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Products Yearly Sales</h3>
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-info"></i>Mac</h5> </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Windows</h5> </li>
                </ul>
                <div id="ct-visits" style="height: 405px;"></div>
            </div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <!-- <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                    <select class="form-control pull-right row b-none">
                        <option>Tháng 3 2017</option>
                        <option>Tháng 4 2017</option>
                        <option>Tháng 5 2017</option>
                        <option>June 2017</option>
                        <option>July 2017</option>
                    </select>
                </div> -->
                <h3 class="box-title">Top 5 Khách Hàng</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i = 0;
                                while ($row = mysqli_fetch_array($data["VIP"])) {
                                    # code...
                                    echo '
                                        <tr>
                                <td>'.++$i.'</td>
                                <td class="txt-oflo">'.$row["username"].'</td>
                                <td>'.$row["name"].'</td>
                                <td class="txt-oflo">1234567890</td>
                                <td><span class="text-success">Gia Lai</span></td>
                                <td>
                                    <abbr title="Chi tiết" style="border: none"><a href="#myModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                  <!-- Modal -->
                                      <div class="modal fade" id="myModal'.$i.'" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                        <form method="POST" action="./Admin/Customer/updateAccountRule/'.$row["id"].'" class="form-horizontal form-material" enctype="multipart/form-data" >
                                          <div class="modal-content">
                                          
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Thông Tin Khách Hàng</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="white-box">
                                                        <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/logo.png" style="padding-top: 20px">
                                                            <div class="overlay-box">
                                                                <div class="user-content">
                                                                    <a href="javascript:void(0)"><img src="images/account/'.$row["images"].'"
                                                                            class="thumb-lg" alt="img" style="margin-top: 5px; width:120px; height:125px"></a>
                                                                    <h4 class="text-white">'.$row["name"].'</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-xs-12">
                                                    <div class="white-box">
                                                            <div class="form-group">
                                                                <label class="col-md-12">Tên</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["name"].'"
                                                                        class="form-control form-control-line" name="name" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Tuổi</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["age"].'"
                                                                        class="form-control form-control-line" name="age" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Số Điện Thoại</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["phone"].'"
                                                                        class="form-control form-control-line" name="phone" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Địa Chỉ</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["address"].'" class="form-control form-control-line" name="address" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Email</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["email"].'"
                                                                        class="form-control form-control-line" name="email" required="required"> 
                                                                        </div>
                                                            </div>
                                                            <div>';
                                                            echo '<select name="rule" class="form-control pull-right row b-none" id="accountstatus'.$row["id"].'">';
                        echo '<option value="0"'; if($row["rule"]==0) echo 'selected = "selected"';echo '>Khách</option>';
                        echo '<option value="1"'; if($row["rule"]==1) echo 'selected = "selected"';echo '>Admin</option>';
                        echo '</select>';
                                                            echo '</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-success">Cập Nhật</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                      </div>
                                    <abbr title="Xóa" style="border: none"><a href="./Admin/Customer/removeCustomer/'.$row["username"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
                                </td>
                            </tr>
                                    ';
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <!-- <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                    <select class="form-control pull-right row b-none">
                        <option>Tháng 3 2017</option>
                        <option>Tháng 4 2017</option>
                        <option>Tháng 5 2017</option>
                        <option>June 2017</option>
                        <option>July 2017</option>
                    </select>
                </div> -->
                <h3 class="box-title">Danh sách Khách Hàng</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i = 0;
                                while ($row = mysqli_fetch_array($data["customer"])) {
                                    # code...
                                    echo '
                                        <tr>
                                <td>'.++$i.'</td>
                                <td class="txt-oflo">'.$row["username"].'</td>
                                <td>'.$row["name"].'</td>
                                <td class="txt-oflo">1234567890</td>
                                <td><span class="text-success">Gia Lai</span></td>
                                <td>
                                    <abbr title="Chi tiết" style="border: none"><a href="#myallModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                  <!-- Modal -->
                                      <div class="modal fade" id="myallModal'.$i.'" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                        <form method="POST" action="./Admin/Customer/updateAccountRule/'.$row["id"].'" class="form-horizontal form-material" enctype="multipart/form-data" >
                                          <div class="modal-content">
                                          
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Thông Tin Khách Hàng</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="white-box">
                                                        <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/logo.png" style="padding-top: 20px">
                                                            <div class="overlay-box">
                                                                <div class="user-content">
                                                                    <a href="javascript:void(0)"><img src="images/account/'.$row["images"].'"
                                                                            class="thumb-lg" alt="img" style="margin-top: 5px; width:120px; height:125px"></a>
                                                                    <h4 class="text-white">'.$row["name"].'</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-xs-12">
                                                    <div class="white-box">
                                                            <div class="form-group">
                                                                <label class="col-md-12">Tên</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["name"].'"
                                                                        class="form-control form-control-line" name="name" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Tuổi</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["age"].'"
                                                                        class="form-control form-control-line" name="age" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Số Điện Thoại</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["phone"].'"
                                                                        class="form-control form-control-line" name="phone" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Địa Chỉ</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["address"].'" class="form-control form-control-line" name="address" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Email</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["email"].'"
                                                                        class="form-control form-control-line" name="email" required="required"> 
                                                                        </div>
                                                            </div>
                                                            <div>';
                                                            echo '<select name="rule" class="form-control pull-right row b-none" id="accountstatus'.$row["id"].'">';
                        echo '<option value="0"'; if($row["rule"]==0) echo 'selected = "selected"';echo '>Khách</option>';
                        echo '<option value="1"'; if($row["rule"]==1) echo 'selected = "selected"';echo '>Admin</option>';
                        echo '</select>';
                                                            echo '</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-success">Cập Nhật</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                      </div>
                                    <abbr title="Xóa" style="border: none"><a href="./Admin/Customer/removeCustomer/'.$row["username"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
                                </td>
                            </tr>
                                    ';
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <!-- <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                    <select class="form-control pull-right row b-none">
                        <option>Tháng 3 2017</option>
                        <option>Tháng 4 2017</option>
                        <option>Tháng 5 2017</option>
                        <option>June 2017</option>
                        <option>July 2017</option>
                    </select>
                </div> -->
                <h3 class="box-title">Danh sách Admin</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i = 0;
                                while ($row = mysqli_fetch_array($data["admin"])) {
                                    # code...
                                    echo '
                                        <tr>
                                <td>'.++$i.'</td>
                                <td class="txt-oflo">'.$row["username"].'</td>
                                <td>'.$row["name"].'</td>
                                <td class="txt-oflo">1234567890</td>
                                <td><span class="text-success">Gia Lai</span></td>
                                <td>
                                    <abbr title="Chi tiết" style="border: none"><a href="#myadminModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                  <!-- Modal -->
                                      <div class="modal fade" id="myadminModal'.$i.'" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                        <form method="POST" action="./Admin/Customer/updateAccountRule/'.$row["id"].'" class="form-horizontal form-material" enctype="multipart/form-data" >
                                          <div class="modal-content">
                                          
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Thông Tin Khách Hàng</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="white-box">
                                                        <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/logo.png" style="padding-top: 20px">
                                                            <div class="overlay-box">
                                                                <div class="user-content">
                                                                    <a href="javascript:void(0)"><img src="images/account/'.$row["images"].'"
                                                                            class="thumb-lg" alt="img" style="margin-top: 5px; width:120px; height:125px"></a>
                                                                    <h4 class="text-white">'.$row["name"].'</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-xs-12">
                                                    <div class="white-box">
                                                            <div class="form-group">
                                                                <label class="col-md-12">Tên</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["name"].'"
                                                                        class="form-control form-control-line" name="name" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Tuổi</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["age"].'"
                                                                        class="form-control form-control-line" name="age" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Số Điện Thoại</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["phone"].'"
                                                                        class="form-control form-control-line" name="phone" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Địa Chỉ</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["address"].'" class="form-control form-control-line" name="address" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Email</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["email"].'"
                                                                        class="form-control form-control-line" name="email" required="required"> 
                                                                        </div>
                                                            </div>
                                                            <div>';
                                                            echo '<select name="rule" class="form-control pull-right row b-none" id="accountstatus'.$row["id"].'">';
                        echo '<option value="0"'; if($row["rule"]==0) echo 'selected = "selected"';echo '>Khách</option>';
                        echo '<option value="1"'; if($row["rule"]==1) echo 'selected = "selected"';echo '>Admin</option>';
                        echo '</select>';
                                                            echo '</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-success">Cập Nhật</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                      </div>
                                    <abbr title="Xóa" style="border: none"><a href="./Admin/Customer/removeCustomer/'.$row["username"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
                                </td>
                            </tr>
                                    ';
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>