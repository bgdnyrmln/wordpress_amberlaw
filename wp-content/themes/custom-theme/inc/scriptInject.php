<?php

namespace Flynt\ScriptInject;

use Flynt\Utils\Options;

Options::addGlobal('GoogleTags', [
    [
        'label' => 'Tags',
        'name' => 'googleTags',
        'type' => 'repeater',
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'table',
        'button_label' => 'Add tag',
        'sub_fields' => [
            [
                'label' => 'Tag',
                'name' => 'tag',
                'type' => 'text'
            ],
        ]
    ],
    [
        'label' => 'Tag manager',
        'name' => 'googleTagManager',
        'type' => 'text'
    ],
    [
        'label' => 'Facebook Pixel',
        'name' => 'fbPixel',
        'type' => 'text'
    ],
]);

/*
 * Gtag manager and gtag code
 */
add_action('wp_head', 'Flynt\ScriptInject\addGtagManagerCode');
add_action('wp_body_open', 'Flynt\ScriptInject\addGtagManagerNoscriptCode');


function addGtagManagerCode()
{
    $code = Options::getGlobal('GoogleTags')['googleTagManager'];
    if ($code) :
        ?>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('consent', 'default', {
                'ad_storage': 'denied',
                'analytics_storage': 'denied',
                'functionality_storage': 'denied',
                'personalization_storage': 'denied',
                'security_storage': 'denied',
                'ad_user_data': 'denied',
                'ad_personalization': 'denied',
            });
        </script>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?= $code ?>');</script>
        <!-- End Google Tag Manager -->
        <?php
    endif;

    $codes = Options::getGlobal('GoogleTags')['googleTags'];
    if ($codes) :
        ?>
        <!-- Google tag (gtag.js) -->
        <?php foreach ($codes as $i => $code) : ?>
            <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $code ?>"></script>
        <?php endforeach; ?>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
        </script>

        <?php foreach ($codes as $i => $code) : ?>
            <script>gtag('config', '<?= $code['tag'] ?>');</script>
        <?php endforeach; ?>
        <!-- End Google tag (gtag.js) -->
        <?php
    endif;

    $fbCode = Options::getGlobal('GoogleTags')['fbPixel'];
    if ($fbCode) {
        ?>
        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('consent', 'revoke');
        fbq('init', <?= $fbCode ?>);
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=<?= $fbCode ?>&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
        <?php
    }
}

function addGtagManagerNoscriptCode()
{
    $code = Options::getGlobal('GoogleTags')['googleTagManager'];
    if ($code) :
        ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $code ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <?php
    endif;
}

add_action('wp_footer', function () {
    ?>
    <!-- Missing css -->
    <div class="missing-css" aria-hidden="true" style="font-size: 15px; font-family: Arial, sans-serif; flex-direction: column; position: fixed;inset: 0;inline-size: 100%;block-size: 100%;display: flex;z-index: 1000;background: #FFF;justify-content: center;align-items: center;">
        <svg viewBox="0 0 128 512" xmlns="http://www.w3.org/2000/svg" style="inline-size: 71px;block-size: 71px;margin-block-end: 60px;"><path d="m96 64c0-17.7-14.3-32-32-32s-32 14.3-32 32v256c0 17.7 14.3 32 32 32s32-14.3 32-32v-256zm-32 416a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
    </div>
    <!-- End Missing css -->
    <?php
});
