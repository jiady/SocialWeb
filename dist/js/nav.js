/**
 * Created by erica_he on 14-12-1.
 */

angular.module('sjtuShare')
    .controller('NavCtrl', ['$scope', 'NavService', function($scope, NavService) {
        'use strict';

    }])
    .service('NavService', ['$http', function($http) {
        'use strict';
        $http.get('http://localhost/share/index.php/signup/check_session')
            .success(function(data) {
                if(data.state == 'success') {

                }
            })
    }]);