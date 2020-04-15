
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="./">Trang chủ</a>
            <span class="breadcrumb-item active">Đăng ký</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h1>Đăng ký</h1>
            <p>Vui lòng điền các thông tin sau để đăng ký thành viên!</p>
            <div class="form">
                <form action="./Main/Register/verify" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <input placeholder="Tên đăng nhập" name="username" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="password" placeholder="Mật khẩu" name="password" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="password" placeholder="Nhập lại mật khẩu" name="repass" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Họ tên" name="name" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Tuổi" name="age" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Địa chỉ" name="address" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Số điện thoại" name="phone" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Email" name="email" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="images">Chọn ảnh đại diện:</label>
                                <input type="file" class="form-control"  name="up_images">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <button class="btn black" name="btnRegister" onclick="check_pass">Đăng ký</button>
                            <h5>Đã có tài khoản? <a href="./Main/Login">Đăng nhập tại đây</a></h5>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
