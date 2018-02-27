[{$smarty.block.parent}]

[{block name="oegdprbase_delete_shipping_address_modal"}]
    [{if $oxcmp_user}]
    [{assign var="userAddresses" value=$oxcmp_user->getUserAddresses()}]
    [{/if}]
    [{foreach from=$userAddresses item=shippingAddress name="shippingAdresses"}]
        [{assign var="shippingAddressId" value=$shippingAddress->oxaddress__oxid->value}]
        <div class="oegdprbase-modal modal fade popupBox corners FXgradGreyLight glowShadow"
             id="delete_shipping_address_[{$shippingAddressId}]"
             tabindex="-1"
             role="dialog"
             aria-labelledby="delete_shipping_address_modal_label_[{$shippingAddressId}]"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        [{block name="oegdprbase_delete_shipping_address_modal_header"}]
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="h4 modal-title" id="delete_shipping_address_modal_label_[{$shippingAddressId}]">[{oxmultilang ident="OEGDPRBASE_DELETE_SHIPPING_ADDRESS"}]</h3>
                            <img src="[{$oViewConf->getImageUrl('x.png')}]" alt="" class="oegdprbase-close closePop">
                        [{/block}]
                    </div>
                    <div class="modal-body">
                        [{block name="oegdprbase_delete_shipping_address_modal_contents"}]
                            <div class="row">
                                <div class="col-md-12">
                                    <form name="delete_shipping_address_modal_form_[{$shippingAddressId}]"
                                          action="[{$oViewConf->getSelfActionLink()}]"
                                          method="post">
                                        <div class="hidden">
                                            [{$oViewConf->getHiddenSid()}]
                                            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                            <input type="hidden" name="fnc" value="oeGdprBaseDeleteShippingAddress">
                                            <input type="hidden" name="oxaddressid"
                                                   value="[{$shippingAddress->oxaddress__oxid->value}]">
                                        </div>
                                        [{include file="widget/address/shipping_address.tpl" delivadr=$shippingAddress}]
                                    </form>
                                </div>
                            </div>
                        [{/block}]
                    </div>
                    <div class="modal-footer">
                        [{block name="oegdprbase_delete_shipping_address_modal_footer"}]
                            <button type="button" class="btn btn-default textButton largeButton closePop" data-dismiss="modal">[{oxmultilang ident="CANCEL"}]
                            </button>
                            <button type="button"
                                    class="btn btn-danger submitButton removeButton"
                                    onclick="window.delete_shipping_address_modal_form_[{$shippingAddressId}].submit();return false;">
                                <span>[{oxmultilang ident="OEGDPRBASE_DELETE"}]</span>
                            </button>
                        [{/block}]
                    </div>
                </div>
            </div>
        </div>
    [{/foreach}]
[{/block}]
