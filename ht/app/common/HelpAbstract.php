<?php

abstract class HelpAbstract
{
    public function __construct()
    {
        global $system_configs;
        $this->sys_config = $system_configs;
    }
}
