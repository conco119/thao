<?php
include '../inc/init.php';

$all = $maintenance_model->getMaintainServer();
foreach ($all as $key => $value)
{
    $where = "WHERE `sever` = '$value->sv_name' AND `goi` = $value->goi";
    $vips = $vip_model->getAllWhere($where);
    if($vips->num_rows > 0)
    {
        while($row = $vips->fetch_object())
        {
            // update expire
            $new_time = (time() - $value->start_day) + $row->expire;
            $set = "SET `expire` = $new_time ";
            $where = "WHERE `id` = $row->id";
            $vip_model->editWhere($set, $where);
        }
    }
    //update start_day
    $time = time();
    $set = "SET `start_day` = $time ";
    $where = "WHERE `id` = $value->id";
    $maintenance_model->editWhere($set, $where);
}
