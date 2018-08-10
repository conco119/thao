<?php
class Vip
{
    function __construct()
    {
        global $vip_model, $maintenance_model;
        $this->vip_model = $vip_model;
        $this->maintenance_model = $maintenance_model;
    }

    function getInfoVip()
    {
        $vip =  $this->vip_model->getInfoVip($_POST['id']);
        echo json_encode($vip);
    }

    function edit()
    {
        extract($_REQUEST);
        // die;
        if($speed !=5 && $speed !=10) {
            lib_redirect_back();
        }
        $id = addslashes($id);
        $name = addslashes($name);
        $server = addslashes($server);
        $speed = addslashes($speed);
        foreach ($type as $key => $t) {
            $type[$key] = addslashes($t);
        }
        $type = json_encode($type);
        $this->vip_model->edit($id, $name, $server, $speed, $type);
        lib_redirect_back();
    }
}
