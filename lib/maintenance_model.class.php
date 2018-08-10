<?php
class MAINTENANCE_MODEL extends CLIENT
{
    function getMaintainServer()
    {
        $c = $this->_sql->query('SELECT * FROM `maintenance`');
        $data = [];
        if($c->num_rows > 0){
          while($r = $c->fetch_object()){
            $data[] = $r;
          }
        }
        return $data;
    }

    function editWhere($set, $where)
    {
        $sql = "UPDATE `maintenance` " . $set . $where;
        pre($sql);
        $this->_sql->query($sql);
    }

    // not through api/controller
    function create($server, $goi)
    {
        $this->_sql->query('INSERT INTO `maintenance` (`sv_name`, `goi`, `start_day`) VALUES("'.addslashes($server).'", "'.addslashes($goi).'", "'.time().'")');
    }

    function delete($id)
    {
        $this->_sql->query('DELETE FROM `maintenance` WHERE `id` = "'.(int) $id.'"');
    }
}
