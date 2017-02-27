<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - <?=getWord($this, "task_report")?></title>
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
                <li><a href="/tasks/report"><?=getWord($this, "task_report")?></a></li>
            </ol>
            <div class="margin-bottom-30">
                <div class="col-lg-8">
                    <div class="margin-bottom-30">
                        <h3 class="editable-field">测试任务1 <i class="fa fa-pencil"></i></h3>
                    </div>
                    <div class="mod-header">
                        <span><?=getWord($this, "main_detail")?></span>
                    </div>
                    <div class="margin-bottom-30 row" id="task_detail_content">
                        <div class="col-lg-6">
                            <span class="title"><?=getWord($this, "task_assigned")?>:</span>
                            <span>Mike </span>
                        </div>
                        <div class="col-lg-6">
                            <span class="title"><?=getWord($this, "task_status")?>:</span>
                            <span><?=getWord($this, "task_finished")?></span>
                        </div>
                        <div class="col-lg-6">
                            <span class="title"><?=getWord($this, "task_browser")?>:</span>
                            Chrome
                        </div>
                        <div class="col-lg-6">
                            <span class="title"><?=getWord($this, "task_platform")?>:</span> <span>Desktop</span>
                        </div>
                        <div class="col-lg-6">
                            <span class="title"><?=getWord($this, "main_create_time")?>:</span>
                            <span>2016/1/1 18:00</span>
                        </div>
                        <div class="col-lg-6">
                            <span class="title"><?=getWord($this, "main_finish_time")?>:</span>
                            2016/1/5 18:00
                        </div>
                    </div>
                    <div class="mod-header">
                        <span><?=getWord($this, "task_require")?></span>
                    </div>
                    <div class="margin-bottom-30" style="width: 100%;min-height: 40px;">测试要求</div>
                </div>
                <div class="col-lg-4">
                    <div class="templatemo-chart-box">
                        <canvas id="templatemo-pie-chart"  height="138" width="276"></canvas>
                        <div><i class="fa fa-stop" style="color: green"></i> PASS</div>
                        <div><i class="fa fa-stop" style="color: red"></i> FAILED</div>
                        <div><i class="fa fa-stop" style="color: #cccccc"></i> UNDO</div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
                <h4 class="margin-bottom-15"><?=getWord($this, "case_lists")?></h4>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="col-lg-1">#</th>
                        <th ><?=getWord($this, "case_desc")?></th>
                        <th class="col-lg-2"><?=getWord($this, "case_pass_rate")?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>1</td>
                        <td><a href="javascript:;" data-toggle="modal" data-target="#stepsModal">John</a></td>
                        <td>0%</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>John</td>
                        <td>0%</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>John</td>
                        <td>0%</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="stepsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=getWord($this, "step_lists")?></h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
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
                            <td>测试步骤1</td>
                            <td><?=getWord($this, "step_pass")?></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                测试步骤1
                                <p>无法访问首页，出现错误error</p>
                                <p class="small-font"><i class="fa fa-paperclip"></i> <a href="#">查看附件</a></p>
                            </td>
                            <td><?=getWord($this, "step_failed")?></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>测试步骤1</td>
                            <td><?=getWord($this, "step_pass")?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=getWord($this, "main_close")?></button>
            </div>
        </div>
    </div>
</div>
<script src="/js/Chart.min.js"></script>
<script src="/js/templatemo_script.js"></script>
<script>
    $("#menu_tasks").addClass("active");
</script>
<script type="text/javascript">
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var pieChartData = [
        {
            value: 50,
            color:"red",
            highlight: "#FF5A5E",
            label: "FAILED"
        },
        {
            value: 300,
            color: "green",
            highlight: "#5AD3D1",
            label: "PASS"
        },
        {
            value: 30,
            color: "#cccccc",
            highlight: "#FFC870",
            label: "UNDO"
        }
    ] // pie chart data


    window.onload = function(){
        var ctx_pie = document.getElementById("templatemo-pie-chart").getContext("2d");

        window.myPieChart = new Chart(ctx_pie).Pie(pieChartData,{
            responsive: true
        });
    }
</script>
<?php $this->load->view("footer");?>
</body>
</html>