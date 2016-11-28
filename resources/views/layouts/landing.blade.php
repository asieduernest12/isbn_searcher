@extends('layouts.master')

@section('title', 'ISBN-SEARCHER LANDING PAGE')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
   <div>
   	    <div class="jumbotron">
   	    	<center><h2>Welcome to <i>ISBN-SEARCHER</i></h2></center>  	
   	    </div>

   	    <div class="row">
   	    	<div class="col-md-6">
   	    		<form id="sign-in" name="inForm">
   		    		<legend>Sign-in</legend>
   	    			<div class="form-group">
   	    				<label>Email</label>
   	    				<input class="form-control" type='email' ng-model='signIN_email' placeholder="enter email" required=""></input>
   	    			</div>
   	    			<div class="form-group">
   	    				<label>Password</label>
   	    				<input class="form-control" type='password' ng-model='signIN_password' placeholder="enter password" required=""></input>
   	    			</div>

   	    			<div class="form-group">
   	    				<a href="" class="col-md-4 col-md-offset-8 btn btn-primary" ng-disabled='inForm.$invalid'>Sign-in</a>
   	    			</div>
   	    			data is here signUp_password :@{{signIN_password}} email : @{{signIN_email}}
   	    			inForm.$invalid @{{inForm.$invalid}}
   	    		</form>
   	    	</div>

   	    	<div class="col-md-6">
   	    		<form id="Sign-up" name="upForm">
   	    			<legend>Sign-up</legend>
   	    			<div class="form-group">
   	    				<label>Email</label>
   	    				<input class="form-control" type="email" ng-model='signUp_email' placeholder="enter email" required=""></input>
   	    			</div>
   	    			<div class="form-group">
   	    				<label>Password</label>
   	    				<input class="form-control" type="password" ng-model='signUp_password' placeholder="enter password" required=""></input>
   	    			</div>

   	    			<div class="form-group">
   	    				<label>Confirm password</label>
   	    				<input class="form-control" type="password" ng-model='signUp_confirm' placeholder="confirm password" required=""></input>
   	    				<p ng-show='upForm.signUp_password != upForm.signUp_confirm'>Passwords do not match</p>
   	    			</div>

   	    			<div class="form-group">
   	    				<a href="" class="col-md-4 col-md-offset-8 btn btn-primary" ng-disabled='passConfirm'>Sign-up</a>
   	    			</div>

   	    			data is here signUp_password :@{{signUp_password}} upconfirm : @{{signUp_confirm}} email : @{{signUp_email}}
   	    			validation = @{{(signUp_password != signUp_confirm) || !upForm.$prestine}}
   	    		</form>
   	    	</div>
   	    </div>
   </div>
@endsection