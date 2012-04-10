<?php use_helper('sfCombine'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link rel="shortcut icon" href="<?php echo image_path('/images/favicon.ico'); ?>" />
        <?php include_http_metas() ?>
        <?php include_metas() ?>

        <title><?php echo get_slot('title', 'Uberлов — Узнай, где ловить рыбу!') ?></title>
        <?php include_combined_stylesheets() ?>
        <script type="text/javascript" >
            baseUrl = "<?php echo substr(url_for('@homepage'), 0, strlen(url_for('@homepage')) - 1); ?>";
            baseUrlFull = "<?php echo substr(url_for('@homepage', true), 0, strlen(url_for('@homepage', true)) - 1); ?>";
            baseUrl = "<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(); ?>";
            csrf = {};
        </script>
        <meta name='loginza-verification' content='79a39381b6f4a696e75f87e7f9d0d38d' />
    </head>
    <body>
        <div id="page">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container" style="width: auto;">
                        <a class="brand" href="<?php echo url_for('@homepage') ?>"><img alt="uberlov.ru" src="/images/logo_small.png"/>Uberlov</a>
                        <ul class="nav">
                            <li<?php echo 'map' == $sf_request->getParameter('menu') ? ' class="active"' : '' ?>>
                                <?php echo link_to('Карта мест', '@map') ?>
                            </li>
                            <li<?php echo 'profits' == $sf_request->getParameter('menu') ? ' class="active"' : '' ?>>
                                <?php echo link_to('Отчёты', '@profits') ?>
                            </li>
                            <li<?php echo 'talks' == $sf_request->getParameter('menu') ? ' class="active"' : '' ?>>
                                <?php echo link_to('Обсуждения', '@talks') ?>
                            </li>
                            <li<?php echo 'events' == $sf_request->getParameter('menu') ? ' class="active"' : '' ?>>
                                <?php echo link_to('События', '@events') ?>
                            </li>
                        </ul>
                        <ul class="nav pull-right">
                            <li class="divider-vertical"></li>    
                            <?php if ($sf_user->isAnonymous()): ?>
                                <li<?php echo 'apply' == $sf_request->getParameter('menu') ? ' class="active"' : '' ?>>
                                    <?php echo link_to('Регистрация', '@apply') ?>
                                </li>
                                <li<?php echo 'sf_guard_signin' == $sf_request->getParameter('menu') ? ' class="active"' : '' ?>>
                                    <?php echo link_to('Вход', '@sf_guard_signin') ?>
                                </li>
                            <?php else: ?>
                                <li>
                                    <?php echo link_to('Выход', '@sf_guard_signout') ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <form class="navbar-search pull-right"  action="<?php echo url_for('location/search') ?>" method="get">
                            <input type="text" class="search-query span2" placeholder="Поиск" name="query"/>
                        </form>
                        
                    </div>
                </div><!-- /navbar-inner -->
            </div>
            <div id="middle" class="content clear_fix">
                <div id="left_layout">
                    <?php include_component('user', 'menu') ?>
                    <?php include_component('location', 'last',array('sf_cache_key' => 'location')) ?>
                    <?php include_component('comment', 'last',array('sf_cache_key' => 'comment')) ?>
                    <?php include_component('profit', 'last',array('sf_cache_key' => 'profit')) ?>
                    <?php include_component('event', 'last',array('sf_cache_key' => 'event')) ?>
                    <?php if (has_slot('extra')): ?>
                        <?php include_slot('extra'); ?>
                    <?php endif; ?>
                </div>

                <div id="right_layout">
                    <?php if ($sf_user->hasFlash('notice')): ?>
                        <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
                    <?php endif; ?>

                    <?php if ($sf_user->hasFlash('error')): ?>
                        <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
                    <?php endif; ?>

                    <?php echo $sf_content ?>
                </div>
            </div>
            <div class="footer row">
                <div>
                    <h2 class="small_logo"><?php echo link_to(image_tag('/images/logo_small.png', array('alt' => 'uberlov.ru')), '@homepage') ?></h2>
                    <div class="footer_box_menu clear_fix">
                        <div class="footer_menu">
                            <h3>
                                <?php echo link_to('Карта мест', '@map') ?>
                            </h3>
                            <ul class="footer_menu_list">
                                <li><?php echo link_to('По рейтингу', '@top') ?></li>
                                <li><?php echo link_to('По регионам', '@regions') ?></li>
                                <li><?php echo link_to('Бесплатная рыбалка', '@location_free') ?></li>
                                <li><?php echo link_to('Платная рыбалка', '@location_paid') ?></li>
                            </ul>
                        </div>
                        <div class="footer_menu">
                            <h3>
                                <?php echo link_to('Отчёты', '@profits') ?>
                            </h3>
                            <ul class="footer_menu_list">
                                <li><?php echo link_to('Зимняя рыбалка', '@profit_list_winter') ?></li>
                                <li><?php echo link_to('Летняя рыбалка', '@profit_list_summer') ?></li>
                            </ul>
                        </div>
                        <div class="footer_menu">
                            <h3>
                                <?php echo link_to('Обсуждения', '@talks') ?>
                            </h3>
                        </div>
                        <div class="footer_menu">
                            <h3>
                                <?php echo link_to('События', '@events') ?>
                            </h3>
                            <ul class="footer_menu_list">
                                <li><?php echo link_to('Архив', '@events_archive') ?></li>
                            </ul>
                        </div>
                        <div class="footer_menu">
                            <h3>
                                <?php echo link_to('Люди', '@people') ?>
                            </h3>
                            <ul class="footer_menu_list">
                                <li><?php echo link_to('По улову', '@profile_top_profit') ?></li>
                            </ul>
                        </div>
                        <div class="footer_menu">
                            <h3>
                                Мы в
                            </h3>
                            <ul class="footer_menu_list">
                                <li><a href="http://www.vkontakte.ru/uberlover"><img src="/images/icons/social/vkontakte.png" alt="vk"/></a></li>
                                <li><a href="http://www.twitter.com/uberlov"><img src="/images/icons/social/twitter.png" alt="twitter"/></a></li>
                                <li><a href="http://www.facebook.com/pages/Uberlov/190569190994314"><img src="/images/icons/social/facebook.png" alt="facebok"/></a></li>
                            </ul>
                        </div>
                        <div class="footer_menu">
                            <h3>
                                powered by
                            </h3>
                            <ul class="footer_menu_list">
                                <li><a href="http://www.symfony-project.com/">Symfony</a></li>
                                <li><a href="http://www.jquery.com/">jQuery</a></li>
                                <li><a href="http://www.imageshack.us/">ImageShack</a></li>
                                <li><a href="http://www.gravatar.com/">Gravatar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="display:none">
            <!-- begin of Top100 code -->

            <script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?2609777"></script>
            <noscript>
                <a href="http://top100.rambler.ru/navi/2609777/">
                    <img src="http://counter.rambler.ru/top100.cnt?2609777" alt="Rambler's Top100" border="0" />
                </a>

            </noscript>
            <!-- end of Top100 code -->
        </div>   
        <?php include_combined_javascripts() ?> 
        <?php if (sfConfig::get('sf_environment') == 'prod'): ?> 
            <script type="text/javascript">
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-22389085-1']);
                _gaq.push(['_trackPageview']);

                (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
            </script>          
        <?php endif; ?>
        <script type="text/javascript">
            reformal_wdg_domain    = "uberlov";
            reformal_wdg_mode    = 0;
            reformal_wdg_title   = "Uberlov";
            reformal_wdg_ltitle  = "";
            reformal_wdg_lfont   = "";
            reformal_wdg_lsize   = "";
            reformal_wdg_color   = "#FFA000";
            reformal_wdg_bcolor  = "#516683";
            reformal_wdg_tcolor  = "#FFFFFF";
            reformal_wdg_align   = "left";
            reformal_wdg_charset = "utf-8";
            reformal_wdg_waction = 0;
            reformal_wdg_vcolor  = "#9FCE54";
            reformal_wdg_cmline  = "#E0E0E0";
            reformal_wdg_glcolor  = "#105895";
            reformal_wdg_tbcolor  = "#FFFFFF";
 
            reformal_wdg_bimage = "http://reformal.ru/files/images/buttons/7688f5685f7701e97daa5497d3d9c745.png";
 
        </script>
        <script type="text/javascript" language="JavaScript" src="http://reformal.ru/tab6.js">
        </script>
        <object>
            <noscript>
                <a href="http://uberlov.reformal.ru">Uberlov feedback </a>
                <a href="http://reformal.ru">
                    <img src="http://reformal.ru/i/logo.gif" alt="reformal"/>
                </a>
            </noscript>
        </object>
    </body>
</html>