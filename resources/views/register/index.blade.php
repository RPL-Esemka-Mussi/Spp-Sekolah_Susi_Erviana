@extends('main.bootstrap')

@section('content')

<body class="text-center">

    <main class="form-signin w-50 m-auto">
      <form>
        <h1 class="h3 mb-3 fw-normal py-5">Registration From</h1>
       <form action="/register" method="post">
        <div class="form-floating">
            <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="name">
            <label for="floatingInput">Name</label>
          </div>

        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="username" placeholder="username">
            <label for="floatingInput">Username</label>
          </div>

        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">

        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Regisret</button>
      </form>
      <small class="d-block text-center mt-3">already registered? <a href="/register">Login</a></small>
    </main>

      </body>

@endsection
