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
        if ($this->request->isPost()) {
            $params = $this->request->param();
            $image = pathinfo($params['image_url']);
            $image_url = ROOT_PATH . 'public/' . $params['image_url'];
            $path = ROOT_PATH . 'public/' . '/static/assets/images/banner/' . time() . '.' . $image['extension'];

            $result = copy($image_url, $path);
            var_dump($result);
            die;
            //file_put_contents()

        }
        return $this->fetch('create');
    }
}
