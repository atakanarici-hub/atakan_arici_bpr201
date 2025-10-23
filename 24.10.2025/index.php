<?php
// Ensure a session is started so index can use session-based auth if needed
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Include DB connection (db.php creates a $pdo PDO instance)
require_once 'db.php';

// Lightweight connection test. Failures are written to the PHP error log
// so they don't leak to the browser in production.
$dbConnected = false;
if (isset($pdo)) {
  try {
    $stmt = $pdo->query('SELECT 1');
    $stmt->fetchColumn();
    $dbConnected = true;
  } catch (\Throwable $e) {
    error_log('DB connection test failed: ' . $e->getMessage());
    $dbConnected = false;
  }
} else {
  error_log('DB connection not established: $pdo not found after including db.php');
}

?>


<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
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
<body>

    <!-- Nav bar oluşturuyoruz. -->
    <nav  class="navbar navbar-expand-sm bg-dark fixed-top justify-content-center">
        
        <ul>
            <!-- Ana sayfa logosu -->
            <li><div class="container-fluid" style="display:flex; justify-content:center; align-items:center;">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="Logo" style="width: 50px; height: auto;" class="rounded-pill align-text-top">
          </a>
          <!-- Keşfet yazısı -->
          <a style="margin-left: 300px; font-size: 24px; display:flex; justify-content:center; align-items:center;" href="#">🔎 Keşfet</a>
          
            </li>

        </div>
        </ul>
    </nav>
    
    <!-- Arkadaşlar penceresinin olacağı offcanvas yapısı -->
    <div class="offcanvas offcanvas-start" id="demo">
  <div style="border-bottom: 1px solid rgba(0, 0, 0, 1);" class="offcanvas-header">
    <h1 class="offcanvas-title">Arkadaşlar</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body" >
    <p>Some text lorem ipsum.</p>
    <p>Some text lorem ipsum.</p>
    <p>Some text lorem ipsum.</p>
    
  </div>
</div>

<!-- Arkadaşlar penceresini açacağımız logo ve açma komutları -->
<div class="friends">
  <a class="friends-toggle" role="button" data-bs-toggle="offcanvas" data-bs-target="#demo" aria-controls="demo">
    <img src="images/friends_logo.png" alt="Friends" class="friends-icon">
  </a>
</div>








<!-- Offcanvas açılırkenki animasyon için gerekli JS kodu -->
<script>
document.addEventListener('DOMContentLoaded', function(){
  var offcanvasEl = document.getElementById('demo');
  var friendsIcon = document.querySelector('.friends-icon');
  if (!offcanvasEl || !friendsIcon) return;

  // Offcanvasın kaç saniyede açılıp kapanacağını öğreniyoruz (varsayılan 300ms)
  function getTransitionMs(el){
    var d = window.getComputedStyle(el).transitionDuration || '0.3s';
    if (d.indexOf('ms') > -1) return parseFloat(d);
    if (d.indexOf('s') > -1) return parseFloat(d) * 1000;
    return 300;
  }

  var duration = getTransitionMs(offcanvasEl);
  friendsIcon.style.transition = 'transform ' + duration + 'ms ease';

  offcanvasEl.addEventListener('show.bs.offcanvas', function(){
    var w = offcanvasEl.getBoundingClientRect().width || 260;
    // Offcanvasın genişliği kadar ikonu sağa kaydır
    friendsIcon.style.transform = 'translateX(' + w + 'px)';
  });

  offcanvasEl.addEventListener('hide.bs.offcanvas', function(){
    friendsIcon.style.transform = 'translateX(0)';
  });
});
</script>

    <div class="main-content">

    </div>

</body>
</html>