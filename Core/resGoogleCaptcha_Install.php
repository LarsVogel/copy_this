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

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\ShopVersion;

class resGoogleCaptcha_Install
{
    public static function install()
    {
        self::_sendModuleConf();
    }

    private static function _sendModuleConf()
    {
        $oConfig = Registry::getConfig();

        $mail_body = "Module Activation (resGoogleCaptcha):\n"
            . "Datum: " . date("d.m.Y, H:i:s") . "\n"
            . "Shop: " . $oConfig->getFullEdition() . " (" . ShopVersion::getVersion() . ")\n"
            . "Shop-URL: " . $oConfig->getShopUrl();
        mail("modulaktivierung@response-gmbh.de", "[resGoogleCaptcha] Modul aktiviert", $mail_body);
    }
}