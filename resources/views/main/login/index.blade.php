<!doctype html>
<html lang="en">

<head>
  <title>e-commerce | {{ $title }}</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container d-flex justify-content-center my-5">
        <div class="card shadow" style="width: 32rem">
            <div class="card-body shadow">
                <form action="/login" method="post">
                    @csrf
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="youremail@example.com" name="email" id="email" autofocus>

                    <label for="password" class="mt-3">Password</label>
                    <input type="password" class="form-control" placeholder="yourpassword" name="password" id="password">

                    <div class="d-grid gap-2 my-3">
                        <button type="submit" class="btn btn-primary d-block">Log In <i class="bi bi-box-arrow-in-right"></i></button>
                    </div>
                </form>
                <a href="/register">Not have an account?</a>
            </div>
        </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>