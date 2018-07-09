// var app = angular.module('myApp', ['ngRoute','ui.bootstrap']);

    var app  = angular.module('myApp', ['ngRoute','ui.bootstrap',"ngJsonExportExcel"], function($locationProvider, $interpolateProvider) {
        // $locationProvider.html5Mode({
        //   enabled: true,
        //   requireBase: false
        // });
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

    app.directive('fileReader', function() {
      return {
        scope: {
          fileReader:"="
        },
        link: function(scope, element) {
          $(element).on('change', function(changeEvent) {
            var files = changeEvent.target.files;
            if (files.length) {
              var r = new FileReader();
              r.onload = function(e) {
                  var contents = e.target.result;
                  scope.$apply(function () {
                    scope.fileReader = contents;
                  });
              };
              
              r.readAsText(files[0]);
            }
          });
        }
      };
    });



    app.controller('HomePageCtrl', function($scope,$location,$window, $http, $interval, $routeParams,$uibModal, $log, $filter, $document) {
 


        $scope.changed = function () {
          $log.log('Time changed to: ' + $scope.mytime);
        };


        $scope.open1 = function() {
          $scope.popup1.opened = true;
        };

       $scope.popup1 = {
          opened: false
        };

        $scope.mytime = $scope.date;//new Date();

        $scope.formats = ['dd-MM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = $scope.formats[0];

                  $scope.load_page = function(){
                  }
                  $scope.load_page();
      });




    app.controller('SubjectResultsPageCtrl', function($scope,$location,$window, $http, $interval, $routeParams,$uibModal, $log, $filter, $document) {
 
         $scope.dataList = [];
         $scope.uploading_csv = false;
         $scope.submitting_results = false;
         $scope.submitted = false;
         
         $scope.dataList2 = [];
         $scope.uploading_csv2 = false;
         $scope.submitting_results2 = false;
         $scope.submitted2 = false;

        $scope.CSVToArray = function(strData, strDelimiter) {
            // Check to see if the delimiter is defined. If not,
            // then default to comma.
            strDelimiter = (strDelimiter || ",");
            // Create a regular expression to parse the CSV values.
            var objPattern = new RegExp((
            // Delimiters.
            "(\\" + strDelimiter + "|\\r?\\n|\\r|^)" +
            // Quoted fields.
            "(?:\"([^\"]*(?:\"\"[^\"]*)*)\"|" +
            // Standard fields.
            "([^\"\\" + strDelimiter + "\\r\\n]*))"), "gi");
            // Create an array to hold our data. Give the array
            // a default empty first row.
            var arrData = [[]];
            // Create an array to hold our individual pattern
            // matching groups.
            var arrMatches = null;
            // Keep looping over the regular expression matches
            // until we can no longer find a match.
            while (arrMatches = objPattern.exec(strData)) {
                // Get the delimiter that was found.
                var strMatchedDelimiter = arrMatches[1];
                // Check to see if the given delimiter has a length
                // (is not the start of string) and if it matches
                // field delimiter. If id does not, then we know
                // that this delimiter is a row delimiter.
                if (strMatchedDelimiter.length && (strMatchedDelimiter != strDelimiter)) {
                    // Since we have reached a new row of data,
                    // add an empty row to our data array.
                    arrData.push([]);
                }
                // Now that we have our delimiter out of the way,
                // let's check to see which kind of value we
                // captured (quoted or unquoted).
                if (arrMatches[2]) {
                    // We found a quoted value. When we capture
                    // this value, unescape any double quotes.
                    var strMatchedValue = arrMatches[2].replace(
                    new RegExp("\"\"", "g"), "\"");
                } else {
                    // We found a non-quoted value.
                    var strMatchedValue = arrMatches[3];
                }
                // Now that we have our value string, let's add
                // it to the data array.
                arrData[arrData.length - 1].push(strMatchedValue);
            }
            // Return the parsed data.
            return (arrData);
        }

        $scope.CSV2JSON = function(csv) {
            var array = $scope.CSVToArray(csv);
            var objArray = [];
            for (var i = 1; i < array.length; i++) {
                objArray[i - 1] = {};
                for (var k = 0; k < array[0].length && k < array[i].length; k++) {
                    var key = array[0][k];
                    objArray[i - 1][key] = array[i][k]
                }
            }

            var json = JSON.stringify(objArray);
            var str = json.replace(/},/g, "},\r\n");

            return str;
        }
        
        $scope.toggleUpload = function(){
          if($scope.uploading_csv){
            $scope.uploading_csv = false;
          }else{
            $scope.uploading_csv = true;
          }
        }
        
        $scope.toggleUpload2 = function(){
          if($scope.uploading_csv2){
            $scope.uploading_csv2 = false;
          }else{
            $scope.uploading_csv2 = true;
          }
        }

        $scope.convert = function(f){
          var r = $scope.CSVToArray(f);
          var s = $scope.CSV2JSON(f);
          // console.log(r);
           $scope.uploaded_results = JSON.parse(s);
          // $scope.addResults(JSON.parse(s));
        }


        $scope.convert2 = function(f){
          var r = $scope.CSVToArray(f);
          var s = $scope.CSV2JSON(f);
          // console.log(r);
           $scope.uploaded_results2 = JSON.parse(s);
          // $scope.addResults(JSON.parse(s));
        }

        $scope.addResults = function(){

          var data = []
         $scope.submitting_results = true;

          angular.forEach($scope.uploaded_results, function(student){
            if(student.studentID && student.score){
              data.push({'student_id' : student.studentID, 'score' : student.score})
            }
          });

          var url = '/api/submit-subject-results?' + '&c=' + $scope.response.class.id + "&s=" + $scope.response.subject.id;

          // console.log(data);
          $http({
                  url: url,
                  method: "POST",
                  headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                  data: { "results" : data, }
              })
              .success(function(response) {
                     if(response.status == 'successful'){
                       $scope.submitted = true;
                      $scope.loadResults();
                     }
                 $scope.submitting_results = false;

              });
        }


        $scope.addResults2 = function(){

          var data = []
         $scope.submitting_results2 = true;

          angular.forEach($scope.uploaded_results2, function(student){
            if(student.studentID && student.score){
              data.push({'student_id' : student.studentID, 'score' : student.score})
            }
          });

          var url = '/api/submit-subject-assessment-results?' + '&c=' + $scope.response.class.id + "&s=" + $scope.response.subject.id;

          // console.log(data);
          $http({
                  url: url,
                  method: "POST",
                  headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                  data: { "results" : data, }
              })
              .success(function(response) {
                     if(response.status == 'successful'){
                       $scope.submitted2 = true;
                      $scope.loadResults();
                     }
                 $scope.submitting_results2 = false;

              });
        }

        $scope.loadResults = function(){

              $http.get('/api/get-subject-results?'+ "&c=" + G_C + "&s=" + G_S).success(function(response){
                    $scope.results = response.results;
                    $scope.assessments_results = response.assessments_results;
              });
          
        }

        $scope.loadStudents = function(){

              $http.get('/api/get-class-students?'+ "&c=" + G_C + "&s=" + G_S).success(function(response){
                    $scope.response = response;
                    
                    // get exam results
                    angular.forEach(response.students, function(student){
                         var score = null;
                        angular.forEach(response.results, function(result){
                          if(result.student_id == student.id){
                            score = result.score;
                          }

                        });

                          if(score){
                             $scope.dataList.push({'student_id' : student.id, 'name' : student.firstname + ' ' + student.lastname, 'score' : score})
                          }else{
                            $scope.dataList.push({'student_id' : student.id, 'name' : student.firstname + ' ' + student.lastname, 'score' : ''})
                          }

                    });
                    
                    // get assessment results
                    angular.forEach(response.students, function(student){
                         var score = null;
                        angular.forEach(response.assessments_results, function(result){
                          if(result.student_id == student.id){
                            score = result.score;
                          }

                        });

                          if(score){
                             $scope.dataList2.push({'student_id' : student.id, 'name' : student.firstname + ' ' + student.lastname, 'score' : score})
                          }else{
                            $scope.dataList2.push({'student_id' : student.id, 'name' : student.firstname + ' ' + student.lastname, 'score' : ''})
                          }
                    });

              });

          // angular.forEach(response.results, function(result){
                        //   if(result.student_id == student.id){
                        //     var score = result.score;
                        //   }
                        //   if(score){
                        //      $scope.dataList.push({'student_id' : student.id, 'name' : student.firstname + ' ' + student.lastname, 'score' : score})
                        //   }else{
                        //     $scope.dataList.push({'student_id' : student.id, 'name' : student.firstname + ' ' + student.lastname, 'score' : ''})
                        //   }


                        // });
        }

          $scope.load_page = function(){
            $scope.loadStudents();
            $scope.loadResults();
          }

        $scope.load_page();
     });






