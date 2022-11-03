<?php
echo $this->Html->script(
    [
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
    ],
    ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build('/api/countries');
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Countries/index', ['block' => 'scriptBottom']);
?>

<div ng-app="app" ng-controller="CountryCRUDCtrl">
    <table>
        <tr>
            <td width="100">ID:</td>
            <td><input type="text" id="id" ng-model="country.id" /></td>
        </tr>
        <tr>
            <td width="100">Nom:</td>
            <td><input type="text" id="country" ng-model="country.country" /></td>
        </tr>
    </table>
    <br /> <br />
    <a ng-click="getCountry(country.id)"> [Get Country] </a>
    <a ng-click="updateCountry(country.id, country.country)"> [Update Country] </a>
    <a ng-click="addCountry(country.country)"> [Add Country] </a>
    <a ng-click="deleteCountry(country.id)"> [Delete Country] </a>

    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <br />
    <br />
    <a ng-click="getAllCountries()">[Get all Countries]</a><br />
    <br /> <br />
    <div ng-repeat="country in countries">
        {{country.id}} {{country.country}}
    </div>
    <!-- pre ng-show='krajRegions'>{{krajRegions | json }}</pre-->
</div>