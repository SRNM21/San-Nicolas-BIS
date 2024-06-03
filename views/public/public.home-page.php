<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Home | Barangay San Nicolas</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('home'); ?>>
</head>

<body>
    <?php require getPartial('header') ?>

    <main>
        
        <!-- LANDING -->
        <section id='home' class='f-center f-col landing-section'>
            <div class='f-center f-col section-content landing-section-content'>
                <div class='f-col f-center landing-txt'>
                    <h1 class='landing-title'>BARANGAY SAN NICOLAS</h1>
                    <p class='landing-text'>Barangay San Nicolas beckons with friendly faces and helping hands. Feel welcome to this active community where neighbors become friends. </p>
                </div>
                <a href='join-community' draggable='false' class='f-center f-row join-com-btn scale-anim' title='Join our community'><?= getSVG('join'); ?>Join our community</a>
            </div>
        </section>
        
        <!-- ABOUT -->
        <section id='about' class='f-center f-col about-section'>
            <div class='f-row section-content about-section-content'>
                <div class='f-col about-txt'>
                    <div class='f-col about-title-wrapper'>
                        <p>About us</p>
                        <h1><?= $about_main ?></h1>
                    </div>
                    <div class='f-col about-info-wrapper'>
                        <h3><?= $about_title_1 ?></h3>
                        <p><?= $about_details_1 ?></p>
                    </div>
                    <div class='f-col about-info-wrapper'>
                        <h3><?= $about_title_2 ?></h3>
                        <p><?= $about_details_2 ?></p>
                    </div>
                </div>
                <div class='flex about-image-wrapper'>
                    <img src='<?= getImage('home_1.jpg') ?>' alt=''>
                </div>
            </div>
        </section>

        <!-- BARANGAY OFFICIALS -->
        <section id='officials' class='f-center officials-section'>
            <div class='f-col section-content officials-section-content'>
                <div class='officials-txt'>
                    <h3>BARANGAY OFFICIALS</h3>
                    <p><?= $brgy_off_into ?></p>
                </div>
                <div class='f-center f-col officials-profile'>
                    <div class='f-row brgy-cap-content'>
                        <div class='f-col brgy-cap-desc'>
                            <div>
                                <h1><?= $fullname ?></h1>
                                <p><?= $brgy_cap_position ?></p>
                            </div>

                            <p><?= $brgy_cap_desc ?></p>
                        </div>
                        <div class='brgy-cap-wrapper'>
                            <img src='../assets/uploads/<?= $brgy_cap_img ?>' alt='Barangay Captain Image'>
                        </div>
                    </div>
                </div>
                <h1 class='sb-title'>Sangguniang Barangay</h1>
                <div class='f-center f-row barangays-wrapper'>
                    <?php  
                        foreach ($officials as $official) 
                        { 
                            $lastname       = $official['last_name'];
                            $firstname      = $official['first_name'];
                    
                            $fullname = "$firstname $lastname";

                            if ($official['position'] != 'Barangay Captain')
                            {  
                    ?>
                            <div class='f-center brgy-card-wrapper'>
                                <div class='f-center f-col hover-bg'>
                                    <h3><?= $fullname ?></h3>
                                    <p><?= $official['position'] ?></p>
                                </div>
                                <img src='../assets/uploads/<?= $official['profile'] ?>' alt="">
                            </div>

                    <?php 
                            }
                        } 
                    ?>
                </div>
            </div>
        </section>

        <!-- MISSION AND VISION -->
        <section id='mission-vision' class='f-center f-col mivis-section'>
            <div class='f-row section-content mivis-section-content'>
                <div class='f-row mivis-row'>
                    <div class='f-col mivis-eng'>
                        <h3 class='mivis-lang'>English</h3>
                        <div>
                            <h3>MISSION</h3>
                            <p><?= $mission_en ?></p>
                        </div>
                        <div>
                            <h3>VISION</h3>
                            <p><?= $vision_en ?></p>
                        </div>
                    </div>
                    <div class='f-col mivis-eng'>
                        <h3 class='mivis-lang'>Tagalog</h3>
                        <div>
                            <h3>MISYON</h3>
                            <p><?= $mission_ta ?></p>
                        </div>
                        <div>
                            <h3>BISYON</h3>
                            <p><?= $vision_ta ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class='f-center main-footer'>
            <div class='footer-content-wrapper'>
                <div class='f-row content'>
                    <div class='f-col content-section contact-section'>
                        <div class='f-col txt-wrapper'>
                            <h4>Contact us</h4>
                            <p>For inquiries, feedback, concerns, or suggestions, feel free to reach out to us via the following:</p>
                        </div>
                        <div class='f-col contact-link-wrapper'>
                            <span class='f-row'>
                                <?= getSVG('facebook'); ?>
                                <a href='https://www.facebook.com/groups/394605741237735/' target='_blank' title='Barangay San Nicolas Facebook Group'>Brgy. San Nicolas Pasig (Official)</a>
                            </span>
                            <span class='f-row'>
                                <?= getSVG('mail'); ?>
                                <a href='mailto:brgysannicolas.pasig@gmail.com' target='_blank' title='Barangay San Nicolas Email'>Brgy. San Nicolas Email</a>
                            </span>    
                            <span class='f-row'>
                                <?= getSVG('phone'); ?>
                                <a href='tel:8 643000' title='Barangay San Nicolas Phone number'>8 643000</a>
                            </span>
                        </div>  
                    </div>
                    <div class='f-col content-section'>
                        <div class='f-col txt-wrapper'>
                            <h4>Address</h4>
                            <p>H37H+67G, M.H. del Pilar St, Pasig, 1600 Metro Manila</p>
                        </div>
                        <div class='f-col txt-wrapper'>
                            <h3>Location</h3>
                            <div class='map-wrapper'>
                                <div class='map'>
                                    <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4495.231016206686!2d121.07847422573091!3d14.56057053592111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c7d67276b1ad%3A0xd350006aa40d5928!2sSan%20Nicolas%2C%20Pasig%2C%20Metro%20Manila!5e1!3m2!1sen!2sph!4v1715532323134!5m2!1sen!2sph' width='250' height='250' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='f-col content-section feedback-section'>
                        <div class='f-col txt-wrapper'>
                            <h4>We value your suggestions</h4>
                            <div class='feedback-form-wrapper'>
                                <form class='f-col fb-form' action='' method='post'>
                                    <input class='fb-input name' type='text' name='name' id='name' placeholder='Name' required>
                                    <textarea class='fb-input feedback' name='feedback' id='feedback' placeholder='Feedback' required></textarea>
                                    <div class='f-row send-as-div'>
                                        <input type='checkbox' name='anonymous' id='anonymous'>
                                        <label for=''>Send as anonymous</label>
                                    </div>
                                    <button type='submit' class='fb-submit-btn'>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='copyright'><p>&copy 2024 Pamantasan ng Lungsod ng Pasig, BSIT 2A - Group 3. All rights reserved.</p></div>
            </div>
        </footer>
    </main>

    <!-- FLOATING ACCESSIBILITY -->
    <div class='scroll-on-top-wrapper' title='Scroll on top'>
        <div class='scale-anim f-center scroll-on-top'>
            <?= getSVG('scroll_up'); ?>
        </div>
    </div>

    <script type='module' src=<?=  getScript('home-page'); ?>></script>
</body>
</html>