<?php //echo "<pre>"; print_r($user);exit;?>
<style>
.video-container {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
	grid-auto-rows: 80px;
	gap: 1em;
}
.video-box {
	border: 1px solid #b8a368;
	position: relative;
	display: flex;
	align-items: center;
	justify-content: center;
}
.video-box video {
	max-width: 100%;
	object-fit: cover;
	max-height: 100%;
}
#video-upload-form {
    color: #d8c17e;
}
.video-play-btn {
	position: absolute;
}
.video-play-btn:hover {
    cursor: pointer;
    color: #b8a368;
}
.video-play-btn .fa-pause {
    display: none
}
.video-box.is-playing:hover .fa-pause {
    display: block;
}
.video-box:not(.is-playing) .fa-play {
    display: block;
}
.video-box.is-playing .fa-play {
    display: none;
}
.default-show-wrap {
	position: absolute;
	bottom: -2em;
}
</style>

<link rel="stylesheet" href="<?= base_url('assets/node_modules/lightgallery.js/dist/css/lightgallery.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/switcher.css') ?>">

<main class="content-wrapper">
    <section class="content-sec">
        <div class="box-content-layout">
            <div class="title-sec">
                <h1>GENERAL INFORMATION</h1>
            </div>
            <div class="box-content-widget per">
                <div class="leftsc ">
                    <!--<p> The registered account owner can be an individual or a company, and must also <br>
                        be the payee, and taxable entity (if applicable).</p>-->
                    <p>SUBMIT BASIC DETAILS FOR APPROVAL</p>
                    <?php if(!$this->session->userdata('UserType') && $this->session->userdata('UserType') == 2){ ?>
                    <p>UPLOAD PICTURE FOR PROFILE VERIFICATION</p>
                    <?php } ?>
                </div>
                <div class="rightsec">
                    <!--<a href="javascript:void(0)" class="assist perin">NEED ASSISTANCE</a>-->
                </div>
                <div class="clear"></div>
                <form id="editprofile-form" method="post" autocomplete="off" class="form-catagories">
                    <div class="box-content-widget pl-0">
                        <div class="form-two-col per2 leftsc ">
                            <div class="show show2">
                                <h3>PROFILE PHOTO</h3>
                                <div class="form-group">
                                    <div class="proo">
                                        <?php if($user[0]['image'] == ''){ ?>
                                        <img src="<?=base_url('assets/images/noimage.png')?>" alt="" style="height:49px; width:45px;" id="display_img">
                                        <?php }else{ ?>
                                        <img src="<?=base_url('assets/profile_image/'.$user[0]['image'])?>" alt="" style="height:49px; width:45px;" id="display_img">
                                        <?php } ?>
                                    </div>
                                    <input type="file" value="UPLOAD THUMBNAIL" class="form-control username formsm" name="editpro_image" id="editpro_image" />
                                    <div class="brows editpro_image_brows">BROWSER</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="form-widget perso ">
                        <input type="hidden" value="<?=$user[0]['id']?>" name="editpro_id">
                        <input type="hidden" value="<?=$user[0]['image']?>" name="old_editpro_image">
                        <div class="form-two-col">
                            <div class="form-group">
                                <input type="text" placeholder="NAME" class="man form-control username requiredCheck" data-check="Name" name="name_edit" id="name_edit" value="<?=$user[0]['name']?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="DISPLAY NAME AS" class="man form-control username" name="display_name_edit" value="<?=$user[0]['display_name']?>" />
                            </div>
                            <?php
                            if($user[0]['usernm'] != '') {
                                $unm = explode('@', $user[0]['usernm'])[1];
                            }else{
                                $unm = '';
                            }
                            ?>
                            <div class="form-group">
                                <input type="text" placeholder="USERNAME" class="usrnm form-control username requiredCheck" data-check="Username" name="usernm_edit" value="<?=$unm?>" />
                            </div>
                            <div class="form-group">
                                <select class="custom-select requiredCheck" name="editpro_sexual_pref" id="editpro_sexual_pref" data-check="Sexual Preference">
                                    <option value="">SEXUAL PREFERENCE</option>
                                    <option value="Male" <?php if(isset($user)){ if($user[0]['sexual_pref'] == 'Male'){ print 'selected'; }}?>>Male</option>
                                    <option value="Female" <?php if(isset($user)){ if($user[0]['sexual_pref'] == 'Female'){ print 'selected'; }}?>>Female</option>
                                    <option value="Both" <?php if(isset($user)){ if($user[0]['sexual_pref'] == 'Both'){ print 'selected'; }}?>>Both</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_height">
                                    <option value="">HEIGHT</option>
                                    <?php for($i=140; $i<241; $i++){ ?>
                                    <option value="<?=$i?>" <?php if(isset($user)){ if($user[0]['height'] == $i){ print 'selected'; }}?>><?=$i?> cm</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_weight">
                                    <option value="">WEIGHT</option>
                                    <?php for($i=85; $i<301; $i++){ ?>
                                    <option value="<?=$i?>" <?php if(isset($user)){ if($user[0]['weight'] == $i){ print 'selected'; }}?>><?=$i?> lbs</option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="custom-select" name="editpro_hair">
                                    <option value="">HAIR COLOUR</option>
                                    <option value="Black" <?php if(isset($user)){ if($user[0]['hair'] == 'Black'){ print 'selected'; }}?>>Black</option>
                                    <option value="Blonde" <?php if(isset($user)){ if($user[0]['hair'] == 'Blonde'){ print 'selected'; }}?>>Blonde</option>
                                    <option value="Grey" <?php if(isset($user)){ if($user[0]['hair'] == 'Grey'){ print 'selected'; }}?>>Grey</option>
                                    <option value="Red" <?php if(isset($user)){ if($user[0]['hair'] == 'Red'){ print 'selected'; }}?>>Red</option>
                                    <option value="Green" <?php if(isset($user)){ if($user[0]['hair'] == 'Green'){ print 'selected'; }}?>>Green</option>
                                    <option value="Blue" <?php if(isset($user)){ if($user[0]['hair'] == 'Blue'){ print 'selected'; }}?>>Blue</option>
                                    <option value="Yellow" <?php if(isset($user)){ if($user[0]['hair'] == 'Yellow'){ print 'selected'; }}?>>Yellow</option>
                                    <option value="White" <?php if(isset($user)){ if($user[0]['hair'] == 'White'){ print 'selected'; }}?>>White</option>
                                    <option value="Burgundy" <?php if(isset($user)){ if($user[0]['hair'] == 'Burgundy'){ print 'selected'; }}?>>Burgundy</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_eye">
                                    <option value="">EYE COLOUR</option>
                                    <option value="Black" <?php if(isset($user)){ if($user[0]['eye'] == 'Black'){ print 'selected'; }}?>>Black</option>
                                    <option value="Brown" <?php if(isset($user)){ if($user[0]['eye'] == 'Brown'){ print 'selected'; }}?>>Brown</option>
                                    <option value="Green" <?php if(isset($user)){ if($user[0]['eye'] == 'Green'){ print 'selected'; }}?>>Green</option>
                                    <option value="Blue" <?php if(isset($user)){ if($user[0]['eye'] == 'Blue'){ print 'selected'; }}?>>Blue</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_zodiac">
                                    <option value="">ZODIAC SIGN</option>
                                    <option value="Aries" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Aries'){ print 'selected'; }}?>>Aries</option>
                                    <option value="Taurus" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Taurus'){ print 'selected'; }}?>>Taurus</option>
                                    <option value="Gemini" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Gemini'){ print 'selected'; }}?>>Gemini</option>
                                    <option value="Cancer" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Cancer'){ print 'selected'; }}?>>Cancer</option>
                                    <option value="Leo" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Leo'){ print 'selected'; }}?>>Leo</option>
                                    <option value="Virgo" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Virgo'){ print 'selected'; }}?>>Virgo</option>
                                    <option value="Libra" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Libra'){ print 'selected'; }}?>>Libra</option>
                                    <option value="Scorpio" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Scorpio'){ print 'selected'; }}?>>Scorpio</option>
                                    <option value="Sagittarius" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Sagittarius'){ print 'selected'; }}?>>Sagittarius</option>
                                    <option value="Capricon" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Capricon'){ print 'selected'; }}?>>Capricon</option>
                                    <option value="Aquarius" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Aquarius'){ print 'selected'; }}?>>Aquarius</option>
                                    <option value="Pisces" <?php if(isset($user)){ if($user[0]['zodiac'] == 'Pisces'){ print 'selected'; }}?>>Pisces</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_build">
                                    <option value="">BUILD</option>
                                    <option value="Slim" <?php if(isset($user)){ if($user[0]['build'] == 'Slim'){ print 'selected'; }}?>>Slim</option>
                                    <option value="Athletic" <?php if(isset($user)){ if($user[0]['build'] == 'Athletic'){ print 'selected'; }}?>>Athletic</option>
                                    <option value="Moderate" <?php if(isset($user)){ if($user[0]['build'] == 'Moderate'){ print 'selected'; }}?>>Moderate</option>
                                    <option value="Bold" <?php if(isset($user)){ if($user[0]['build'] == 'Bold'){ print 'selected'; }}?>>Bold</option>
                                    <option value="Bolder" <?php if(isset($user)){ if($user[0]['build'] == 'Bolder'){ print 'selected'; }}?>>Bolder</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_chest">
                                    <option value="">CHEST SIZE</option>
                                    <?php for($i=26; $i<51; $i++){ ?>
                                    <option value="<?=$i?>" <?php if(isset($user)){ if($user[0]['chest'] == $i){ print 'selected'; }}?>><?=$i?> inch</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_burst">
                                    <option value="">BURST SIZE</option>
                                    <?php for($i=26; $i<51; $i++){ ?>
                                    <option value="<?=$i?>" <?php if(isset($user)){ if($user[0]['burst'] == $i){ print 'selected'; }}?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_cup">
                                    <option value="">CUP</option>
                                    <option value="A" <?php if($user[0]['cup'] == 'A'){ print 'selected'; }?>>A</option>
                                    <option value="B" <?php if($user[0]['cup'] == 'B'){ print 'selected'; }?>>B</option>
                                    <option value="C" <?php if($user[0]['cup'] == 'C'){ print 'selected'; }?>>C</option>
                                    <option value="D" <?php if($user[0]['cup'] == 'D'){ print 'selected'; }?>>D</option>
                                    <option value="E" <?php if($user[0]['cup'] == 'E'){ print 'selected'; }?>>E</option>
                                    <option value="F" <?php if($user[0]['cup'] == 'F'){ print 'selected'; }?>>F</option>
                                    <option value="G" <?php if($user[0]['cup'] == 'G'){ print 'selected'; }?>>G</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select requiredCheck" name="editpro_age" id="editpro_age" data-check="Display Age As">
                                    <option value="">DISPLAY AGE AS</option>
                                    <?php for($i=10; $i<91; $i++){ ?>
                                    <option value="<?=$i?>" <?php if(isset($user)){ if($user[0]['age'] == $i){ print 'selected'; }}?>><?=$i?> years</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select requiredCheck" name="performer_type" id="performer_type" data-check="Display Currency As">
                                    <option selected value="">Perform Type</option>
                                    <option value="girls" <?php if(isset($user)){ if($user[0]['performer_type'] == 'girls'){ print 'selected'; }}?>>GIRLS</option>
                                    <option value="boys" <?php if(isset($user)){ if($user[0]['performer_type'] == 'boys'){ print 'selected'; }}?>>BOYS</option>
                                    <option value="couples" <?php if(isset($user)){ if($user[0]['performer_type'] == 'couples'){ print 'selected'; }}?>>COUPLES</option>
                                    <option value="tv_ts" <?php if(isset($user)){ if($user[0]['performer_type'] == 'tv_ts'){ print 'selected'; }}?>>TV/TS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select requiredCheck" name="currency" id="currency" data-check="Display Currency As">
                                    <option value="">Currency</option>
                                    <option selected value="USD">USD</option>
                                    <option value="EUR" <?php if(isset($user)){ if($user[0]['currency'] == 'EUR'){ print 'selected'; }}?>>EUR</option>
                                    <option value="GBP" <?php if(isset($user)){ if($user[0]['currency'] == 'GBP'){ print 'selected'; }}?>>GBP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select requiredCheck" name="perform_type" id="perform_type" data-check="Display perform type">
                                    <option value="" selected>Perform Type</option>
                                    <option value="private" <?php if(isset($user)){ if($user[0]['price_in_private']){ print 'selected'; }}?>>In Private</option>
                                    <option value="group" <?php if(isset($user)){ if($user[0]['price_in_group']){ print 'selected'; }}?>>In Group</option>
                                </select>
                            </div>
                            <div id="privatePriceEl" class="form-group" style="display: none;">
                                <label class="check">Private price</label>
                                <input value="<?php echo ($user['0']['price_in_private']) ? $user['0']['price_in_private'] : 0.00 ?>" type="text" class="form-control" id="price_in_private" name="price_in_private" placeholder="0.00">
                            </div>
                           
                            <div id="groupPriceEl" class="form-group" style="display: none;">
                                <label class="check">Group price</label>
                                <input value="<?php echo ($user['0']['price_in_group']) ? $user['0']['price_in_group'] : 0.00 ?>" type="text" class="form-control" id="price_in_group" name="price_in_group" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-two-col">
                            <div class="form-group">
                                <select class="custom-select" name="editpro_penis">
                                    <option value="">PENIS SIZE</option>
                                    <?php for($i=7; $i<21; $i++){ $j = $i*0.5;  ?>
                                    <option value="<?=$j?>" <?php if(isset($user)){ if($user[0]['penis'] == $j){ print 'selected'; }}?>><?=$j?> inch</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="editpro_pubic_hair">
                                    <option value="">PUBIC HAIR</option>
                                    <option value="Black" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'Black'){ print 'selected'; }}?>>Black</option>
                                    <option value="Blonde" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'Blonde'){ print 'selected'; }}?>>Blonde</option>
                                    <option value="Grey" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'Grey'){ print 'selected'; }}?>>Grey</option>
                                    <option value="Red" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'Red'){ print 'selected'; }}?>>Red</option>
                                    <option value="Green" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'Green'){ print 'selected'; }}?>>Green</option>
                                    <option value="Blue" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'Blue'){ print 'selected'; }}?>>Blue</option>
                                    <option value="Yellow" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'Yellow'){ print 'selected'; }}?>>Yellow</option>
                                    <option value="White" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'White'){ print 'selected'; }}?>>White</option>
                                    <option value="Burgundy" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'Burgundy'){ print 'selected'; }}?>>Burgundy</option>
                                    <option value="None" <?php if(isset($user)){ if($user[0]['pubic_hair'] == 'None'){ print 'selected'; }}?>>None</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>

                    <?php
                    if($user[0]['images'] != ''){
                        $img = explode(',', $user[0]['images']);
                    }else{
                        $img = array();
                    }
                    ?>
                    <?php if(
                        $this->session->userdata('UserType') && 
                        $this->session->userdata('UserType') == 2
                    ){ ?>
                    <div class="box-content-widget pl-0">
                        <div class="form-two-col per2 leftsc ">
                            <div id="image-lightgallery" class="show show2">
                                <h3>GALLERY</h3>
                                <?php
                                if(!empty($img)){
                                    for($i=0;$i<count($img);$i++){
                                ?>
                                <div class="form-group">
                                    <div class="proo">
                                        <a class="gal-item" href="<?= base_url('assets/performer_gallery/'.$img[$i])?>">
                                            <img src="<?= base_url('assets/performer_gallery/'.$img[$i])?>" alt="" style="height:49px; width:45px;">
                                        </a>
                                    </div>
                                </div>
                                <?php } } ?>
                                <br />
                                <br />
                                <input type="hidden" id="gallery_cnt" value="1">
                                <div class="row add-new-browse">
                                    <div class="form-group gallery-brouser-area">
                                        <div class="proo">
                                            <img src="<?=base_url('assets/images/noimage.png')?>" alt="" style="height:40px; width:45px;" id="display_gal_img1">
                                        </div>
                                        <input type="file" class="form-control username formsm display_gal_img1 brouse-input" onchange="disp_img('1', this)" data-count="1" name="gallery[]" id="gallery_image1" />
                                        <div class="brows editpro_gal_image_brows" data-count="1">BROWSER</div>
                                        <select name="video_type" id="video_type" class="form-control username formsm display_gal_img1">
                                            <option value="1">Free Content</option>
                                            <option value="2">Premium Content</option>
                                        </select>
                                    </div>
                                    <div class="form-group add-more-gal">
                                        <a href="javascript:void(0);" class="add-more-gal-img">Add More</a>
                                    </div>  
                                </div>
                                <div class="galdiv">


                                </div>
                                
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <?php
                    if( $user[0]['videos'] != '' ){
                        $performer_videos = explode(',', $user[0]['videos']);
                    } else{
                        $performer_videos = array();
                    }
                    ?>
                    <div class="box-content-widget pl-0">
                        <div class="form-two-col per2 leftsc ">
                            <div class="show show2">
                                <h3>VIDEO GALLERY <button type="button" id="add-video-btn" class="px-2 py-1 border-0 ml-2">Add New</button></h3>
                                <div class="video-container mt-2">  
                                    <?php if (count($performer_videos)) : ?>
                                        <?php foreach( $performer_videos as $video ) : ?>
                                            <div class="video-box">
                                                <video height="160" preload="metadata" loop>
                                                    <source src="<?= base_url('assets/profile_videos/' . $video) ?>">
                                                </video>  
                                                <a class="video-play-btn">
                                                    <i class="fa fa-play"></i>
                                                    <i class="fa fa-pause"></i>
                                                </a>
                                                <div class="default-show-wrap d-none">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="default_video_id" value="1">
                                                    </div>
                                                </div>
                                            </div>                                   
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <?php } ?>
                    <div class="box-content-widget pl-0 checkbox-area">
                        <h4>LANGUAGES</h4>

                        <div class="form-two-col per2 leftsc float-left-none">
                            <div class="show">
                                <?php if(!empty($categories)){ ?>
                                <h3>CATEGORIES</h3>
                                <div class="inline-items display-inline">
                                    <?php
                                    for($p=0;$p<count($categories); $p++){
                                    $o = $p%2;
                                    ?>
                                    <?php if($o == 0){ ?><div class="flex-coloum display-inline-block"><?php } ?>
                                        <div class="form-check">
                                            <label class="check"><?=strtoupper($categories[$p]->name)?>
                                                <input type="checkbox" name="editpro_category[]" value="<?=$categories[$p]->id?>" <?php if(count(explode($categories[$p]->id, $user[0]['category']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <?php if($o == 1){ ?></div><?php } ?>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <?php if(!empty($show)){ ?>
                                <h3>SHOW TYPES</h3>
                                <div class="inline-items display-inline">
                                    <?php
                                    for($p=0;$p<count($show); $p++){
                                    $o = $p%2;
                                    ?>
                                    <?php if($o == 0){ ?><div class="flex-coloum display-inline-block"><?php } ?>
                                        <div class="form-check">
                                            <label class="check"><?=strtoupper($show[$p]->name)?>
                                                <input type="checkbox" name="editpro_attr[]" value="<?=$show[$p]->id?>" <?php if(count(explode($show[$p]->id, $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <?php if($o == 1){ ?></div><?php } ?>
                                    <?php } ?>
                                    <!--<div class="flex-coloum">
                                        <div class="form-check">
                                            <label class="check">RUBBER
                                                <input type="checkbox" name="editpro_attr[]" value="RUBBER" <?php if(count(explode("RUBBER", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">ANAL
                                                <input type="checkbox" name="editpro_attr[]" value="ANAL" <?php if(count(explode("ANAL", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">FACIAL
                                                <input type="checkbox" name="editpro_attr[]" value="FACIAL" <?php if(count(explode("FACIAL", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">FEET
                                                <input type="checkbox" name="editpro_attr[]" value="FEET" <?php if(count(explode("FEET", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex-coloum">
                                        <div class="form-check">
                                            <label class="check">SMOKING
                                                <input type="checkbox" name="editpro_attr[]" value="SMOKING" <?php if(count(explode("SMOKING", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">GAGGING
                                                <input type="checkbox" name="editpro_attr[]" value="GAGGING" <?php if(count(explode("GAGGING", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">UNDERWARE
                                                <input type="checkbox" name="editpro_attr[]" value="UNDERWARE" <?php if(count(explode("UNDERWARE", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">WATER SPORTS
                                                <input type="checkbox" name="editpro_attr[]" value="WATER SPORTS" <?php if(count(explode("WATER SPORTS", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex-coloum">
                                        <div class="form-check">
                                            <label class="check">LOVING
                                                <input type="checkbox" name="editpro_attr[]" value="LOVING" <?php if(count(explode("LOVING", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">SPANKING
                                                <input type="checkbox" name="editpro_attr[]" value="SPANKING" <?php if(count(explode("SPANKING", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">ROLE PLAY
                                                <input type="checkbox" name="editpro_attr[]" value="ROLE PLAY" <?php if(count(explode("ROLE PLAY", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">DIRTY TALK
                                                <input type="checkbox" name="editpro_attr[]" value="DIRTY TALK" <?php if(count(explode("DIRTY TALK", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex-coloum">
                                        <div class="form-check">
                                            <label class="check">DOM
                                                <input type="checkbox" name="editpro_attr[]" value="DOM" <?php if(count(explode("DOM", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">CUCK
                                                <input type="checkbox" name="editpro_attr[]" value="CUCK" <?php if(count(explode("CUCK", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">INTERACTIVE
                                                <input type="checkbox" name="editpro_attr[]" value="INTERACTIVE" <?php if(count(explode("INTERACTIVE", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="check">DEEPTHROAT
                                                <input type="checkbox" name="editpro_attr[]" value="DEEPTHROAT" <?php if(count(explode("DEEPTHROAT", $user[0]['attribute']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>-->
                                </div>
                                <?php } ?>
                                <?php if(!empty($will)){ ?>
                                <h3>WILLINGNESS</h3>
                                <div class="inline-items display-inline">
                                    <?php
                                    for($p=0;$p<count($will); $p++){
                                    $o = $p%2;
                                    ?>
                                    <?php if($o == 0){ ?><div class="flex-coloum display-inline-block"><?php } ?>
                                        <div class="form-check">
                                            <label class="check"><?=strtoupper($will[$p]->name)?>
                                                <input type="checkbox" name="editpro_will[]" value="<?=$will[$p]->id?>" <?php if(count(explode($will[$p]->id, $user[0]['willingness']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <?php if($o == 1){ ?></div><?php } ?>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <?php if(!empty($appearence)){ ?>
                                <h3>APPEARENCE</h3>
                                <div class="inline-items display-inline">
                                    <?php
                                    for($p=0;$p<count($appearence); $p++){
                                    $o = $p%2;
                                    ?>
                                    <?php if($o == 0){ ?><div class="flex-coloum display-inline-block"><?php } ?>
                                        <div class="form-check">
                                            <label class="check"><?=strtoupper($appearence[$p]->name)?>
                                                <input type="checkbox" name="editpro_aprnc[]" value="<?=$appearence[$p]->id?>" <?php if(count(explode($appearence[$p]->id, $user[0]['appearance']))>1){ print 'checked'; }?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <?php if($o == 1){ ?></div><?php } ?>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <!-- <h3>FEATURE</h3>
                                <div class="inline-items">
                                    <div class="form-check">
                                        <label class="check">TATTOOS
                                            <input type="checkbox" name="editpro_ftr[]" value="TATTOOS" <?php if(count(explode("TATTOOS", $user[0]['feature']))>1){ print 'checked'; }?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="check">BBW
                                            <input type="checkbox" name="editpro_ftr[]" value="BBW" <?php if(count(explode("BBW", $user[0]['feature']))>1){ print 'checked'; }?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="check">PIERCINGS
                                            <input type="checkbox" name="editpro_ftr[]" value="PIERCINGS" <?php if(count(explode("PIERCINGS", $user[0]['feature']))>1){ print 'checked'; }?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="check">ALTERNATIVE
                                            <input type="checkbox" name="editpro_ftr[]" value="ALTERNATIVE" <?php if(count(explode("ALTERNATIVE", $user[0]['feature']))>1){ print 'checked'; }?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div> -->
                                <h3>DESCRIPTION INFORMATION </h3>
                                <p>PLEASE WRITE A DESCRIPTION TO GRAB ATTENTION OF THE USER</p>
                                
                                <div class="show float-none">                                    
                                    <textarea class="ingin" name="editpro_description"><?=$user[0]['description']?></textarea>
                                </div>
                                <div class="form-two-col">
                                    <div class="form-group form-action mt-0">
                                        <input type="submit" value="Update" id="editpro_submit_btn">
                                    </div>
                                </div> 
                                <h3>SUBSCRIBE RATE </h3>
                                <!-- <p>PLEASE WRITE A DESCRIPTION TO GRAB ATTENTION OF THE USER</p> -->
                                <div class="form-widget __subscribeWiget">
                                    <div class="form-three-col">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">1</option>
                                                <option value="3">3</option>
                                                <option value="Both">Both</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="0.00" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="year">Year</option>
                                                <option value="month">Month</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                        </div>
                        <div class="clear"></div>
                        <!-- <div class="form-two-col">
                            <div class="form-group form-action">
                                <input type="submit" value="Update" id="editpro_submit_btn">
                            </div>
                        </div> -->
                        <div class="clear"></div>
                    </div>
                    <span class="editpro-message" style="color:red;font-style: italic;"></span>
                </form>
            </div>
        </div>
    </section>
</main>

<script src="<?= base_url('assets/node_modules/lightgallery.js/dist/js/lightgallery.min.js') ?>"></script>
<script src="<?= base_url('assets/node_modules/lightgallery.js/dist/js/lg-thumbnail.min.js') ?>"></script>
<script src="<?= base_url('assets/node_modules/lightgallery.js/dist/js/lg-autoplay.min.js') ?>"></script>
<script src="<?= base_url('assets/node_modules/lightgallery.js/dist/js/lg-fullscreen.min.js') ?>"></script>
<script src="<?= base_url('assets/node_modules/lightgallery.js/dist/js/lg-zoom.min.js') ?>"></script>
<script>
    lightGallery(document.getElementById('image-lightgallery'), {
        selector          : '.gal-item',
        thumbnail         : true,
        download          : false,
        animateThumb      : false,
        showThumbByDefault: false,
    });
</script>
<script type="module" defer src="<?=base_url('assets/js/components/profile/ProfileComponent.js')?>"></script>