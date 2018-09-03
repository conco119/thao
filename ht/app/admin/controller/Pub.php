<?php
class Pub extends Main
{
    public function denied()
    {
        $this->smarty->display("error.tpl");
    }

    public function login()
    {
        return;
        global $login_id;
        // redirect if logged in -
        $user = $this->pdo->fetch_one("SELECT * FROM users WHERE id=$login_id");
        if ($login_id != 0) {
            lib_redirect(USER_PAGE);
        }
        $this->smarty->display('login.tpl');
    }

    public function postLogin()
    {
        $username = slash_trim($_POST['username']);
        $password = slash_trim($_POST['password']);
        $user = $this->pdo->fetch_one("SELECT * FROM users WHERE username ='$username'");
        if (!$user) {
            lib_alert("Tài khoản hoặc mật khẩu không chính xác");
            lib_redirect_back();
        }
        $_SESSION["LOGIN_MEMBER"] = $user['id'];
        lib_redirect(USER_PAGE);
    }

    public function get_register()
    {
        $this->smarty->display('register.tpl');
    }

    public function post_register()
    {

        $username = slash_trim($_POST['username']);
        $phone = slash_trim($_POST['phone']);
        $fbid = slash_trim($_POST['fbid']);
        $password = slash_trim($_POST['password']);
        $confirm = slash_trim($_POST['confirm']);
        $is_exist = $this->pdo->fetch_one("SELECT * FROM users WHERE username='$username'");
        if ($is_exist) {
            echo json_encode(['error' => 1, 'message' => 'Tài khoản đã có người sử dụng']);
            exit();
        }
        if ($password != $confirm) {
            echo json_encode(['error' => 1, 'message' => 'Mật khẩu không trùng nhau']);
            exit();
        }
        $data['username'] = $username;
        $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        $data['phone'] = $phone;
        $data['fbid'] = $fbid;
        $data['created_at'] = time();
        $data['ussv_token_id'] = 1;
        try {
            $insertId = $this->slim->insert("users", $data);
            if ($insertId) {
                echo json_encode(['error' => 0, 'message' => 'Tạo tài khoản thành công']);
                $_SESSION["LOGIN_MEMBER"] = $insertId;
            }
        } catch (Exception $e) {
            echo json_encode(['error' => 1, 'message' => 'Lỗi tạo tài khoản']);
        }

    }

    public function authenticate()
    {
        return $this;
    }
    public function make()
    {
        $text = slash_trim($_GET['text']);
        echo password_hash($text, PASSWORD_BCRYPT);
    }

    public function logout()
    {
        unset($_SESSION["LOGIN_MEMBER"]);
        lib_redirect('./?mc=pub&site=login');
    }
}
