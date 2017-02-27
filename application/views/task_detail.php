<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - <?=getWord($this, "test_task")?></title>
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
                <li><a href="/tasks">测试任务1</a></li>
            </ol>
            <div class="col-lg-8">
                <div class="margin-bottom-30">
                    <h3 class="editable-field editable-title">测试任务1 <i class="fa fa-pencil"></i></h3>
                </div>
                <div class="margin-bottom-15 font_up">
                    <?php if($status == "start" && $user != "auto"){?>
                        <a href="#" class="btn btn-default"><?=getWord($this, "task_finished")?></a>
                    <?php }elseif($status != "start"){?>
                        <a href="/tasks/detail?status=start&user=<?=$user?>" class="btn btn-default"><?=getWord($this, "task_start")?></a>
                    <?php }?>
                    <?php if($user == "auto" && $status != "start") {?>
                        <a href="#" class="btn btn-default"><?=getWord($this, "task_set_trigger")?></a>
                    <?php }?>
                    <a href="#" class="btn btn-default"><?=getWord($this, "task_cancel")?></a>
                </div>
                <div class="mod-header">
                    <span><?=getWord($this, "main_detail")?></span>
                </div>
                <div class="margin-bottom-30 row" id="task_detail_content">
                    <div class="col-lg-6">
                        <span class="title col-lg-4"><?=getWord($this, "task_assigned")?>:</span>
                        <?php if($user == "auto") {?>
                            <span><?=getWord($this, "main_auto")?></span>
                        <?php }else{?>
                            <span class="editable-field editable col-lg-8">Mike <i class="fa fa-pencil"></i></span>
                        <?php }?>
                    </div>
                    <div class="col-lg-6">
                        <span class="title"><?=getWord($this, "task_status")?>:</span>
                        <?php if($status == "start"){?>
                            <span><?=getWord($this, "task_doing")?></span>
                        <?php }else{?>
                            <span><?=getWord($this, "task_undo")?></span>
                        <?php }?>
                    </div>
                    <div class="col-lg-6">
                        <span class="title"><?=getWord($this, "task_browser")?>:</span>
                        <span>Chrome</span>
                    </div>
                    <div class="col-lg-6">
                        <span class="title"><?=getWord($this, "task_platform")?>:</span> <span>Desktop</span>
                    </div>
                </div>
                <div class="mod-header">
                    <span><?=getWord($this, "task_require")?></span>
                </div>
                <div class="margin-bottom-30 editable-field editable-textarea" style="width: 100%;min-height: 40px;">测试要求 <i class="fa fa-pencil"></i></div>
            </div>
            <div class="col-lg-4">
                <ul class="small-font">
                    <li>2016/4/8 Mike 创建了本任务</li>
                    <li>2016/4/8 Jack 开始此任务</li>
                </ul>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
                <ul class="nav nav-tabs font_up" role="tablist" id="templatemo-tabs">
                    <li class="active"><a href="#case_lists" role="tab" data-toggle="tab"><?=getWord($this, "case_lists")?></a></li>
                    <li><a href="#comments" role="tab" data-toggle="tab"><?=getWord($this, "main_comments")?></a></li>
                </ul>
                <div class="tab-content">
                    <div id="case_lists" class="tab-pane active">
                        <h3><a href="javascript:;" data-toggle="modal" data-target="#addTestcaseModal" class="btn btn-primary btn-sm">添加用例</a></h3>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="col-lg-1">#</th>
                                <th ><?=getWord($this, "case_desc")?></th>
                                <th class="col-lg-2"><?=getWord($this, "case_pass_rate")?></th>
                                <th class="col-lg-2"><?=getWord($this, "main_operation")?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>John</td>
                                <td>0%</td>
                                <td>
                                    <?php if($status != "start") {?>
                                        <a href="#" class="btn btn-xs btn-default"><?=getWord($this, "main_remove")?></a>
                                    <?php }?>
                                    <?php if($status == "start" && $user != "auto") {?>
                                        <a href="/steps/test" class="btn btn-xs btn-default"><?=getWord($this, "main_test")?></a>
                                    <?php }?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="comments" class="tab-pane">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td>
                                    <p><img src="/images/avatar.jpg" width="15px"> Rannk 2016/1/1 16:00</p>
                                    <p class="content editable-field editable-textarea">留言信息留言信息 <i class="fa fa-pencil"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><img src="/images/avatar.jpg" width="15px"> Mike 2016/1/1 16:00</p>
                                    <p class="content">留言信息留言信息</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><img src="/images/avatar.jpg" width="15px"> Mike 2016/1/1 16:00</p>
                                    <p class="content">留言信息留言信息</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <h3><a href="javascript:;" data-toggle="modal" data-target="#addTestcaseModal" class="btn btn-default btn-sm"  style="min-width: 80px;"><i class="glyphicon glyphicon-comment"></i> 留言</a></h3>
                    </div>
                </div>
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
                <div class="table-responsive">
                    <div class="margin-bottom-15"><i class="fa fa-exclamation-triangle" style="color: orangered"></i> <?=getWord($this, "desc_add_case")?></div>
                    <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                        <li class="active"><a href="#home" role="tab" data-toggle="tab">All</a></li>
                        <li><a href="#profile" role="tab" data-toggle="tab">suite1</a></li>
                        <li><a href="#messages" role="tab" data-toggle="tab">suite2</a></li>
                    </ul>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="col-lg-1"></th>
                            <th class="col-lg-1">#</th>
                            <th ><?=getWord($this, "case_name")?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>1</td>
                            <td>John</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <a href="sign-in.html" class="btn btn-primary"><?=getWord($this, "case_add_all")?></a>
                <a href="#" class="btn btn-primary"><?=getWord($this, "case_add_selected")?></a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=getWord($this, "main_cancel")?></button>
            </div>
        </div>
    </div>
</div>
<script language="javascript" src="/js/editable.min.js"></script>
<script>
    $("#menu_tasks").addClass("active");
    $(document).ready(function() {
        $('.editable').editable(function(value, settings) {
            return(value);
        },{
            cancel: '<span class=" btn btn-xs btn-success"><i class="glyphicon glyphicon-remove"></i></span>',
            submit: '<span class=" btn btn-xs btn-danger"><i class="glyphicon glyphicon-ok"></i></span>',
            data : function(value, settings){
                $(this).removeClass("editable-field")
                var retval = value.replace(/ <i.*\/i>/gi, '');
                return retval;
            },
            onreset : function(settings, original) {
                $(original).addClass("editable-field");
            }
        });

        $('.editable-title').editable(function(value, settings) {
            return(value);
        },{
            cancel: '<span class=" btn btn-xs btn-success"><i class="glyphicon glyphicon-remove"></i></span>',
            submit: '<span class=" btn btn-xs btn-danger"><i class="glyphicon glyphicon-ok"></i></span>',
            data : function(value, settings){
                $(this).removeClass("editable-field")
                var retval = value.replace(/ <i.*\/i>/gi, '');
                return retval;
            },
            onreset : function(settings, original) {
                $(original).addClass("editable-field");
            }
        });

        $('.editable-textarea').editable(function(value, settings) {
            return(value);
        },{
            cancel: '<span class=" btn btn-sm btn-success"><i class="glyphicon glyphicon-remove"></i></span>',
            submit: '<span class=" btn btn-sm btn-danger"><i class="glyphicon glyphicon-ok"></i></span>',
            type: 'textarea',
            rows: 5,
            data : function(value, settings){
                $(this).removeClass("editable-field")
                var retval = value.replace(/ <i.*\/i>/gi, '');
                return retval;
            },
            onreset : function(settings, original) {
                $(original).addClass("editable-field");
            }
        });
    });
</script>
<?php $this->load->view("footer");?>
</body>
</html>