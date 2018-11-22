<style>

    .container {
        width: 30%;
        margin: auto;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;

    }
    input[type=text] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=password] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=email] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
<div class="container">
<form name='register' action='' method='POST'>
    Tên đăng nhập: <input type="text" name="username"  value="<?php echo set_value('username')?>">
    <div class="error" id="username_error"><?php echo form_error('username')?></div>

    Mật khẩu: <input type="password" name="password">
    <div class="error" id="password_error"><?php echo form_error('password')?></div>

    Nhập lại mật khẩu: <input type="password" name="re_password">
    <div class="error" id="re_password_error"><?php echo form_error('re_password')?></div>
    Họ tên: <input type="text" name="name"  value="<?php echo set_value('name')?>">
    <div class="error" id="name_error"><?php echo form_error('name')?></div>

    Số điện thoại: <input type="text" name="phone"  value="<?php echo set_value('phone')?>">
    <div class="error" id="phone_error"><?php echo form_error('phone')?></div>

    Email: <input type="text" name="email"  value="<?php echo set_value('email')?>">
    <div class="error" id="email_error"><?php echo form_error('email')?></div>

    <input type="submit" value="Đăng ký">
</form>
</div>