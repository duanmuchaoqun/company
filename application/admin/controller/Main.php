<?php
namespace app\admin\controller;



class Main extends BaseController
{
    public function index()
    {
        return $this->fetch('Main');
    }

    public function left()
    {
        return $this->fetch('Left');
    }

    public function top()
    {
        return $this->fetch('Top');
    }
}
