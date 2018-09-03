<?php
class THA_TIM extends CLIENT
{
    public function getAll()
    {
        $sql = "SELECT * FROM `thatim`";
        $vips = $this->_sql->query($sql);

        while ($row = $vips->fetch_object()) {
            $info = $info = $this->_fbgraph($row->token);
            if (!isset($info->id)) {
                $sql = "UPDATE `thatim` SET `active` = 0 WHERE `id` = $row->id ";
                $this->_sql->query($sql);
            }
        }
        return $this->getAll2();
    }

    public function getAll2()
    {
        $sql = "SELECT * FROM `thatim`";
        $vips = $this->_sql->query($sql);
        return $vips;
    }

    public function create($token, $chedo, $thoihan, $noidung, $note)
    {
        global $userData;
        $token = slash($token);
        $chedo = slash($chedo);
        $noidung = slash($noidung);
        $note = slash($note);
        $thoigian = time();
        $thoihan = time() + (slash($thoihan) * 24 * 3600);
        $thoihan = slash($thoihan);
        $info = $this->_fbgraph($token);
        if (!isset($info->id)) {
            return $this->_return($return, false, 'Token die!');
        }
        $info = $this->_sql->query("SELECT * FROM `thatim` WHERE `token` = '{$token}'");
        if ($info->num_rows > 0) {
            return $this->_return($return, false, 'Token đã tồn tại');
        }

        $sql = "INSERT INTO `thatim` (`user_id`, `token`, `chedo`, `noidung`, `thoihan`, `note`, `active`, `created_at`) VALUES($userData->id, '$token', $chedo, '$noidung', $thoihan, '$note', 1, $thoigian)";
        $insert = $this->_sql->query($sql);
        if ($insert) {
            $this->_return($return, true, 'Thêm thành công');
        } else {
            $this->_return($return, false, 'Thêm không thành công');
        }
        return $return;
    }

    public function delete($id, $user_id)
    {
        $sql = "DELETE FROM thatim WHERE id=$id AND user_id=" . $user_id;
        $this->_sql->query($sql);
    }

}
