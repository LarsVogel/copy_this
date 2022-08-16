[{if $oViewConf->resGoogleCaptcha_getSiteKey() ne "" && $oViewConf->resGoogleCaptcha_showReviewCaptcha()}]
    [{$smarty.block.parent}]

    <div class="form-group">
        <div class="col-lg-12">
            <div class="g-recaptcha" data-sitekey="[{$oViewConf->resGoogleCaptcha_getSiteKey()}]" data-theme="[{$oViewConf->resGoogleCaptcha_getTheme()}]"></div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=[{$oView->getActiveLangAbbr()}]"></script>
[{else}]
    [{$smarty.block.parent}]
[{/if}]