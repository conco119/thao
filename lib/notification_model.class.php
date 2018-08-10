<?php
class NOTIFICATION_MODEL extends CLIENT
{
    function get()
    {
        $sql ="SELECT * FROM `notification` WHERE id = 1" ;
        return $this->_sql->query($sql)->fetch_assoc();
    }

    function edit($content)
    {
        $content = addslashes($content);
        $sql = "UPDATE `notification` SET `content` = '$content'";
        $this->_sql->query($sql);
        lib_redirect_back();
    }

}
