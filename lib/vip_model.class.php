<?php
class VIP_MODEL extends CLIENT
{

    function getAllWhere($where)
    {
        $sql ="SELECT * FROM `vip` " . $where;
        $vips = $this->_sql->query($sql);
        return $vips;
    }

    function getInfoVip($id)
    {
        $vip = $this->_sql->query("SELECT * FROM `vip` WHERE id = $id");
        if($vip->num_rows >0)
        {
            return $vip->fetch_assoc();
        }
    }

    function edit($id, $name, $server, $speed, $type)
    {
        $sql = "UPDATE `vip` SET `name` = '$name', `sever` = '$server', `speed` = $speed, `type` = '$type' WHERE `id` = $id ";
        $vip = $this->_sql->query($sql);
    }

    function editWhere($set, $where)
    {
        $sql = "UPDATE `vip` " . $set . $where;
        // pre($sql);
        $this->_sql->query($sql);
    }
}
