var app = angular.module('myApp', ['ui.bootstrap']);

app.filter('beginning_data', function() {
    return function(input, begin) {
        if (input) {
            begin = +begin;
            return input.slice(begin);
        }
        return [];
    }
});

app.controller('TenantController', function($scope, $http,$timeout,$window) {
	$scope.names;
	$scope.loc;
	$scope.cat;
	$scope.Flag = 0;
    $scope.messageSuccess;
    $scope.tloc;
	// function get list of tenant


	$('.alert').hide();

	$scope.getTenant = function(){
		
		$http.get("product.php?list")
		.then(function (response) {
            $scope.file = response.data.records;
            $scope.current_grid = 1;
            $scope.data_limit = 5;
            $scope.filter_data = $scope.file.length;
            $scope.entire_user = $scope.file.length;
        
        });
	};

    $scope.page_position = function(page_number) {
        $scope.current_grid = page_number;
	};
	
    $scope.filter = function() {
        $timeout(function() {
            $scope.filter_data = $scope.searched.length;
        }, 20);
	};
	
    $scope.sort_with = function(base) {
        $scope.base = base;
        $scope.reverse = !$scope.reverse;
    };

	// function delete tenant
	$scope.deleteTenant = function(){
		$http.get("product.php")
		.then(function (response) {$scope.names = response.data.records;});
	};

	//function save tenant	
	$scope.saveTenant = function(){
		$http.post('product-save.php',{Name: $scope.Name,
				Location: $scope.Location,
				Category: $scope.Category,
				Photo: $scope.Photo,
				Description: $scope.Description,
				Email: $scope.Email,
				Contact: $scope.Contact,
				Flag: $scope.Flag})
		.then(function (response) {
			  $scope.getTenant();
			  $scope.messageSuccess= response.data;
			  $('.alert').show();
			  $scope.emptyForm();
		     
			  });
	};

	$scope.getLocation = function(){
		$http.get("product.php?loc")
        .then(function (response) {$scope.loc = response.data.records; });
        
     };
    
 	$scope.getCategory = function(){
		$http.get("product.php?cat")
		.then(function (response) {$scope.cat = response.data.records;});
	};

	$scope.emptyForm = function(){
		 		$scope.Name = "";
				$scope.Location="";
				$scope.Category="";
				$scope.Photo="";
				$scope.Description="";
				$scope.Email="";
				$scope.Contact="";
				$scope.Flag="";
	};

	$scope.editTenant = function(tId){
		console.log("terst");
		$http.get("product.php?id="+tId)
		.then(function (response) {
			$scope.tData = response.data.records;
				$scope.Name = $scope.tData.Name;
				$scope.Location= $scope.tData.Location;
				$scope.Category= $scope.tData.Category;
				$scope.Photo= $scope.tData.Photo;
				$scope.Description= $scope.tData.Description;
				$scope.Email= $scope.tData.Email;
				$scope.Contact= $scope.tData.Contact;
				$scope.Flag= $scope.tData.Flag;
		});
	};
	
});

