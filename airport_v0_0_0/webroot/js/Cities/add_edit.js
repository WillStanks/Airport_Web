var app = angular.module('linkedlists', []);

app.controller('CountriesController', function ($scope, $http) {
    // L'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.countries = response.data.countries;
    });
});
