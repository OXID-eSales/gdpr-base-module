$(function () {
    var deleteButton = $('.oegdprbase_delete_review_and_rating_button');
    var deleteConfirmationButton = $('#oegdprbase_account_delete_review_and_rating_confirmation_button');

    deleteButton.on('click', function () {
        var confirmationModalId = $(this).attr("data-target");
        var confirmationModal = $('#' + confirmationModalId);
        var ratingId = $(this).attr("data-ratingId");
        var reviewId = $(this).attr("data-reviewId");

        $('#oegdprbaseRatingId').val(ratingId);
        $('#oegdprbaseReviewId').val(reviewId);
        confirmationModal.oxModalPopup({
            target: '#' + confirmationModalId,
            openDialog: true,
            width: 'auto'
        });
        confirmationModal.dialog('open');
    });

    deleteConfirmationButton.on('click', function () {
        $('#oegdprbase_account_delete_review_and_rating').submit();
    });
});
