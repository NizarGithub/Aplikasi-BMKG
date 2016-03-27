/**
* @Author: Rizki Mufrizal <rizki>
* @Date:   2016-03-17T21:29:31+07:00
* @Email:  mufrizalrizki@gmail.com
* @Last modified by:   rizki
* @Last modified time: 2016-03-27T11:13:44+07:00
* @License: apache2
*/

angular.module('bmkg')
  .factory('AppService', ['$http', function($http) {
    var baseUrl = 'http://192.168.2.116';

    return {
      getCuaca: function() {
        return $http.get(baseUrl + '/BMKG-Server/index.php/api/CuacaRestController/cuaca/');
      }
    }
  }]);
