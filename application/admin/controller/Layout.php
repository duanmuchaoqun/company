<?php
namespace app\admin\controller;



class Layout extends BaseController
{
    public function header()
    {
        return $this->fetch('common/header');
    }

    public function left()
    {
        return $this->fetch('common/left');
    }

    public function foot()
    {
        return $this->fetch('common/foot');
    }
}
