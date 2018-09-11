<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Banner extends Controller
{
    /**
     * @var Request $request
     */
    protected $request;

    /**
     * @var ManagerUser $managerUser
     */
    protected $model;


    /**
     * 初始化依赖注入 Request 模型
     * @param  $request
     *
     */
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;
    }

    public function index()
    {
        return $this->fetch();
    }

    public function create()
    {
        if ($this->request->isPost()){
            echo '这是post请求';
        }
       return $this->fetch('create');
    }
}
