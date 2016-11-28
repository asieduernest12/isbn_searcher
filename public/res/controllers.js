	isbnSearcher.controller('searchCtrl',function($scope,$rootScope,$http,$state,$stateParams){


		$scope.search = function(type){
			$state.go('loading',$stateParams);
			var data = {type:type,
						query:encodeURI($('input[type=text]').val())
						};
			$http.post('/search',data).then(function(response){
				// console.log(response.data);
				console.log(response);
				$scope.$result = response.data;
				$state.go(type,$stateParams)
			},function(response){

			});
		}

		$scope.search2 = function(type,val){
			$state.go('loading',$stateParams);
			var data = {type:type,
						query:encodeURI(val)
						};
			$http.post('/search',data).then(function(response){
				// console.log(response.data);
				console.log(response);
				$scope.$result = response.data;
				$state.go(type,$stateParams)
			},function(response){

			});
		}
		
		$scope.GBS_preview = function(isbn){
			console.log(isbn);
		    var data = 'ISBN:' + isbn;
		    // GBS_insertPreviewButtonLink(data);
		    // GBS_insertPreviewButtonPopup('ISBN:0738531367');
		    GBS_insertEmbeddedViewer(data, 600, 800);
		}

		$scope.preview = function(isbn){
			console.log(isbn);
			var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
			$('#modal').modal('show');
			viewer.load('ISBN:'+isbn,notFound);
		}

		
		function notFound(){
		  $('#modal').modal('hide');
		  alert('Book not found');

		}

	});

	

