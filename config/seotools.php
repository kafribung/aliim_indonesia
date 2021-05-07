<?php
/**
 * @see https://github.com/artesaos/seotools
 */
return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Aliim Indonesia", // set false to total remove
            'titleBefore'  => "Belajar Islam dengan asik dan menarik", // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Aliim Indonesia tempat belajar Islam dengan asik, menarik, dan menyenangkan dibimbing langsung oleh ustad yang berpengalaman', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ["Aliim", "Aliim Indonesia", "Belajar Islam", "Islam", "Startup Islam", "Belajar Islam Bareng Ustad", "Muallaf" ,"Belajar Islam Asik", "Hijrah", "UIN ALauddin Makassar"],
            'canonical'    => config('app.url'), // Set null for using Url::current(), set false to total remove
            'robots'       => "index,follow", // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],
        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Aliim Indonesia', // set false to total remove
            'description' => 'Belajar Islam dengan asik dan menarik', // set false to total remove
            'url'         => config('app.url'), // Set null for using Url::current(), set false to total remove
            'type'        => "website",
            'site_name'   => "aliim.id",
            'images'      => asset('assets/img/logo.jpg'),
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => '@aliim_indonesia',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => false, // set false to total remove
            'description' => false, // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'images'      => false,
        ],
    ],
];
