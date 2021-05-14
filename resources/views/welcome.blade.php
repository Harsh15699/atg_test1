<!doctype html>
<html lang="en">
  <head>
    <title>User Registration Form </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
      overflow: hidden;
      background-color: #333;
    }

    .navbar a {
      width:100px;
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .navbar a:hover {
      background-color: red;
    }
    h1{
      font-size: 400%;
      color:blue;
      text-decoration: underline;
    }
    </style>
  </head>
  <body>
    <header>
    <div class="navbar">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('/user') }}">Registration</a>
    <a href="{{ url('/main') }}">Login</a>
  </div>
  </header>

    <h1 align='center' ><b>User Registration / Login System</b></h1>
  <h2>1)If You are a New User You Can Click On Registration and you can go ahead with login after Registration</h2>
  <h2>2)If You are a Old User You Can Click On Login and after login you can go Dashboard</h2>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
  </html>
