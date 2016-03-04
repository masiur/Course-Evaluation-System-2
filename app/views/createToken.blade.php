@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">
                            <a class="btn btn-success btn-sm" href="{{ URL::route('token.index') }}">Token List</a>
					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'token.store', 'class' => 'form-horizontal')) }}

        <!-- input for amount -->

                    <div class="form-group">
                        {{ Form::label('amount', 'Amount*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('amount', null, array('class' => 'form-control',  'placeholder' => 'Amount of token', 'required')) }}
                        </div>
                    </div>

        <!-- input for amount -->

                    <div class="form-group">
                        {{ Form::label('url', 'Google Form Link*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('url', null, array('class' => 'form-control',  'placeholder' => 'www.google.com', 'required')) }}
                        </div>
                    </div>

        
        <!-- input for users name -->

                    <div class="form-group">
                        {{ Form::label('user_id', 'Admin Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('user_id', $users, null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                      
        <!-- submit button  -->       

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Generate', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                
            </section>
        </div>
    </div>
@stop
