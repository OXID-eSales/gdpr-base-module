[{if $oView->oeGdprBaseIsUserAllowedToDeleteOwnAccount()}]
    [{block name="oegdprbase_account_delete_my_account"}]
        <button id="oegdprbase_delete_my_account_button"
                class="btn btn-danger pull-left"
                data-toggle="modal"
                data-target="#oegdprbase_delete_my_account_confirmation">
            <i class="fa fa-trash"></i>
            [{oxmultilang ident="OEGDPRBASE_DELETE_MY_ACCOUNT"}]
        </button>
        [{oxscript add='
            $(window).load(function(){
                var logoutLink = $(".accountDashboardView").next(".row").find("a[role=\'getLogoutLink\']");
                var deleteButton = $("#oegdprbase_delete_my_account_button");

                logoutLink.before(deleteButton);
                deleteButton.show();
            });
        '}]
        [{include file="oegdprbasedeletemyaccountconfirmation_flow_modal.tpl"}]
    [{/block}]
[{/if}]
[{if $oView->oeGdprBaseIsUserAllowedToManageOwnReviews()}]
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=oegdprbaseaccountreviewcontroller"}]">[{oxmultilang ident="OEGDPRBASE_MY_REVIEWS"}]</a>
            <a href="[{oxgetseourl ident=$oViewConf->getSslSelfLink()|cat:"cl=oegdprbaseaccountreviewcontroller"}]" class="btn btn-default btn-xs pull-right">
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="panel-body">[{oxmultilang ident="OEGDPRBASE_MY_REVIEWS"}] [{if $oView->oeGdprBaseGetReviewAndRatingItemsCount()}][{$oView->oeGdprBaseGetReviewAndRatingItemsCount()}][{else}]0[{/if}]</div>
    </div>
[{/if}]
