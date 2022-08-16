<?php
/**
 * This Software is the property of RESPONSE GmbH and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.response-gmbh.de
 *
 * @copyright (C) RESPONSE GmbH
 * @author RESPONSE GmbH <response@response-gmbh.de>
 * @link https://www.response-gmbh.de
 */

$sMetadataVersion = "2.0";

$aModule = [
    'id' => 'resGoogleCaptcha',
    'title' => '<img src="../modules/response/resGoogleCaptcha/response_logo_modul.png"> RESPONSE GmbH Google ReCaptcha Modul',
    'description' => 'RESPONSE GmbH Google Recaptcha Modul',
    'version' => '2.3',
    'thumbnail' => 'resmodule.png',
    'author' => 'RESPONSE GmbH',
    'url' => 'https://www.response-gmbh.de',
    'email' => 'response@response-gmbh.de',
    'extend' => [
        \OxidEsales\Eshop\Core\ViewConfig::class => \RESPONSEGmbH\resGoogleCaptcha\Core\resGoogleCaptcha_ViewConfig::class,
        \OxidEsales\Eshop\Application\Controller\ContactController::class => \RESPONSEGmbH\resGoogleCaptcha\Application\Controller\resGoogleCaptcha_ContactController::class,
        \OxidEsales\Eshop\Application\Controller\SuggestController::class => \RESPONSEGmbH\resGoogleCaptcha\Application\Controller\resGoogleCaptcha_SuggestController::class,
        \OxidEsales\Eshop\Application\Controller\InviteController::class => \RESPONSEGmbH\resGoogleCaptcha\Application\Controller\resGoogleCaptcha_InviteController::class,
        \OxidEsales\Eshop\Application\Controller\ArticleDetailsController::class => \RESPONSEGmbH\resGoogleCaptcha\Application\Controller\resGoogleCaptcha_ArticleDetailsController::class,
        \OxidEsales\Eshop\Application\Controller\NewsletterController::class => \RESPONSEGmbH\resGoogleCaptcha\Application\Controller\resGoogleCaptcha_NewsletterController::class,
        \OxidEsales\Eshop\Application\Component\UserComponent::class => \RESPONSEGmbH\resGoogleCaptcha\Application\Component\resGoogleCaptcha_UserComponent::class,
    ],
    'events' => [
        'onActivate' => '\RESPONSEGmbH\resGoogleCaptcha\Core\resGoogleCaptcha_Install::install',
    ],
    'blocks' => [
        ['template' => 'form/contact.tpl', 'block' => 'captcha_form', 'file' => '/Application/views/blocks/resGoogleCaptcha_contact_captcha_form.tpl', 'position' => 100],
        ['template' => 'form/newsletter.tpl', 'block' => 'captcha_form', 'file' => '/Application/views/blocks/resGoogleCaptcha_newsletter_captcha_form.tpl', 'position' => 100],
        ['template' => 'form/fieldset/user_billing.tpl', 'block' => 'captcha_form', 'file' => '/Application/views/blocks/resGoogleCaptcha_register_captcha_form.tpl', 'position' => 100],
        ['template' => 'form/suggest.tpl', 'block' => 'captcha_form', 'file' => '/Application/views/blocks/resGoogleCaptcha_suggest_captcha_form.tpl', 'position' => 100],
        ['template' => 'form/pricealarm.tpl', 'block' => 'captcha_form', 'file' => '/Application/views/blocks/resGoogleCaptcha_pricealarm_captcha_form.tpl', 'position' => 100],
        ['template' => 'form/privatesales/invite.tpl', 'block' => 'captcha_form', 'file' => '/Application/views/blocks/resGoogleCaptcha_privatesales_invite_captcha.tpl', 'position' => 100],
        ['template' => 'widget/reviews/reviews.tpl', 'block' => 'widget_reviews_form_fields', 'file' => '/Application/views/blocks/resGoogleCaptcha_review_captcha_form.tpl', 'position' => 100],
    ],
    'settings' => [
        #Main
        [
            'group' => 'resgooglecaptcha_main',
            'name' => 'sResGoogleCaptcha_theme',
            'type' => 'select',
            'value' => '0',
            'constraints' => '0|1',
        ],
        #API
        [
            'group' => 'resgooglecaptcha_api',
            'name' => 'sResGoogleCaptcha_publicKey',
            'type' => 'str',
        ],
        [
            'group' => 'resgooglecaptcha_api',
            'name' => 'sResGoogleCaptcha_privateKey',
            'type' => 'str',
        ],
        #Error Messages
        [
            'group' => 'resgooglecaptcha_err_msg',
            'name' => 'sResGoogleCaptcha_err_de',
            'type' => 'str',
            'value' => 'Bitte das Captcha lösen!',
        ],
        [
            'group' => 'resgooglecaptcha_err_msg',
            'name' => 'sResGoogleCaptcha_err_en',
            'type' => 'str',
            'value' => 'Please solve the captcha!',
        ],
        #Show On
        [
            'group' => 'resgooglecaptcha_showOn',
            'name' => 'blResGoogleCaptcha_show_contact',
            'type' => 'bool',
            'value' => 'true',
        ],
        [
            'group' => 'resgooglecaptcha_showOn',
            'name' => 'blResGoogleCaptcha_show_newsletter',
            'type' => 'bool',
            'value' => 'false',
        ],
        [
            'group' => 'resgooglecaptcha_showOn',
            'name' => 'blResGoogleCaptcha_show_register',
            'type' => 'bool',
            'value' => 'false',
        ],
        [
            'group' => 'resgooglecaptcha_showOn',
            'name' => 'blResGoogleCaptcha_show_suggest',
            'type' => 'bool',
            'value' => 'true',
        ],
        [
            'group' => 'resgooglecaptcha_showOn',
            'name' => 'blResGoogleCaptcha_show_pricealarm',
            'type' => 'bool',
            'value' => 'true',
        ],
        [
            'group' => 'resgooglecaptcha_showOn',
            'name' => 'blResGoogleCaptcha_show_privatesales',
            'type' => 'bool',
            'value' => 'false',
        ],
        [
            'group' => 'resgooglecaptcha_showOn',
            'name' => 'blResGoogleCaptcha_show_reviews',
            'type' => 'bool',
            'value' => 'false',
        ],
    ],
];