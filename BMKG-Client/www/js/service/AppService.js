/**
* @Author: Rizki Mufrizal <rizki>
* @Date:   2016-03-17T21:29:31+07:00
* @Email:  mufrizalrizki@gmail.com
* @Last modified by:   rizki
* @Last modified time: 2016-03-26T23:01:45+07:00
* @License: apache2
*/

angular.module('bmkg')
  .factory('AppService', ['$http', function($http) {

    var baseUrl = 'http://127.0.0.1/';

    return {
      getCuaca: function() {
        return $http.get(baseUrl + 'BMKG-Server/index.php/api/CuacaRestController/cuaca');
      }
    }
  }]);
