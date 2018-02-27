<li class="list-group-item[{if $active_link == "reviewlist"}] active[{/if}]" id="account_menu-my_reviews">
    <a href="[{oxgetseourl ident=$oViewConf->getSslSelfLink()|cat:"cl=oegdprbaseaccountreviewcontroller"}]" title="[{oxmultilang ident="OEGDPRBASE_MY_REVIEWS"}]">[{oxmultilang ident="OEGDPRBASE_MY_REVIEWS"}]
        [{if $oView->oeGdprBaseGetReviewAndRatingItemsCount() > 0}]<span class="badge">[{$oView->oeGdprBaseGetReviewAndRatingItemsCount()}]</span>[{/if}]</a>
</li>
