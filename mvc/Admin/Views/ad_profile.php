<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Thông tin cá nhân</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="./" target="_blank"
                class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Quay lại trang chủ</a>
            <ol class="breadcrumb">
                <li><a href="./Admin">Dashboard</a></li>
                <li class="active">Thông Tin Cá Nhân</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- .row -->
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)"><img src="images/account/<?php echo $data["admin"]["images"]; ?>"
                                    class="thumb-lg img-circle" alt="img"></a>
                            <h4 class="text-white"><?php echo $data["admin"]["name"]; ?></h4>
                            <h5 class="text-white"><?php echo $data["admin"]["email"]; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="user-btm-box">
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-purple"><i class="ti-facebook"></i></p>
                        <h1><?php echo $data["admin"]["phone"]; ?></h1>
                    </div>         
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
                <form class="form-horizontal form-material">
                    <div class="form-group">
                        <label class="col-md-12">Họ Tên</label>
                        <div class="col-md-12">
                            <input type="text" value="<?php echo $data["admin"]["name"]; ?>"
                                class="form-control form-control-line" disabled = "disabled"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Tuổi</label>
                        <div class="col-md-12">
                            <input type="text" value="<?php echo $data["admin"]["age"]; ?>"
                                class="form-control form-control-line" disabled = "disabled"> </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" value="<?php echo $data["admin"]["email"]; ?>"
                                class="form-control form-control-line" name="example-email"
                                id="example-email" disabled = "disabled"> </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12">Số Điện Thoại</label>
                        <div class="col-md-12">
                            <input type="text" value="<?php echo $data["admin"]["phone"]; ?>"
                                class="form-control form-control-line" disabled = "disabled"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Địa Chỉ</label>
                        <div class="col-md-12">
                            <input type="text" value="<?php echo $data["admin"]["address"]; ?>"
                                class="form-control form-control-line" disabled = "disabled"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
