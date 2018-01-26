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
	$scope.editData=false;
	$scope.Id;
	$scope.delId;
	$scope.delName;
	// function get list of tenant
	console.log($scope.editData);

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
	$scope.deleteTenant = function(idToDel){
		
		$http.get("product-del.php",{params: {del : idToDel}})
		.then(function (response) {
			console.log(response.data);
			$scope.getTenant();
		});
	};


	
	//function save tenant	
	$scope.saveTenant = function(){
		console.log($scope.editData)
	if ($scope.editData==false)	{
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
	}else{
		$http.post('product-edit.php',{
			Id: $scope.Id,
			Name: $scope.Name,
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
		  $scope.editData = false;
   
		  });


	}		  
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

	$scope.cancelEdit = function(){
		$scope.emptyForm();
		$scope.editData = false;

	};
	
	$scope.editTenant = function(tId){
		
		$scope.editData = true;
		console.log($scope.editData);
		$http.get("product.php",{params:{id:tId}})
		.then(function (response) {			
			   $scope.tData = response.data.records;
				console.log($scope.tData);
				var data = angular.fromJson($scope.tData);

				$scope.Id = data[0].Id;
				$scope.Name = data[0].Name;
				$scope.Location= data[0].Location;
				$scope.Category= data[0].Category;
				$scope.Photo= data[0].Photo;
				$scope.Description= data[0].Description;
				$scope.Email= data[0].Email;
				$scope.Contact= data[0].Contact;
				$scope.Flag= data[0].Flag;				
		});
	};
	
});

