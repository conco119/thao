<?php

class Nation extends Main
{

    public function index()
    {
        $sql = "SELECT na.*,
         (SELECT count(id) FROM ssh sh WHERE sh.nation_id = na.id AND sh.owned_by = 0) as remain ,
         (SELECT count(id) FROM ssh sh WHERE sh.nation_id = na.id) as num FROM nation na";
        $paging = $this->paging->get_content($this->pdo->count_rows($sql), 10);
        $sql .= $paging['sql_add'];
        $nations = $this->pdo->fetch_all($sql);

        $this->smarty->assign('paging', $paging);
        $this->smarty->assign('nations', $nations);
        $this->smarty->display('index.tpl');
    }

    public function create()
    {
        $data['name'] = slash_trim($_POST['name']);
        if ($this->pdo->insert('nation', $data)) {
            lib_alert("Thêm thành công");
            lib_redirect_back();
        }
    }

    public function edit()
    {
        $id = $_POST['id'];
        $data['name'] = slash_trim($_POST['name']);
        if ($this->pdo->update("nation", $data, "id=$id")) {
            lib_alert("Chỉnh sửa thành công");
            lib_redirect_back();
        }
        exit();
    }

    public function delete()
    {
        $id = $_GET['id'];
        if ($this->pdo->query("DELETE FROM nation WHERE id=$id")) {
            lib_alert("Xóa thành công");
            lib_redirect_back();
        }
    }

    public function ajax_load()
    {
        $id = $_POST['id'];
        $nation = $this->pdo->fetch_one("SELECT * FROM nation WHERE id =$id");
        echo json_encode($nation);
        exit();
    }

}
