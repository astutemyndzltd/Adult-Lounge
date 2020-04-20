<?php 
if(!$this->session->userdata('UserType') || $this->session->userdata('UserType') == ''){ ?>
<section class="content-sec">
    <div class="_app">
        <div id="_render_filter_element"></div>
        <!--Search Filter-->
        <hr  class="divider-line"/>
        <!--Main Section-->
        <div id="_render_model_element"></div>
    </div>
</section>
<?php
}else{ 
    if($this->session->userdata('UserType')){
        if($this->session->userdata('UserType') == 1){          
?>
<section class="content-sec">
    <div class="_app">
        <div id="_render_filter_element"></div>
        <!--Search Filter-->
        <hr  class="divider-line"/>
        <!--Main Section-->
        <div id="_render_model_element"></div>
    </div>
</section>
<?php
        }elseif($this->session->userdata('UserType') == 2){
?>
<main class="content-wrapper">
    <section class="content-sec">
        <div class="dash_inner">
            <div class="dash_nav">
                <div class="col-2">
                    <h3>DASHBOARD</h3>
                </div>
                <div class="col-2">
                    <div class="dash_user_info">
                        <div class="dash_user_pic">
                            <?php if($user[0]['image'] != ''){ ?>
                            <img src="<?=base_url('assets/profile_image/'.$user[0]['image'])?>" alt="<?=($user[0]['display_name'] != '') ? $user[0]['display_name'] : $user[0]['name']?>">
                            <?php }else{ ?>
                            <img src="<?=base_url('assets/images/no-image.png')?>" alt="<?=($user[0]['display_name'] != '') ? $user[0]['display_name'] : $user[0]['name']?>">
                            <?php } ?>
                        </div>
                        <div class="dash_user_name">
                            <p><?=($user[0]['display_name'] != '') ? $user[0]['display_name'] : $user[0]['name']?></p>
                            <a href="<?=base_url('profile')?>">Edit Profile</a>
                        </div>
                        <div class="dash_user_rank">
                            <p>CURRENT RANKING</p>
                            <span><?=$vote['rank']?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dash_main">
                <div class="dash_action">
                    <p class="dash_action_hed">Actions</p>
                    <ul class="dash_tabs">
                        <li>
                            <a href="<?=base_url('my-shows')?>">
                                <span class="show_icon">
                                    <img src="<?=base_url('assets/images/show.png')?>" alt="Shows">
                                </span>
                                <span class="show_name">Shows</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="msg">
                                <span class="show_icon">
                                    <img src="<?=base_url('assets/images/chat.png')?>" alt="Chat">
                                </span>
                                <span class="show_name">Chat</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url('my-subscriptions')?>">
                                <span class="show_icon">
                                    <img src="<?=base_url('assets/images/subs.png')?>" alt="SUBSCRIPTIONS">
                                </span>
                                <span class="show_name">SUBSCRIPTIONS</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('financial') ?>">
                                <span class="show_icon">
                                    <img src="<?=base_url('assets/images/finance.png')?>" alt="FINANCIALS">
                                </span>
                                <span class="show_name">FINANCIALS</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('loyalty') ?>">
                                <span class="show_icon">
                                    <img src="<?=base_url('assets/images/loyalty.png')?>" alt="LOYALTY">
                                </span>
                                <span class="show_name">LOYALTY</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url('profile')?>">
                                <span class="show_icon">
                                    <img src="<?=base_url('assets/images/setting.png')?>" alt="Settings">
                                </span>
                                <span class="show_name">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="dash_box">
                        <div class="dash_box_hed">
                            <p>SHOW HISTORY</p>
                        </div>
                        <div class="dash_box_body customScroll" style="height: 225px; overflow-y: scroll;">
                            <ul>
                                <?php
                                if(!empty($showHistory)){
                                    for($j=0; $j<count($showHistory); $j++){
                                ?>
                                <li>
                                    <span class="user_icon">
                                        <?php if($showHistory[$j]['image'] != ''){ ?>
                                        <img src="<?=base_url('assets/profile_image/'.$showHistory[$j]['image'])?>" alt="<?=($showHistory[$j]['display_name'] != '') ? $showHistory[$j]['display_name'] : $showHistory[$j]['name']?>">
                                        <?php }else{ ?>
                                        <img src="<?=base_url('assets/images/demo-user.png')?>" alt="user">
                                        <?php } ?>
                                    </span>
                                    <span class="lft_txt"><?=($showHistory[$j]['display_name'] != '') ? $showHistory[$j]['display_name'] : $showHistory[$j]['name']?> <?=$showHistory[$j]['usernm']?></span>
                                    <span class="mdl_txt"><?=$showHistory[$j]['usernm']?></span>
                                    <span class="rht_txt"><?=$showHistory[$j]['show_type']?></span>
                                </li>
                                <?php
                                    }
                                }else{
                                ?>
                                <li>
                                    <span style="color: #a4b567; font-size: 35px;">No Show History Found !!!</span>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dash_finance">
                    <p class="dash_finance_hed">FINANCIAL OVERVIEW</p>
                    <div class="dash_box">
                        <div class="dash_box_hed">
                            <p>MAY MONTHLY TOTALS</p>
                        </div>
                        <div class="dash_box_body grid_2">
                            <ul>
                                <li>
                                    <span class="lft_txt">SHOWS: £3,000</span>
                                </li>
                                <li>
                                    <span class="lft_txt">GIFTS: £500</span>
                                </li>
                                <li>
                                    <span class="lft_txt">CHAT: £1,000</span>
                                </li>
                            </ul>
                            <div class="bg_txt">
                                <span>THIS MONTH</span>
                                <p>£4,500</p>
                            </div>
                        </div>
                    </div>
                    <div class="dash_box">
                        <div class="dash_box_hed">
                            <p>LOYALTY</p>
                        </div>
                        <div class="dash_box_body grid_2">
                            <div class="bg_txt reverse">
                                <span>MONTHLY POINTS EARNED</span>
                                <p>4,500</p>
                            </div>
                            <div class="bg_txt">
                                <span>TOTAL POINTS</span>
                                <p>4,500</p>
                            </div>
                        </div>
                    </div>
                    <div class="dash_box">
                        <div class="dash_box_hed">
                            <p>NEW SUBSCRIBERS</p>
                        </div>
                        <div class="dash_box_body customScroll" style="height: 225px; overflow-y: scroll;">
                            <ul>
                                <?php
                                if(!empty($newSubs)){
                                    for($i = 0; $i < count($newSubs); $i++){
                                        if(!empty($newSubs[$i])){
                                ?>
                                <li>
                                    <span class="user_icon">
                                        <?php if($newSubs[$i]['image'] != ''){ ?>
                                        <img src="<?=base_url('assets/profile_image/'.$newSubs[$i]['image'])?>" alt="<?php print ($newSubs[$i]['display_name'] != '') ? $newSubs[$i]['display_name'] : $newSubs[$i]['name']; ?>">
                                        <?php } else{ ?>
                                        <img src="<?=base_url('assets/images/no-image.png')?>" alt="<?php print ($newSubs[$i]['display_name'] != '') ? $newSubs[$i]['display_name'] : $newSubs[$i]['name']; ?>">
                                        <?php } ?>
                                    </span>
                                    <span class="lft_txt"><?php print ($newSubs[$i]['display_name'] != '') ? $newSubs[$i]['display_name'] : $newSubs[$i]['name']; ?> <?=$newSubs[$i]['usernm']?></span>
                                </li>
                                <?php } } }else{ ?>
                                <li>
                                    <span style="color: #a4b567; font-size: 35px;">No Subscribers Found !!!</span>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
        }
    }
}
?>
<script type="module" defer src="<?=base_url('assets/js/components/filter/FilterComponent.js')?>"></script>