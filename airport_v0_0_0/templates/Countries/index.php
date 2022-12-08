<?php
echo $this->Html->script(
    [
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js',
        'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'
    ],
    ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build('/api/countries');
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Countries/index', ['block' => 'scriptBottom']);
?>

<div ng-app="app" ng-controller="CountryCrudJwtCtrl">
    <div id="example1"></div>
    <p style="color:red;">{{ captcha_status }}</p>
    <table>
        <tr>
            <td width="200">Utilisateur (username):</td>
            <td><input type="text" id="username" ng-model="user.username" /></td>
        </tr>
        <tr>
            <td width="200">Mot de passe (password):</td>
            <td><input type="text" id="password" ng-model="user.password" /></td>
        </tr>
        <tr>
            <a ng-click="login(user)">[Connexion] </a>
            <a ng-click="logout()">[Déconnexion] </a>
            <a ng-click="changePassword(user.password)">[Changer le mot de passe]</a>
        </tr>
    </table>
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>
    <table>
        <tr>
            <td><input type="hidden" id="id" ng-model="country.id" /></td>
        </tr>
        <tr>
            <td width="100">Nom du pays:</td>
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


    <br /> <br />

    <table class="hoverable bordered">
        <thead>
            <tr>
                <th class="text-align-center">ID</th>
                <th class="width-30-pct">Nom du pays</th>
                <th class="text-align-center">Actions</th>
            </tr>
        </thead>
        <tbody ng-init="getAllCountries()">
            <tr ng-repeat="country in countries| filter:search">
                <td class="text-align-center">{{country.id}}</td>
                <td>{{country.country}}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="getCountry(country.id)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteCountry(country.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>