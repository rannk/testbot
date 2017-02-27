<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - </title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/minify?css/templatemo_main.css">
</head>
<body>
<?php $this->load->view("top_header"); ?>
<div class="template-page-wrapper">
    <?php $this->load->view("sidebar"); ?>

    <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
            <ol class="breadcrumb">
                <li><a href="/"><?=getWord($this, "main_dashboard")?></a></li>
                <li><a href="/tasks"><?=getWord($this, "test_task")?></a></li>
                <li><a href="/tasks/detail">测试任务1</a></li>
                <li><a href="/steps/test">用例1</a></li>
            </ol>
            <div class="margin-bottom-30">
                <h3>用例1</h3>
            </div>

            <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="steps_test_content">
                    <thead>
                    <tr>
                        <th class="col-lg-1">#</th>
                        <th ><?=getWord($this, "step_desc")?></th>
                        <th class="col-lg-2"><?=getWord($this, "main_operation")?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <p>我访问页面 http://www.baidu.com</p>
                            <p class="desc">能正常打开指定的页面，不会出现页面无法打开的状况</p>
                        </td>
                        <td>
                            <a href="sign-in.html" class="btn btn-sm btn-success"><?=getWord($this, "step_pass")?></a>
                            <a href="sign-in.html" class="btn btn-sm btn-warning"><?=getWord($this, "step_failed")?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <p>我看到文字 百度</p>
                            <p class="desc">在页面上我能看到指定文字</p>
                        </td>
                        <td>
                            <span style="color: green"><?=getWord($this, "step_pass")?></span>
                            <a href="#" class="btn"><img src="/images/add.png"></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <p>手工测试百度网页</p>
                            <p class="desc">自己设定一个操作步骤，访问百度页面</p>
                        </td>
                        <td>
                            <span style="color: red"><?=getWord($this, "step_failed")?></span>
                            <a href="#" class="btn"><img src="/images/add.png"></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#menu_tasks").addClass("active");
</script>
<?php $this->load->view("footer");?>
</body>
</html>