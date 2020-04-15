
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
                <h3 class="box-title">Tổng Số Sản Phẩm</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo $data["numbook"]; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Sản Phẩm Mới</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $data["newbook"]; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Sản Phẩm Sale</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $data["salebook"]; ?></span></li>
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
                <div class=" pull-right">
                    <a href="#addBook" data-toggle="modal"><button class="btn btn-success"><i class="fas fa-plus"></i> Thêm sách mới</button></a>
                    <!-- Modal -->
                                      <div class="modal fade" id="addBook" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                        <form method="POST" action="./Admin/Book/addBook/" class="form-horizontal form-material" enctype="multipart/form-data" >
                                          <div class="modal-content">
                                          
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Chi Tiết Sản Phẩm</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="white-box">
                                                        <div class="user-btm-box">
                                                            <div class="col-md-4 col-sm-4 text-center">
                                                                <form>
                                                              <div class="custom-file">
                                                                <input type="file" class="custom-file-input mb-3" id="customFile" name="up_images" required="required">
                                                                <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                                              </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-xs-12">
                                                    <div class="white-box">
                                                            <div class="form-group">
                                                                <label class="col-md-12">Tên</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" 
                                                                        class="form-control form-control-line" name="name" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Tác Giả</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" 
                                                                        class="form-control form-control-line" name="author" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Thể loại</label>
                                                                <div class="col-md-12">
                                                            
                                                                <select class="form-control pull-right row b-none" name="type">   
                                                                <?php 
                                                                    foreach ($data["type"] as $keys => $arr)
                                                                    {
                                                                        
                                                                        echo '<option value="'.$arr["id"].'">'.$arr["name"].'</option>';
                                                                    }
                                                                 ?>                      
                                                                    
                                                                </select>
                                                            </div>    
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">NXB</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control form-control-line" name="publisher" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Số Lượng</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" 
                                                                        class="form-control form-control-line" name="amount" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Mô tả</label>
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" rows="10" id="comment" name="des" required="required"></textarea> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Đơn Giá</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" 
                                                                        class="form-control form-control-line" name="price" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Trạng thái</label>
                                                                <div class="col-md-12">
                                                                     <select class="form-control pull-right row b-none" name="status">
                                                                        <option value="0">New</option>
                                                                        <option value="1">Sale</option>
                                                                        <option value="2">Thường</option>
                                                                    </select>
                                                                        </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Edit_user</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="<?php echo $_SESSION["username"] ?>"
                                                                        class="form-control form-control-line" name="edit_user" disabled = "disabled"> </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <button class="btn btn-success" name="btnUpdate">Cập Nhật</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                </div>
                <h3 class="box-title" >Danh sách sản phẩm</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Tác Giả</th>
                                <th>NXB</th>
                                <th>Giá</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $i = 0;
                                $temp = array();
                                
                                while ($row=mysqli_fetch_array($data["book"])) {
                                    # code...
                                    $i++;
                                    echo '
                                    <tr>
                                <td>'.$i.'</td>
                                <td class="txt-oflo">'.$row["name"].'</td>
                                <td>'.$row["author"].'</td>
                                <td class="txt-oflo">'.$row["publisher"].'</td>
                                <td><span class="text-success">'.$row["price"].'đ</span></td>
                                <td>
                                    <abbr title="Chi tiết" style="border: none"><a href="#myModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                  <!-- Modal -->
                                      <div class="modal fade" id="myModal'.$i.'" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                        <form method="POST" action="./Admin/Book/updateBook/'.$row["id"].'" class="form-horizontal form-material" enctype="multipart/form-data" >
                                          <div class="modal-content">
                                          
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Chi Tiết Sản Phẩm</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="white-box">
                                                        <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/logo.png" style="padding-top: 20px">
                                                            <div class="overlay-box">
                                                                <div class="user-content">
                                                                    <a href="javascript:void(0)"><img src="images/books/'.$row["images"].'"
                                                                            class="thumb-lg" alt="img" style="margin-top: 5px; width:120px; height:125px"></a>
                                                                    <h4 class="text-white">'.$row["name"].'</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="user-btm-box">
                                                            <div class="col-md-4 col-sm-4 text-center">
                                                                <form>
                                                              <div class="custom-file">
                                                                <input type="file" class="custom-file-input mb-3" id="customFile" name="up_images" required="required">
                                                                <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                                              </div>
                                                            </form>
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
                                                                <label for="author" class="col-md-12">Tác Giả</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["author"].'"
                                                                        class="form-control form-control-line" name="author" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author" class="col-md-12">Thể loại</label>
                                                                <div class="col-md-12">';
                                                            
                                                                echo '<select class="form-control pull-right row b-none" name="type">';                                 foreach ($data["type"] as $keys => $arr) {
                                                                        echo '<option value="'.$arr["id"].'"'; if($arr["id"]==$row["type"]) echo 'selected = "selected"';echo '>'.$arr["name"].'</option>';

                                                                    }
                            
                                                            echo '</select>
                                                            </div>';

                                                            echo '        
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">NXB</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["publisher"].'" class="form-control form-control-line" name="publisher" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Số Lượng</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["amount"].'"
                                                                        class="form-control form-control-line" name="amount" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Mô tả</label>
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" rows="10" id="comment" name="des" required="required">'.$row["des"].'</textarea> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Đơn Giá</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["price"].'"
                                                                        class="form-control form-control-line" name="price" required="required"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Trạng thái</label>
                                                                <div class="col-md-12">';
                                                                     echo '<select class="form-control pull-right row b-none" name="status">';
                            echo '<option value="0"'; if($row["status"]==0) echo 'selected = "selected"';echo '>New</option>';
                            echo '<option value="1"'; if($row["status"]==1) echo 'selected = "selected"';echo '>Sale</option>';
                            echo '<option value="2"'; if($row["status"]==2) echo 'selected = "selected"';echo '>Thường</option>';
                            echo '</select>';


                                                                echo '
                                                                        </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Edit_user</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" value="'.$row["edit_user"].'"
                                                                        class="form-control form-control-line" name="edit_user"> </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <button class="btn btn-success" name="btnUpdate">Cập Nhật</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                      
                                    <abbr title="Xóa" style="border: none"><a href="./Admin/Book/removeBook/'.$row["id"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
                                </td>
                            </tr>
                                    ';
                                }
                            ?>
                            <form method="POST"></form>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- chat-listing & recent comments -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- .col -->
        <!-- <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Liên hệ gần đây</h3>
                <div class="comment-center p-t-10">
                    <div class="comment-body">
                        <div class="user-img"> <img src="../plugins/images/users/m10.jpg" alt="user" class="img-circle">
                        </div>
                        <div class="mail-contnet">
                            <h5>Leo Messi</h5><span class="time">Thứ 4 19/02/2020</span>
                            <br/><span class="mail-desc">Sách xịn quá mấy bạn ơi</span> <a href="javacript:void(0)" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Approve</a><a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="panel">
                <div class="sk-chat-widgets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            VIP
                        </div>
                        <div class="panel-body">
                            <ul class="chatonline">
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small> </span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /.col -->
    </div>
</div>
