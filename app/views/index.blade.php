@include('includes.header')
<body>
<div class="container">
  <h2 style="text-align:center">Course Evaluation System</h2><br><br>
@include('includes.alert')
  <div class="col-md-6 col-md-offset-3">
  {{ Form::open(array('route' => 'token.check', 'class' => 'form-horizontal')) }}
      <div class="form-group">
        <label class="control-label col-sm-2" for="token">Token:</label>
          <div class="col-sm-8">
            <input type="text" name="token" class="form-control" id="token" placeholder="Enter provided token">
          </div>
      </div>

      <div class="form-group"> 
        <div class="col-sm-offset-2 col-xs-4">
          <button type="submit" class="btn btn-primary">Continue</button>
        </div>
      </div>

  </form>
  </div>
</div>

    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/jquery.dcjqaccordion.2.7.js', array('class' => 'include')) }}
    {{ HTML::script('js/jquery.scrollTo.min.js') }}
    {{ HTML::script('js/jquery.nicescroll.js') }}
    {{ HTML::script('js/respond.min.js') }}
    {{ HTML::script('js/slidebars.min.js') }}
    {{ HTML::script('js/common-scripts.js') }}
    @yield('script')
    {{ HTML::script('js/custom.js') }}

</body>
</html>