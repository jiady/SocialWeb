/**
 * Created by erica_he on 14-12-1.
 */

angular.module('sjtuShare')
    .service('User', ['$q', '$http', function ($q, $http) {
        'use strict';
        function isLogin() {
            var d = $q.defer();
            var result = {
                state: false,
                uid: null,
                user_name: null
            };
            $http.get('http://localhost/share/index.php/signup/check_session')
                .success(function (data) {
                    if (data.state == 'success') {
                        result.state = true;
                        result.uid = data.uid;
                        result.user_name = data.user_name;
                        d.resolve(result);
                        console.log('is login');
                        console.log(result);
                    } else if (data.state == 'UnLogin') {
                        result.state = false;
                        result.uid = null;
                        result.user_name = null;
                        d.resolve(result);
                        console.log('not login');
                    }
                })
                .error(function () {
                    d.reject();
                    console.log('cannot check session!');
                });
            return d.promise;
        }

        function getUserInfo(uid) {
            var d = $q.defer();
            $http.post('http://localhost/share/index.php/myhome/info', uid)
                .success(function (data) {
                    if (data) {
                        d.resolve(data);
                        console.log('got user info');
                    } else {
                        d.reject();
                        console.log('fail to get user info');
                    }
                })
                .error(function (data) {
                    console.log('error in getting user info', data, status);
                    d.reject();
                });
            return d.promise;
        }

        return {
            isLogin: isLogin,
            getUserInfo: getUserInfo
        };
    }]);