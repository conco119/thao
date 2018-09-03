<?php

lib_use(CORE_PDO);
lib_use(CORE_SLIM);
lib_use(CORE_STRING);
lib_use(CORE_PAGINATION);
lib_use(CORE_FILEHANDLE);
lib_use(CORE_TIMES);
lib_use(CORE_ZEBRA);
lib_use(CORE_IMAGE);
class Main
{
    use Connection;
    use Notification;
    use SmartyConf;
    public function __construct()
    {
        global $smarty, $tpl_file, $mc, $site, $login_id, $configs;
        $this->paging = new pagination();
        $this->times = new Times();
        $this->dstring = new DString();
        $this->helper = new Helper();

        $this->setup_pdo($configs)
            ->setup_slim($configs)
            ->authenticate($login_id)
            ->setup_smarty($configs, $smarty, $tpl_file)
            ->notification()
            ->redirectIfNotAdmin();
    }

    public function authenticate($id = 0)
    {
        $user = $this->pdo->fetch_one("SELECT * FROM users a where id='$id'");
        if ($id == 0) {
            lib_redirect(LOGIN_PAGE);
        }
        $this->currentUser = $user;
        return $this;
    }

    public function redirectIfNotAdmin()
    {
        if ($this->currentUser['user_type'] != 1) {
            lib_redirect(LOGIN_PAGE);
        }
        return $this;
    }
}
