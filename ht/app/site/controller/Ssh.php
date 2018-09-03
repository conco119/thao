<?php

class Ssh extends Main
{
    public function index()
    {
        $search['key'] = isset($_GET['key']) ? $_GET['key'] : 0;
        $nations = $this->pdo->fetch_all("SELECT * FROM nation");
        //ssh
        if ($search['key'] != 0) {
            $sql = "SELECT sh.*, na.name FROM ssh sh LEFT JOIN nation na ON sh.nation_id = na.id WHERE owned_by= " . $this->currentUser['id'] . " AND sh.nation_id = {$search['key']} " . " ORDER BY sh.id DESC";
        } else {
            $sql = "SELECT sh.*, na.name FROM ssh sh LEFT JOIN nation na ON sh.nation_id = na.id WHERE owned_by= " . $this->currentUser['id'] . " ORDER BY sh.id DESC";
        }

        $paging = $this->paging->get_content($this->pdo->count_rows($sql), 10);
        $sql .= $paging['sql_add'];
        $ssh = $this->pdo->fetch_all($sql);

        $this->smarty->assign('paging', $paging);
        $this->smarty->assign("nations", $nations);
        $this->smarty->assign("ssh", $ssh);
        $this->smarty->display('index.tpl');
    }

    public function buy()
    {
        global $configs;
        $number = slash_trim($_POST['num']);
        $nation_id = slash_trim($_POST['nation_id']);
        $sql = "SELECT count(id) as num FROM ssh WHERE owned_by =0 AND nation_id = $nation_id";
        $number_remaining = $this->pdo->fetch_one($sql);
        if ($number > $number_remaining['num']) {
            lib_alert("Số lượng SSH không đủ, liên hệ quản trị ");
            lib_redirect_back();
        }
        if ($number * $configs['money_ssh'] > $this->currentUser['balance']) {
            lib_alert("Số lượng xu không đủ ");
            lib_redirect_back();
        }
        //buy
        $sql = "SELECT id FROM ssh WHERE nation_id = $nation_id AND owned_by = 0 LIMIT $number";
        $update_ssh = $this->pdo->fetch_all($sql);
        // pre($sql);
        // die;
        foreach ($update_ssh as $key => $value) {
            $data['owned_by'] = $this->currentUser['id'];
            $this->pdo->update('ssh', $data, "id=" . $value['id']);
        }
        unset($data);
        $data['balance'] = $this->currentUser['balance'] - ($number * $configs['money_ssh']);
        $this->pdo->update('users', $data, "id=" . $this->currentUser['id']);
    }

}
