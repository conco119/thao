<?php

class Helper extends HelpAbstract
{
    public function __construct()
    {
        parent::__construct();
    }
    public function help_get_status($status, $table, $id, $custom_function = "activeStatus")
    {
        $status = $status == 1 ? 1 : 0;
        $result = "<button type=\"button\" class=\"btn ";
        if ($status == 1) {
            $result .= "btn-success ";
        } else {
            $result .= "btn-danger ";
        }

        $result .= "btn-xs btn-status\" onclick=\"$custom_function('$table', '$id');\">";
        if ($status == 1) {
            $result .= "<i class=\"fa fa-check\"></i>";
        } else {
            $result .= "<i class=\"fa fa-close\"></i>";
        }

        $result .= "</button>";

        return $result;
    }

    public function create_notification($type, $text)
    {
        if ($type == 1) {
            $_SESSION['notification']['status'] = "success";
            $_SESSION['notification']['title'] = "Thành công";
            $_SESSION['notification']['text'] = $text;
        }
        if ($type == 0) {
            $_SESSION['notification']['status'] = "error";
            $_SESSION['notification']['title'] = "Thất bại";
            $_SESSION['notification']['text'] = $text;
        }
    }

    public function slash($data)
    {
        return addslashes($data);
    }

}
