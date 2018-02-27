[{$smarty.block.parent}]

[{block name="oegdprbase_disable_recommendations"}]
    [{if !$oViewConf->oeGdprBaseIsRecommendationsEnabled()}]
        <style>
            #suggest {
                display: none;
            }
        </style>
    [{/if}]
[{/block}]
