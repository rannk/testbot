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
            </ol>
            <div class="row margin-bottom-30">
                <div class="col-md-12">
                    <span class="btn btn-primary"><a href="javascript:;" data-toggle="modal" data-target="#addTaskModal"><?=getWord($this, "task_add")?></a></span>
                </div>
            </div>

            <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
                <h4 class="margin-bottom-15"><i class="glyphicon glyphicon-th-list"></i> <?=getWord($this, "task_lists")?></h4>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="col-lg-1">#</th>
                        <th ><?=getWord($this, "task_desc")?></th>
                        <th class="col-lg-2"><?=getWord($this, "task_assigned")?></th>
                        <th class="col-lg-2"><?=getWord($this, "task_status")?></th>
                        <th class="col-lg-2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="/tasks/detail">这是手工测试任务</a></td>
                        <td>Mike</td>
                        <td><?=getWord($this, "task_undo")?></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><a href="/tasks/detail?user=auto">这是自动测试任务</a> <i class="fa fa-flag flag_auto"></i> </td>
                        <td><?=getWord($this, "main_auto")?></td>
                        <td><?=getWord($this, "task_undo")?></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><a href="/tasks/detail">这是自动测试任务</a> <i class="fa fa-flag flag_auto"></i></td>
                        <td><?=getWord($this, "main_auto")?></td>
                        <td><?=getWord($this, "task_doing")?> <img src="/images/loading.gif" width="30px"> </td>
                        <td>
                            <a href="/tasks/report" class="btn btn-xs btn-default"><?=getWord($this, "main_report")?></a>
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

<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=getWord($this, "task_add")?></h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="case_name" class="control-label"><?=getWord($this, "task_desc")?></label>
                        <input type="text" class="form-control" id="task_desc" name="task_desc" value="">
                    </div>
                    <div class="form-group">
                        <label  class="control-label"><?=getWord($this, "task_require")?></label>
                        <textarea class="form-control" id="task_require" name="task_require"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="task_test_choice">
                            <option value=""><?=getWord($this, "task_test_choice")?></option>
                            <option value="1"><?=getWord($this, "main_manual_test")?></option>
                            <option value="2"><?=getWord($this, "main_auto_test")?></option>
                        </select>
                    </div>
                    <div class="form-group" id="manual_test" style="display: none">
                        <div class="form-group">
                            <label class="control-label"><?=getWord($this, "task_assigned")?></label>
                            <select name="task_assigned"  class="form-control">
                                <option value="">--Select--</option>
                                <option value="1">Mike</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"><?=getWord($this, "task_browser")?></label>
                            <select multiple="" name="task_browser" class="form-control">
                                <option>Chrome</option>
                                <option>Firefox</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?=getWord($this, "task_platform")?></label>
                            <select name="task_platform"  class="form-control">
                                <option>Desktop</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="auto_test" style="display: none">
                        <div class="form-group">
                            <label for="case_name" class="control-label"><?=getWord($this, "task_browser")?></label>
                            <select name="task_browser"  class="form-control">
                                <option>Chrome</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?=getWord($this, "task_platform")?></label>
                            <select name="task_platform"  class="form-control">
                                <option value="desktop">Desktop</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="/tasks/detail" class="btn btn-primary"><?=getWord($this, "main_next")?></a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=getWord($this, "main_cancel")?></button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#menu_tasks").addClass("active");
    $("select[name='task_test_choice']").change(function(){
        if($(this).val() == "1") {
            $("#manual_test").show();
            $("#auto_test").hide();
        }else if($(this).val() == "2") {
            $("#manual_test").hide();
            $("#auto_test").show();
        }else {
            $("#manual_test").hide();
            $("#auto_test").hide();
        }
    });
</script>
<?php $this->load->view("footer");?>
</body>
</html>