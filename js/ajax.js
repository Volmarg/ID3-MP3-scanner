
function refreshDatabaseInfo() {
    //sprawdz radioButton
    var sortRadio = $('input[name="sortType"]');
    var orderBy = "autor";

    sortRadio.each(function () {
        if ($(this).prop('checked') == true) {
            orderBy = this.value;
        }
    })
    // wywo³aj skrypt
    var ajax = new XMLHttpRequest();
    var folder = 'scripts/ajax/';
    var file = 'refreshDataFromDb.php?route=refresh&orderby=' + orderBy;

    ajax.open('GET', folder + file, false);
    ajax.send();

    var result = ajax.responseText;

    refreshPageContainer(result);

}

function scanDatabase() {
    var ajax = new XMLHttpRequest();
    var folder = 'scripts/ajax/';
    var file = 'refreshDataFromDb.php?route=scan';

    ajax.open('GET', folder + file, false);
    ajax.send();

    var result = ajax.responseText;
}

function refreshPageContainer(result) {
    var container = $('.allAlbums');
    container.html(result);
}
