
   <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="./">Trang chủ</a>
            <span class="breadcrumb-item active">Đăng nhập</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h1>Đăng nhập</h1>
            <p>Vui lòng điền chính xác tên đăng nhập và mật khẩu của bạn để đăng nhập vào website!</p>
            <div class="form">
                <form action="./Main/Login/verify" method="POST">
                    <div class="row">
                        <div class="col-md-5">
                            <input placeholder="Tên đăng nhập" name="username" value="<?php if(isset($_COOKIE["username"])) echo $_COOKIE["username"] ?>" required >
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-5">
                            <input type="password" placeholder="Mật khẩu" name="password" value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE["password"] ?>" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-5">
                            <input type="checkbox" name="check" style="width: 15px" class="d-inline" <?php if(isset($_COOKIE["username"])) echo 'checked = checked' ?>>
                            <h5 class="d-inline" style="margin-right: 10px">Lưu mật khẩu </h5>
                            
                        </div>
                        
                        <div class="col-lg-8 col-md-12">
                            <button class="btn black" name="btnLogin">Đăng nhập</button>
                            <h5>Chưa có tài khoản? <a href="./Main/Register">Đăng ký tại đây</a></h5>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
