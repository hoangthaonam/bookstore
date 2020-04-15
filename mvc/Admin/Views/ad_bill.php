
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
                <h3 class="box-title">Tổng Số Đơn Hàng</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo $data["numallbill"]; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Đơn Hàng Đã Giao</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $data["numcombill"]; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Đơn Hàng Bị Hủy</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $data["numcanbill"]; ?></span></li>
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
<!-- Đơn mới -->
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

                <!-- Đơn hàng mới -->
                <h3 class="box-title" >Đơn Hàng Mới</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                                <th>Giá</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $i = 0;
                                while ($row = mysqli_fetch_array($data["newbill"])) {
                                    $i++;
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td class="txt-oflo">'.$row["bookname"].'</td>';
                                    if($row["status"] == 0)
                                    echo ' 
                                        <td>New</td>';
                                    elseif($row["status"] == 1)
                                    echo ' 
                                        <td>SALE</td>';
                                    else
                                    echo ' 
                                        <td>Normal</td>';
                                    echo '
                                        <td class="txt-oflo">'.$row["daycreate"].'</td>
                                        <td><span class="text-success">'.$row["amount"].'đ</span></td>
                                        <td>
                                                <abbr title="Chi tiết" style="border: none"><a href="#myModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                                <abbr title="Xóa" style="border: none"><a href="./Admin/Bill/deleteBill/'.$row["bill_id"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
<!-- Modal -->
  <div class="modal fade" id="myModal'.$i.'" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chi Tiết Đơn Hàng</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Sản Phẩm</h4>
                    <div class="white-box">
                      <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Tên Sản Phẩm</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookname"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Hình ảnh</label>
                            <div class="col-md-12">
                                <img src="images/books/'.$row["bookimages"].'" class="form-control form-control-line" style="height: 125px;width: 120px;">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Tác Giả</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookauthor"].'"
                                    class="form-control form-control-line" > </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">NXB</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookpublisher"].'" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Số Lượng</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["number"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Đơn Giá</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookprice"].'đ"
                                    class="form-control form-control-line"> </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Khách Hàng</h4>
                    <div class="white-box">
                        <form class="form-horizontal form-material">
                            <div class="form-group">
                                <label class="col-md-12">Họ Tên</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["customername"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" value="'.$row["accountemail"].'"
                                        class="form-control form-control-line" name="example-email"
                                       > </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Số Điện Thoại</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountphone"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Địa Chỉ Nhận Hàng</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountaddress"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Thời Gian Đặt</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["daycreate"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                        </form>
                        <h4 class="text-danger">Thanh Toán</h4>
                        <table class="table">
                            <tr>
                                <td style="font-weight: bold;">Tổng tiền hàng:</td>
                                <td>'.$row["number"]*$row["bookprice"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Phí vận chuyển:</td>
                                <td>'.$row["ship"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Tổng đơn hàng:</td>
                                <td><strong class="text-danger">'.$row['amount'].'</strong></td>
                            </tr>
                        </table>
                        <h4 class="text-danger">Xác Thực Đơn Hàng</h4>
                        <div>';
                        
                        echo '<select class="form-control pull-right row b-none" id="billstatus'.$row["bill_id"].'">';
                        echo '<option value="1"'; if($row["billstatus"]==1) echo 'selected = "selected"';echo '>Chưa Xác Nhận/ Mới</option>';
                        echo '<option value="2"'; if($row["billstatus"]==2) echo 'selected = "selected"';echo '>Đang Vận Chuyển</option>';
                        echo '<option value="3"'; if($row["billstatus"]==3) echo 'selected = "selected"';echo '>Hoàn Thành</option>';
                        echo '<option value="4"'; if($row["billstatus"]==4) echo 'selected = "selected"';echo '>Đã Hủy</option>';
                        echo '</select>';
                        
                        echo'    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
             <button class="btn btn-success" onclick="UpdateBillStatus('.$row["bill_id"].')">Cập Nhật</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                                            
                                        </td>
                                </tr>
                                ';
                            }
                            if($i==0) echo "Không có đơn hàng nào";
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>


<!-- Đơn Hoàn Thành -->
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

                <!-- Đơn hàng mới -->
                <h3 class="box-title" >Đơn Hàng Hoàn Thành</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                                <th>Giá</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $i = 0;
                                while ($row = mysqli_fetch_array($data["combill"])) {
                                    $i++;
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td class="txt-oflo">'.$row["bookname"].'</td>';
                                    if($row["status"] == 0)
                                    echo ' 
                                        <td>New</td>';
                                    elseif($row["status"] == 1)
                                    echo ' 
                                        <td>SALE</td>';
                                    else
                                    echo ' 
                                        <td>Normal</td>';
                                    echo '
                                        <td class="txt-oflo">'.$row["daycreate"].'</td>
                                        <td><span class="text-success">'.$row["amount"].'đ</span></td>
                                        <td>
                                                <abbr title="Chi tiết" style="border: none"><a href="#myComModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                                <abbr title="Xóa" style="border: none"><a href="./Admin/Bill/deleteBill/'.$row["bill_id"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
<!-- Modal -->
  <div class="modal fade" id="myComModal'.$i.'" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chi Tiết Đơn Hàng</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Sản Phẩm</h4>
                    <div class="white-box">
                      <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Tên Sản Phẩm</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookname"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Hình ảnh</label>
                            <div class="col-md-12">
                                <img src="images/books/'.$row["bookimages"].'" class="form-control form-control-line" style="height: 125px;width: 120px;">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Tác Giả</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookauthor"].'"
                                    class="form-control form-control-line" > </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">NXB</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookpublisher"].'" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Số Lượng</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["number"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Đơn Giá</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookprice"].'đ"
                                    class="form-control form-control-line"> </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Khách Hàng</h4>
                    <div class="white-box">
                        <form class="form-horizontal form-material">
                            <div class="form-group">
                                <label class="col-md-12">Họ Tên</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["customername"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" value="'.$row["accountemail"].'"
                                        class="form-control form-control-line" name="example-email"
                                       > </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Số Điện Thoại</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountphone"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Địa Chỉ Nhận Hàng</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountaddress"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Thời Gian Đặt</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["daycreate"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                        </form>
                        <h4 class="text-danger">Thanh Toán</h4>
                        <table class="table">
                            <tr>
                                <td style="font-weight: bold;">Tổng tiền hàng:</td>
                                <td>'.$row["number"]*$row["bookprice"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Phí vận chuyển:</td>
                                <td>'.$row["ship"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Tổng đơn hàng:</td>
                                <td><strong class="text-danger">'.$row['amount'].'</strong></td>
                            </tr>
                        </table>
                        <h4 class="text-danger">Xác Thực Đơn Hàng</h4>
                        <div>';
                        
                        echo '<select class="form-control pull-right row b-none" id="billstatus'.$row["bill_id"].'">';
                        echo '<option value="1"'; if($row["billstatus"]==1) echo 'selected = "selected"';echo '>Chưa Xác Nhận/ Mới</option>';
                        echo '<option value="2"'; if($row["billstatus"]==2) echo 'selected = "selected"';echo '>Đang Vận Chuyển</option>';
                        echo '<option value="3"'; if($row["billstatus"]==3) echo 'selected = "selected"';echo '>Hoàn Thành</option>';
                        echo '<option value="4"'; if($row["billstatus"]==4) echo 'selected = "selected"';echo '>Đã Hủy</option>';
                        echo '</select>';
                        
                        echo'    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
             <button class="btn btn-success" onclick="UpdateBillStatus('.$row["bill_id"].')">Cập Nhật</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                                            
                                        </td>
                                </tr>
                                ';
                            }
                            if($i==0) echo "Không có đơn hàng nào";
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>


<!-- Đơn Vận Chuyển -->
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

                <!-- Đơn hàng mới -->
                <h3 class="box-title" >Đơn Hàng Đang Vận Chuyển</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                                <th>Giá</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $i = 0;
                                while ($row = mysqli_fetch_array($data["transbill"])) {
                                    $i++;
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td class="txt-oflo">'.$row["bookname"].'</td>';
                                    if($row["status"] == 0)
                                    echo ' 
                                        <td>New</td>';
                                    elseif($row["status"] == 1)
                                    echo ' 
                                        <td>SALE</td>';
                                    else
                                    echo ' 
                                        <td>Normal</td>';
                                    echo '
                                        <td class="txt-oflo">'.$row["daycreate"].'</td>
                                        <td><span class="text-success">'.$row["amount"].'đ</span></td>
                                        <td>
                                                <abbr title="Chi tiết" style="border: none"><a href="#myTranModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                                <abbr title="Xóa" style="border: none"><a href="./Admin/Bill/deleteBill/'.$row["bill_id"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
<!-- Modal -->
  <div class="modal fade" id="myTranModal'.$i.'" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chi Tiết Đơn Hàng</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Sản Phẩm</h4>
                    <div class="white-box">
                      <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Tên Sản Phẩm</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookname"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Hình ảnh</label>
                            <div class="col-md-12">
                                <img src="images/books/'.$row["bookimages"].'" class="form-control form-control-line" style="height: 125px;width: 120px;">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Tác Giả</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookauthor"].'"
                                    class="form-control form-control-line" > </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">NXB</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookpublisher"].'" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Số Lượng</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["number"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Đơn Giá</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookprice"].'đ"
                                    class="form-control form-control-line"> </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Khách Hàng</h4>
                    <div class="white-box">
                        <form class="form-horizontal form-material">
                            <div class="form-group">
                                <label class="col-md-12">Họ Tên</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["customername"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" value="'.$row["accountemail"].'"
                                        class="form-control form-control-line" name="example-email"
                                       > </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Số Điện Thoại</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountphone"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Địa Chỉ Nhận Hàng</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountaddress"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Thời Gian Đặt</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["daycreate"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                        </form>
                        <h4 class="text-danger">Thanh Toán</h4>
                        <table class="table">
                            <tr>
                                <td style="font-weight: bold;">Tổng tiền hàng:</td>
                                <td>'.$row["number"]*$row["bookprice"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Phí vận chuyển:</td>
                                <td>'.$row["ship"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Tổng đơn hàng:</td>
                                <td><strong class="text-danger">'.$row['amount'].'</strong></td>
                            </tr>
                        </table>
                        <h4 class="text-danger">Xác Thực Đơn Hàng</h4>
                        <div>';
                        
                        echo '<select class="form-control pull-right row b-none" id="billstatus'.$row["bill_id"].'">';
                        echo '<option value="1"'; if($row["billstatus"]==1) echo 'selected = "selected"';echo '>Chưa Xác Nhận/ Mới</option>';
                        echo '<option value="2"'; if($row["billstatus"]==2) echo 'selected = "selected"';echo '>Đang Vận Chuyển</option>';
                        echo '<option value="3"'; if($row["billstatus"]==3) echo 'selected = "selected"';echo '>Hoàn Thành</option>';
                        echo '<option value="4"'; if($row["billstatus"]==4) echo 'selected = "selected"';echo '>Đã Hủy</option>';
                        echo '</select>';
                        
                        echo'    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
             <button class="btn btn-success" onclick="UpdateBillStatus('.$row["bill_id"].')">Cập Nhật</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                                            
                                        </td>
                                </tr>
                                ';
                            }
                            if($i==0) echo "Không có đơn hàng nào";
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>


<!-- Đơn Hủy -->
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

                <!-- Đơn hàng mới -->
                <h3 class="box-title" >Đơn Hàng Đã Hủy</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                                <th>Giá</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $i = 0;
                                while ($row = mysqli_fetch_array($data["canbill"])) {
                                    $i++;
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td class="txt-oflo">'.$row["bookname"].'</td>';
                                    if($row["status"] == 0)
                                    echo ' 
                                        <td>New</td>';
                                    elseif($row["status"] == 1)
                                    echo ' 
                                        <td>SALE</td>';
                                    else
                                    echo ' 
                                        <td>Normal</td>';
                                    echo '
                                        <td class="txt-oflo">'.$row["daycreate"].'</td>
                                        <td><span class="text-success">'.$row["amount"].'đ</span></td>
                                        <td>
                                                <abbr title="Chi tiết" style="border: none"><a href="#myCanModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                                <abbr title="Xóa" style="border: none"><a href="./Admin/Bill/deleteBill/'.$row["bill_id"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
<!-- Modal -->
  <div class="modal fade" id="myCanModal'.$i.'" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chi Tiết Đơn Hàng</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Sản Phẩm</h4>
                    <div class="white-box">
                      <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Tên Sản Phẩm</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookname"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Hình ảnh</label>
                            <div class="col-md-12">
                                <img src="images/books/'.$row["bookimages"].'" class="form-control form-control-line" style="height: 125px;width: 120px;">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Tác Giả</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookauthor"].'"
                                    class="form-control form-control-line" > </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">NXB</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookpublisher"].'" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Số Lượng</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["number"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Đơn Giá</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookprice"].'đ"
                                    class="form-control form-control-line"> </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Khách Hàng</h4>
                    <div class="white-box">
                        <form class="form-horizontal form-material">
                            <div class="form-group">
                                <label class="col-md-12">Họ Tên</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["customername"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" value="'.$row["accountemail"].'"
                                        class="form-control form-control-line" name="example-email"
                                       > </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Số Điện Thoại</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountphone"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Địa Chỉ Nhận Hàng</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountaddress"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Thời Gian Đặt</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["daycreate"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                        </form>
                        <h4 class="text-danger">Thanh Toán</h4>
                        <table class="table">
                            <tr>
                                <td style="font-weight: bold;">Tổng tiền hàng:</td>
                                <td>'.$row["number"]*$row["bookprice"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Phí vận chuyển:</td>
                                <td>'.$row["ship"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Tổng đơn hàng:</td>
                                <td><strong class="text-danger">'.$row['amount'].'</strong></td>
                            </tr>
                        </table>
                        <h4 class="text-danger">Xác Thực Đơn Hàng</h4>
                        <div>';
                        
                        echo '<select class="form-control pull-right row b-none" id="billstatus'.$row["bill_id"].'">';
                        echo '<option value="1"'; if($row["billstatus"]==1) echo 'selected = "selected"';echo '>Chưa Xác Nhận/ Mới</option>';
                        echo '<option value="2"'; if($row["billstatus"]==2) echo 'selected = "selected"';echo '>Đang Vận Chuyển</option>';
                        echo '<option value="3"'; if($row["billstatus"]==3) echo 'selected = "selected"';echo '>Hoàn Thành</option>';
                        echo '<option value="4"'; if($row["billstatus"]==4) echo 'selected = "selected"';echo '>Đã Hủy</option>';
                        echo '</select>';
                        
                        echo'    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
             <button class="btn btn-success" onclick="UpdateBillStatus('.$row["bill_id"].')">Cập Nhật</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                                            
                                        </td>
                                </tr>
                                ';
                            }
                            if($i==0) echo "Không có đơn hàng nào";
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>


<!-- Tất cả đơn hàng -->
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

                <!-- Đơn hàng mới -->
                <h3 class="box-title" >Danh sách đơn hàng</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                                <th>Giá</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $i = 0;
                                while ($row = mysqli_fetch_array($data["allbill"])) {
                                    $i++;
                                    echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td class="txt-oflo">'.$row["bookname"].'</td>';
                                    if($row["status"] == 0)
                                    echo ' 
                                        <td>New</td>';
                                    elseif($row["status"] == 1)
                                    echo ' 
                                        <td>SALE</td>';
                                    else
                                    echo ' 
                                        <td>Normal</td>';
                                    echo '
                                        <td class="txt-oflo">'.$row["daycreate"].'</td>
                                        <td><span class="text-success">'.$row["amount"].'đ</span></td>
                                        <td>
                                                <abbr title="Chi tiết" style="border: none"><a href="#myallModal'.$i.'" data-toggle="modal" style="margin-right: 10px"><i class="fas fa-info-circle"></i></a></abbr>
                                                <abbr title="Xóa" style="border: none"><a href="./Admin/Bill/deleteBill/'.$row["bill_id"].'" style="margin-right: 10px"><i class="fa fa-trash-o"></i></a></abbr>
<!-- Modal -->
  <div class="modal fade" id="myallModal'.$i.'" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chi Tiết Đơn Hàng</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Sản Phẩm</h4>
                    <div class="white-box">
                      <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Tên Sản Phẩm</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookname"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Hình ảnh</label>
                            <div class="col-md-12">
                                <img src="images/books/'.$row["bookimages"].'" class="form-control form-control-line" style="height: 125px;width: 120px;">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-12">Tác Giả</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookauthor"].'"
                                    class="form-control form-control-line" > </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">NXB</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookpublisher"].'" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Số Lượng</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["number"].'"
                                    class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Đơn Giá</label>
                            <div class="col-md-12">
                                <input type="text" value="'.$row["bookprice"].'đ"
                                    class="form-control form-control-line"> </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4 class="text-danger">Thông Tin Khách Hàng</h4>
                    <div class="white-box">
                        <form class="form-horizontal form-material">
                            <div class="form-group">
                                <label class="col-md-12">Họ Tên</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["customername"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" value="'.$row["accountemail"].'"
                                        class="form-control form-control-line" name="example-email"
                                       > </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Số Điện Thoại</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountphone"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Địa Chỉ Nhận Hàng</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["accountaddress"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Thời Gian Đặt</label>
                                <div class="col-md-12">
                                    <input type="text" value="'.$row["daycreate"].'"
                                        class="form-control form-control-line"> </div>
                            </div>
                        </form>
                        <h4 class="text-danger">Thanh Toán</h4>
                        <table class="table">
                            <tr>
                                <td style="font-weight: bold;">Tổng tiền hàng:</td>
                                <td>'.$row["number"]*$row["bookprice"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Phí vận chuyển:</td>
                                <td>'.$row["ship"].'đ</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Tổng đơn hàng:</td>
                                <td><strong class="text-danger">'.$row['amount'].'</strong></td>
                            </tr>
                        </table>
                        <h4 class="text-danger">Xác Thực Đơn Hàng</h4>
                        <div>';
                        
                        echo '<select class="form-control pull-right row b-none" id="billstatus'.$row["bill_id"].'">';
                        echo '<option value="1"'; if($row["billstatus"]==1) echo 'selected = "selected"';echo '>Chưa Xác Nhận/ Mới</option>';
                        echo '<option value="2"'; if($row["billstatus"]==2) echo 'selected = "selected"';echo '>Đang Vận Chuyển</option>';
                        echo '<option value="3"'; if($row["billstatus"]==3) echo 'selected = "selected"';echo '>Hoàn Thành</option>';
                        echo '<option value="4"'; if($row["billstatus"]==4) echo 'selected = "selected"';echo '>Đã Hủy</option>';
                        echo '</select>';
                        
                        echo'    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
             <button class="btn btn-success" onclick="UpdateBillStatus('.$row["bill_id"].')">Cập Nhật</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                                            
                                        </td>
                                </tr>
                                ';
                            }
                            if($i==0) echo "Không có đơn hàng nào";
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>

</div>
