var isbnSearcher = angular.module('isbnSearcher',['ui.router']);

var results_books = `

 <div class="panel-heading">Results -> Books</div>

                  <div class="panel-body" ng-repeat='book in $result.data'>
                     <table class="table table-striped table-condensed table-hover">
                      <thead>
                        <th>Property</th>
                        <th>Value</th>
                      </thead>
                      <tbody>
                        <tr><td>ISBN - 13</td><td>{{book.isbn13}}</td></tr>
                        <tr>
                          <td>TITLE</td>
                          <td class="btn btn-warning" title="Click to see book preview" ng-click="preview(book.isbn13)">{{book.title}}</td>
                        </tr>
                        <tr><td>TITLE (LATIN)</td><td>{{book.title_latin}}</td></tr>
                        <tr><td>AWARDS (TEXT)</td><td>{{books.awards_text}}</td></tr>
                        <tr><td>EDITION INFORMATION</td><td>{{book.edition_info}}</td></tr>
                        <tr>
                          <td>AUTHOR(S) INFO</td>
                          <td>
                            <p ng-repeat='author in book.author_data'>
                              {{author.name}}    
                            </p>
                          </td>
                        </tr>
                        <tr>
                          <td>PUBLISHER NAME</td>
                          <td>{{book.publisher_name}}</td>
                        </tr>
                        <tr>
                          <td>BOOK ID</td>
                          <td>{{book.book_id}}</td>
                        </tr>
                      </tbody>
                     </table>
                      
                  </div>`;

var results_authors = `

<div class="panel-heading">Results -> Authors</div>
  
 <div class="panel-body" ng-repeat="author in $result.data">
                     <table class="table table-striped table-condensed table-hover">
                      <thead>
                        <th>Property</th>
                        <th>Value</th>
                      </thead>
                      <tbody>
                       <tr>
                         <td>Name</td>
                         <td>{{author.name}}</td>
                       </tr>
                       <tr>
                         <td>Books count</td>
                         <td>{{author.book_count}}</td>
                       </tr>
                       <tr>
                         <td>Books (ID)</td>
                         <td>
                           <p ng-click="search2('books',book_id)" ng-repeat="book_id in author.book_ids track by $index"><a>{{book_id}}</a></p>
                         </td>
                       </tr>
                      </tbody>
                     </table>
                     </div>`;

var results_subjects = `
                  <div class="panel-heading">Results -> Subjects</div>

                  <div class="panel-body" ng-repeat="subject in $result.data">
                                      <table class="table table-striped table-condensed table-hover">
                                       <thead>
                                         <th>Property</th>
                                         <th>Value</th>
                                       </thead>
                                       <tbody>
                                        <tr>
                                          <td>Subject</td>
                                          <td>{{subject.name}}</td>
                                        </tr>
                                        <tr>
                                          <td>Books count</td>
                                          <td>{{subject.books_count}}</td>
                                        </tr>
                                        <tr>
                                          <td>Books (ID)</td>
                                          <td>
                                            <p ng-repeat="book_id in subject.book_ids track by $index">{{book_id}}</p>
                                          </td>
                                        </tr>
                                       </tbody>
                                      </table>
                                      </div>
`;

var results_categories = `
                  <div class="panel-heading">Results -> Categories</div>

                  <div class="panel-body" ng-repeat="category in $result.data">
                                      <table class="table table-striped table-condensed table-hover">
                                       <thead>
                                         <th>Property</th>
                                         <th>Value</th>
                                       </thead>
                                       <tbody>
                                        <tr>
                                          <td>Name</td>
                                          <td>{{category.name}}</td>
                                        </tr>
                                        <tr>
                                          <td>Parent</td>
                                          <td>{{category.parent_id}}</td>
                                        </tr>
                                        <tr>
                                          <td>Child (IDs)</td>
                                          <td>
                                            <p ng-repeat="child_id in category.child_ids track by $index">{{child_id}}</p>
                                          </td>
                                        </tr>
                                       </tbody>
                                      </table>
                                      </div>
`;
var results_publishers = `
                  <div class="panel-heading">Results -> Publishers</div>

                  <div class="panel-body" ng-repeat="publisher in $result.data">
                                      <table class="table table-striped table-condensed table-hover">
                                       <thead>
                                         <th>Property</th>
                                         <th>Value</th>
                                       </thead>
                                       <tbody>
                                        <tr>
                                          <td>Name</td>
                                          <td>{{publisher.name}}</td>
                                        </tr>
                                        <tr>
                                          <td>Location</td>
                                          <td>{{publisher.location}}</td>
                                        </tr>
                                        <tr>
                                          <td>Books count</td>
                                          <td>{{publisher.book_count}}</td>
                                        </tr>
                                        <tr>
                                          <td>Category (ID)</td>
                                          <td>
                                            <p ng-repeat="cat_id in publisher.category_ids track by $index">{{cat_id}}</p>
                                          </td>
                                        </tr>
                                       </tbody>
                                      </table>
                                      </div>
`;


var loading_template = `
                  <div class="panel-heading">Results -> Loading</div>

                  <div class="panel-body" >

                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <center> <img src="/res/images/492.gif" class="img img-responsive"></center>
                      </div>
                    </div>
                                     
                  </div>
`;
isbnSearcher.config(function($stateProvider, $urlRouterProvider) {
  //
  // For any unmatched url, redirect to /home
  // $urlRouterProvider.otherwise("/home");
  //
  // Now set up the states
  $stateProvider
    .state('books', {
      
      template: results_books
    })
    .state('authors', {
      template: results_authors
      
    })
    .state('subjects', {
      template: results_subjects
    })
    .state('categories', {
      template: results_categories
    })
    .state('publishers', {
      template: results_publishers
    })
    .state('loading',{
      template: loading_template
    });
});

isbnSearcher.run(['$state','$stateParams','$rootScope',function($state,$stateParams,$rootScope){
	$rootScope.$state = 'hello';
	$rootScope.$stateParams = $stateParams;
	$rootScope.title = 'CossaBios';
	$rootScope.gotoSuccess = function(){
		console.log($rootScope.server_success);
		if($rootScope.server_success == "1"){
			$state.go('success',$stateParams);
		}
	}
}]);

function create_path(uri){
	var path = `${$('site_uri').attr('value')}/commander/${uri}`;
	console.log(path);
	return path;

}

function errorCB(response){
	console.log('Error');
	console.log(response.data);
}

function successCB(rootScope,response){
	console.log(response.data);
	rootScope.modalMessage = response.data;
	$('#modal').modal();
}

function serverSuccessTemplate(){
	return `<div class="container">
	<div class="jumbotron">
		<p ng-repeat='msg in server_msg'>{{msg}}</p>
	</div>
</div>`;
}



// $(function () {
//   $('[data-toggle="tooltip"]').tooltip()
// });

