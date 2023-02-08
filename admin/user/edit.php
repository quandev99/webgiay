<section id="main">
    <div class="main-header">
    <div class="account-img">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['Image'] != "") { ?>
                        <img src=" <?= $UPLOAD_URL . "/users/" . $_SESSION['user']['Image'] ?>" width="30" height="30"
                            class="account-image icon" alt="">
                        <?php } else { ?>
                        <?php }  ?>
                    </div>
    </div>
    <div class="content">
        <h1 class="heading">DANH SÁCH KHÁCH HÀNG</h1>
        <div class="container-content">
            <?php

            $img_path = $UPLOAD_URL . '/users/' . $Image;
            if (is_file($img_path)) {
                $img = "<img src='$img_path' height='100'>";
            } else {
                $img = "no photo";
            }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật khách hàng</div>
                        <div class="card-body">
                            <form action="index.php?btn_update" method="POST" enctype="multipart/form-data"
                                id="admin_update_kh">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="ma_kh" class="form-label">MÃ KHÁCH HÀNG (tên đăng nhập)</label>
                                        <input type="text" name="ma_kh" id="ma_kh" class="form-control" required
                                            value="<?= $ma_kh ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="ho_ten" class="form-label">Họ và tên</label>
                                        <input type="text" name="ho_ten" id="ho_ten" class="form-control" required
                                            value="<?= $ho_ten ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="mat_khau" class="form-label">Mật khẩu</label>
                                        <input type="password" name="mat_khau" id="mat_khau" class="form-control"
                                            required value="<?= $mat_khau ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="mat_khau" class="form-label">Xác nhận mật khẩu</label>
                                        <input type="password" name="mat_khau2" class="form-control" required
                                            value="<?= $mat_khau ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <div class="row align-items-center">
                                            <div class="col-sm-8">
                                                <label for="hinh" class="form-label">Ảnh</label>
                                                <input type="file" name="Image" id="Image" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $img ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="email" class="form-label">Địa chỉ email</label>
                                        <input type="email" name="email" id="email" class="form-control" required
                                            value="<?= $email ?>">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <p>Số điện thoại</p>
                                        <input type="tel" class="form-control" name="sdt" placeholder="Số điện thoại"  value="<?= $sdt ?>" required />
                                        <span class="message"><?= $sdt_error ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <p>Tỉnh/Thành phố</p>
                                        <input type="text"class="form-control" name="city" id="city" value="<?=$tinh_thanhpho;?>">
                                        <span class="message"><?= $tinh_thanhpho_error ?></span>    

                                    </div>
                                    <div class="form-group col-sm-4">
                                        <p>Quận/Huyện</p>           
                                        <input type="text"class="form-control"name="district" id="district" value="<?=$quan_huyen;?>">
                                        <span class="message"><?= $quan_huyen_error ?></span>
                                        
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <p>Xã/Phường</p>
                                        <input type="text"class="form-control"name="ward" id="ward" value="<?=$xa_phuong;?>">
                                        <span class="message"><?= $xa_phuong_error ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <p>Địa chỉ</p>
                                        <input type="text" class="form-control" name="dia_chi" placeholder="Địa chỉ" value="<?= $dia_chi?>" require />
                                        <span class="message"><?= $dia_chi_error ?></span>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Kích hoạt?</label>
                                        <div class="form-control">
                                            <label class="radio-inline  mr-3">
                                                <input type="radio" value="0" name="kich_hoat"
                                                    <?= !$kich_hoat ? 'checked' : '' ?>>Chưa kích
                                                hoạt
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="1" name="kich_hoat"
                                                    <?= $kich_hoat ? 'checked' : '' ?>>Kích hoạt
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Kích hoạt?</label>
                                        <div class="form-control">
                                            <label class="radio-inline mr-3">
                                                <input type="radio" value="0" name="vai_tro"
                                                    <?= !$vaitro ? 'checked' : '' ?>>Khách
                                                hàng
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="1" name="vai_tro"
                                                    <?= $vaitro ? 'checked' : '' ?>>Nhân
                                                viên
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 text-center mt-3">
                                    <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                                    <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                                    <input type="submit" name="btn_update" value="Cập nhật"
                                        class="btn btn-primary mr-3">
                                    <a href="index.php?btn_list"><input type="button" class="btn btn-success"
                                            value="Danh sách"></a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>