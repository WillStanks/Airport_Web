var app = angular.module('linkedlists', []);

app.controller('CountriesController', function ($scope, $http) {
    // L'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.countries = response.data.countries;
    });

    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.countries = response.data.countries;
        angular.forEach($scope.countries, function (country) {
            angular.forEach(country.provinces_states, function (province) {
                if (province.id == $scope.provinceStateId) {
                    $scope.country = country;
                    $scope.province = province;
                }
            });
        });
    });
});
