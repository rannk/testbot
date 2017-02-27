<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>test platform - <?=getWord($this, "user_login")?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/minify?css/templatemo_main.css">
</head>
<body>
<?php $this->load->view("top_header"); ?>
<div class="template-page-wrapper">
    <form class="form-horizontal templatemo-signin-form" role="form" action="index.html" method="get">
        <div class="form-group">
            <div class="col-md-12">
                <label for="email" class="col-sm-2 control-label"><?=getWord($this, "user_email")?></label>
                <div class="col-sm-10">
                    <input class="form-control" id="email" placeholder="email" type="text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <label for="password" class="col-sm-2 control-label"><?=getWord($this, "user_password")?></label>
                <div class="col-sm-10">
                    <input class="form-control" id="password" placeholder="Password" type="password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-sm-offset-2 col-sm-10">
                    <input value="<?=getWord($this, "user_login")?>" class="btn btn-default" type="submit">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>