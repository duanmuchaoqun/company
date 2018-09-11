<?php
namespace app\admin\base;

use think\Model;

class BaseModel extends Model
{
    static protected $instance;

    //防止克隆对象
    private function __clone()
    {
    }

    /**
     * 单例模式
     * @return mixed
     */
    static public function getInstance()
    {
        if (!static::$instance instanceof static) {
            static::$instance = new static();
        }
        return static::$instance;
    }

}