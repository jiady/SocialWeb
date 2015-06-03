/**
 * Created by erica_he on 14-11-30.
 */

angular.module('sjtuShare')
    .controller('LoginCtrl', ['$scope', '$timeout', 'LoginService', 'User', function ($scope, $timeout, LoginService, User) {
        'use strict';
        $scope.loginTab = true;
        $scope.signInTab = false;
        $scope.wrongEmail = false;
        $scope.email = '';
        $scope.password = '';
        $scope.user_name = '';
        $scope.user_sex = 0;
        $scope.user_department = '';
        $scope.user_major = '';
        $scope.msg = '';
        $scope.logoutMsg = 'lalala';
        $scope.success = false;
        $scope.fail = false;

        $scope.login = login;
        $scope.signIn = signIn;
        $scope.getUserMajors = getUserMajors;
        $scope.checkEmail = checkEmail;
        $scope.checkPassword = checkPassword;
        $scope.logout = logout;

        function login() {
            LoginService.login($scope.email, $scope.password)
                .then(function (data) {
                    if (data.state == 'success') {
                        $scope.msg = '登录成功';
                        $scope.success = true;
                        $scope.fail = false;
                    } else {
                        $scope.msg = '邮箱或密码错误';
                        $scope.success = false;
                        $scope.fail = true;
                    }
                }, function () {
                    $scope.msg = '网络错误或服务器异常';
                    $scope.success = false;
                    $scope.fail = true;
                });
            $timeout(function () {
                $('#loginModal').modal('hide');
                window.location.reload();
            }, 1500);
        }

        function signIn() {
            LoginService.signIn($scope.email, $scope.password, $scope.user_name, $scope.user_sex,
                    $scope.user_department, $scope.user_major)
                .then(function (data) {
                    if (data.state == 'success') {
                        $scope.msg = '登录成功';
                        $scope.success = true;
                        $scope.fail = false;
                        $scope.isLogin = true;
                    } else {
                        $scope.msg = data.detail;
                        $scope.success = false;
                        $scope.fail = true;
                    }
                }, function () {
                    $scope.msg = '网络错误或服务器异常';
                    $scope.success = false;
                    $scope.fail = true;
                });
            $timeout(function () {
                $('#loginModal').modal('hide');
                window.location.reload();
            }, 1500);
        }

        function getUserMajors() {
            console.log($scope.user_department);
            LoginService.getUserMajors($scope.user_department)
                .then(function (data) {
                    $scope.allUserMajors = data;
                    console.log($scope.allUserMajors);
                });
        }

        function checkEmail() {
            LoginService.checkEmail($scope.email)
                .then(function (data) {
                    $scope.wrongEmail = !(data.state == 'success');
                })
        }

        function checkPassword() {

        }

        function logout() {
            LoginService.logout().then(function(data) {
                $scope.logoutMsg = data.state;
                console.log($scope.logoutMsg);
                $('#logoutModal').modal('show');
                $timeout(function () {
                    $('#logoutModal').modal('hide');
                    window.location.reload();
                }, 1000);
            })
        }
    }])
    .service('LoginService', ['$q', '$http', function ($q, $http) {
        'use strict';

        function login(email, password) {
            var d = $q.defer();
            var apiUrl = 'http://localhost/share/index.php/log/login';
            var postData = {
                email: email,
                password: password
            };
            console.log(postData);
            $http.post(apiUrl, postData)
                .success(function (data) {
                    d.resolve(data);
                    console.log(data);
                })
                .error(function () {
                    console.log('fail to receive data!');
                    d.reject();
                });
            return d.promise;
        }

        function signIn(email, password, name, sex, department, major) {
            var d = $q.defer();
            var apiUrl = 'http://localhost/share/index.php/signup/basic';
            var postData = {
                email: email,
                password: password,
                user_name: name,
                sex: sex,
                department_id: department,
                major_id: major
            };
            console.log(postData);
            $http.post(apiUrl, postData)
                .success(function (data) {
                    d.resolve(data);
                })
                .error(function () {
                    console.log('fail to receive data!');
                    d.reject();
                });
            return d.promise;
        }

        function getUserMajors(departmentId) {
            var d = $q.defer();
            console.log(departmentId);
            var postData = {
                department_id: departmentId
            };
//            postData = JSON.stringify(postData);
            console.log(postData);
            $http.post('http://localhost/share/index.php/public_function/major_list', postData)
                .success(function (data) {
                    if (data) {
                        d.resolve(data);
                        console.log('success');
                        console.log(data);
                    } else {
                        d.reject();
                        console.log('data is empty!');
                    }
                })
                .error(function (data) {
                    console.log('error in list department', data, status);
                    d.reject();
                });
            return d.promise;
        }

        function checkEmail(email) {
            var d = $q.defer();
            var apiUrl = 'http://localhost/share/index.php/signup/check_email';
            var postData = {
                email: email
            };
            $http.post(apiUrl, postData)
                .success(function (data) {
                    d.resolve(data);
                })
                .error(function () {
                    console.log('fail to receive data!');
                    d.reject();
                });
            return d.promise;
        }

        function logout() {
            var d = $q.defer();
            var apiUrl = 'http://localhost/share/index.php/log/logout';
            $http.get(apiUrl)
                .success(function(data) {
                    if(data.state == 'success') {
                        data.state = '登出成功';
                        d.resolve(data);
                    } else {
                        data.state = '登出失败';
                        d.resolve(data);
                    }
                })
                .error(function(data) {
                    data.state = '登出失败，请检查网络设置';
                    d.reject(data);
                });
            return d.promise;
        }

        return {
            login: login,
            signIn: signIn,
            getUserMajors: getUserMajors,
            checkEmail: checkEmail,
            logout: logout
        };
    }]);