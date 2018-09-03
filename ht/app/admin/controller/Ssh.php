<?php

class Ssh extends Main
{
    public function index()
    {
        //ssh
        $sql = "SELECT sh.*, na.name FROM ssh sh LEFT JOIN nation na ON sh.nation_id = na.id ORDER BY sh.id DESC";
        $paging = $this->paging->get_content($this->pdo->count_rows($sql), 10);
        $sql .= $paging['sql_add'];
        $ssh = $this->pdo->fetch_all($sql);
        //nation
        $nations = $this->pdo->fetch_all("SELECT * FROM nation");

        $this->smarty->assign('paging', $paging);
        $this->smarty->assign("nations", $nations);
        $this->smarty->assign("ssh", $ssh);
        $this->smarty->display('index.tpl');
    }

    public function create()
    {
        $data['content'] = slash_trim($_POST['content']);
        $data['nation_id'] = slash_trim($_POST['nation_id']);
        $data['owned_by'] = 0;
        if (!$this->pdo->insert('ssh', $data)) {
            lib_alert("Thêm không thành công");
        }
        lib_redirect_back();
        exit();
    }

    public function edit()
    {
        $id = slash_trim($_POST['id']);
        $data['nation_id'] = slash_trim($_POST['nation_id']);
        $data['content'] = slash_trim($_POST['content']);
        if ($this->pdo->update("ssh", $data, "id=$id")) {
            lib_alert("Chỉnh sửa thành công");
        }
        lib_redirect_back();
        exit();
    }

    public function delete()
    {
        $id = slash_trim($_GET['id']);
        if ($this->pdo->query("DELETE FROM ssh WHERE id=$id")) {
            lib_alert("Xóa thành công");
            lib_redirect_back();
        }
    }

    public function ajax_load()
    {
        $id = $_POST['id'];
        $ssh = $this->pdo->fetch_one("SELECT * FROM ssh WHERE id =$id");
        $str = "";
        $nation = $this->pdo->fetch_all("SELECT * FROM nation");
        foreach ($nation as $key => $value) {
            if ($value['id'] == $ssh['nation_id']) {
                $str .= "<option value={$value['id']} selected> {$value['name']} </option>";
            } else {
                $str .= "<option value={$value['id']}> {$value['name']} </option>";
            }
        }
        $ssh['str'] = $str;
        echo json_encode($ssh);
        exit();
    }
}
