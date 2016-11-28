@extends('layouts.app')

@section('content')
<div class="container" ng-controller='searchCtrl'>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="horizontal" name="searchForm">
                        <div class="form-group">
                             <input class="form-control" ng-model='search_string' type="text" placeholder="Enter search string [book] [title] [author]" required=""></input>
                        </div>
                        <legend>Search by</legend>
                       <div class="form-group" >
                           <button class="btn btn-success col-sm-4" ng-click="search('books')" ng-disabled="searchForm.$invalid">Books</button>
                           <button class="btn btn-primary col-sm-4" ng-click="search('authors')" ng-disabled="searchForm.$invalid">Authors</button>
                           <button class="btn btn-success col-sm-4" ng-click="search('subjects')" ng-disabled="searchForm.$invalid">Subjects</button>
                            <button class="btn btn-primary col-sm-4" ng-click="search('categories')" ng-disabled="searchForm.$invalid">Categories</button>
                            <button class="btn btn-primary col-sm-offset-4 col-sm-4" ng-click="search('publishers')" ng-disabled="searchForm.$invalid">Publishers</button>
                           <!-- <button class="btn btn-info">BOOKS</button> -->
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
               
               <div ui-view></div>
               
            </div>
        </div>
    </div>
</div>

<div class="container">
    
</div>
@endsection
