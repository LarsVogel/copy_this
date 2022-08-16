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

use OxidEsales\Eshop\Application\Model\Rating;
use OxidEsales\Eshop\Application\Model\Review;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Registry;
use RESPONSEGmbH\resGoogleCaptcha\Application\Model\resGoogleCaptcha_Validator;
use RESPONSEGmbH\resGoogleCaptcha\Core\resGoogleCaptcha_ViewConfig;

class resGoogleCaptcha_ArticleDetailsController extends resGoogleCaptcha_ArticleDetailsController_parent
{
    public function addMe()
    {
        $oViewConf = oxNew(resGoogleCaptcha_ViewConfig::class);

        if (!$oViewConf->resGoogleCaptcha_showPricealarmCaptcha()) {
            return parent::addMe();
        }

        $sFormCaptchaResponse = $this->getConfig()->getRequestParameter("g-recaptcha-response");
        $oResCaptchaValidator = oxNew(resGoogleCaptcha_Validator::class);

        if (!$oResCaptchaValidator->resValidateReCaptcha($sFormCaptchaResponse)) {
            return false;
        }

        return parent::addMe();
    }

    /**
     * Saves user ratings and review text (oxReview object)
     *
     * @return null
     */
    public function saveReview()
    {
        $oViewConf = oxNew(resGoogleCaptcha_ViewConfig::class);

        if (!$oViewConf->resGoogleCaptcha_showReviewCaptcha()) {
            return parent::saveReview();
        }

        $sFormCaptchaResponse = $this->getConfig()->getRequestParameter("g-recaptcha-response");
        $oResCaptchaValidator = oxNew(resGoogleCaptcha_Validator::class);

        if (!$oResCaptchaValidator->resValidateReCaptcha($sFormCaptchaResponse)) {
            return false;
        }

        return parent::saveReview();
    }
}