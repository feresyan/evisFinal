
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>EVIS | Masuk</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action=" {{ route('post.Login') }} " method="POST">
      @csrf
      <img class="mb-4" src="{{ URL::asset('img/EVIS.png') }}" alt="" width="200" height="200">
      <label for="inputUsername" class="sr-only">Nama Pengguna</label>
      <input type="text" name="inputUsername" class="form-control" placeholder="Nama Pengguna" required autofocus>
      <label for="inputPassword" class="sr-only">Kata Sandi</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Kata Sandi" required>
      <div class="checkbox mb-3">
{{--         <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label> --}}
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
