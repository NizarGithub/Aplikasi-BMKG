/**
* @Author: Rizki Mufrizal <rizki>
* @Date:   2016-03-17T21:29:31+07:00
* @Email:  mufrizalrizki@gmail.com
* @Last modified by:   rizki
* @Last modified time: 2016-03-23T08:33:11+07:00
* @License: apache2
*/

angular.module('bmkg')
  .factory('AppService', ['$http', function($http) {
    return {
      getCuaca: function() {
        return $http.get('data/cuaca.xml');
      }
    }
  }]);
