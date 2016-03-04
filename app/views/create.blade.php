@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">
                            <a class="btn btn-success btn-sm" href="{{ URL::route('user.index') }}"><span class="fa fa-chevron-left"></span>Admin List</a>
					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'user.store', 'class' => 'form-horizontal','files' => true)) }}

        <!-- input for name -->

                    <div class="form-group">
                        {{ Form::label('name', 'Admin name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', null, array('class' => 'form-control',  'placeholder' => 'New User Name', 'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email*' array('class' => 'col-md-2 control-label')) }}
                        <div >
                            {{ Form::email('email', null, array('class' => 'form-control',  'placeholder' => 'email@domain.com', 'required')) }}
                        </div>
                    </div>

        
        <!-- password  -->

                    <div class="form-group">
                        {{ Form::label('password', 'Password*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::password('password', null, array('class' => 'form-control',  'placeholder' => 'Type Your Password ', 'required')) }}
                        </div>
                    </div>
                      
        <!-- submit button  -->       

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create Card', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                
            </section>
        </div>
    </div>
@stop
