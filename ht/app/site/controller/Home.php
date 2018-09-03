<?php

class Home extends Main
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $maintenance = $this->pdo->fetch_all("SELECT * FROM maintenance");
        $notification = $this->pdo->fetch_all("SELECT * FROM notification WHERE id =1");
        $this->smarty->assign('maintenance', $maintenance);
        $this->smarty->assign('notification', $notification[0]);
        $this->smarty->display('index.tpl');
    }

}
