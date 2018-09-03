<?php

class User extends Main
{
    public function __construct()
    {
        parent::__construct();
        $this->userHelper = new UserHelper();
        $this->table = "users";
    }

    public function logout()
    {
        unset($_SESSION["LOGIN_MEMBER"]);
        lib_redirect('./?mc=pub&site=login');
    }
    // not using view

    public function cp()
    {
        $user = $this->currentUser;
        $this->smarty->assign('user', $user);
        $this->smarty->display(DEFAULT_LAYOUT);
    }

    public function change_password()
    {
        $old_password = slash_trim($_POST["old_password"]);
        $new_password = slash_trim($_POST["new_password"]);
        $re_new_password = slash_trim($_POST["re_new_password"]);
        if (!password_verify($old_password, $this->currentUser['password'])) {
            echo json_encode(['error' => 1, 'message' => "Mật khẩu cũ không chính xác"]);
            exit();
        }
        if ($new_password != $re_new_password) {
            echo json_encode(['error' => 1, 'message' => "Mật khẩu mới không trùng nhau"]);
            exit();
        }
        $data['password'] = password_hash($new_password, PASSWORD_BCRYPT);
        $isSucceed = $this->pdo->update($this->table, $data, "id=" . $this->currentUser['id']);
        if ($isSucceed) {
            echo json_encode(['error' => 0, 'message' => "Đổi mật khẩu thành công"]);
            exit();
        } else {
            echo json_encode(['error' => 1, 'message' => "Đổi mật khẩu không thành công"]);
            exit();
        }

    }

}
