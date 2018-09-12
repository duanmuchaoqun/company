<link rel="stylesheet" type="text/css" href="__STATIC__/assets/src/webuploader-0.1.5/webuploader.css">
<script src="__STATIC__/assets/src/webuploader-0.1.5/webuploader.js"></script>
<div class="tpl-content-wrapper">
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li><a href="#">表单</a></li>
            <li class="am-active">Amaze UI 表单</li>
        </ol>
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    新增Banner
                </div>
            </div>
            <div class="tpl-block ">
                <form action="<?php echo url('Banner/create'); ?>" method="post">
                    <div class="form-group input-group admin-input-width-500" >
                        <span class="input-group-addon" >标题</span>
                        <input type="text" name="title" class="form-control"  placeholder="请输入标题">
                    </div>
                    <div class="form-group input-group admin-input-width-500">
                        <span class="input-group-addon" >URL</span>
                        <input type="text" name="link" class="form-control" placeholder="请输入URL">
                    </div>
                    <div class="form-group input-group admin-input-width-500">
                        <span class="input-group-addon" >序号</span>
                        <input type="text" name="position" class="form-control" placeholder="请输入序号">
                    </div>
                    <div class="form-group admin-input-width-500" id="uploader-demo">
                        <!--用来存放item-->
                        <div id="filePicker">选择图片</div>
                        <div id="fileList" class="uploader-list"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">提交</button>
                    <button type="button" class="btn btn-default">取消</button>
                </form>
            </div>

        </div>
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf: '__STATIC__/assets/src/webuploader-0.1.5/Uploader.swf',

            // 文件接收服务端。
            server: '__STATIC__/assets/src/webuploader-0.1.5/server/fileupload.php',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',
            // 只允许传一张图片
            fileNumLimit:1,

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });

        // 当有文件添加进来的时候
        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                    '<div id="' + file.id + '" class="file-item thumbnail">' +
                    '<img>' +
                    '<input type="hidden" name="image_url" value="">' +
                    '</div>'
                ),
                $img = $li.find('img');
            var img_url = '__UPLOAD__' + file.name;

            // $list为容器jQuery实例
            $('#fileList').append( $li );
            $('input[name="image_url"]').val(img_url);


            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100
            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }

                $img.attr( 'src', src );
            }, 550, 300 );
        });

        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                $percent = $li.find('.progress span');

            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<p class="progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
            }

            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file ) {
            $( '#'+file.id ).addClass('upload-state-done');
        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ) {
            var $li = $( '#'+file.id ),
                $error = $li.find('div.error');

            // 避免重复创建
            if ( !$error.length ) {
                $error = $('<div class="error"></div>').appendTo( $li );
            }

            $error.text('上传失败');
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            $( '#'+file.id ).find('.progress').remove();
        });
    </script>
    </div>

</div>
