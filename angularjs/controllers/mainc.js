app.controller('mainc', ['$scope', '$interval','news', function($scope, $interval, news) {
     	news.success(function(data) {
			$scope.noticias = data;
			$scope.secciones = data.map(item => item.location).filter( function(elem, index, self) { return index == self.indexOf(elem);});
			console.log($scope.secciones);
			$scope.seccionActual = $scope.secciones[0];
			console.log('1');
			//$('select').material_select();
			console.log('2');
		});
}]);