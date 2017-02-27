<div class="navbar-collapse collapse templatemo-sidebar">
    <ul class="templatemo-sidebar-menu font_up">
        <li>
            <form class="navbar-form">
                <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
                <span class="btn btn-default">Go</span>
            </form>
        </li>
        <li id="menu_dashboard"><a href="/dashboard"><i class="fa fa-home"></i><?=getWord($this, "main_dashboard")?></a></li>
        <li id="menu_case_manage"><a href="/testcase/manage"><i class="fa fa-cubes"></i><?=getWord($this, "case_manage")?></a></li>
        <li id="menu_tasks"><a href="/tasks"><i class="fa fa-tasks"></i><?=getWord($this, "test_task")?></a></li>
        <li id="menu_user_manage"><a href="/users/manage"><i class="fa fa-users"></i><?=getWord($this, "user_manage")?></a></li>
        <li id="menu_user_config"><a href="/users/config"><i class="fa fa-user"></i><?=getWord($this, "user_config")?></a></li>
        <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i><?=getWord($this, "main_logout")?></a></li>
    </ul>
</div>