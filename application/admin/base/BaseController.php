<?php
namespace app\admin\base;

use think\Controller;
use think\Session;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $managerUser = Session::get('manager_user');
        if (empty($managerUser)){
            $this->error('请登录','Login/index');
        }
    }
}
