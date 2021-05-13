<?php
ini_set("display_errors", "On");
error_reporting(E_ALL);

require_once(__DIR__."/../system/wp-load.php");


$form_type = "contact";

$param = array();

$param['form_name'] = 'お問い合わせ';

$form = qms3_form_init($form_type, $param);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $form->form_name ?> | デモフォーム</title>
<link rel="stylesheet" href="../system/wp-content/plugins/qms3_form_brick/demo/css/style.css?v=<?= time() ?>">

<script src="../js/cmn/jquery.min.js"></script>
<script src="<?= qms3_form_js_url() ?>?v=<?= time() ?>"></script>
<script>
let QMS3_FORM = <?= $form->metadata ?>;
</script>
<script>
jQuery(function($) {
  $('form').qms3_form({
    validation_rules: QMS3_FORM.validation_rules,
    autokana: QMS3_FORM.autokana,
    zip2addr: QMS3_FORM.zip2addr,
    datepicker: {
    },

    button_submit: '.form__button-submit',
    num_remaining: '.js__form-num-remaining var',
  });
});
</script>

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

      <form
        action="<?= $form->action ?>"
        method="POST"
        enctype="<?= $form->enctype ?>"
      >
        <div class="l-form-container__inner">
          <div class="form">
            <div class="form__content">
<?php foreach ($form as $block) { ?>
              <?= $block->render() ?>

<?php } ?>
            </div>
            <!-- /.form__content -->

            <div class="l-form-container__buttons">
              <?= $form->buttons ?>
            </div>
            <!-- /.l-form-container__buttons -->
          </div>
          <!-- /.form -->
        </div>
        <!-- /.l-form-container__inner -->
      </form>
    </section>
    <!-- /.l-form-container -->
  </div>
  <!-- /.l-main__inner -->
</main>
<!-- /.l-main -->

<div class="form-num-remaining js__form-num-remaining">
  残り項目数 <var></var> です
</div>
<!-- /.form-num-remaining.js__form-num-remainin -->

</body>
</html>
