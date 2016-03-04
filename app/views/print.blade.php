@include('includes.header')
<body>
<div class="container">
  <h2 style="text-align:center">Course Evaluation System</h2><br><br>
  <div class="col-md-6 col-md-offset-3">

                    @if(count($tokens))
                        <table class="display table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Token</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tokens as $token)
                                <tr>
                                  <td>{{ $token->id}}</td>
                                    <td>{{ $token->token}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif




  </div>
  <button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script>
</div>

</body>
</html>