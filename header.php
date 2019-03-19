<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(!is_home()) echo '｜'; ?><?php bloginfo('name'); ?></title>
    <meta name="keywords" content="空飛ぶペンギン,ペンギン,空飛ぶ,劇団,社会人,横浜,横浜市立大学,海星館">
    <meta name="description" content="横浜を中心に活動する社会人劇団「空飛ぶペンギンカンパニー」のWebサイトです。公演情報をお知らせしています。練習風景もご覧いただけます。">
    <!-- スマホの表示倍率を100%にリセット -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- iPhoneXでのボックス表示対応(Bootstrapのハンバーガーアイコンが無効になる) -->
    <!-- <meta name="viewport" content="viewport-fit=cover"> -->
    <!-- OGP (Facebookでのフィード表示) -->
    <!-- <meta property="fb:app_id" content="App-ID(15文字の半角数字)" /> -->
    <meta property="og:title" content="Sorapen" />
    <meta property="og:type" content="website" />
    <!-- <meta property="og:url" content="http://後から書き換える" /> -->
    <meta property="og:image" content="後から追加する" />
    <meta property="og:site_name" content="Sorapen" />
    <meta property="og:description" content="横浜を中心に活動する社会人劇団「空飛ぶペンギンカンパニー」のWebサイトです。" />

    <!-- ファビコン -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/png">
    <!-- ホーム画面に追加 -->
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/touchIcon.jpg">
    <!-- Bootstrap4.2.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- Lightbox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.css">
    <!-- OriginCSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

    <!-- jQuery3 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Bootstrap4.2.1 Javascript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <!-- Lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox-plus-jquery.js"></script>
    <!-- Lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
    <!-- OriginalJS -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>

    <!-- IE9以下にHTML5の新要素を認識 -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
</head>

<body class="top">
  <header class="gl-header">
    <nav class="navbar navbar-expand-lg fixed-top">
      <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><h1 class="gl-header_title">空飛ぶペンギンカンパニー</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item nav-menu"><a class="nav-link" href="home.php">ホーム <span class="sr-only">(current)</span></a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="stage.php">公演情報</a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="member.php">社員紹介</a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="blog.php">ブログ</a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="contact.php">お問い合わせ</a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="https://twitter.com/penguin_sora"><i class="fab fa-twitter-square"></i></a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="https://ja-jp.facebook.com/%E7%A9%BA%E9%A3%9B%E3%81%B6%E3%83%9A%E3%83%B3%E3%82%AE%E3%83%B3%E3%82%AB%E3%83%B3%E3%83%91%E3%83%8B%E3%83%BC-1433144510231399/"><i class="fab fa-facebook-square"></i></a></li>
        </ul>
      </div>
    </nav>
  </header>
