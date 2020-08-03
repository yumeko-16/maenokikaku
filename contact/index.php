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
	$header .= "From: 株式会社前野企画 <chelsea.tm20@gmail.com>\n";
	$header .= "Reply-To: 株式会社前野企画 <chelsea.tm20@gmail.com>\n";

  // 件名を設定
  $auto_reply_subject = 'お問い合わせありがとうございます。';

  // 本文を設定
  $auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。
下記の内容でお問い合わせを受け付けました。\n\n";
	$auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
	$auto_reply_text .= "氏名：" . $clean['your_name'] . "\n";
	$auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n\n";
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
  $admin_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";

	// 運営側へメール送信
  mb_send_mail( 'chelsea.tm20@gmail.com', $admin_reply_subject, $admin_reply_text, $header);

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>株式会社前野企画</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Noto+Sans+JP:wght@700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700;900&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d45c93bc1b.js" crossorigin="anonymous"></script>
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/index.html">株式会社前野企画</a>
      <a class="header__btn" href="./contact.php">お問い合わせ</a>
    </div>
  </header>

  <main class="main">
    <section class="section mail">
      <div class="section__inner">
        <h2 class="section__title">お問い合わせ</h2>

        <?php if( $page_flag === 1 ): ?>

        <form method="post" action="">
          <div class="">
            <label>氏名</label>
            <p><?php echo $clean['your_name']; ?></p>
          </div>
          <div class="">
            <label>メールアドレス</label>
            <p><?php echo $clean['email']; ?></p>
          </div>
          <div class="">
            <label>お問い合わせ内容</label>
            <p><?php echo nl2br($clean['contact']); ?></p>
          </div>
          <input type="submit" name="btn_back" value="戻る">
          <input type="submit" name="btn_submit" value="送信">
          <input type="hidden" name="your_name" value="<?php echo $clean['your_name']; ?>">
          <input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
          <input type="hidden" name="contact" value="<?php echo $clean['contact']; ?>">
        </form>

        <?php elseif( $page_flag === 2 ): ?>

        <p>送信が完了しました。</p>

        <?php else: ?>

        <?php if( !empty($error) ): ?>
        <ul class="error_list">
          <?php foreach( $error as $value ): ?>
          <li><?php echo $value; ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <form action="" method="post">
          <div class="">
            <label>氏名</label>
            <input type="text" name="your_name" value="<?php if( !empty($clean['your_name']) ) { echo $clean['your_name']; } ?>">
          </div>
          <div class="">
            <label>メールアドレス</label>
            <input type="text" name="email" value="<?php if( !empty($clean['your_name']) ) { echo $clean['email']; } ?>">
          </div>
          <div class="">
            <label>お問い合わせ内容</label>
            <textarea name="contact"></textarea>
          </div>
          <input type="submit" name="btn_confirm" value="入力内容を確認する">
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
</body>
</html>
