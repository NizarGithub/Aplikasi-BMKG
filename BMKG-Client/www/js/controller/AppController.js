/**
* @Author: Rizki Mufrizal <rizki>
* @Date:   2016-03-17T21:29:48+07:00
* @Email:  mufrizalrizki@gmail.com
* @Last modified by:   rizki
* @Last modified time: 2016-03-26T23:19:51+07:00
* @License: apache2
*/

angular.module('bmkg')
  .controller('AppController', ['$scope', 'AppService', function($scope, AppService) {

    $scope.dataCuaca = {};
    $scope.tanggal = {};
    $scope.url = 'http://127.0.0.1/BMKG-Server/assets/img/';

    function getCuaca() {
      AppService.getCuaca().success(function(data) {
        $scope.dataCuaca = data.content;
        $scope.tanggal = data.tanggal;
      });
    }

    getCuaca();

  }]);
