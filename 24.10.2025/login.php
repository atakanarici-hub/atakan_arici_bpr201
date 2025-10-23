<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>
    <!-- Google font entegrasyonu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Jockey+One&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Sriracha&display=swap" rel="stylesheet">
<!-- Bootstrap CSS ve JS entegrasyonu -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!-- css dosyasını ekliyoruz. -->
<link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    
    <!-- <div class="login-container">
        <h2>Giriş Yap</h2>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Kullanıcı Adı</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div> -->
    <div id="login-card" class="login-box">
        <h2>Giriş Yap</h2>
        <form action="login.php" method="POST">
          <div class="user-box">
            <input type="text" name="username" required="">
            <label>Kullanıcı Adı</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Şifre</label>
          </div>
          <button type="submit" class="login-button">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Giriş Yap
          </button>
        </form>
      </div>


</body>
</html>