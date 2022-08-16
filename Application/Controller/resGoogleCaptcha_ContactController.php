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

namespace RESPONSEGmbH\resGoogleCaptcha\Application\Controller;

use RESPONSEGmbH\resGoogleCaptcha\Application\Model\resGoogleCaptcha_Validator;
use RESPONSEGmbH\resGoogleCaptcha\Core\resGoogleCaptcha_ViewConfig;

class resGoogleCaptcha_ContactController extends resGoogleCaptcha_ContactController_parent
{
    public function send()
    {
        $oViewConf = oxNew(resGoogleCaptcha_ViewConfig::class);

        if (!$oViewConf->resGoogleCaptcha_showContactCaptcha()) {
            return parent::send();
        }

        $sFormCaptchaResponse = $this->getConfig()->getRequestParameter("g-recaptcha-response");
        $oResCaptchaValidator = oxNew(resGoogleCaptcha_Validator::class);

        if (!$oResCaptchaValidator->resValidateReCaptcha($sFormCaptchaResponse)) {
            return false;
        }

        return parent::send();
    }
}