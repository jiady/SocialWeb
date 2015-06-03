/**
 * Created by erica_he on 14-11-24.
 */

angular.module('sjtuShare')
    .service('HomeService', ['$q', '$http', function ($q, $http) {
        function getDepartments() {
            var d = $q.defer();
            $http.get('http://localhost/share/index.php/public_function/department_list')
                .success(function (data) {
                    if (data) {
                        d.resolve(data);
                        console.log('success');
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

        function getMajors(departmentId) {
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

        function getCourses(departmentId, majorId, year, semester) {
            var d = $q.defer();
            console.log(departmentId);
            var postData = {
                department_id: departmentId,
                major_id: majorId,
                year: year,
                semester: semester,
                limit: 10,
                offset: 0
            };
//            postData = JSON.stringify(postData);
            console.log(postData);
            $http.post('http://localhost/share/index.php/home/department', postData)
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

        return {
            getDepartments: getDepartments,
            getMajors: getMajors,
            getCourses: getCourses
        };
    }]);
