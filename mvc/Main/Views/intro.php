
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="./">Trang chủ</a>
            <span class="breadcrumb-item active">Giới thiệu</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <?php 
                echo '
                <h1>'.$data["intro"]["title"].'</h1>
                <div class="img-sec">
                    <img src="images/intro/'.$data["intro"]["images"].'.jpg" alt="about">
                    <p>'.$data["intro"]["content"].'</p>
                </div>';
            ?>

            

        </div>
    </section>