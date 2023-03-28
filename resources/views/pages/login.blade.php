@extends('main.bootstrap')
@section('content')
   <div class="vh-100">
    <div class="container h-100">
        <div class="rom d-flex align-items-center justify-content center">
            <div class="col-md-8 col-lg-8 col-xl-8 col-sm-12-col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Login</h3>
                        <form action="{{ url('auth') }}" method="post">
                                <input type="email" name="Email" id="email" class="form-control" placeholder="Email">
                                <input type="password" name="password" id="password" class="form-control" placeholder="password">
                                <button type="submit" class="mt-3 btn btn-primary py-2 px-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
