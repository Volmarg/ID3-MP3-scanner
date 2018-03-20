(function () {

    var directivesApp = angular.module('directivesApp', []);

    directivesApp.directive('showTracks', function () {
        return {
            restrict: "E",
            controller: "controllListingButton",
            controllerAs: "controllListingButton",
            template: '<button class="icon">♫</button>'
        };
    })

    directivesApp.directive('showStructure', function () {
        return {
            restrict: "E",
            controller: "controllListingButton",
            controllerAs: "controllListingButton",
            template: '<button class="icon">📁</button>'
        };
    })

})()