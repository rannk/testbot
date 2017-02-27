<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - <?=getWord($this, "main_dashboard")?></title>
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
        <div class="templatemo-content" id="dashboard_content">
            <ol class="breadcrumb">
                <li><a href="/"><?=getWord($this, "main_dashboard")?></a></li>
            </ol>
            <div class="row margin-bottom-30">
                <div class="col-lg-6">
                    <div class="mod-header">
                        <span><i class="fa fa-tasks"></i> <?=getWord($this, "task_mime")?></span>
                    </div>
                    <div class="table-responsive margin-bottom-30">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="col-lg-1">#</th>
                                <th ><?=getWord($this, "task_desc")?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td><a href="/tasks/detail">这是第二个测试任务</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="/tasks/detail">这是第二个测试任务</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mod-header">
                         <span><i class="fa fa-bell"></i> <?=getWord($this, "main_mentions")?></span>
                    </div>
                    <div id="mentions_content">
                        <div class="col-lg-12">
                            <div class="avatar"><img src="/images/avatar.jpg"></div>
                            <div class="message">
                                <p><span class="author">Mike</span> <span class="title">在任务 #1 这是测试任务</span> 给你留言:</p>
                                <p>这是留言信息这是留言信息这是留言信息这是留言信息</p>
                                <p class="time">刚刚</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="avatar"><img src="/images/avatar.jpg"></div>
                            <div class="message">
                                <p><span class="author">Mike</span> <span class="title">在任务 #1 这是测试任务</span> 给你留言:</p>
                                <p>这是留言信息这是留言信息这是留言信息这是留言信息</p>
                                <p class="time">刚刚</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mod-header">
                        <span><i class="fa fa-random"></i> <?=getWord($this, "main_events")?></span>
                    </div>
                    <div class="date">2016/1/1</div>
                    <div>
                        <div class="col-lg-1">6:05</div>
                        <div class="col-lg-1"><i class="fa fa-align-justify"></i> </div>
                        <div>Mike 创建了任务 #1 这是第一个测试任务</div>
                    </div>
                    <div>
                        <div class="col-lg-1">6:05</div>
                        <div class="col-lg-1"><i class="fa fa-align-justify"></i> </div>
                        <div>Mike 创建了任务 #1 这是第一个测试任务</div>
                    </div>
                    <div>
                        <div class="col-lg-1">6:05</div>
                        <div class="col-lg-1"><i class="fa fa-align-justify"></i> </div>
                        <div>Mike 创建了任务 #1 这是第一个测试任务</div>
                    </div>
                    <div>
                        <div class="col-lg-1">6:05</div>
                        <div class="col-lg-1"><i class="fa fa-align-justify"></i> </div>
                        <div>Mike 创建了任务 #1 这是第一个测试任务</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#menu_dashboard").addClass("active");
</script>
<?php $this->load->view("footer");?>
</body>
</html>