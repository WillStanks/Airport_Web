var app = angular.module('linkedlists', []);

app.controller('ProvincesStatesController', function ($scope, $http){
    // L'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response){
        $scope.provincesStates = response.data.provincesStates;
    });
});
