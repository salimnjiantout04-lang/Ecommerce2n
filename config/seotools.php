<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => config('app.name'),
            'titleBefore'  => false,
            'description'  => 'Votre boutique en ligne spécialisée dans les produits électroniques, accessoires informatiques et téléphones. Découvrez notre large sélection de produits de qualité aux meilleurs prix.',
            'separator'    => ' | ',
            'keywords'     => ['électronique', 'accessoires', 'informatique', 'téléphones', 'smartphones', 'ordinateurs', 'tablettes', 'accessoires gaming', 'audio', 'vidéo'],
            'canonical'    => 'full',
            'robots'       => 'index, follow',
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
            'title'       => config('app.name'),
            'description' => 'Votre boutique en ligne spécialisée dans les produits électroniques, accessoires informatiques et téléphones. Découvrez notre large sélection de produits de qualité aux meilleurs prix.',
            'url'         => 'full',
            'type'        => 'website',
            'site_name'   => config('app.name'),
            'images'      => [],
            'locale'      => 'fr_FR',
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary_large_image',
            'site'        => '@votresite',
            'creator'     => '@votresite',
            'title'       => config('app.name'),
            'description' => 'Votre boutique en ligne spécialisée dans les produits électroniques, accessoires informatiques et téléphones.',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => config('app.name'),
            'description' => 'Votre boutique en ligne spécialisée dans les produits électroniques, accessoires informatiques et téléphones. Découvrez notre large sélection de produits de qualité aux meilleurs prix.',
            'url'         => 'full',
            'type'        => 'WebSite',
            'images'      => [],
            'publisher'   => [
                '@type' => 'Organization',
                'name'  => config('app.name'),
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => config('app.url') . '/images/logo.png'
                ]
            ]
        ],
    ],
];
