<?php require_once __DIR__ . '/Models/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>AIUB Photography Club</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <nav>
        <a href="index.php">HOME</a>
        <a href="view/blog_list.php">BLOG</a>
        <a href="view/notice_list.php">NOTICE BOARD</a>
        <a href="view/gallery.php">GALLERY</a>
        <a href="view/results.php">RESULTS</a>
        <a href="view/login.php">ADMIN LOGIN</a>
    </nav>

    <h1>Welcome to AIUB Photography Club</h1>

    <div class="notice-section">
        <h2>Latest Notices</h2>
        <div id="home-notices">Loading notices...</div>
    </div>
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