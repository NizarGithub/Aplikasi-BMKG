/**
* @Author: Rizki Mufrizal <rizki>
* @Date:   2016-03-27T11:44:28+07:00
* @Email:  mufrizalrizki@gmail.com
* @Last modified by:   rizki
* @Last modified time: 2016-03-27T15:53:02+07:00
* @License: apache2
*/

angular.module('bmkg')
  .controller('GempaController', function($scope, AppService) {

    $scope.dataGempa = {};

    function getGempa() {
      AppService.getGempa().success(function(data) {
        $scope.dataGempa = data.gempa[0];
        $scope.longitude = data.gempa[0].point.coordinates.split(",")[0];
        $scope.latitude = data.gempa[0].point.coordinates.split(",")[1];
        console.log($scope.longitude);
      });
    }

    getGempa();

  });
