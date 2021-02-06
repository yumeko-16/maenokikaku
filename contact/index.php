<?php
// 変数の初期化
$page_flag = 0;
$clean = array();
$error = array();

// サニタイズ
if( !empty($_POST) ) {
	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES );
	}
}

if( !empty($clean['btn_confirm']) ) {

  $error = validation($clean);

  if( empty($error) ) {
    $page_flag = 1;

    // セッションの書き込み
		session_start();
		$_SESSION['page'] = true;
  }

} elseif ( !empty($clean['btn_submit']) ) {

  session_start();
	if( !empty($_SESSION['page']) && $_SESSION['page'] === true ) {

		// セッションの削除
		unset($_SESSION['page']);
  $page_flag = 2;

  // 変数とタイムゾーンを初期化
  $header = null;
	$auto_reply_subject = null;
	$auto_reply_text = null;
  $admin_reply_subject = null;
	$admin_reply_text = null;
	date_default_timezone_set('Asia/Tokyo');

  // ヘッダー情報を設定
	$header = "MIME-Version: 1.0\n";
	$header .= "From: 株式会社前野企画 <maenokikaku@email.plala.or.jp>\n";
	$header .= "Reply-To: 株式会社前野企画 <maenokikaku@email.plala.or.jp>\n";

  // 件名を設定
  $auto_reply_subject = 'お問い合わせありがとうございます。';

  // 本文を設定
  $auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。
下記の内容でお問い合わせを受け付けました。\n\n";
	$auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
	$auto_reply_text .= "氏名：" . $clean['your_name'] . "\n";
	$auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n\n";
	$auto_reply_text .= "電話番号：" . $clean['tel'] . "\n\n";
  $auto_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";
  $auto_reply_text .= "株式会社前野企画";

  // メール送信
  mb_send_mail( $clean['email'], $auto_reply_subject, $auto_reply_text, $header);

  // 運営側へ送るメールの件名
	$admin_reply_subject = "お問い合わせを受け付けました";

	// 本文を設定
	$admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
	$admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
	$admin_reply_text .= "氏名：" . $clean['your_name'] . "\n";
  $admin_reply_text .= "メールアドレス：" . $clean['email'] . "\n\n";
  $admin_reply_text .= "電話番号：" . $clean['tel'] . "\n\n";
  $admin_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";

	// 運営側へメール送信
  mb_send_mail( 'maenokikaku@email.plala.or.jp', $admin_reply_subject, $admin_reply_text, $header);

  } else {
		$page_flag = 0;
	}
}

function validation($data) {

  $error = array();

  // 氏名のバリデーション
  if( empty($data['your_name']) ) {
    $error[] = "「氏名」は必ず入力してください。";
  } elseif( 20 < mb_strlen($data['your_name']) ) {
		$error[] = "「氏名」は20文字以内で入力してください。";
	}

  // メールアドレスのバリデーション
	if( empty($data['email']) ) {
		$error[] = "「メールアドレス」は必ず入力してください。";
  } elseif( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email']) ) {
		$error[] = "「メールアドレス」は正しい形式で入力してください。";
	}

  // お問い合わせ内容のバリデーション
	if( empty($data['contact']) ) {
		$error[] = "「お問い合わせ内容」は必ず入力してください。";
	}

  return $error;
}
?>

<html lang="ja">
<head>
  <!-- Google Tag Manager -->
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
          f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WBLZ3KD');
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>寺院管理のお問い合わせ｜株式会社前野企画</title>
  <meta name="description" content="寺院管理ソフト「寺院エキスパート」の導入、その他サービスについてはこちらのお問い合わせフォームからお気軽にご連絡ください。">
  <meta name=”keywords” content="前野企画, 寺院, エキスパート, システム, お問い合わせ">
  <link rel="stylesheet" href="/css/ress.css">
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d45c93bc1b.js" crossorigin="anonymous"></script>
  <script>
    (function (d) {
      var config = {
        kitId: 'hnd7lsp',
        scriptTimeout: 3000,
        async: true
      },
        h = d.documentElement, t = setTimeout(function () { h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"; }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a; h.className += " wf-loading"; tk.src = 'https://use.typekit.net/' + config.kitId + '.js'; tk.async = true; tk.onload = tk.onreadystatechange = function () { a = this.readyState; if (f || a && a != "complete" && a != "loaded") return; f = true; clearTimeout(t); try { Typekit.load(config) } catch (e) { } }; s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <script src="/js/anime.min.js"></script>
  <script type="text/javascript" src="/js/common.js" defer></script>
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBLZ3KD"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper">
    <header class="header">
      <div class="header__inner">
        <a class="header__logo" href="/index.html">株式会社前野企画</a>
        <nav class="header__nav">
          <ul class="header__nav-list">
            <li class="header__nav-item"><a href="/">ホーム</a></li>
            <li class="header__nav-item"><a href="/expert/index.html">寺院エキスパート</a></li>
            <li class="header__nav-item"><a class="header__btn" href="/contact/index.php">お問い合わせ</a></li>
          </ul>
        </nav>
        <div id="js-burger" class="header__burger">
          <div class="header__burger-inner">
            <span class="header__burger-line header__burger-line--1"></span>
            <span class="header__burger-line header__burger-line--2"></span>
            <span class="header__burger-line header__burger-line--3"></span>
          </div>
        </div>
      </div>
    </header>

    <main class="main">
      <section class="section mail">
        <div class="section__inner">
          <h2 class="section__title">お問い合わせ</h2>

          <?php if( $page_flag === 1 ): ?>

          <ul class="mail__step-bar">
            <li class="mail__step-item">内容入力</li>
            <li class="mail__step-item mail__visited">内容確認</li>
            <li class="mail__step-item mail__step-completion">完了</li>
          </ul>
          <form method="post" action="">
            <div class="mail__item">
              <div class="mail__item-name">
                <label class="mail__label">寺院名</label>
                <span class="mail__required">必須</span>
              </div>
              <p class="txt-blue"><?php echo $clean['your_name']; ?></p>
            </div>
            <div class="mail__item">
              <div class="mail__item-name">
                <label class="mail__label">メールアドレス</label>
                <span class="mail__required">必須</span>
              </div>
              <p class="txt-blue"><?php echo $clean['email']; ?></p>
            </div>
            <div class="mail__item">
              <div class="mail__item-name">
                <label class="mail__label">電話番号</label>
              </div>
              <p class="txt-blue"><?php echo $clean['tel']; ?></p>
            </div>
            <div class="mail__item">
              <div class="mail__item-name">
                <label class="mail__label">お問い合わせ内容</label>
                <span class="mail__required">必須</span>
              </div>
              <p class="txt-blue"><?php echo nl2br($clean['contact']); ?></p>
            </div>
            <div class="mail__btns">
              <input class="mail__btn--back" type="submit" name="btn_back" value="戻る">
              <input class="mail__btn" type="submit" name="btn_submit" value="入力内容を送信する">
            </div>
            <input type="hidden" name="your_name" value="<?php echo $clean['your_name']; ?>">
            <input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
            <input type="hidden" name="tel" value="<?php echo $clean['tel']; ?>">
            <input type="hidden" name="contact" value="<?php echo $clean['contact']; ?>">
          </form>

          <?php elseif( $page_flag === 2 ): ?>

          <ul class="mail__step-bar">
            <li class="mail__step-item">内容入力</li>
            <li class="mail__step-item">内容確認</li>
            <li class="mail__step-item mail__step-completion mail__visited">完了</li>
          </ul>
          <div>
            <p>この度はお問い合わせ頂き誠にありがとうございました。</p>
            <p>いただいた内容につきましては入力していただいたメールアドレス宛に確認メールを送信させていただいております。</p>
            <p>もし、メールが到着しなかった場合は入力していただいたメールアドレスが間違っている可能性があります。</p>
            <p>お問い合わせいただいた内容につきましては、近日中にお返事させていただきます。</p>
          </div>

          <?php else: ?>

          <div class="mail__description">
            <p>寺院エキスパートシステム・その他サービスに関するお問い合わせは、<br class="br-sm">お電話又は下記メールフォームより承っております。</p>
            <p>どうぞ、お気軽にお問い合わせください。</p>
          </div>
          <ul class="mail__step-bar">
            <li class="mail__step-item mail__visited">内容入力</li>
            <li class="mail__step-item">内容確認</li>
            <li class="mail__step-item mail__step-completion">完了</li>
          </ul>

          <?php if( !empty($error) ): ?>
          <ul class="mail__error-list">
            <?php foreach( $error as $value ): ?>
            <li class="mail__error-item"><?php echo $value; ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>

          <form action="" method="post">
            <div class="mail__item">
              <div class="mail__item-name">
                <label class="mail__label">寺院名</label>
                <span class="mail__required">必須</span>
              </div>
              <input class="mail__input" type="text" name="your_name" value="<?php if( !empty($clean['your_name']) ) { echo $clean['your_name']; } ?>" placeholder="例）普蔵院">
            </div>
            <div class="mail__item">
              <div class="mail__item-name">
                <label class="mail__label">メールアドレス</label>
                <span class="mail__required">必須</span>
              </div>
              <input class="mail__input" type="text" name="email" value="<?php if( !empty($clean['email']) ) { echo $clean['email']; } ?>" placeholder="例）abc@mail.co.jp">
            </div>
            <div class="mail__item">
              <div class="mail__item-name">
                <label class="mail__label">電話番号</label>
              </div>
              <input class="mail__input" type="tel" name="tel" value="<?php if( !empty($clean['tel']) ) { echo $clean['tel']; } ?>" placeholder="例）012-345-6789">
            </div>
            <div class="mail__item">
              <div class="mail__item-name">
                <label class="mail__label">お問い合わせ内容</label>
                <span class="mail__required">必須</span>
              </div>
              <textarea class="mail__txtarea" name="contact" placeholder="お問合わせ内容をご入力ください。"><?php if( !empty($_POST['contact']) ){ echo $_POST['contact']; } ?></textarea>
            </div>
            <input class="mail__btn" type="submit" name="btn_confirm" value="入力内容を確認する">
          </form>

          <?php endif; ?>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="footer__inner">
        <small>© 2020 前野企画</small>
      </div>
    </footer>

    <a id="js-pagetop" class="pagetop" href="#top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
</body>
</html>
