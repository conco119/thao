<?php
class CMT_MODEL extends CLIENT
{
    public function getAll($where = "")
    {
        $sql = "SELECT * FROM `vipcmt` " . $where;
        $cmts = $this->_sql->query($sql);
        return $cmts;
    }

    public function _addCmt($fbid, $limit, $month, $content)
    {
        global $userData;
        $fbid = slash($fbid);
        $limit = slash($limit);
        $month = slash($month);
        $content = slash($content);
        $expire = time() + (int) $limit * 86400 * 30;
        $created_at = time();
        $cmt = $this->_sql->query("SELECT fbid FROM `vipcmt` WHERE `fbid` = '{$fbid}'");
        if ($cmt->num_rows > 0) {
            $this->_return($return, false, 'Facebook id đã tồn tại');
            return $return;
        }

        $sql = "INSERT INTO `vipcmt` (`fbid`, `owned_by`, `cmt_limit`, `month`, `content`, `created_at`, `expire`) VALUES($fbid, $userData->id,  $limit, $month, '{$content}', $created_at, $expire)";
        // var_dump($sql);
        // die;
        $insert = $this->_sql->query($sql);
        if ($insert) {
            $this->_return($return, true, 'Thêm vipcmt thành công');
        }
        return $return;
    }

    public function delete($id)
    {
        $cmt = $this->_sql->query('SELECT * FROM `vipcmt` WHERE `id` = "' . (int) $id . '"');
        if ($cmt->num_rows > 0) {
            $this->_sql->query('DELETE FROM `vipcmt` WHERE `id` = "' . (int) $id . '"');
            $this->_return($return, true, 'REMOVED !!');
        } else {
            $this->_return($return, false, 'CMT không tồn tại hoặc đã bị xóa trước đó !!');
        }
        return $return;
    }

    public function ajax_getinfo($id)
    {
        $cmt = $this->_sql->query("SELECT * FROM `vipcmt` WHERE id = $id");
        if ($cmt->num_rows > 0) {
            return $cmt->fetch_assoc();
        }
    }

    public function edit($id, $cmt_limit, $month, $content)
    {
        return $this->_sql->query("UPDATE `vipcmt` SET `cmt_limit` = {$cmt_limit}, `month` = $month, `content` = '{$content}'");
    }

}
