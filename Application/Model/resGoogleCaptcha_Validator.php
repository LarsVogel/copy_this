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

namespace RESPONSEGmbH\resGoogleCaptcha\Application\Model;

use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Core\Registry;
use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;

class resGoogleCaptcha_Validator extends FrontendController
{
    /**
     * This Method validates the Google ReCaptcha
     * @param string $sFormCaptchaResponse
     * @return bool
     */
    public function resValidateReCaptcha($sFormCaptchaResponse)
    {
        $sRecaptchaSecretKey = $this->_resGoogleCaptcha_getSecretKey();
        $sErrorMessage = $this->_resGoogleCaptcha_getErrorMessage();

        if ($sRecaptchaSecretKey == null || $sRecaptchaSecretKey == "") {
            return false;
        }

        $oReCaptcha = new ReCaptcha($sRecaptchaSecretKey, new CurlPost());

        $resp = $oReCaptcha->verify($sFormCaptchaResponse, $_SERVER["REMOTE_ADDR"]);

        if ($resp->isSuccess()) {
            return true;
        } else {
            if ($sErrorMessage != "" && $sErrorMessage != null) {
                Registry::get('oxUtilsView')->addErrorToDisplay($sErrorMessage);
            } else {
                Registry::get('oxUtilsView')->addErrorToDisplay("RES_GOOGLE_CAPTCHA_USER_ERROR");
            }

            return false;
        }
    }

    /**
     * This private Method returns the private ReCaptcha Key from the Module Settings
     * @return string
     */
    private function _resGoogleCaptcha_getSecretKey()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("sResGoogleCaptcha_privateKey");
    }

    /**
     * Returns the error message from the module settings
     * based on the currently selected language
     * @return string
     */
    private function _resGoogleCaptcha_getErrorMessage()
    {
        $oConfig = $this->getConfig();
        $sErrMsg = "";

        if (Registry::getLang()->getTplLanguage() === 0) {
            $sErrMsg = $oConfig->getConfigParam("sResGoogleCaptcha_err_de");
        } else {
            $sErrMsg = $oConfig->getConfigParam("sResGoogleCaptcha_err_en");
        }

        return (string)filter_var($sErrMsg, FILTER_SANITIZE_STRING);
    }
}