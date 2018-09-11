<?php
namespace app\admin\model;


use app\admin\base\BaseModel;
use think\Session;

class ManagerUser extends BaseModel
{
    public function userLogin($username = '', $password = '')
    {
        $data = $this->where(['username' => $username])->find();
        if (empty($data)) {
            return ['code' => 101, 'data' => [], 'msg' => '用户名或者密码错误！！！'];
        }
        $encrypt_password = md5($password . $data['salt']);
        $count = $this->where(['username' => $username, 'password' => $encrypt_password])->count();
        if ($count <= 0) {
            return ['code' => 101, 'data' => [], 'msg' => '用户名或者密码错误！！！'];
        }
        $managerUser = ['user_name' => $data['username']];
        Session::set('manager_user', $managerUser);
        return ['code' => 100, 'data' => [], 'msg' => '登陆成功！！！'];
    }

    public function isLogin()
    {
        $user_info = Session::get('manager_user');
        if ($user_info){
            return ['code' => 100, 'data' => [], 'msg' => '管理员已经登录！！！'];
        }else{
            return ['code' => 101, 'data' => [], 'msg' => '管理员未登录！！！'];
        }
    }
}