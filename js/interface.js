
//--------------------------------------------------------------------------------------------------------- Filter by letters
function showGroup(element) {

    removeShowing();
    //Get
    var clickedButtonName = element.innerHTML;
    clickedButtonName = clickedButtonName.charAt(0).toUpperCase() + clickedButtonName.slice(1);

    var groupToSwitch = $('[data-group-wrapper^="' + clickedButtonName + '"]');
    var subElementsToSwitch = $('[data-group-element^="' + clickedButtonName + '"]');

    //set
    groupToSwitch.addClass('show');
    subElementsToSwitch.addClass('show');

}

function removeShowing() {

    var groupToSwitch = $('[data-group-wrapper]');
    var subElementsToSwitch = $('[data-group-element]');

    groupToSwitch.each(function () {
        $(this).removeClass('show');
    });

    subElementsToSwitch.each(function () {
        $(this).removeClass('show');
    });
}

//--------------------------------------------------------------------------------------------------------- Filter by types
function filterSwap(element) {

    var bindedMenuID = $(element).data('structure-connection');
    var bindedMenu = $('#' + bindedMenuID);

    var opositeMenuID = $(element).data('opposite-connection');
    var opositeMenu = $('#' + opositeMenuID);

    bindedMenu.addClass('showMenu');
    opositeMenu.removeClass('showMenu');
}