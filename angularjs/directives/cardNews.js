app.directive('cardNews', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      info: '=',
      location2see: '=',
    }, 
    templateUrl: 'angularjs/directives/cardNews.html' 
  }; 
});