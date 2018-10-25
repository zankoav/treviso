<?php

$lang = get_current_lang();
$options = get_option('treviso_theme_options');

global $menu_about;
global $menu_portfolio;
global $menu_team;
global $menu_contacts;
global $title_ourWorks;
global $title_about;
global $title_ourTeam;
global $title_contactUs;
global $ph_name;
global $ph_email;
global $ph_message;
global $b_close;
global $b_sendMessage;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Treviso - Clean & Elegant Onepage Multipurpose Bootstrap HTML</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= THEM_URI; ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="<?= THEM_URI; ?>css/style.css" rel="stylesheet">
    <?php wp_head();?>
</head>
<body id="page-top">
<!-- Navigation -->
<nav class="top-menu">
    <div class="container">
        <div class="top-menu__inner">
            <div class="top-menu__socials">
                <a href="#" class="top-menu__socials-link"><i class="fa fa-lg fa-vk" aria-hidden="true"></i></a>
                <a href="#" class="top-menu__socials-link"><i class="fa fa-lg fa-facebook" aria-hidden="true"></i></a>
                <a href="#" class="top-menu__socials-link"><i class="fa fa-lg fa-twitter" aria-hidden="true"></i></a>
            </div>
            <div class="top-menu__languages">
                <a href="#"
                   class="top-menu__languages-item <?= $lang == 'ru' ? 'top-menu__languages-item_active' : ''; ?>">ru</a>
                <a href="#"
                   class="top-menu__languages-item <?= $lang == 'en' ? 'top-menu__languages-item_active' : ''; ?>">en</a>
            </div>
        </div>
    </div>
</nav>
<div class="loading">
    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
</div>


<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top"><img src="<?= THEM_URI; ?>images/logo.png"
                                                                      alt="Treviso theme logo"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about"><?= $menu_about[$lang]; ?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#portfolio"><?= $menu_portfolio[$lang]; ?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#team"><?= $menu_team[$lang]; ?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact"><?= $menu_contacts[$lang]; ?></a>
                </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h1><?= $title_ourWorks[$lang]; ?></h1>
                    <p><?= $options['our_works_description_' . $lang]; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            for($i=0; $i < count($options['our_project']); $i++) {
                $project_id = $options['our_project'][$i];
                $project_title = get_post_meta($project_id, 'treviso_project_title_'.$lang, true);
                $project_description = get_post_meta($project_id, 'treviso_project_description_'.$lang, true);
                $project_icon = get_post_meta($project_id, 'treviso_project_icon', true);

                ?>
                <div class="col-md-6 col-0-gutter">
                    <div class="ot-portfolio-item">
                        <figure class="effect-bubba">
                            <img src="<?= $project_icon; ?>" alt="<?= $project_title; ?>" class="img-responsive"/>
                            <figcaption>
                                <h2><?= $project_title; ?></h2>
                                <p>Branding, Design</p>
                                <a href="#" data-toggle="modal" data-target="#Modal-<?= $i+1;?>">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="modal fade" id="Modal-<?= $i+1;?>" tabindex="-1" role="dialog" aria-labelledby="Modal-label-<?= $i+1;?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="Modal-label-<?= $i+1;?>"><?= $project_title; ?></h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?= $project_icon; ?>" alt="<?= $project_title; ?>" class="img-responsive"/>
                                <div class="modal-works"><span>Branding</span><span>Web Design</span></div>
                                <p><?= $project_description; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?= $b_close[$lang]; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php };?>
            <!-- start portfolio item -->
        </div>
    </div><!-- container -->
</section>

<section id="about" class="mz-module">
    <div class="container light-bg">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2><?= $title_about[$lang]; ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="mz-about-container">
                    <p>A creative agency based on Candy Land, ready to boost your business with some beautifull
                        templates. Lattes Agency is one of the best in town see more you will be amazed.</p>
                </div>
            </div>
            <div class="col-md-6">
                <!-- skill bar item -->
                <div class="skillbar-item">
                    <div class="skillbar" data-percent="90%">
                        <h3>Web design</h3>
                        <div class="skillbar-bar">
                            <div class="skillbar-percent" style="width: 90%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- skill bar item -->
                <div class="skillbar-item">
                    <div class="skillbar" data-percent="80%">
                        <h3>Development</h3>
                        <div class="skillbar-bar">
                            <div class="skillbar-percent" style="width: 80%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- skill bar item -->
                <div class="skillbar-item">
                    <div class="skillbar" data-percent="85%">
                        <h3>Photography</h3>
                        <div class="skillbar-bar">
                            <div class="skillbar-percent" style="width: 85%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- skill bar item -->
                <div class="skillbar-item">
                    <div class="skillbar" data-percent="70%">
                        <h3>Marketing</h3>
                        <div class="skillbar-bar">
                            <div class="skillbar-percent" style="width: 70%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($options['treviso_skills'] as $skill) : ?>
                <div class="col-md-3 col-0-gutter mz-about-default text-center">
                    <div class="mz-module-about">
                        <i class="fa <?=$skill['icon'];?> ot-circle"></i>
                        <h3><?=$skill['title_'.$lang];?></h3>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <!-- /.container -->
</section>

<section id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2><?= $title_ourTeam[$lang]; ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- team member item -->
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image">
                        <img src="<?= THEM_URI; ?>images/demo/author-2.jpg" class="img-responsive" alt="author">
                    </div>
                    <div class="team-text">
                        <h3>TOM BEKERS</h3>
                        <div class="team-position">CEO & Web Design</div>
                        <p>Mida sit una namet, cons uectetur adipiscing adon elit. Aliquam vitae barasa droma.</p>
                    </div>
                </div>
            </div>
            <!-- end team member item -->
            <!-- team member item -->
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image">
                        <img src="<?= THEM_URI; ?>images/demo/author-6.jpg" class="img-responsive" alt="author">
                    </div>
                    <div class="team-text">
                        <h3>LINA GOSATA</h3>
                        <div class="team-position">Photography</div>
                        <p>Worsa dona namet, cons uectetur dipiscing adon elit. Aliquam vitae fringilla unda mir.</p>
                    </div>
                </div>
            </div>
            <!-- end team member item -->
            <!-- team member item -->
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image">
                        <img src="<?= THEM_URI; ?>images/demo/author-4.jpg" class="img-responsive" alt="author">
                    </div>
                    <div class="team-text">
                        <h3>John BEKERS</h3>
                        <div class="team-position">Marketing</div>
                        <p>Dolor sit don namet, cons uectetur beriscing adon elit. Aliquam vitae fringilla unda.</p>
                    </div>
                </div>
            </div>
            <!-- end team member item -->
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2><?= $title_contactUs[$lang]; ?></h2>
                    <p>If you have some Questions or need Help! Please Contact Us!<br>We make Cool and Clean Design for
                        your Business</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <form name="sentMessage" id="contactForm" novalidate="">
                    <textarea name="message" class="d-none" style="display: none;"></textarea>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="user-name" type="text" class="form-control" placeholder="<?= $ph_name[$lang]; ?>" id="name"
                                       required=""
                                       data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="user-email" type="email" class="form-control" placeholder="<?= $ph_email[$lang]; ?>"
                                       id="email"
                                       required="" data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="user-message" class="form-control" placeholder="<?= $ph_message[$lang]; ?>" id="message"
                                          required=""
                                          data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button id="contact-form-button" type="submit" class="btn"><?= $b_sendMessage[$lang]; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<p id="back-top">
    <a href="#top"><i class="fa fa-angle-up"></i></a>
</p>
<footer>
    <div class="container text-center">
        &copy copy 2017-<?=date('Y');?>
    </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?= THEM_URI; ?>js/bootstrap.min.js"></script>
<script src="<?= THEM_URI; ?>js/SmoothScroll.js"></script>
<script src="<?= THEM_URI; ?>js/theme-scripts.js"></script>
<?php wp_footer();?>
</body>
</html>