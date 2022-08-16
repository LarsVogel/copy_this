[{if $oViewConf->resGoogleCaptcha_getSiteKey() ne "" && $oViewConf->resGoogleCaptcha_showPrivatesalesCaptcha()}]
    <li>
        <label class="req">[{oxmultilang ident="RES_GOOGLE_CAPTCHA_FORM_LABEL" suffix="COLON"}]</label>
        <div class="g-recaptcha" data-sitekey="[{$oViewConf->resGoogleCaptcha_getSiteKey()}]" data-theme="[{$oViewConf->resGoogleCaptcha_getTheme()}]"></div>
    </li>

    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=[{$oView->getActiveLangAbbr()}]"></script>
[{else}]
    [{$smarty.block.parent}]
[{/if}]