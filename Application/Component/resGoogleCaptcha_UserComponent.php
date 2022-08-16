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

namespace RESPONSEGmbH\resGoogleCaptcha\Application\Component;

use RESPONSEGmbH\resGoogleCaptcha\Application\Model\resGoogleCaptcha_Validator;
use RESPONSEGmbH\resGoogleCaptcha\Core\resGoogleCaptcha_ViewConfig;

class resGoogleCaptcha_UserComponent extends resGoogleCaptcha_UserComponent_parent
{
    public function createUser()
    {
        if (!$this->resGoogleCaptcha_showRegisterCaptcha()) {
            return parent::createUser();
        }

        $sFormCaptchaResponse = $this->getConfig()->getRequestParameter("g-recaptcha-response");
        $oResCaptchaValidator = oxNew(resGoogleCaptcha_Validator::class);

        if (!$oResCaptchaValidator->resValidateReCaptcha($sFormCaptchaResponse)) {
            return false;
        }

        return parent::createUser();
    }

    public function resGoogleCaptcha_showRegisterCaptcha()
    {
        $oConfig = $this->getConfig();

        return $oConfig->getConfigParam("blResGoogleCaptcha_show_register");
    }
}