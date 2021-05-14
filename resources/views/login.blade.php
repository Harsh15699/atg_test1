<!DOCTYPE html>
<html>
 <head>
  <title>Login Portal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>
 <body>
     <div class="container mt-5">
       <form action="{{url('/main/checklogin')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-xl-6 m-auto">
            <div class="card shadow">
              <div class="card-header">
                  <h4 class="card-title font-weight-bold" align="center"> Login Portal </h4>
              </div>
              @if(isset(Auth::user()->email))
                  <script>window.location="/main/dashboard";</script>
              @endif

              @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                       <strong>{{ $message }}</strong>
                    </div>
              @endif

              @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                         <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
              @endif
              <div class="card-body">
                <div class="form-group">
                    <label>Enter Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" />
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="password" class="form-control" />
                </div>
              </div>
              <div class="card-footer">
                  <input type="submit" name="login" class="btn btn-success" value="Login" />
                  <a href="{{ url('/user') }}">Don't have an account?</a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>
</html>
