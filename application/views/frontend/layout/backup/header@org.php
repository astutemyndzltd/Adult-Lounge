<!DOCTYPE html>
<html lang="en">
<?php
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
$active_url = $controller.'/'.$method;
?>

<head>
    <?php $site_setting_data = siteSettingsData(); //print_r($site_setting_data); die;?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php 
        if(!isset($title) && $site_setting_data['site_title'] !=''){ 
            echo $site_setting_data['site_title']; 
        } elseif(isset($title)){
            echo $title;
        } else {
            echo 'Adult Lounge';
        }
        ?></title>
    <meta property="og:title" content="<?php 
        if(!isset($title) && $site_setting_data['site_title'] !=''){ 
            echo $site_setting_data['site_title']; 
        } elseif(isset($title)){
            echo $title;
        } else {
            echo 'Adult Lounge';
        }
        ?>">
    <meta name="author" content="Anurag Sen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery.mCustomScrollbar.css')?>">
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/custom.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/css/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />
    <script>
        var base_url = "<?=base_url()?>";

    </script>
    <!--<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>-->
    <script src="<?=base_url('assets/js/DetectRTC.js')?>"></script>
    <!--<script src="<?=base_url('assets/js/common-script.js')?>"></script>-->
</head>

<body id="body-content" class="hide">
    <section class="pagewrapper">
        <section class="header-wrap">
            <div class="header-layout">
                <header class="main-header">
                    <div class="hdr-lft">
                        <a href="<?=base_url()?>" class="sitelogo"><img src="<?=base_url('assets/images/logo.png')?>" alt="Logo" /></a>
                    </div>
                    <div class="hdr-rgt">
                        <div class="hdr-rwidgt">
                            <ul class="inline-styled text-right">
                                <!--<li><a href="javascript:void(0)" title="country"><img src="images/icon-flag.png" alt="uk"></a></li>-->
                                <li><a href="<?=base_url()?>" title="Home"><img src="<?=base_url('assets/images/icon-home.png')?>" alt="Home"></a></li>
                                <?php if($this->session->userdata('UserId') || $this->session->userdata('UserId') != ''){ ?>
                                <li>
                                    <a href="<?=base_url('profile')?>" title="User">
                                        <img src="<?=base_url('assets/images/icon-user.png')?>" alt="User">
                                    </a>
                                </li>
                                <?php } ?>
                                <!--<li><a href="javascript:void(0)" title="Briefcase"><img src="images/icon-briefcase.png" alt="briefcase"></a></li>-->
                                <?php if($this->session->userdata('UserType') && $this->session->userdata('UserType') == 1){ ?>
                                <li>
                                    <a href="<?=base_url('personal-details')?>" title="Setting">
                                        <img src="<?=base_url('assets/images/icon-setting.png')?>" alt="setting">
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="hdr-rwidgt">
                            <div class="btn-group">
                                <a href="javascript:void(0)" class="btn buybtn">
                                    <img src="<?=base_url('assets/images/icon-buycrd.png')?>" alt="BUY CREDITS" /> BUY CREDITS
                                </a>
                                <?php if(!$this->session->userdata('UserId') || $this->session->userdata('UserId') == ''){ ?>
                                <a href="<?=base_url('login')?>" class="btn logbtn"><img src="<?=base_url('assets/images/icon-lock.png')?>" alt="login" /> LOGIN</a>
                                <?php }else{ ?>
                                <a href="<?=base_url('logout')?>" class="btn logbtn"><img src="<?=base_url('assets/images/icon-lock.png')?>" alt="signup" /> LOGOUT</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </header>
                <section class="header-bottom">
                    <nav>
                        <ul>
                            <li><a href="javascript:void(0)">categories</a>
                                <?php if(!empty($show)){ ?>
                                <div class="submenu">
                                    <h3>Filter By: Catagories</h3>
                                    <ul>
                                        <?php foreach($show as $shw){ ?>
                                        <li><a href="javascript:void(0)" onclick="filter('category', '<?=$shw->id?>')">#<?=$shw->name?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php } ?>
                            </li>
                            <li><a href="javascript:void(0)">Show Types</a></li>
                            <li><a href="javascript:void(0)">awards</a></li>
                            <li><a href="javascript:void(0)">loyalty</a></li>
                            <?php if(!$this->session->userdata('UserType') || $this->session->userdata('UserType') == ''){ ?>
                            <li><a href="<?=base_url('signup')?>">Sign up</a></li>
                            <?php } ?>
                            <?php if($this->session->userdata('UserType') && $this->session->userdata('UserType') == 1){ ?>
                            <!--<li><a href="<?=base_url('video-chat')?>">Video Chat</a></li>-->
                            <?php } ?>
                            <?php if($this->session->userdata('UserType') && $this->session->userdata('UserType') == 2 && $this->session->userdata('AccountVerified') == 'No'){ ?>
                            <li><a href="<?=base_url('verification')?>">Verification</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <div class="right-filters">
                        <?php if($this->session->userdata('UserId') || $this->session->userdata('UserId') != ''){ ?>
                        <div class="switch-view" style="color:#fff;">
                            <span class="list">Welcome <?=$this->session->userdata('UserName')?></span>
                        </div>
                        <?php } ?>
                        <!--<div class="search"><span><img src="<?=base_url('assets/images/icon-search.png')?>" alt="search" /></span></div>
<div class="drop-list">
    <span>recommended</span>
    <ul>
        <li><a href="javascript:void(0)">recommended</a></li>
        <li><a href="javascript:void(0)">recommended 1</a></li>
        <li><a href="javascript:void(0)">recommended 2</a></li>
    </ul>
</div>
<div class="switch-view">
    <span class="list"><img src="<?=base_url('assets/images/icon-list.png')?>" alt="list" /></span>
    <span class="grid"><img src="<?=base_url('assets/images/icon-grid.png')?>" alt="grid" /></span>
</div>-->
                    </div>
                </section>
            </div>
        </section>
        <main class="content-wrapper">
            <aside>
                <div class="sidebar">
                    <ul class="sidebar-menu">
                        <?php if(!empty($categories)){ ?>
                        <li class="performers"><a href="javascript:void(0)">PERFORMERS</a>
                            <ul>
                                <?php foreach($categories as $cat){ ?>
                                <li><a href="javascript:void(0)" onclick="filter('category', '<?=$cat->id?>')">#<?=$cat->name?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if(!empty($show)){ ?>
                        <li class="types"><a href="javascript:void(0)">SHOW TYPES</a>
                            <ul>
                                <?php foreach($show as $shw){ ?>
                                <li><a href="javascript:void(0)" onclick="filter('attribute', '<?=$shw->id?>')">#<?=$shw->name?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if(!empty($age)){ ?>
                        <li class="age"><a href="javascript:void(0)">AGE</a>
                            <ul>
                                <?php foreach($age as $ag){ ?>
                                <li onclick="filter('age', '<?=$ag->age?>')"><?=$ag->age?></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if(!empty($will)){ ?>
                        <li class="willingers"><a href="javascript:void(0)">WILLINGNESS</a>
                            <ul>
                                <?php foreach($will as $wll){ ?>
                                <li><a href="javascript:void(0)" onclick="filter('willingness', '<?=$wll->id?>')">#<?=$wll->name?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if(!empty($appearence)){ ?>
                        <li class="appearance"><a href="javascript:void(0)">APPEARANCE</a>
                            <ul>
                                <?php foreach($appearence as $aprnc){ ?>
                                <li><a href="javascript:void(0)" onclick="filter('appearance', '<?=$aprnc->id?>')">#<?=$aprnc->name?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </aside>
