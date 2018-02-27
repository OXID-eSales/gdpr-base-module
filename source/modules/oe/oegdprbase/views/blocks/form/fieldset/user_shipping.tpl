[{$smarty.block.parent}]
[{block name="oegdprbase_delete_shipping_address"}]
    [{if $oViewConf->getActiveTheme() == 'azure'}]
        <button id="oegdprbase-delete-shipping-address-button" class="submitButton largeButton oegdprbase-delete-shipping-address-button removeButton" title="[{oxmultilang ident="OEGDPRBASE_DELETE"}]"><span>[{oxmultilang ident="OEGDPRBASE_DELETE"}]</span></button>
        [{oxscript include="js/widgets/oxmodalpopup.js" priority=10}]
        [{oxscript add='
            var selectAddressDropDown = $("#addressId");
            var activeAddressId = selectAddressDropDown.val();
            var deleteButton = $("#oegdprbase-delete-shipping-address-button");

            deleteButton.click(function(event){
                event.preventDefault();
                $("body").oxModalPopup({target: "#delete_shipping_address_"+activeAddressId, openDialog: true, width: "310px"});
                $("#delete_shipping_address_"+activeAddressId).dialog("open");
            });

            if ($("#addressId").val() != "-1") {
                deleteButton.show();
            }
            selectAddressDropDown.on("change", function() {
              if (this.value == "-1") {
                deleteButton.hide();
              } else {
                deleteButton.show();
              }
            })
        '}]
    [{else}]
        [{foreach from=$aUserAddresses item=address name="shippingAdresses"}]
            <button id="oegdprbase-delete-shipping-address-button-[{$address->oxaddress__oxid->value}]" class="btn btn-danger btn-xs hasTooltip pull-right dd-action oegdprbase-delete-shipping-address-button"
                    title="[{oxmultilang ident="OEGDPRBASE_DELETE"}]"
                    data-toggle="modal"
                    data-target="#delete_shipping_address_[{$address->oxaddress__oxid->value}]">
                <i class="fa fa-trash"></i>
            </button>
        [{/foreach}]

        [{oxscript add='
            var activeButton = $("#shippingAddress .active");
            var editButton = activeButton.parent().parent().find(".dd-edit-shipping-address");
            var activeAddressId = activeButton.find("input[name=oxaddressid]").val();
            var deleteButton = $("#oegdprbase-delete-shipping-address-button-"+activeAddressId+"");
            deleteButton.show();
            editButton.after(deleteButton);
            $( ".dd-add-delivery-address" ).click( function() {  $(".oegdprbase-delete-shipping-address-button").hide(); } );
        '}]
    [{/if}]
[{/block}]
