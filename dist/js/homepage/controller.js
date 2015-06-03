/**
 * Created by erica_he on 14-11-24.
 */

angular.module('sjtuShare')
    .controller('HomeCtrl', ['$scope', 'HomeService', 'User', function ($scope, HomeService, User) {
        'use strict';

        $scope.getMajors = getMajors;
        $scope.getCourses = getCourses;

        init();

        function init() {
            $scope.course = {};
            $scope.allDepartments = [];
            $scope.allMajors = [];
            $scope.allCourses = [];
            $scope.departmentID = -1;
            $scope.majorID = -1;
            $scope.year = 0;
            $scope.semester = 0;

            User.isLogin().then(function(data) {
                $scope.isLogin = data.state;
                $scope.uid = data.uid;
                $scope.uname = data.user_name;
            });

            HomeService.getDepartments().then(function (data) {
                $scope.allDepartments = data;
                console.log($scope.allDepartments);
            });

        }

        function getMajors() {
            console.log($scope.departmentID);
            HomeService.getMajors($scope.departmentID)
                .then(function (data) {
                    $scope.allMajors = data;
                    console.log($scope.allMajors);
                });
        }

        function getCourses() {
            HomeService.getCourses($scope.departmentID, $scope.majorID, $scope.year, $scope.semester)
                .then(function (data) {
                    $scope.allCourses = data;
                    console.log($scope.allCourses);
                });
        }

    }]);


