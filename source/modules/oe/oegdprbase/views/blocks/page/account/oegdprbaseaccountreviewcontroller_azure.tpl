[{capture append="oxidBlock_content"}]
    [{oxscript include=$oViewConf->getModuleUrl('oegdprbase','out/js/oegdprbaseaccountreviewcontroller_azure.js') priority=10}]

    [{block name="oegdprbase_account_manage_reviews"}]
        [{assign var="template_title" value="OEGDPRBASE_MY_REVIEWS"|oxmultilangassign}]
        [{assign var="locator" value=$oView->getPageNavigation()}]

        [{block name="oegdprbase_account_reviewlist_header"}]
            <h1 class="pageHead">[{$oView->getTitle()}]</h1>
            [{if $locator->changePage}]
            <div class="listRefine clear bottomRound oegdprbase_account_reviewlist">
                [{include file="widget/locator/listlocator.tpl" locator=$locator }]
            </div>
            [{/if}]
        [{/block}]
        [{block name="oegdprbase_account_reviewlist_list"}]
            [{if $oView->oeGdprBaseGetReviewAndRatingItemsCount() }]
                <div class="widgetBox reviews oegdprbase_account_reviewlist">
                    <dl>
                    [{foreach from=$oView->oeGdprBaseGetReviewList() item=review name=ReviewsCounter}]
                        [{block name="oegdprbase_account_reviewlist_item"}]
                            [{if $review->getRating()}]
                                [{math equation="x*y" x=20 y=$review->getRating() assign="ratingPercentage"}]
                            [{else}]
                                [{assign var="ratingPercentage" value="0"}]
                            [{/if}]
                            <dt id="reviewName_[{$smarty.foreach.ReviewsCounter.iteration}]" class="clear item">
                                    <span>
                                        <span>[{$review->getCreatedAt()|date_format:"%d.%m.%Y"}]</span>
                                    </span>
                                [{$review->getObjectTitle()|truncate:60}]
                                <button id="oegdprbase_delete_review_and_rating_button_[{$smarty.foreach.ReviewsCounter.iteration}]"
                                        class="submitButton largeButton removeButton nextStep oegdprbase_delete_review_and_rating_button"
                                        data-target="oegdprbase_delete_review_and_rating_confirmation"
                                        data-ratingId="[{$review->getRatingId()}]"
                                        data-reviewId="[{$review->getReviewId()}]">
                                    <span>[{oxmultilang ident="OEGDPRBASE_DELETE"}]</span>
                                </button>
                                <ul class="rating">
                                    <li class="currentRate" style="width: [{$ratingPercentage}]%;"></li>
                                </ul>
                            </dt>
                            <dd>
                            [{if $review->getReviewText()}]
                                <div id="reviewText_[{$smarty.foreach.ReviewsCounter.iteration}]" class="description">
                                    [{$review->getReviewText()}]
                                </div>
                            [{/if}]
                            </dd>
                        [{/block}]
                    [{/foreach}]
                    </dl>
                </div>
                [{if $locator->changePage}]
                    [{include
                        file="widget/locator/listlocator.tpl"
                        locator=$oView->getPageNavigation()
                        place="bottom"
                    }]
                [{/if}]
            [{else}]
                [{block name="oegdprbase_account_reviewlist_no_reviews_available"}]
                    <div class="alert alert-info">
                        [{oxmultilang ident="OEGDPRBASE_REVIEWS_NOT_AVAILABLE"}]
                    </div>
                [{/block}]
            [{/if}]
        [{/block}]
    [{/block}]
    [{include
        file="oegdprbaseaccountreviewcontroller_confirmation_azure.tpl"
    }]
[{/capture}]
[{capture append="oxidBlock_sidebar"}]
    [{include file="page/account/inc/account_menu.tpl" active_link="oegdprbase_reviewlist"}]
[{/capture}]
[{include file="layout/page.tpl" sidebar="Left"}]
