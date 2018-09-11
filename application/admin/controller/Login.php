<?php
namespace app\admin\controller;


use app\admin\model\ManagerUser;
use think\Controller;
use think\Request;
use think\Session;

class Login extends Controller
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
        $this->model = ManagerUser::getInstance();
    }

    /**
     * 登录页面
     *
     *
     */
    public function index()
    {
        $this->view->engine->layout(false);
        $result = $this->model->isLogin();
        if ($result['code'] == 100) {
            $this->redirect('Index/index');
        }
        return $this->fetch('login');
    }

    /**
     * 登录操作
     *
     */
    public function login()
    {
        $params = $this->request->param();
        $params['username'] = empty($params['username']) ? '' : $params['username'];
        $params['password'] = empty($params['password']) ? '' : $params['password'];
        $result = $this->model->userLogin($params['username'], $params['password']);
        switch ($result['code']) {
            case 100:
                $this->success($result['msg'], 'Index/index');
                break;
            case 101:
                $this->error($result['msg'], 'Login/index');
                break;
            default:
                $this->error($result['msg'], 'Login/index');
                break;
        }
    }

    /**
     * 注销操作操作
     *
     */
    public function loginOut()
    {
        $result = $this->model->isLogin();
        switch ($result['code']){
            case 100:
                Session::clear();
                $this->success('退出成功！！！', 'Login/index');
                break;
            case 101:
                $this->error('请登录！！！', 'Login/index');
                break;
            default:
                $this->error('请登录！！！', 'Login/index');
                break;
        }
    }
}
