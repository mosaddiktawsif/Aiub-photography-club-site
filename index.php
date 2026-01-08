<?php require_once __DIR__ . '/Models/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>AIUB Photography Club</title>
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo filemtime(__DIR__ . '/assets/css/style.css'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>

  <nav>
    <a class="brand" href="index.php">AIUB Photography Club</a>
    <a href="view/blog_list.php">BLOG</a>
    <a href="view/notice_list.php">NOTICE BOARD</a>
    <a href="view/gallery.php">GALLERY</a>
    <a href="view/results.php">RESULTS</a>
    <a href="view/login.php" class="nav-right">ADMIN LOGIN</a>
  </nav>

  <main class="site-main">
    <div class="container">
    <div class="hero">
          <div class="hero-inner">
            <h1>AIUB Photography Club</h1>
            <p>Discover member work, read posts, and check the latest notices and results.</p>
            <a class="cta" href="view/notice_list.php">View Notices</a>
          </div>
    </div>

    <div class="notice-section">
      <h2>Latest Notices</h2>
      <div id="home-notices">Loading notices...</div>
    </div>
  </div>
  </main>

  <footer>
    <div class="container">
      <div>All rights reserved by AIUBPC</div>
      <div class="footer-contact">Contact: Email aiubphotographyclub@gmail.com</div>
    </div>
  </footer>

  <script>
    fetch('Controller/NoticeController.php?action=fetch_notices')
      .then(res => res.json())
      .then(data => {
        let html = '';
        data.data.slice(0, 3).forEach(n => {
          html += `<div class="notice-item"><strong>${n.title}</strong><div>${n.message}</div><div class="small">Posted: ${n.created_at}</div></div>`;
        });
        document.getElementById('home-notices').innerHTML = html;
      }).catch(err => {
        document.getElementById('home-notices').innerHTML = '<p class="small">Unable to load notices.</p>';
        console.error(err);
      });
  </script>

</body>
</html>