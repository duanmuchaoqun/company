<?php
namespace app\admin\controller;

use app\admin\base\BaseController;

class Index extends BaseController
{
    public function index()
    {
        return $this->fetch('index');
    }
}
