/**
* @Author: Rizki Mufrizal <rizki>
* @Date:   2016-03-17T21:29:48+07:00
* @Email:  mufrizalrizki@gmail.com
* @Last modified by:   rizki
* @Last modified time: 2016-03-17T21:56:03+07:00
* @License: apache2
*/

angular.module('bmkg')
  .controller('AppController', ['$scope', 'AppService', function($scope, AppService) {

    $scope.dataCuaca = {};
    $scope.tanggal = {};

    function getCuaca() {
      AppService.getCuaca().success(function(data) {
        $scope.dataCuaca = data.Cuaca.Isi.Row;
        $scope.tanggal.mulai = data.Cuaca.Tanggal.Mulai;
        $scope.tanggal.sampai = data.Cuaca.Tanggal.Sampai;
      });
    }

    getCuaca();

  }]);
