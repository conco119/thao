<?php

trait Connection
{
    public function setup_slim($configs)
    {
        $config = $configs['database'];
        $dsn = "mysql:host={$config['server']};dbname={$config['database_name']};charset=utf8";
        $usr = $config['username'];
        $pwd = $config['password'];
        $this->slim = new Slim($dsn, $usr, $pwd);
        return $this;
    }

    public function setup_pdo($configs)
    {
        $config = $configs['database'];
        $info = $config['server'] . "," . $config['username'] . "," . $config['password'] . "," . $config['database_name'];
        $this->pdo = new DPDO($info);
        return $this;
    }
}

trait Notification
{
    public function notification()
    {
        if (!empty($_SESSION['notification'])) {
            $this->smarty->assign('notification', $_SESSION['notification']);
            unset($_SESSION['notification']);
        } else {
            $this->smarty->assign('notification', [
                'status' => 'nope',
                'title' => 'nope',
                'text' => 'nope',
            ]);
        }
        return $this;
    }

}
trait SmartyConf
{
    public function setup_smarty($configs, $smarty, $tpl_file)
    {
        $config = $configs['info'];
        if (!empty($this->currentUser)) {
            $user = $this->currentUser;
        } else {
            $user = "";
        }
        $arg = array(
            'stylesheet' => DOMAIN . "app/webroot/",
            'domain' => DOMAIN,
            'user' => $user,
            'setting' => $config,
        );
        $this->smarty = $smarty;
        $this->smarty->assign('arg', $arg);
        $this->smarty->assign('tpl_file', $tpl_file);
        return $this;
    }
}
