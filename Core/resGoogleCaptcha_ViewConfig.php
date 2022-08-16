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

namespace RESPONSEGmbH\resGoogleCaptcha\Core;

class resGoogleCaptcha_ViewConfig extends resGoogleCaptcha_ViewConfig_parent
{
    public function resGoogleCaptcha_getSiteKey()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("sResGoogleCaptcha_publicKey");
    }

    public function resGoogleCaptcha_getTheme()
    {
        $oConfig = $this->getConfig();
        $sTheme = "";

        if ($oConfig->getConfigParam("sResGoogleCaptcha_theme") == 1) {
            $sTheme = "dark";
        } else {
            $sTheme = "light";
        }

        return $sTheme;
    }

    public function resGoogleCaptcha_showContactCaptcha()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("blResGoogleCaptcha_show_contact");
    }

    public function resGoogleCaptcha_showNewsletterCaptcha()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("blResGoogleCaptcha_show_newsletter");
    }

    public function resGoogleCaptcha_showRegisterCaptcha()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("blResGoogleCaptcha_show_register");
    }

    public function resGoogleCaptcha_showSuggestCaptcha()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("blResGoogleCaptcha_show_suggest");
    }

    public function resGoogleCaptcha_showPricealarmCaptcha()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("blResGoogleCaptcha_show_pricealarm");
    }

    public function resGoogleCaptcha_showPrivatesalesCaptcha()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("blResGoogleCaptcha_show_privatesales");
    }

    public function resGoogleCaptcha_showReviewCaptcha()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("blResGoogleCaptcha_show_reviews");
    }
}