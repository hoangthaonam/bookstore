
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="../../index.html" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Quay Lại Trang Chủ</a>
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
                    <form method="POST" action="./Admin/Intro/update"> 
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Giới Thiệu</h3>
                            <div class="table-responsive">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="form-control form-control-line" rows="20" name="content">
                                            <?php echo $data["intro"]["content"]; ?>
                                        </textarea> </div>  
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12" style="text-align: center;">
                                        <button class="btn btn-success" name="btnUpdate">Cập Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
            