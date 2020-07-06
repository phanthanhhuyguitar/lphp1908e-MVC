<?php if(!defined('ROOT_APP_PATH')) die('Can not access'); ?>

<div class="container">
    <div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 ">
        <?php if($message ==='err'): ?>
        <div class="row my-2">
            <h4 class="text-center text-danger">Tai khoan hoac mat khau khong dung</h4>
        </div>
        <?php elseif ($message ==='empty'):?>
            <div class="row my-2">
                <h4 class="text-center text-danger">Vui long nhap du lieu</h4>
            </div>
        <?php endif;?>
        <form action="?c=login&m=handle" class="my-3 p-3 border" method="post">
            <div class="form-group">
                <lable for="username">User</lable>
                <input type="text" id="username" name="user" class="form-control">
            </div>
            <div class="form-group">
                <lable for="password">Password</lable>
                <input type="password" id="password" name="pass" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit" name="btnLogin">Login</button>
        </form>
    </div>
</div>
