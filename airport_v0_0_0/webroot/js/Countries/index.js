var app = angular.module('app', []);

app.controller('CountryCRUDCtrl', ['$scope', 'CountryCRUDService', function ($scope, CountryCRUDService) {

    $scope.updateCountry = function () {
        CountryCRUDService.updateCountry($scope.country.id, $scope.country.country)
            .then(function success(response) {
                $scope.message = 'Country data updated!';
                $scope.errorMessage = '';
            },
                function error(response) {
                    $scope.errorMessage = 'Error updating Country!';
                    $scope.message = '';
                });
    }

    $scope.getCountry = function () {
        var id = $scope.country.id;
        CountryCRUDService.getCountry($scope.country.id)
            .then(function success(response) {
                $scope.country = response.data.country;
                //                        $scope.country.id = id;
                $scope.message = '';
                $scope.errorMessage = '';
            },
                function error(response) {
                    $scope.message = '';
                    if (response.status === 404) {
                        $scope.errorMessage = 'Country not found!';
                    } else {
                        $scope.errorMessage = "Error getting country!";
                    }
                });
    }

    $scope.addCountry = function () {
        if ($scope.country != null && $scope.country.country) {
            CountryCRUDService.addCountry($scope.country.country)
                .then(function success(response) {
                    $scope.message = 'Country added!';
                    $scope.errorMessage = '';
                },
                    function error(response) {
                        $scope.errorMessage = 'Error adding country!';
                        $scope.message = '';
                    });
        } else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
    }

    $scope.deleteCountry = function () {
        CountryCRUDService.deleteCountry($scope.country.id)
            .then(function success(response) {
                $scope.message = 'Country deleted!';
                $scope.country = null;
                $scope.errorMessage = '';
            },
                function error(response) {
                    $scope.errorMessage = 'Error deleting country!';
                    $scope.message = '';
                })
    }

    $scope.getAllCountries = function () {
        CountryCRUDService.getAllCountries()
            .then(function success(response) {
                $scope.countries = response.data.countries;
                $scope.message = '';
                $scope.errorMessage = '';
            },
                function error(response) {
                    $scope.message = '';
                    $scope.errorMessage = 'Error getting countries!';
                });
    }

}]);

app.service('CountryCRUDService', ['$http', function ($http) {

    this.getCountry = function getCountry(countryId) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + countryId,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.addCountry = function addCountry(country) {
        return $http({
            method: 'POST',
            url: urlToRestApi,
            data: { country: country },
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.deleteCountry = function deleteCountry(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
    }

    this.updateCountry = function updateCountry(id, country) {
        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + id,
            data: { country: country },
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
    }

    this.getAllCountries = function getAllCountries() {
        return $http({
            method: 'GET',
            url: urlToRestApi,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

}]);


