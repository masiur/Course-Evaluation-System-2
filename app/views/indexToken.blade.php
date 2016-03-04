@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm btn-new-user" href="{{ URL::route('token.create') }}">Generate Token</a>

                    </span>
                </header>
                <div class="panel-body">
                    @if(count($tokens))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Token</th>
                                <th>Google Form's Link</th>
                                <th>Status</th>
                                <th>Created For</th>
                                <th>Created Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tokens as $token)
                                <tr>
                                	<td>{{ $token->id}}</td>
                                    <td>{{ $token->token}}</td>
                                    <td>{{ $token->link}}</td>
                                    <td>{{ $status[$token->is_used] }}</td>
                                    <td>{{ $token->user->name }}</td>
                                    <td>{{ $token->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
            </section>
        </div>
    </div>


    

@stop


@section('style')
    {{ HTML::style('assets/data-tables/DT_bootstrap.css') }}

@stop


@section('script')
    {{ HTML::script('assets/data-tables/jquery.dataTables.js') }}
    {{ HTML::script('assets/data-tables/DT_bootstrap.js') }}

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $.get("http://ipinfo.io", function(response) {
                console.log(response.city, response.country,response.region);
            }, "jsonp");
            $('#example').dataTable({
            });

          
        });
    </script>
@stop