<?php
session_start();
require_once 'util.inc.php';

//3)変数の初期化（5つの変数を空にする）
$name    = "";
$kana    = "";
$email   = "";
$phone   = "";
$inquiry = "";
$mapNone = TRUE;//地図の非表示フラグ

//2)もしセッション変数内に値が存在（登録）していれば
// セッション変数から配列を引き出して
if(isset($_SESSION["contact"])) {
    $contact = $_SESSION["contact"];
    $name = $contact["name"];
    $kana = $contact["kana"];
    $email = $contact["email"];
    $phone = $contact["phone"];
    $inquiry = $contact["inquiry"];

    $mapNone = $contact["mapNone"];
    // ↑$tokenに関しては確認画面から戻ってもハッシュ値を隠しフォームに表示できないので
    // 配列から値を引き出す必要はない。
}

// 1)もし確認ボタンを押したらなら
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValidated = TRUE;
    $mapNone = FALSE;
    //ここはPOSTで受け取るので↑の$_SESSIONとは違う
    $name    = $_POST["name"];
    $kana    = $_POST["kana"];
    $email   = $_POST["email"];
    $phone   = $_POST["phone"];
    $inquiry = $_POST["inquiry"];
    $token   = $_POST["token"];

    //バリデーション
    //名前
    if ($name === "") {
        $isValidated = FALSE;
        $errorName = "※お名前を入力してください";
    }

    //フリガナ
    if ($kana === "") {
        $isValidated = FALSE;
        $errorKana = "※フリガナを入力してください";
    }
    elseif (!preg_match("/^[ァ-ヶー]+$/u", $kana)) {
        $isValidated = FALSE;
        $errorKana = "※全角カタカナで入力してください";
    }

    //メアド
    if ($email === "") {
        $isValidated = FALSE;
        $errorEmail = "※メールアドレスを入力してください";
    }
    elseif (!preg_match("/^[^@]+@[^@]+\.[^@]+$/", $email)) {
        $isValidated = FALSE;
        $errorEmail = "※メールアドレスの形式が正しくありません";
    }

    //問い合わせ内容
    if ($inquiry === "") {
        $isValidated = FALSE;
        $errorInquiry = "※お問い合わせ内容を入力してください";
    }

    if ($isValidated == TRUE){
        //↓これはいらない？
//         $_SESSION["name"] = $name;
//         $_SESSION["kana"] = $kana;
//         $_SESSION["email"] = $email;
//         $_SESSION["phone"] = $phone;
//         $_SESSION["inquiry"] = inquiry;

        $contact = array(
            "name"    => $name,
            "kana"    => $kana,
            "email"   => $email,
            "phone"   => $phone,
            "inquiry" => $inquiry,
            "token"   => $token,
            "mapNone" => FALSE
        );

        $_SESSION["contact"] = $contact;

        header("Location: contact_conf.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PageTitle | SiteTitle</title>
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
    <link rel="icon" href="images/favicon.png" type="image/png">
    <!-- ホーム画面に追加 -->
    <link rel="apple-touch-icon" href="images/touchIcon.jpg">
    <!-- Bootstrap4.2.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- Lightbox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.css">
    <!-- OriginCSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- jQuery3 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Bootstrap4.2.1 Javascript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <!-- Lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox-plus-jquery.js"></script>
    <!-- Lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
    <!-- OriginalJS -->
    <script src="js/index.js"></script>

    <!-- IE9以下にHTML5の新要素を認識 -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
    <![endif]-->

</head>

<body class="top">
  <header class="gl-header">
    <nav class="navbar navbar-expand-lg fixed-top">
      <a class="navbar-brand" href="#"><h1 class="gl-header_title">空飛ぶペンギンカンパニー</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item nav-menu"><a class="nav-link" href="index.html">ホーム <span class="sr-only">(current)</span></a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="#">公演情報</a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="member.html">社員紹介</a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="#">お問い合わせ</a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="https://twitter.com/penguin_sora"><i class="fab fa-twitter-square"></i></a></li>
          <li class="nav-item nav-menu"><a class="nav-link" href="https://ja-jp.facebook.com/%E7%A9%BA%E9%A3%9B%E3%81%B6%E3%83%9A%E3%83%B3%E3%82%AE%E3%83%B3%E3%82%AB%E3%83%B3%E3%83%91%E3%83%8B%E3%83%BC-1433144510231399/"><i class="fab fa-facebook-square"></i></a></li>
        </ul>
      </div>
    </nav>
  </header>

  <section class="catch"></section>

  <main>
    <div class="container">
      <section class="block">
          <div class="block_body">
            <h2 class="block_body_title">お問い合わせ</h2>
            <div class="col-md-12 contact">
           <!--  <h3 class="page-header">Send Message</h3> -->
            <form class="form-horizontal" action="" method="post" novalidate>
            <!-- 隠しフォームで次のページに値を送る -->
          <input type="hidden" name="token" value="<?php echo getToken(); ?>">
              <div class="form-group row">
                <label for="inputname" class="col-sm-3 control-label">お名前<br><span>(必須)</span></label>
                <div class="col-sm-9">
                <div class="text-warning">
                    <?php if(isset($errorName)): ?>
                    <?php echo h($errorName); ?>
                    <?php endif; ?>
                </div>
                  <input type="text" class="form-control" name="name" id="inputname" value="<?php echo h($name); ?>" required>
                  <p class="help-block">(例)山田　太郎</p>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputkana" class="col-sm-3 control-label">フリガナ<br><span>(必須)</span></label>
                <div class="col-sm-9">
                <div class="text-warning">
                    <?php if(isset($errorKana)): ?>
                    <?php echo h($errorKana); ?>
                    <?php endif; ?>
                </div>
                  <input type="text" class="form-control" name="kana" id="inputkana" value="<?php echo h($kana); ?>" required>
                  <p class="help-block">(例)ヤマダ　タロウ ※全角カタカナ</p>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputemail" class="col-sm-3 control-label">メールアドレス<br><span>(必須)</span></label>
                <div class="col-sm-9">
                  <div class="text-warning">
                      <?php if(isset($errorEmail)): ?>
                        <?php echo h($errorEmail); ?>
                        <?php endif; ?>
                    </div>
                  <input type="email" class="form-control" name="email" id="inputemail" required value="<?php echo h($email); ?>">
                  <p class="help-block">(例)abc@zz.com ※半角英数字</p>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputtel" class="col-sm-3 control-label">電話番号</label>
                <div class="col-sm-9">
                  <input type="tel" class="form-control" name="phone" id="inputtel" value="<?php echo h($phone); ?>">
                  <p class="help-block">(例)03-1234-3214　※ハイフンあり　半角数字</p>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputmessage" class="col-sm-3 control-label">お問い合わせ内容<br><span>(必須)</span></label>
                <div class="col-sm-9">
                <div class="text-warning">
                  <?php if(isset($errorInquiry)): ?>
                    <?php echo h($errorInquiry); ?>
                    <?php endif; ?>
                </div>
                  <textarea rows="10" cols="100" class="form-control" name="inquiry" id="message" required maxlength="999" style="resize:none"><?php echo h($inquiry); ?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-success btn-lg" name="check">内容を確認して送信</button>
                </div>
              </div>
            </form>
          </div><!-- /.contact -->
        </div><!-- /.block_body -->
      </section>
    </div>
  </main>

  <p class="page-top"><a href="#"><i class="fa fa-arrow-up fa-lg"></i></a></p>

  <footer class="gl-footer">
    <div class="container gl-footer_container">
      <small>&copy;2019 SORATOBU PENGUIN COMPANY All Rights Reserved.</small>
    </div>
  </footer>


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- 下記は随時変更する -->
 <!--  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-96344339-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('require', 'linkid');
    gtag('config', 'UA-96344339-1');
  </script> -->

</body>
</html
