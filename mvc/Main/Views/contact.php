
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="./">Trang chủ</a>
            <span class="breadcrumb-item active">Trợ giúp</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h1>Câu hỏi thường gặp</h1>
            <?php  
                while ($row = mysqli_fetch_array($data["contact"])) {
                    echo '
                        <h3>'.$row["question"].'</h3>
                        <p>'.$row["answer"].'</p>
                    ';
                }
            ?>
        </div>
    </section>