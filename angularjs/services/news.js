app.factory('news', ['$http', function($http) { 
  return $http.get('./data.json?'+ (new Date().toLocaleString().replace(' ','_')) ) 
            .success(function(data) {
              console.log("Data loaded");
              return data; 
            }) 
            .error(function(err) {
              console.log(err);
              return err; 
            }); 
}]);