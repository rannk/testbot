<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - <?=getWord($this, "user_manage")?></title>
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
                <li><a href="/tasks"><?=getWord($this, "user_manage")?></a></li>
            </ol>
            <h1><?=getWord($this, "user_manage")?></h1>
            <div class="row margin-bottom-30">
                <div class="col-md-12">
                    <span class="btn btn-primary"><a href="javascript:;" data-toggle="modal" data-target="#addUserModal"><?=getWord($this, "user_add")?></a></span>
                    <span class="btn btn-primary"><a href="javascript:;" data-toggle="modal" data-target="#addUserModal"><?=getWord($this, "user_role_manage")?></a></span>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?=getWord($this, "user_name")?></th>
                            <th><?=getWord($this, "user_role")?></th>
                            <th><?=getWord($this, "user_email")?></th>
                            <th><?=getWord($this, "user_edit")?></th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>John</td>
                            <td>测试管理员</td>
                            <td>a@company.com</td>
                            <td><a href="#" class="btn btn-default btn-xs">Edit</a></td>
                            <td><a href="#" class="btn btn-link btn-xs">Delete</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>John</td>
                            <td>测试管理员</td>
                            <td>a@company.com</td>
                            <td><a href="#" class="btn btn-default btn-xs">Edit</a></td>
                            <td><a href="#" class="btn btn-link btn-xs">Delete</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>John</td>
                            <td>测试管理员</td>
                            <td>a@company.com</td>
                            <td><a href="#" class="btn btn-default btn-xs">Edit</a></td>
                            <td><a href="#" class="btn btn-link btn-xs">Delete</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>John</td>
                            <td>测试管理员</td>
                            <td>a@company.com</td>
                            <td><a href="#" class="btn btn-default btn-xs">Edit</a></td>
                            <td><a href="#" class="btn btn-link btn-xs">Delete</a></td>
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
    $("#menu_user_manage").addClass("active");;
</script>
<?php $this->load->view("footer");?>
</body>
</html>