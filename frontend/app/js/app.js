'use strict';

/* App Module */

angular.module('dashboard', ['phonecatFilters', 'phonecatServices']).
  config(['$routeProvider', 
  function($routeProvider) {
	  $routeProvider.
	      when('/phones', {
	      	templateUrl: 'partials/phone-list.html',
	      	controller: PhoneListCtrl}).
	      when('/phones/:phoneId', {
	      	templateUrl: 'partials/phone-detail.html', 
	      	controller: PhoneDetailCtrl}).
	      

	      when('/home', {
	      	templateUrl: 'partials/home.html',
	      	controller: HomeListCtrl}).
	      when('/moodle', {
	      	templateUrl: 'partials/moodle.html',
	      	controller: MoodleListCtrl}).
	       when('/gmail', {
	      	templateUrl: 'partials/gmail.html',
	      	controller: GmailListCtrl}).
	       when('/samahan', {
	      	templateUrl: 'partials/samahan.html',
	      	controller: SamahanListCtrl}).
	       when('/insite', {
	      	templateUrl: 'partials/insite.html',
	      	controller: InsiteListCtrl}).
	      otherwise({redirectTo: '/phones'});
}]);
