<?php
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
$active_url = $controller.'/'.$method;
?>
<div class="left-sidebar">
    <div class="left-sidebar-header">
        <div class="left-sidebar-title">Navigation</div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <div id="left-nav" class="nano">
        <div class="nano-content">
            <nav>
                <ul class="nav nav-left-lines" id="main-nav">
                    <!--HOME-->
                    <li class="active-item"><a href="<?=base_url('admin/dashboard')?>"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                    <li class="has-child-item <?php if ($menu == 'settings') { echo 'open-item'; }else{ echo 'close-item';}?>">
                        <a><i class="fa fa-fw fa-cogs" aria-hidden="true"></i><span>Settings</span></a>
                        <ul class="nav child-nav level-1">
                            <li <?php if ($sub_menu == 'site_settings') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/settings')?>">Site Settings</a></li>
                            <li <?php if ($sub_menu == 'cms') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/settings/cms')?>">Manage CMS</a></li>
                            <li class="has-child-item <?php if(($active_url == 'settings/question_categories') || ($active_url == 'settings/add_question_category') || ($active_url == 'settings/questions') || ($active_url == 'settings/add_question')){ echo 'open-item'; }else{ echo 'close-item'; }?>">
                                <a>FAQ Management</a>
                                <ul class="nav child-nav level-2 " style="">
                                    <li <?php if ($sub_menu == 'question_categories') {echo 'class="active-item"';}?>><a href="<?=base_url('admin/settings/question_categories')?>">Question Categories</a></li>
                                    <li <?php if ($sub_menu == 'questions') {echo 'class="active-item"';}?>><a href="<?=base_url('admin/settings/questions')?>">Manage Questions</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-child-item <?php if ($menu == 'plan_list') { echo 'open-item'; }else{ echo 'close-item';}?>">
                        <a><i class="fa fa-cc" aria-hidden="true"></i><span>Credit Plans</span></a>
                        <ul class="nav child-nav level-1">
                            <li <?php if ($sub_menu == 'plan_list') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/credit/plans')?>">Manage Credit Plans
                                </a></li>
                        </ul>
                    </li>
                    <li class="has-child-item <?php if ($menu == 'loyalty') { echo 'open-item'; }else{ echo 'close-item';}?>">
                        <a><i class="fa fa-diamond" aria-hidden="true"></i><span>Loyalty Plans</span></a>
                        <ul class="nav child-nav level-1">
                            <li <?php if ($sub_menu == 'loyalty_plan_list') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/loyalty/plans')?>">Manage Loyalty Plans
                                </a>
                            </li>
                            <li <?php if ($sub_menu == 'add-loyalty-plan') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/loyalty/add')?>">Add New Plan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-child-item <?php if ($menu == 'Service') { echo 'open-item'; }else{ echo 'close-item';}?>">
                        <a><i class="fa fa-life-ring" aria-hidden="true"></i><span>Service Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li <?php if ($sub_menu == 'service_list') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/services')?>">Service Management</a>
                            </li>
                            <li <?php if ($sub_menu == 'show-type') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/show-type')?>">Show Type Management</a>
                            </li>
                            <li <?php if ($sub_menu == 'willingness') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/willingness')?>">Willingness Management</a>
                            </li>
                            <li <?php if ($sub_menu == 'appearence') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/appearence')?>">Appearence Management</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-child-item <?php if ($menu == 'category_list') { echo 'open-item'; }else{ echo 'close-item';}?>">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Category Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li <?php if ($sub_menu == 'category_list') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/categories')?>">Manage Categories</a></li>
                            <!--<li <?php if ($sub_menu == 'category_add') {echo 'class="active-item"';}?>>
                            <a href="<?=base_url('admin/category/add_category?mode=add')?>">Add New Category</a></li>-->
                        </ul>
                    </li>
                    <li class="has-child-item <?php if ($menu == 'users') { echo 'open-item'; }else{ echo 'close-item';}?>">
                        <a><i class="fa fa-users" aria-hidden="true"></i><span>User Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li <?php if ($sub_menu == 'user') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/users/list/user')?>">User</a>
                            </li>
                            <li <?php if ($sub_menu == 'performer') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/users/list/performer')?>">Performer</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-child-item <?php if ($menu == 'verify') { echo 'open-item'; }else{ echo 'close-item';}?>">
                        <a><i class="fa fa-check-square-o" aria-hidden="true"></i><span>Verification Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li <?php if ($sub_menu == 'performer') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/verification/performer')?>">Performers</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if ($menu == 'vote') {echo 'class="active-item"';}?>">
                        <a href="<?=base_url('admin/vote')?>">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i><span>Vote Management</span>
                        </a>
                    </li>
                    <li class="has-child-item <?php if ($menu == 'gift') { echo 'open-item'; }else{ echo 'close-item';}?>">
                        <a><i class="fa fa-gift" aria-hidden="true"></i><span>Gifts Management</span></a>
                        <ul class="nav child-nav level-1">
                            <li <?php if ($sub_menu == 'gifts') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/gift')?>">Gifts</a>
                            </li>
                            <li <?php if ($sub_menu == 'add-gift') {echo 'class="active-item"';}?>>
                                <a href="<?=base_url('admin/gifts/add')?>">Add New Gift</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
