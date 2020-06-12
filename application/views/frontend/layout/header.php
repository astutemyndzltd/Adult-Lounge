<!DOCTYPE html>
<html lang="en">
<?php
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
$active_url = $controller . '/' . $method;
?>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Adult Lounge</title>
<meta property="og:title" content="Adult Lounge">
<meta name="author" content="Basudev Mondal">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?=base_url('assets/css/jquery.mCustomScrollbar.css')?>">

<link rel="stylesheet" href="<?=base_url()?>backend/node_modules/bootstrap-utilities/bootstrap-utilities.css">
<link href="<?=base_url('assets/css/owl.carousel.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/owl.theme.default.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/Os-theme-round-dark.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/OverlayScrollbars.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/waitMe.min.css')?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?=base_url('assets/css/component.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/custom.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/responsive.css')?>" rel="stylesheet" type="text/css" />
<script>
        var base_url = "<?=base_url()?>";
        var API_URL = "<?=base_url()?>api/v1/";
        var UserId = "<?=$this->session->userdata('UserId')?>";
        var performerID = "<?php echo $this->uri->segment('2'); ?>";
        var customerID = UserId;
        var UserType = "<?=$this->session->userdata('UserType')?>";
       // mdc.ripple.MDCRipple.attachTo(document.querySelector('.foo-button'));
    </script>
<script src="<?=base_url('assets/js/DetectRTC.js')?>"></script>
<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.additional-methods.min.js'); ?>"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body id="body-content" class="hide">

<section class="pagewrapper">
<section class="header-wrap">
  <div class="header-layout">
    <header class="main-header">
      <div class="hdr-lft"> <a href="<?=base_url()?>" class="sitelogo"><img src="<?=base_url('assets/images/logo.png')?>" alt="Logo" /></a> </div>
      <div class="hdr-rgt">
        <div class="hdr-rwidgt">
          <ul class="inline-styled text-right">
            <!--<li><a href="javascript:void(0)" title="country"><img src="images/icon-flag.png" alt="uk"></a></li>-->
            <li><a href="<?=base_url()?>" title="Home"><img src="<?=base_url('assets/images/icon-home.png')?>" alt="Home"></a></li>
            <?php if ($this->session->userdata('UserId') || $this->session->userdata('UserId') != '') {?>
            <li> <a href="<?=base_url('profile')?>" title="My Account"> <img src="<?=base_url('assets/images/icon-user.png')?>" alt="My Account"> </a> </li>
            <?php }?>
            <!--<li><a href="javascript:void(0)" title="Briefcase"><img src="images/icon-briefcase.png" alt="briefcase"></a></li>-->
            <?php if ($this->session->userdata('UserType') && ($this->session->userdata('UserType') == 1 || $this->session->userdata('UserType') == 2)) {?>
            <li> <a href="javascript:void(0);" id="msg" class="msg" title="Chat"> <i class="fa fa-comments" aria-hidden="true"></i> </a> </li>
            <?php }?>
            <?php if ($this->session->userdata('UserType') && $this->session->userdata('UserType') == 1) {?>
            <li> <a href="<?=base_url('personal-details')?>" title="Setting"> <img src="<?=base_url('assets/images/icon-setting.png')?>" alt="setting"> </a> </li>
            <?php }?>
          </ul>
        </div>
        <div class="hdr-rwidgt">
          <div class="btn-group">
            <?php if ($this->session->userdata('UserType') && $this->session->userdata('UserType') == 1) {?>
            <a href="javascript:void(0);" id="myBtn" class="btn buybtn"><img src="<?=base_url('assets/images/icon-buycrd.png')?>" alt="BUY CREDITS" /> BUY CREDITS </a>
            <?php }?>
            <?php if (!$this->session->userdata('UserId') || $this->session->userdata('UserId') == '') {?>
            <a href="<?=base_url('signup')?>" class="btn logbtn"><img src="<?=base_url('assets/images/icon-lock.png')?>" alt="signup" /> SIGNUP</a> <a href="<?=base_url('login')?>" class="btn logbtn"><img src="<?=base_url('assets/images/icon-lock.png')?>" alt="login" /> LOGIN</a>
            <?php } else {?>
            <a href="<?=base_url('logout')?>" class="btn logbtn"><img src="<?=base_url('assets/images/icon-lock.png')?>" alt="signup" /> LOGOUT</a>
            <?php }?>
          </div>
        </div>
      </div>
    </header>
    <section style="display: block;" class="header-bottom">
      <nav>
        <ul>
        <?php if (!$this->session->userdata('UserType')) {
	?>
            <li>
              <a href="javascript:void(0)">Categories</a>
                <?php if (!empty($categories)) {?>
                  <div class="submenu">
                    <h3>Filter By: Catagories</h3>
                    <ul>
                      <?php foreach ($categories as $category) {?>
                      <li><a class="_filter" data-key="category" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $category->name . '')); ?>" data-name="<?=$category->name?>" href="javascript:void(0);">#
                        <?=$category->name?>
                        </a></li>
                      <?php }?>
                    </ul>
                  </div>
                <?php }?>
            </li>
            <li><a href="javascript:void(0);">Show Types</a>
              <div class="submenu submenu-2">
                <h3>Filter By: Show Type</h3>
                <ul>
                  <?php if (!empty($show)) {
		foreach ($show as $sh) {?>
                      <li><a class="_filter" data-key="show_type" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $sh->name . '')); ?>" data-name="<?=$sh->name?>"  href="javascript:;"><?php echo $sh->name; ?></a></li>
                    <?php }?>
                  <?php }?>
                </ul>
              </div>
            </li>
            <li><a href="<?=base_url('awards')?>">Awards</a></li>
            <li><a href="<?=base_url('loyalty')?>">Loyalty</a></li>
            <div class="right-filters">
      	<div class="search">
        	<!--<span><img src="<?=base_url('assets/images/icon-search.png')?>" alt="search"/></span>-->
            <div class="search-top-box">
              <div class="container-2">
                  <span class="icon"><img src="<?=base_url('assets/images/icon-search.png')?>" alt="search"/></span>
                  <form action="" method="get">
                  	<!--<input type="search" id="search" placeholder="Search..." />-->
                    <input type="hidden" name="mode" value="users">
                      <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                          <input class="Typeahead-hint" id="search" type="text" tabindex="-1" readonly>
                          <input class="Typeahead-input" id="demo-input" type="text" name="q" placeholder="Search all girls cams...">
                          <img class="Typeahead-spinner" src="<?php echo base_url('assets/plugins/typeahead/img/spinner.gif'); ?>">
                        </div>
                        <div class="Typeahead-menu"></div>
                      </div>
                  </form>
              </div>
            </div>
        </div>
        <div class="drop-list select-filter">
            <Select class="form-control">
                <option>recommended</option>
                <option>recommended</option>
                <option>recommended</option>
                <option>recommended</option>
            </select>
        </div>
        <div class="switch-view">
            <span class="list"><img src="<?=base_url('assets/images/icon-list.png')?>" alt="list"/></span>
            <span class="grid"><img src="<?=base_url('assets/images/icon-grid.png')?>" alt="grid"/></span>
        </div>
      </div>
        <?php } elseif ($this->session->userdata('UserType') && $this->session->userdata('UserType') != 2) {
	?>
          <li>
              <a href="javascript:void(0)">Categories</a>
                <?php if (!empty($categories)) {?>
                  <div class="submenu">
                    <h3>Filter By: Catagories</h3>
                    <ul>
                      <?php foreach ($categories as $category) {?>
                      <li><a class="_filter" data-key="category" data-name="<?=$category->name?>" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $category->name . '')); ?>">#
                        <?=$category->name?>
                        </a></li>
                      <?php }?>
                    </ul>
                  </div>
                <?php }?>
            </li>
            <li><a href="javascript:void(0);">Show Types</a>
              <div class="submenu submenu-2">
                <h3>Filter By: Show Type</h3>
                <ul>
                  <?php if (!empty($show)) {
		foreach ($show as $sh) {?>
                      <li><a class="_filter" data-name="<?=$sh->name?>"  data-key="show_type" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $sh->name . '')); ?>" href="javascript:;"><?php echo $sh->name; ?></a></li>
                    <?php }?>
                    <?php }?>
                </ul>
              </div>
            </li>
            <li><a href="<?=base_url('awards')?>">Awards</a></li>
            <li><a href="<?=base_url('loyalty')?>">Loyalty</a></li>

        <?php }?>

        <nav class="navbar navbar-expand-lg performer-head">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
                <?php if ($this->session->userdata('UserType') && $this->session->userdata('UserType') != 1) {?>
                  <li class="nav-item"><a href="<?=base_url('content')?>" class="nav-link">CONTENT</a></li>
                  <li class="nav-item"><a href="<?=base_url('manage-users')?>" class="nav-link">MANAGE USERS</a></li>
                  <li class="nav-item"><a href="<?=base_url('financial')?>" class="nav-link">FINANCIAL</a></li>
                  <li class="nav-item"><a href="<?=base_url('my-subscriptions')?>" class="nav-link">SUBSCRIPTIONS</a></li>
                  <li class="nav-item"><a href="<?=base_url('profile')?>" class="nav-link">PROFILE</a></li>
                  <li class="nav-item"><a href="<?=base_url('my-network')?>" class="nav-link">MY NETWORK</a></li>
                  <li class="nav-item"><a href="<?=base_url('loyalty')?>" class="nav-link">LOYALTY</a></li>
                  <li class="nav-item"><a href="<?=base_url('gifts')?>" class="nav-link">GIFTS</a></li>
                <!--<li><a href="<?=base_url('settings')?>">SETTINGS</a></li>-->
                  <li class="nav-item"><a href="<?=base_url('help')?>" class="nav-link">HELP</a></li>
                  <?php if ($this->session->userdata('AccountVerified') == 'No') {?>
                  <li class="nav-item"><a href="<?=base_url('verification')?>" class="nav-link">Verification</a></li>
                <?php }?>

              </ul> 
          </div>
        </nav>
        <?php }?>
        </ul>
      </nav>
      <?php if ($this->session->userdata('UserType') && $this->session->userdata('UserType') == 1) {?>
      <div class="right-filters">
      	<div class="search">
        	<!--<span><img src="<?=base_url('assets/images/icon-search.png')?>" alt="search"/></span>-->
            <div class="search-top-box">
              <div class="container-2">
                  <span class="icon"><img src="<?=base_url('assets/images/icon-search.png')?>" alt="search"/></span>
                  <form action="" method="get">
                  	<!--<input type="search" id="search" placeholder="Search..." />-->
                    <input type="hidden" name="mode" value="users">
                      <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                          <input class="Typeahead-hint" id="search" type="text" tabindex="-1" readonly>
                          <input class="Typeahead-input" id="demo-input" type="text" name="q" placeholder="Search all girls cams...">
                          <img class="Typeahead-spinner" src="<?php echo base_url('assets/plugins/typeahead/img/spinner.gif'); ?>">
                        </div>
                        <div class="Typeahead-menu"></div>
                      </div>
                  </form>
              </div>
            </div>
        </div>
        <div class="drop-list select-filter">
            <Select class="form-control">
                <option>recommended</option>
                <option>recommended</option>
                <option>recommended</option>
                <option>recommended</option>
            </select>
        </div>
        <div class="switch-view">
            <span class="list"><img src="<?=base_url('assets/images/icon-list.png')?>" alt="list"/></span>
            <span class="grid"><img src="<?=base_url('assets/images/icon-grid.png')?>" alt="grid"/></span>
        </div>
      </div>
        <?php }?>
    </section>
  </div>
</section>
<section class="msg-bg">
  <div class="msg-container">
    <div class="msg-hed">
      <h3>Messages</h3>
      <span id="msg-close">&times;</span> </div>
    <div class="msg-body">
      <div class="msg-body-nav"> <span>Recent Messages</span>
        <?php if ($this->session->userdata('UserType') && $this->session->userdata('UserType') == 1) {?>
        <ul id="srchMsg">
          <li> <a href="javascript:void(0)" class="btn"> <i class="fa fa-search m-srch" onclick="openSearch('Search Messages')" aria-hidden="true"></i> </a> </li>
          <li> <a href="javascript:void(0)" class="btn"> <i class="fa fa-plus m-new" onclick="openSearch('New Message')" aria-hidden="true"></i> </a> </li>
        </ul>
        <span class="srchBar">
        <input type="text" id="msgSearch" class="restrictSpecial" placeholder="">
        <ul class="suggList hide_content">
        </ul>
        </span>
        <?php }?>
      </div>
      <div class="msg-list"></div>
    </div>

    <!--<div class="msg-foo">
					<p> LEGAL DISCLAIMER:
						<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rutrum lorem nisl. Aliquam erat volutpat. Proin vulputate enim ac hendrerit sagittis. </span>
					</p>
				</div>-->

  </div>
</section>
<?php if ($this->session->userdata('UserType') && $this->session->userdata('UserType') == 2) {?>
<?php $this->load->view('partials/popups/video-upload')?>
<?php }?>
<?php $this->load->view('partials/popups/common-popup')?>
<?php if ($header == 'one') {
	?>
<main class="content-wrapper">
<aside>
  <div class="sidebar">
    <?php if ($this->session->userdata('UserType') && $this->session->userdata('UserType') == 1) {
		?>
      <ul class="sidebar-menu">
          <li class="performers"><a href="javascript:void(0);">PERFORMERS</a>
            <ul>
              <li><a class="_filter" data-key="performer" data-name="GIRLS" data-value="<?php echo strtolower(str_replace(' ', '_', 'GIRLS')); ?>" href="javascript:void(0);" >GIRLS</a></li>
              <li><a class="_filter" data-key="performer" data-name="BOYS" data-value="<?php echo strtolower(str_replace(' ', '_', 'BOYS')); ?>" href="javascript:void(0);" >BOYS</a></li>
              <li><a class="_filter" data-key="performer" data-name="COUPLES" data-value="<?php echo strtolower(str_replace(' ', '_', 'COUPLES')); ?>"  href="javascript:void(0);" >COUPLES</a></li>
              <li><a class="_filter" data-key="performer" data-name="TV/TS" data-value="<?php echo strtolower(str_replace(' ', '_', 'TV_TS')); ?>"  href="javascript:void(0);" >TV/TS</a></li>
          </ul>
      </li>
      <?php
if (!empty($categories)) {
			?>
      <li class="performers"><a href="javascript:void(0);">CATEGORIES</a>
        <ul>
          <?php
foreach ($categories as $cat) {
				?>
          <li> <a class="_filter" data-name="<?=$cat->name?>" data-key="category" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $cat->name . '')); ?>" href="javascript:void(0);" onclick="onClickFilterEventHandler('category', '<?php echo strtolower(str_replace(' ', '_', '' . $cat->name . '')); ?>');">#
            <?=$cat->name?>
            </a> </li>
          <?php
}
			?>
        </ul>
      </li>
      <?php
}
		if (!empty($show)) {
			?>
      <li class="types"><a href="javascript:void(0);">SHOW TYPES</a>
        <ul>
          <?php
foreach ($show as $shw) {
				?>
          <li> <a class="_filter" data-name="<?=$shw->name?>" data-key="show_type" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $shw->name . '')); ?>" href="javascript:void(0);">#
            <?=$shw->name?>
            </a> </li>
          <?php
}
			?>
        </ul>
      </li>
      <?php
}
		if (!empty($age)) {
			?>
      <li class="age"><a href="javascript:void(0);">AGE</a>
        <ul>
          <?php foreach ($age as $ag) {?>
          <li> <a class="_filter" data-name="<?=$ag->age?>" data-key="age" data-value="<?=$ag->age?>" href="javascript:void(0);">
            <?=$ag->age?>
            </a> </li>
          <?php }?>
        </ul>
      </li>
      <?php
}
		if (!empty($will)) {
			?>
      <li class="willingers"><a href="javascript:void(0);">WILLINGNESS</a>
        <ul>
          <?php
foreach ($will as $wll) {
				?>
          <li> <a class="_filter" data-name="<?=$wll->name?>"  data-key="willingness" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $wll->name . '')); ?>" href="javascript:void(0);">#
            <?=$wll->name?>
            </a> </li>
          <?php
}
			?>
        </ul>
      </li>
      <?php
}
		if (!empty($appearence)) {
			?>
      <li class="appearance"><a  href="javascript:void(0);">APPEARANCE</a>
        <ul>
          <?php
foreach ($appearence as $aprnc) {
				?>
          <li> <a class="_filter" data-name="<?=$aprnc->name?>" data-key="appearence" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $aprnc->name . '')); ?>" href="javascript:void(0);">#
            <?=$aprnc->name?>
            </a> </li>
          <?php
}
			?>
        </ul>
      </li>
      <?php
}
		?>
    </ul>
    <?php } else {
// for non performer
		?>
    <ul class="sidebar-menu">
          <li class="performers"><a href="javascript:void(0);">PERFORMERS</a>
            <ul>
              <li><a class="_filter" data-key="performer" data-name="GIRLS"  data-value="<?php echo strtolower(str_replace(' ', '_', 'GIRLS')); ?>" href="javascript:void(0);" >GIRLS</a></li>
              <li><a class="_filter" data-key="performer" data-name="BOYS" data-value="<?php echo strtolower(str_replace(' ', '_', 'BOYS')); ?>" href="javascript:void(0);" >BOYS</a></li>
              <li><a class="_filter" data-key="performer" data-name="COUPLES" data-value="<?php echo strtolower(str_replace(' ', '_', 'COUPLES')); ?>"  href="javascript:void(0);" >COUPLES</a></li>
              <li><a class="_filter" data-key="performer" data-name="TV/TS" data-value="<?php echo strtolower(str_replace(' ', '_', 'TV_TS')); ?>"  href="javascript:void(0);" >TV/TS</a></li>
          </ul>
      </li>
      <?php
if (!empty($categories)) {
			?>
      <li class="performers"><a href="javascript:void(0);">CATEGORIES</a>
        <ul>
          <?php
foreach ($categories as $cat) {
				?>
          <li> <a class="_filter" data-name="<?=$cat->name?>" data-key="category" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $cat->name . '')); ?>" href="javascript:void(0);" onclick="onClickFilterEventHandler('category', '<?php echo strtolower(str_replace(' ', '_', '' . $cat->name . '')); ?>');">#
            <?=$cat->name?>
            </a> </li>
          <?php
}
			?>
        </ul>
      </li>
      <?php
}
		if (!empty($show)) {
			?>
      <li class="types"><a href="javascript:void(0);">SHOW TYPES</a>
        <ul>
          <?php
foreach ($show as $shw) {
				?>
          <li> <a class="_filter" data-name="<?=$shw->name?>" data-key="show_type" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $shw->name . '')); ?>" href="javascript:void(0);">#
            <?=$shw->name?>
            </a> </li>
          <?php
}
			?>
        </ul>
      </li>
      <?php
}
		if (!empty($age)) {
			?>
      <li class="age"><a href="javascript:void(0);">AGE</a>
        <ul>
          <?php foreach ($age as $ag) {?>
          <li> <a class="_filter" data-name="<?=$ag->age?>" data-key="age" data-value="<?=$ag->age?>" href="javascript:void(0);">
            <?=$ag->age?>
            </a> </li>
          <?php }?>
        </ul>
      </li>
      <?php
}
		if (!empty($will)) {
			?>
      <li class="willingers"><a href="javascript:void(0);">WILLINGNESS</a>
        <ul>
          <?php
foreach ($will as $wll) {
				?>
          <li> <a class="_filter" data-name="<?=$wll->name?>" data-key="willingness" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $wll->name . '')); ?>" href="javascript:void(0);">#
            <?=$wll->name?>
            </a> </li>
          <?php
}
			?>
        </ul>
      </li>
      <?php
}
		if (!empty($appearence)) {
			?>
      <li class="appearance"><a  href="javascript:void(0);">APPEARANCE</a>
        <ul>
          <?php
foreach ($appearence as $aprnc) {
				?>
          <li> <a class="_filter" data-name="<?=$aprnc->name?>" data-key="appearence" data-value="<?php echo strtolower(str_replace(' ', '_', '' . $aprnc->name . '')); ?>" href="javascript:void(0);">#
            <?=$aprnc->name?>
            </a> </li>
          <?php
}
			?>
        </ul>
      </li>
      <?php
}
		?>
    </ul>
    <?php }?>
  </div>
</aside>
<?php }?>
