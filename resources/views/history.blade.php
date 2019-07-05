@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard -> History</div>

                <div class="panel-body">
                    
                    <table class="table table-striped table-condensed">
                        <thead>
                            <th>Search String</th>
                            <th>Search Type</th>
                            <th>Time</th>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                               <tr>
                                    <td>{{urldecode($history['query'])}}</td>
                                    <td>{{$history['type']}}</td>
                                    <td>{{$history['time']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                       
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
