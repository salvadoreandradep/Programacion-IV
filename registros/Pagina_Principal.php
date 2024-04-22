<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tu Sitio Web</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
  <style>
    :root{
      --main-color: #fff;
    }

    *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body{
      font-family: 'Roboto', sans-serif;
    }

    .main-header{
      background: #4FB391;
      width: 100%;
      height: 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    .btn-nav{
      color: var(--main-color);
      font-size: 20px;
      cursor: pointer;
      background: rgba(0,0,0,.1);
      padding: 10px;
      border-radius: 5px;
    }

    .btn-nav:hover{
      background: rgba(0,0,0,.3);
    }

    nav{
      position: fixed;
      top: 50px;
      left: -200px;
      width: 200px;
      height: calc(100vh - 50px);
      background: #2D6653;
      transition: .4s ease;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .navigation li{
      list-style: none;
      margin-bottom: 10px;
    }

    .navigation a{
      color: var(--main-color);
      display: block;
      padding: 10px 20px;
      text-decoration: none;
      transition: .4s ease;
    }

    .navigation a:hover{
      background-color: rgba(255,255,255,.1);
    }

    #btn-nav:checked ~ nav{
      left: 0;
    }
  </style>
</head>
<body>

<header class="main-header">
  <label for="btn-nav" class="btn-nav"><i class="fas fa-bars"></i></label>
  <input type="checkbox" id="btn-nav">

  <nav>
    <ul class="navigation">
      <li><a href="#">Home</a></li>
      <li><a href="#">Servicios</a></li>
      <li><a href="#">Nosotros</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
  </nav>
</header>

</body>
</html>
