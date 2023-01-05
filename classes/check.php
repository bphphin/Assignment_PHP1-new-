<?php

class Check
{
    var $errMsg = [];


    //Kiểm tra form đăng nhập
    function checkLogin()
    {
        if (isset($_POST['btn'])) {
            if (empty(trim($_POST['email']))) {
                return $this->errMsg['email']['emailEmpty'] = "Bạn chưa nhập Email";
            }
            if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
                return $this->errMsg['email']['emailErr'] = "Email sai định dạng , vui lòng thử lại!";
            }
            if (empty(trim($_POST['password']))) {
                return $this->errMsg['password']['passwordEmpty'] = "Bạn chưa nhập Password";
            }
        }
    }

    //Kiểm tra form đăng ký
    function checkSignUp()
    {
        if (isset($_POST['btn'])) {

            if (empty(trim($_POST['username']))) {
                return $this->errMsg['username']['usernameEmpty'] = "Bạn chưa nhập Username";
            }
            //  else {
            //     if (!preg_match("/^[a-zA-Z0-9._]$/", $_POST['username'])) {
            //         return $this->errMsg['username']['usernameErr'] = "Tên không đúng định dạng,vui lòng thử lại!";
            //     }
            // }

            if (empty(trim($_POST['email']))) {
                return $this->errMsg['email']['emailEmpty'] = "Bạn chưa nhập Email";
            }
            //  else {
            //     if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            //         return $this->errMsg['email']['emailErr'] = "Email sai định dạng,vui lòng thử lại!";
            //     }
            // }

            if (empty(trim($_POST['password']))) {
                return $this->errMsg['password']['passwordEmpty'] = "Bạn chưa nhập Password";
            }
            //  else {
            //     if (!preg_match("^/([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}/&", $_POST['password'])) {
            //         return $this->errMsg['password']['passwordErr'] = "Mật khẩu không đúng định dạng,vui lòng thử lại!";
            //     }
            // }
        }
    }

    //Check form
    public function checkForm()
    {
        if (isset($_POST['btn'])) {
            if (empty($_POST['typeID'] || $_POST['petName'] || $_POST['petType'] || $_POST['petAge'] || $_POST['petWeight'])) {
                return $this->errMsg['err'] = "Bạn không được để trống!";
            }
        }
    }
}