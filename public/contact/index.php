<?php
  // 変数の初期化
  $page_flag = 0;
  $clean = array();
  $error = array();

  // サニタイズ
  if (!empty($_POST)) {
    foreach($_POST as $key => $value) {
      $clean[$key] = htmlspecialchars( $value, ENT_QUOTES );
    }
  }

  if (!empty($clean['btn_confirm'])) {
    $error = validation($clean);

    if (empty($error)) {
      $page_flag = 1;

      // セッションの書き込み
      session_start();
      $_SESSION['page'] = true;
    }
  } elseif (!empty($clean['btn_submit'])) {
    session_start();

    if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {
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
      mb_send_mail($clean['email'], $auto_reply_subject, $auto_reply_text, $header);

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
      mb_send_mail('maenokikaku@email.plala.or.jp', $admin_reply_subject, $admin_reply_text, $header);
    } else {
      $page_flag = 0;
    }
  }

  function validation($data) {
    $error = array();

    // 氏名のバリデーション
    if (empty($data['your_name'])) {
      $error[] = "「氏名」は必ず入力してください。";
    } elseif (20 < mb_strlen($data['your_name'])) {
      $error[] = "「氏名」は20文字以内で入力してください。";
    }

    // メールアドレスのバリデーション
    if (empty($data['email'])) {
      $error[] = "「メールアドレス」は必ず入力してください。";
    } elseif (!preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email'])) {
      $error[] = "「メールアドレス」は正しい形式で入力してください。";
    }

    // お問い合わせ内容のバリデーション
    if (empty($data['contact'])) {
      $error[] = "「お問い合わせ内容」は必ず入力してください。";
    }

    return $error;
  }
?>

<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>寺院管理のお問い合わせ｜株式会社前野企画</title>
    <meta
      name="description"
      content="寺院管理ソフト「寺院エキスパートシステム」の導入やサポートに関するお問い合わせはこちら。檀家管理や塔婆印刷など、多彩な機能についてお気軽にご相談ください。"
    />

    <link rel="canonical" href="https://maenokikaku.co.jp/contact/" />

    <meta
      property="og:title"
      content="寺院管理のお問い合わせ｜株式会社前野企画"
    />
    <meta
      property="og:description"
      content="寺院管理ソフト「寺院エキスパートシステム」の導入やサポートに関するお問い合わせはこちら。檀家管理や塔婆印刷など、多彩な機能についてお気軽にご相談ください。"
    />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://maenokikaku.co.jp/contact/" />
    <meta property="og:site_name" content="株式会社前野企画" />
    <meta property="og:locale" content="ja_JP" />
    <meta
      property="og:image"
      content="https://maenokikaku.co.jp/assets/images/ogp.png"
    />

    <meta name="twitter:card" content="summary_large_image" />
    <meta
      name="twitter:title"
      content="寺院管理のお問い合わせ｜株式会社前野企画"
    />
    <meta
      name="twitter:description"
      content="寺院管理ソフト「寺院エキスパートシステム」の導入やサポートに関するお問い合わせはこちら。檀家管理や塔婆印刷など、多彩な機能についてお気軽にご相談ください。"
    />
    <meta
      name="twitter:image"
      content="https://maenokikaku.co.jp/assets/images/ogp.png"
    />

    <link rel="icon" href="/favicon.ico" />

    <script
      type="module"
      crossorigin
      src="/assets/modulepreload-polyfill.js"
    ></script>
    <script
      type="module"
      crossorigin
      src="/assets/scripts/common.js"
    ></script>
    <script
      type="module"
      crossorigin
      src="/assets/scripts/pages/contact/index.js"
    ></script>
    <link
      rel="stylesheet"
      crossorigin
      href="/assets/styles/pages/contact/style.css"
    />
  </head>

  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-WBLZ3KD"
        height="0"
        width="0"
        style="display: none; visibility: hidden"
      ></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="wrapper">
      <header class="header">
        <div class="container container--large">
          <div class="flexContainer">
            <a class="logo" href="/">株式会社前野企画</a>

            <nav class="nav">
              <ul class="nav__list">
                <li class="nav__item">
                  <a href="/">ホーム</a>
                </li>
                <li class="nav__item">
                  <a href="/expert/">寺院エキスパートシステム</a>
                </li>
                <li class="nav__item">
                  <a href="/contact/">お問い合わせ</a>
                </li>
              </ul>
            </nav>

            <button id="navBtn" class="navBtn">
              <span class="navBtn__bar"></span>
              <span class="navBtn__bar"></span>
              <span class="navBtn__bar"></span>
            </button>
          </div>
        </div>
      </header>

      <main class="main">
        <section class="section">
          <div class="container">
            <h1 class="heading">お問い合わせ</h1>

            <?php if ($page_flag === 1): ?>
              <div class="mail">
                <ul class="stepBar">
                  <li class="stepBar__item">内容入力</li>
                  <li class="stepBar__item isCurrent">内容確認</li>
                  <li class="stepBar__item">完了</li>
                </ul>

                <form method="post" action="">
                  <div class="mail__item">
                    <div class="mail__itemName">
                      <label class="mail__label">寺院名</label>
                      <span class="mail__required">必須</span>
                    </div>
                    <p><?php echo $clean['your_name']; ?></p>
                  </div>

                  <div class="mail__item">
                    <div class="mail__itemName">
                      <label class="mail__label">メールアドレス</label>
                      <span class="mail__required">必須</span>
                    </div>
                    <p><?php echo $clean['email']; ?></p>
                  </div>

                  <div class="mail__item">
                    <div class="mail__itemName">
                      <label class="mail__label">電話番号</label>
                    </div>
                    <p><?php echo $clean['tel']; ?></p>
                  </div>

                  <div class="mail__item">
                    <div class="mail__itemName">
                      <label class="mail__label">お問い合わせ内容</label>
                      <span class="mail__required">必須</span>
                    </div>
                    <p><?php echo nl2br($clean['contact']); ?></p>
                  </div>

                  <div class="mail__btns">
                    <input
                      class="button button--back"
                      type="submit"
                      name="btn_back"
                      value="戻る"
                    />
                    <input
                      class="button button--submit"
                      type="submit"
                      name="btn_submit"
                      value="入力内容を送信する"
                    />
                  </div>

                  <input
                    type="hidden"
                    name="your_name"
                    value="<?php echo $clean['your_name']; ?>"
                  />
                  <input
                    type="hidden"
                    name="email"
                    value="<?php echo $clean['email']; ?>"
                  />
                  <input
                    type="hidden"
                    name="tel"
                    value="<?php echo $clean['tel']; ?>"
                  />
                  <input
                    type="hidden"
                    name="contact"
                    value="<?php echo $clean['contact']; ?>"
                  />
                </form>
              </div>
            <?php elseif ( $page_flag === 2 ): ?>
              <div class="lead">
                <p>
                  この度はお問い合わせいただき、誠にありがとうございます。
                  <br />
                  いただいた内容につきましては、入力いただいたメールアドレス宛に確認メールを送信しております。
                  <br />
                  もしメールが届かない場合は、入力いただいたメールアドレスに誤りがある可能性があります。
                  <br />
                  お問い合わせの内容には、近日中にご返信いたします。
                </p>
              </div>

              <div class="mail">
                <ul class="stepBar">
                  <li class="stepBar__item">内容入力</li>
                  <li class="stepBar__item">内容確認</li>
                  <li class="stepBar__item isCurrent">完了</li>
                </ul>
              </div>
            <?php else: ?>
              <div class="lead">
                <p>
                  サービスに関するお問い合わせは、お電話またはメールフォームで承っております。
                  <br />
                  お悩みやご相談は、いつでもお気軽にお問い合わせください。
                </p>
              </div>

              <div class="mail">
                <ul class="stepBar">
                  <li class="stepBar__item isCurrent">内容入力</li>
                  <li class="stepBar__item">内容確認</li>
                  <li class="stepBar__item">完了</li>
                </ul>

                <?php if (!empty($error)): ?>
                  <ul class="mail__errorList">
                    <?php foreach($error as $value): ?>
                      <li class="mail__errorItem"><?php echo $value; ?></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>

                <form action="" method="post">
                  <div class="mail__item">
                    <div class="mail__itemName">
                      <label class="mail__label">寺院名</label>
                      <span class="mail__required">必須</span>
                    </div>
                    <input
                      class="mail__input"
                      type="text"
                      name="your_name"
                      value="<?php if (!empty($clean['your_name'])) { echo $clean['your_name']; } ?>"
                      placeholder="例）普蔵院"
                    />
                  </div>

                  <div class="mail__item">
                    <div class="mail__itemName">
                      <label class="mail__label">メールアドレス</label>
                      <span class="mail__required">必須</span>
                    </div>
                    <input
                      class="mail__input"
                      type="text"
                      name="email"
                      value="<?php if (!empty($clean['email'])) { echo $clean['email']; } ?>"
                      placeholder="例）abc@mail.co.jp"
                    />
                  </div>

                  <div class="mail__item">
                    <div class="mail__itemName">
                      <label class="mail__label">電話番号</label>
                    </div>
                    <input
                      class="mail__input"
                      type="tel"
                      name="tel"
                      value="<?php if (!empty($clean['tel'])) { echo $clean['tel']; } ?>"
                      placeholder="例）012-345-6789"
                    />
                  </div>

                  <div class="mail__item">
                    <div class="mail__itemName">
                      <label class="mail__label">お問い合わせ内容</label>
                      <span class="mail__required">必須</span>
                    </div>
                    <textarea
                      class="mail__txtarea"
                      name="contact"
                      placeholder="お問合わせ内容をご入力ください。"
                    ><?php if (!empty($_POST['contact'])) { echo $_POST['contact']; } ?></textarea>
                  </div>

                  <div class="mail__btns">
                    <input
                      class="button button--submit"
                      type="submit"
                      name="btn_confirm"
                      value="入力内容を確認する"
                    />
                  </div>
                </form>
              </div>
            <?php endif; ?>
          </div>
        </section>
      </main>

      <footer class="footer">
        <div class="footer__inner">
          <p class="copyright">&copy; 2025 前野企画</p>
        </div>
      </footer>

      <a
        id="jsPageTop"
        class="pageTop"
        href="#top"
        aria-label="ページの先頭へ戻る"
      ></a>
    </div>
  </body>
</html>
