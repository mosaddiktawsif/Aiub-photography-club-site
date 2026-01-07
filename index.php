<?php require_once __DIR__ . '/Models/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>AIUB Photography Club</title>
    <link rel="stylesheet" href="assets/css/style.css"> <style>
        /* Basic Menu CSS */
        nav { background: #333; padding: 10px; }
        nav a { color: white; margin-right: 20px; text-decoration: none; font-weight: bold; }
        .notice-section { border: 2px solid #333; padding: 10px; margin: 20px 0; }
    </style>
</head>
<body>

    <nav>
        <a href="index.php">HOME</a>
        <a href="view/blog_list.php">BLOG</a>
        <a href="view/notice_list.php">NOTICE BOARD</a>
        <a href="view/gallery.php">GALLERY</a>
        <a href="view/results.php">RESULTS</a>
        <a href="view/login.php" style="float:right;">ADMIN LOGIN</a>
    </nav>

    <h1>Welcome to AIUB Photography Club</h1>

    <div class="notice-section">
        <h2>Latest Notices</h2>
        <div id="home-notices">Loading notices...</div>
    </div>

    <script>
        // AJAX: Fetch notices dynamically for Home Page
        fetch('controllers/NoticeController.php?action=fetch_notices') // Uses the controller from previous step
            .then(res => res.json())
            .then(data => {
                let html = '';
                // Show only top 3 notices on homepage
                data.data.slice(0, 3).forEach(n => {
                    html += `<p><strong>${n.title}</strong>: ${n.message}</p><hr>`;
                });
                document.getElementById('home-notices').innerHTML = html;
            });
    </script>

</body>
</html>