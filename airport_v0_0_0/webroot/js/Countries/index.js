var app = angular.module('app', []);

var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('CountryCrudJwtCtrl', ['$scope', 'CountryCrudJwtService', function ($scope, CountryCrudJwtService) {

    $scope.updateCountry = function () {
        CountryCrudJwtService.updateCountry($scope.country.id, $scope.country.country)
            .then(function success(response) {
                $scope.message = 'Country data updated!';
                $scope.errorMessage = '';
                // Rafraichir la liste
                $scope.getAllCountries();
            },
                function error(response) {
                    $scope.errorMessage = 'Error updating Country!';
                    $scope.message = '';
                });
    }

    $scope.getCountry = function (id) {
        CountryCrudJwtService.getCountry(id)
            .then(function success(response) {
                $scope.country = response.data.country;
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
            CountryCrudJwtService.addCountry($scope.country.country)
                .then(function success(response) {
                    $scope.message = 'Country added!';
                    $scope.errorMessage = '';
                    // Rafraichir la liste
                    $scope.getAllCountries();
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
        CountryCrudJwtService.deleteCountry($scope.country.id)
            .then(function success(response) {
                $scope.message = 'Country deleted!';
                $scope.country = null;
                $scope.errorMessage = '';
                // Rafraichir la liste
                $scope.getAllCountries();
            },
                function error(response) {
                    $scope.errorMessage = 'Error deleting country!';
                    $scope.message = '';
                })
    }

    $scope.getAllCountries = function () {
        CountryCrudJwtService.getAllCountries()
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

    $scope.login = function () {
        if ($scope.user != null && $scope.user.username) {
            KrajRegionCrudJwtService.login($scope.user)
                    .then(function success(response) {
                        $scope.message = $scope.user.username + ' en session!';
                        $scope.errorMessage = '';
                        localStorage.setItem('token', response.data.data.token.jwt);
                        localStorage.setItem('user_id', response.data.data.id);
                    },
                            function error(response) {
                                $scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide...';
                                $scope.message = '';
                            });
        } else {
            $scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
            $scope.message = '';
        }

    }
    $scope.logout = function () {
        localStorage.setItem('token', "no token");
        localStorage.setItem('user', "no user");
        $scope.message = '';
        $scope.errorMessage = 'Utilisateur déconnecté!';
    }
    $scope.changePassword = function () {
        KrajRegionCrudJwtService.changePassword($scope.user.password)
                .then(function success(response) {
                    $scope.message = 'Mot de passe mis à jour!';
                    $scope.errorMessage = '';
                },
                        function error(response) {
                            $scope.errorMessage = 'Mot de passe inchangé!';
                            $scope.message = '';
                        });
    }

}]);

app.service('CountryCrudJwtService', ['$http', function ($http) {

    this.getCountry = function getCountry(countryId) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + countryId,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Authorization': localStorage.getItem("token")
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
                'Accept': 'application/json',
                'Authorization': localStorage.getItem("token")
            }
        });
    }

    this.deleteCountry = function deleteCountry(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Authorization': localStorage.getItem("token")
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
                'Accept': 'application/json',
                'Authorization': localStorage.getItem("token")
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

    this.login = function login(user) {
        return $http({
            method: 'POST',
            url: urlToRestApiUsers + '/token',
            data: {username: user.username, password: user.password},
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'}
        });
    }
    this.changePassword = function changePassword(password) {
        return $http({
            method: 'PATCH',
            url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
            data: {password: password},
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Authorization': localStorage.getItem("token")
            }
        })
    }

}]);


