<?php

class UserHelper extends HelpAbstract
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_user_permission_select($user_permission)
    {
        $result = '';
        foreach ($this->permission_type as $key => $value) {
            if ($key == $user_permission) {
                $result .= "<option value='$key' selected>$value</option>";
            } else {
                $result .= "<option value='$key'>$value</option>";
            }

        }
        return $result;

    }

    public function get_permission_type($index)
    {
        return $this->permission_type[$index];
    }

}
