<?php
class User
{
    public function logout()
    {
            if($loginCheck)
            {
                $return = $client->_logout($_SESSION['userData']);
            }
         session_destroy();
         foreach($_SESSION as $key => $value)
           {
               unset($_SESSION[$key]);
           }
           lib_redirect();
    }
}
