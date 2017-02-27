<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - <?=getWord($this, "user_config")?></title>
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
                <li><a href="/tasks"><?=getWord($this, "user_config")?></a></li>
            </ol>
            <div class="col-lg-6">
                <div class="form-group">
                    <img src="/images/avatar.jpg" width="100px">
                    <input type="file"/>
                </div>
                <div class="form-group">
                    <label><?=getWord($this, "user_name")?></label>
                    <input type="text" value="Rannk" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label><?=getWord($this, "user_email")?></label>
                    <input type="text" value="a@example" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label><?=getWord($this, "user_password")?></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label><?=getWord($this, "user_password_confirm")?></label>
                    <input type="password" name="repassword" class="form-control">
                </div>
                <div class="form-group">
                    <label><?=getWord($this, "language_choice")?></label>
                    <select class="form-control">
                        <option><?=getWord($this, "language_default")?></option>
                        <option>English</option>
                        <option>简体中文</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"><?=getWord($this, "main_update")?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#menu_user_config").addClass("active");;
</script>
<?php $this->load->view("footer");?>
</body>
</html>