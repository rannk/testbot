<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - <?=getWord($this, "case_manage")?></title>
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
                <li><a href="#"><?=getWord($this, "case_manage")?></a></li>
            </ol>
            <div class="row margin-bottom-30">
                <div class="col-md-12">
                    <span class="btn btn-primary"><a href="javascript:;" data-toggle="modal" data-target="#addTestcaseModal"><?=getWord($this, "case_add")?></a></span>
                    <span class="btn btn-primary"><a href="javascript:;" data-toggle="modal" data-target="#suiteModal"><?=getWord($this, "suite_manage")?></a></span>
                </div>
            </div>

            <div class="row">
            <div class="col-md-12">
            <div class="btn-group pull-right" id="templatemo_sort_btn">
                <button type="button" class="btn btn-default">Sort by</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">First Name</a></li>
                    <li><a href="#">Last Name</a></li>
                    <li><a href="#">Username</a></li>
                </ul>
            </div>
            <div class="table-responsive">
                <h4 class="margin-bottom-15"><?=getWord($this, "case_lists")?></h4>
                <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                    <li class="active"><a href="#home" role="tab" data-toggle="tab">All</a></li>
                    <li><a href="#profile" role="tab" data-toggle="tab">suite1</a></li>
                    <li><a href="#messages" role="tab" data-toggle="tab">suite2</a></li>
                </ul>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="col-lg-1">#</th>
                        <th ><?=getWord($this, "case_name")?></th>
                        <th class="col-lg-1"><?=getWord($this, "main_edit")?></th>
                        <th class="col-lg-1"><?=getWord($this, "step_manage")?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>自动测试百度网站 <i class="fa fa-flag flag_auto"></i> </td>
                        <td><a href="#" class="btn btn-xs btn-default">Edit</a></td>
                        <td><a href="/steps/manage" class="btn btn-xs btn-default">Steps</a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>手工测试百度网站  </td>
                        <td><a href="#" class="btn btn-xs btn-default">Edit</a></td>
                        <td><a href="/steps/manage" class="btn btn-xs btn-default">Steps</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addTestcaseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=getWord($this, "case_add")?></h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="case_name" class="control-label"><?=getWord($this, "case_name")?></label>
                        <input type="text" class="form-control" id="case_name" name="case_name" value="">
                    </div>
                    <div class="form-group">
                        <label for="case_name" class="control-label"><?=getWord($this, "case_suite")?></label>
                        <div>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1" checked> suite1
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" value="option2" checked> suite2
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="sign-in.html" class="btn btn-primary">提交</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="suiteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">套件管理</h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="case_name" class="control-label">套件名称</label>
                        <input type="text" class="form-control" id="suite_name" name="suite_name" value="">
                    </div>
                    <div class="form-group">
                        <a href="sign-in.html" class="btn btn-primary">添加</a>
                    </div>
                </form>
                <div class="table-responsive">
                    <h4 class="margin-bottom-15">套件列表</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="col-lg-1">#</th>
                            <th >套件名称</th>
                            <th class="col-lg-1">编辑</th>
                            <th class="col-lg-1">删除</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>suite1</td>
                            <td><a href="#" class="btn btn-xs btn-default">Edit</a></td>
                            <td><a href="#" class="btn btn-xs btn-default">Delete</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>suite2</td>
                            <td><a href="#" class="btn btn-xs btn-default">Edit</a></td>
                            <td><a href="#" class="btn btn-xs btn-default">Delete</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭窗口</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#menu_case_manage").addClass("active");
</script>
<?php $this->load->view("footer");?>
</body>
</html>