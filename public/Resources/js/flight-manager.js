$(document).ready(function () {
    var reduction = $('#reduction');
    var points = $('#pointsUtilise');
    reduction.change(function () {
        if (this.checked) {
            points.prop('disabled', false);
            points.val(25);
        } else {
            points.prop('disabled', true);
            points.val('');
        }
    });
});