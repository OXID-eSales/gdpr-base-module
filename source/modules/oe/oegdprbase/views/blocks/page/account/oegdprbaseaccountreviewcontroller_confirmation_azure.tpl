[{block name="oegdprbase_account_delete_review_and_rating_confirmation"}]
    [{oxscript include="js/widgets/oxmodalpopup.js" priority=10}]
    <div class="oegdprbase-modal modal fade popupBox corners FXgradGreyLight glowShadow"
         id="oegdprbase_delete_review_and_rating_confirmation"
         tabindex="-1"
         role="dialog"
         aria-labelledby="oegdprbase_account_delete_review_and_rating_confirmation_modal_header"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    [{block name="oegdprbase_account_delete_review_and_rating_confirmation_modal_header"}]
                    <h3 id="oegdprbase_account_delete_review_and_rating_confirmation_modal_header">
                        [{oxmultilang ident="OEGDPRBASE_DELETE_REVIEW_CONFIRMATION_QUESTION"}]
                    </h3>
                    [{/block}]
                    <img src="[{$oViewConf->getImageUrl('x.png')}]" alt="" class="oegdprbase-close closePop">
                </div>
                <div class="modal-body">
                    <br >
                    [{block name="oegdprbase_account_delete_review_and_rating_confirmation_form"}]
                    <form id="oegdprbase_account_delete_review_and_rating"
                          name="oegdprbase_account_delete_review_and_rating"
                          action="[{$oViewConf->getSelfActionLink()}]"
                          method="post">
                        <div class="hidden">
                            [{$oViewConf->getHiddenSid()}]
                            <input type="hidden" name="cl" value="oegdprbaseaccountreviewcontroller">
                            <input type="hidden" name="fnc" value="oegdprbasedeletereviewandrating">
                            <input type="hidden" name="reviewId" id="oegdprbaseReviewId" value="">
                            <input type="hidden" name="ratingId" id="oegdprbaseRatingId" value="">
                            <input type="hidden" name="pgNr" value="[{$oView->getActPage()}]">
                        </div>
                    </form>
                    [{/block}]
                </div>
                <div class="modal-footer ui-dialog-buttonset">
                    [{block name="oegdprbase_account_delete_review_and_rating_confirmation_form_button_set"}]
                    <button type="reset"
                            class="textButton closePop">
                        [{oxmultilang ident="OEGDPRBASE_CANCEL_DELETE_ACCOUNT"}]
                    </button>
                    <button class="submitButton largeButton removeButton"
                            id="oegdprbase_account_delete_review_and_rating_confirmation_button">
                        <span>[{oxmultilang ident="OEGDPRBASE_DELETE_REVIEW_AND_RATING"}]</span>
                    </button>
                    [{/block}]
                </div>
            </div>
        </div>
    </div>
[{/block}]
