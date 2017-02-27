<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - <?=getWord($this, "step_manage")?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/minify?css/templatemo_main.css:css/autosuggest.css">
</head>
<body>
<?php $this->load->view("top_header"); ?>
<script src="/js/autosuggest.js"></script>
<div class="template-page-wrapper">
    <?php $this->load->view("sidebar"); ?>

    <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
            <ol class="breadcrumb">
                <li><a href="/"><?=getWord($this, "main_dashboard")?></a></li>
                <li><a href="/testcase/manage"><?=getWord($this, "case_manage")?></a></li>
                <li><a href="#"><?=getWord($this, "step_manage")?></a></li>
            </ol>
            <div class="row margin-bottom-30">
                <div class="col-md-12">
                    <span class="btn btn-primary"><a href="javascript:;" data-toggle="modal" data-target="#addStepModal"><?=getWord($this, "step_add")?></a></span>
                </div>
            </div>

            <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
                <h4 class="margin-bottom-15">访问网站用例 <?=getWord($this, "step_lists")?></h4>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="col-lg-1">#</th>
                        <th ><?=getWord($this, "step_desc")?></th>
                        <th class="col-lg-2"><?=getWord($this, "step_position")?></th>
                        <th class="col-lg-2"><?=getWord($this, "main_operation")?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>我要访问页面 http://www.baidu.com <i class="fa fa-flag flag_auto" title="<?=getWord($this, "desc_step_auto")?>"></i></td>
                        <td><a href="#" class="btn btn-xs btn-default"><span class="fa fa-chevron-up"></span></a>
                            <a href="#" class="btn  btn-xs btn-default"><span class="fa fa-chevron-down"></span></a> </td>
                        <td>
                            <a href="#" class="btn  btn-xs btn-default"><?=getWord($this, "main_edit")?></a>
                            <a href="#" class="btn btn-xs btn-default"><?=getWord($this, "main_delete")?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>我看到文字 百度 <i class="fa fa-flag flag_auto" title="<?=getWord($this, "desc_step_auto")?>"></i></td>
                        <td><a href="#" class="btn btn-xs btn-default"><span class="fa fa-chevron-up"></span></a>
                            <a href="#" class="btn btn-xs btn-default"><span class="fa fa-chevron-down"></span></a> </td>
                        <td>
                            <a href="#" class="btn btn-xs btn-default"><?=getWord($this, "main_edit")?></a>
                            <a href="#" class="btn btn-xs btn-default"><?=getWord($this, "main_delete")?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>这是我自己设定的操作步骤</td>
                        <td><a href="#" class="btn btn-xs btn-default"><span class="fa fa-chevron-up"></span></a>
                            <a href="#" class="btn btn-xs btn-default"><span class="fa fa-chevron-down"></span></a> </td>
                        <td>
                            <a href="#" class="btn btn-xs btn-default"><?=getWord($this, "main_edit")?></a>
                            <a href="#" class="btn btn-xs btn-default"><?=getWord($this, "main_delete")?></a>
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

<div class="modal fade" id="addStepModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=getWord($this, "step_add")?></h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div>
                        <label for="case_name" class="control-label"><?=getWord($this, "step_desc")?></label>
                        <input type="text" class="form-control" id="step_desc" name="step_desc" value="" width="100%">
                    </div>
                    <div>
                        <label for="case_name" class="control-label"><?=getWord($this, "step_result")?></label>
                        <textarea class="form-control" id="step_result" name="step_result"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="sign-in.html" class="btn btn-primary"><?=getWord($this, "main_submit")?></a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=getWord($this, "main_cancel")?></button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#menu_case_manage").addClass("active");
</script>
<script language="javascript" type="text/javascript">
    $('#addStepModal').on('shown.bs.modal', function (e) {
        $("#step_desc").coolautosuggest({
            url:"/steps/suggestion?chars=",
            showDescription:true,
            submitOnSelect:true,
            onSelected:function(result){
                if(result!=null){
                    $("#step_desc").val(result.data)
                    $("#step_result").val(result.description);
                }
                else{
                    $("#step_desc").val("");
                }
            }
        });
    })

</script>
<?php $this->load->view("footer");?>
</body>
</html>