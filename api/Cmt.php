<?php
class Cmt
{
    function __construct()
    {
        global $cmt_model;
        $this->cmt_model = $cmt_model;
    }

    function delete()
    {
        extract($_REQUEST);
        $id = addslashes($id);
        $this->cmt_model->delete($id);
        lib_redirect_back();
    }

    function ajax_getinfo()
    {
        extract($_REQUEST);
        $id = addslashes($id);
        $cmt = $this->cmt_model->ajax_getinfo($id);
        echo json_encode($cmt);
    }

    function edit()
    {
        extract($_REQUEST);
        $id = addslashes($id);
        $cmt_limit = addslashes($cmt_limit);
        $month = addslashes($month);
        $content = addslashes($content);
        $edit = $this->cmt_model->edit($id, $cmt_limit, $month, $content);
        lib_redirect_back();
    }
}
