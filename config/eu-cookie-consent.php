<?php

return [

    /*
     * Use this setting to enable the cookie consent dialog.
     */
    'enabled' => env('COOKIE_CONSENT_ENABLED', true),

    /*
     * The name of the cookie in which we store if the user
     * has agreed to accept the conditions.
     */
    'cookie_name' => 'laravel_eu_cookie_consent',

    /*
     * Set the cookie duration in minutes.  Default is 365 * 24 * 60 = 1 Year.
     */
    'cookie_lifetime' => 365 * 24 * 60,

    /*
     * Multilanguage support
     *
     * If enabled the title, description, the category keys and the cookie keys are defining the key from the translation files.
     */
    'multilanguage_support' => false,

    /*
     * Save Cookies Route
     */
    'route' => '/saveTheCookie',

    /*
     * Define the style of the Popup
     */
    'popup_style' => '',

/*
     * Define classes the popup should use.
     */
    'popup_classes' => 'eu-popup',

    /*
     * If you want to have an Accept all Button for the users
     */
    'acceptAllButton' => 'true',

    /*
     * Cookies
     */
    'cookies' => [
        //Defines the translation Key for the saveButton
        'saveButton' => 'Save',
        //Optional: Defines the translation Key for the PopupTitle
        'title' => 'PopupTitle',
        //Optional: Defines the translation Key for the PopupDescription
        'description' => 'By clicking on the button, you agree to the use of cookies described here by the platform universitaet.com. At this point you can also object to the use of cookies or revoke your consent. Cookies are used to analyze your use of our websites and to personalize our services. Web cookies from third-party providers also give you personalized advertising, even if you no longer access our website. The storage period for cookies is 90 days.
',
        'acceptAllButton' => 'Accept All',
        //To make the popup easier to consume for the user you can organize your Cookies in categories.
        'categories' => [
            //The key defines the translation key in the translations for this category.
            'essential' => [
                'title_de'=> 'Erforderliche Cookies',
                'title' => 'Required Cookies',
                'cookies' => [
                    //The key defines the key in the translations and is used to access the Cookie specific information
                    'lang_conversion'=> [
                        'title' => 'Lang Conversion',
                        'description' => 'To ensure that you can use our website in other languages as well.',
                     ],
                ],
            ],
            'functional' => [
                 'title_de'=> 'Funktionelle Cookies',
                 'title' => 'Functional Cookies',
                //Optional: The description defines the key in the translations for the category description
                'description' => 'functional_description',
                //In this array you can define all the Cookies you want to request form the User
                'cookies' => [
                    //The key defines the key in the translations and is used to access the Cookie specific information
                    'youtube'=> [
                        'title' => 'Youtube',
                        'description' => 'In order to show you videos on our portal, we use YouTube.',
                     ],
                    'lang_bot' => [
                        'title' => 'Landbot',
                        'description' => 'To improve the user experience, we make use of the tool Landbot.',
                     ],
                    'google.maps'=> [
                        'title' => 'Lang Conversion',
                        'description' => 'adfadsfasdfa',
                     ],
                ],
            ],
            'tracking' => [
                'title_de'=> 'Tracking und Marketing-Cookies',
                'title' => 'Tracking and Marketing Cookies',
                //Optional: The description defines the key in the translations for the category description
                'description' => 'tracking_description',
                //In this array you can define all the Cookies you want to request form the User
                'cookies' => [
                    //The key defines the key in the translations and is used to access the Cookie specific information

                    'facebook' => [
                        'title' => 'Google Ads',
                     ],
                    'google.ads' => [
                        'title' => 'Facebook',
                     ],
                   
                    'google.analitics'=> [
                        'title' => 'Google Analitics',
                        'description' => 'Anonymized data relating to the use of the website is analyzed in order to further improve the offer on the website.',
                     ],
                ],
            ],
            
        ],
    ],

];
