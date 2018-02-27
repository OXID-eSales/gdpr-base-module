[{block name="oegdprbase_account_delete_my_account_confirmation"}]
    <div class="modal fade"
         id="oegdprbase_delete_my_account_confirmation"
         tabindex="-1"
         role="dialog"
         aria-labelledby="oegdprbase_delete_my_account_modal_label"
         aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    [{block name="oegdprbase_account_delete_my_account_confirmation_header_message"}]
                    <span class="h4 modal-title">[{oxmultilang ident="OEGDPRBASE_DELETE_MY_ACCOUNT_CONFIRMATION_QUESTION"}]</span>
                    [{/block}]
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            [{block name="oegdprbase_account_delete_my_account_confirmation_warning_message"}]
                            <div class="alert alert-danger text-left">
                                [{oxmultilang ident="OEGDPRBASE_DELETE_MY_ACCOUNT_WARNING"}]
                            </div>
                            [{/block}]
                            [{block name="oegdprbase_account_delete_my_account_confirmation_form"}]
                            <form name="delete_my_account"
                                  action="[{$oViewConf->getSelfActionLink()}]"
                                  method="post">
                                <div class="hidden">
                                    [{$oViewConf->getHiddenSid()}]
                                    <input type="hidden" name="cl" value="account">
                                    <input type="hidden" name="fnc" value="oeGdprBaseDeleteAccount">
                                </div>
                                [{block name="oegdprbase_account_delete_my_account_confirmation_form_button_set"}]
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    [{oxmultilang ident="OEGDPRBASE_CANCEL_DELETE_ACCOUNT"}]
                                </button>
                                <button type="submit" class="btn btn-danger">
                                    [{oxmultilang ident="OEGDPRBASE_DELETE_ACCOUNT_CONFIRMATION"}]
                                </button>
                                [{/block}]
                            </form>
                            [{/block}]
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
[{/block}]
