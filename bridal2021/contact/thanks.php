<?php
ini_set("display_errors", "On");
error_reporting(E_ALL);

require_once(__DIR__."/../system/wp-load.php");


$form_type = "contact";

$param = array();

$param['form_name'] = 'お問い合わせ';
$param['step'] = 'thanks';

$form = qms3_form_init($form_type, $param);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $form->form_name ?> | デモフォーム</title>
<link rel="stylesheet" href="../system/wp-content/plugins/qms3_form_brick/demo/css/style.css?v=<?= time() ?>">
</head>

<body>

<main class="l-main">
  <section class="l-main__header">
    <h2 class="l-main__title">Demo Form</h2>
    <small class="l-main__sub-title"><?= $form->form_name ?></small>
  </section>
  <!-- /.l-main__header -->

  <div class="l-main__inner">
    <section class="l-form-container">
      <div class="l-form-container__flow">
        <?= $form->flow ?>

      </div>
      <!-- /.l-form-container__flow -->

      <div class="l-form-container__inner">
        <div class="thanks">
          <h3 class="thanks__title"><?= $form->form_name ?>が完了しました</h3>

          <p class="thanks__message">
            この度はお問合せいただき<br class="sp">誠にありがとうございます。<br>
            登録いただいたメールアドレス宛に<br class="sp">確認のメールをお送りいたしました。<br>
            万が一、メールが届かない場合は<br class="sp">システムエラー等の可能性がありますので、<br>
            お手数ですがお電話でご連絡ください。
          </p>

          <div class="thanks__buttons">
            <div class="thanks__button-unit">
              <a href="./">戻る</a>
            </div>
            <!-- /.thanks__button-unit -->
          </div>
          <!-- /.thanks__buttons -->
        </div>
        <!-- /.thanks -->
      </div>
      <!-- /.l-form-container__inner -->
    </section>
    <!-- /.l-form-container -->
  </div>
  <!-- /.l-main__inner -->
</main>
<!-- /.l-main -->

</body>
</html>
