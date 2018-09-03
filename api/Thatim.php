<?php
class Thatim
{
    public function __construct()
    {
        global $tha_tim, $userData;
        $this->thatim_model = $tha_tim;
        $this->userData = $userData;
    }
    public function delete()
    {
        $id = slash($_GET['id']);
        $this->thatim_model->delete($id, $this->userData->id);
        lib_redirect_back();
    }
}
