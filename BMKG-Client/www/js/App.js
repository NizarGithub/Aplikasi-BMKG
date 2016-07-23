/**
* @Author: Rizki Mufrizal <rizki>
* @Date:   2016-03-17T16:59:22+07:00
* @Email:  mufrizalrizki@gmail.com
* @Last modified by:   rizki
* @Last modified time: 2016-03-27T11:58:05+07:00
* @License: apache2
*/

angular.module('bmkg', ['ionic', 'ngCordova', 'ngMap', 'angular-toArrayFilter', 'ionic-native-transitions'])

  .run(function($ionicPlatform) {
    $ionicPlatform.ready(function() {
      if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
        cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
        cordova.plugins.Keyboard.disableScroll(true);

      }
      if (window.StatusBar) {
        // org.apache.cordova.statusbar required
        StatusBar.styleDefault();
      }
    });
  })

  .config(function($stateProvider, $urlRouterProvider) {

    $stateProvider
      .state('tab', {
        url: '/tab',
        abstract: true,
        templateUrl: 'templates/tabs.html'
      })
      .state('tab.dash', {
        url: '/dash',
        nativeTransitions: {
          type: "slide",
          direction: "right",
          fixedPixelsTop: 93
        },
        views: {
          'tab-dash': {
            templateUrl: 'templates/dash.html',
            controller: 'AppController'
          }
        }
      })
      .state('tab.about', {
        url: '/about',
        nativeTransitions: {
          "type": "flip",
          "direction": "right",
          fixedPixelsTop: 93
        },
        views: {
          'tab-about': {
            templateUrl: 'templates/about.html'
          }
        }
      })
      .state('tab.gempa', {
        url: '/gempa',
        nativeTransitions: {
          type: "slide",
          direction: "left",
          fixedPixelsTop: 93
        },
        views: {
          'tab-gempa': {
            templateUrl: 'templates/gempa.html',
            controller: 'GempaController'
          }
        }
      });

    $urlRouterProvider.otherwise('/tab/dash');

  });
