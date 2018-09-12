<?php
$menu = \think\Config::get('menu');
$request = \think\Request::instance();
$controller_name = $request->controller();
?>
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-title">
            管理列表
        </div>
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <?php foreach ($menu as $key => $vo) { ?>
                    <li class="tpl-left-nav-item">
                        <a href="<?php echo url($vo['url']); ?>" class="nav-link <?php $url = explode('/', $vo['url']);
                        echo $url[0] === $controller_name ? 'active' : '' ?>">
                            <i class="<?php echo $vo['icon']; ?>"></i>
                            <span><?php echo $vo['item'] ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>