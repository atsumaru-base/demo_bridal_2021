<?php
$type = "news";
$pagetitle = "新着情報";
$page_directory = "news";
?>
<?php include('../setting.php') ?>
<?php
// ========================================================================== //
// 新着情報 詳細取得設定

$post_id = qms3_post_id($_GET['id']);
$param = array();
$item = qms3_detail($post_id, $param);

// ========================================================================== //
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<?php include('../inc/link.php'); ?>
<?php include('../inc/meta.php'); ?>

<!-- 必ずここはページ毎に名前変更+settingにも追記 -->
<meta name="description" content="<?= $meta['description_news'] ?>">
<meta property="og:description" content="<?= $meta['description_news'] ?>">
<!-- ここまで -->

<meta property="og:title" content="<?= $pagetitle ?> | <?= $meta['title'] ?>">
<title><?= $pagetitle ?> | <?= $meta['title'] ?></title>

<link rel="stylesheet" media="all" href="../css/common.css">
<link rel="stylesheet" media="all" href="../css/page.css">
<link rel="stylesheet" media="all" href="../css/system.css">
<?php include('../inc/js_cmn.php'); ?>

<?php include('../inc/analytics.php'); ?>
</head>


<body class="l-detail l-system l-<?= $page_directory ?> l-page drawer <?= $meta['drawer_direction'] ?>" id="top">
<?php include('../inc/other_tag.php'); ?>
<div role="banner" class="sp">
  <?php include('../inc/menu.php'); ?>
</div>

<div class="drawer-overlay">
  <div class="l-wrapper">
    <?php include('../inc/header.php'); ?>

    <main class="l-main">

      <article class="list-page">

        <div class="list-page__header">
          <h2 class="title"><?= $pagetitle ?></h2>
          <p class="subtitle"><?= $page_directory ?></p>
        </div>
        <!-- //.list-page__header -->

        <section class="list-page__main">

          <div class="l-<?= $page_directory ?>__list l-list">
            <div class="p-item-<?= $page_directory ?> p-item <?= $item->new_class ?> <?= $item->password_class ?> clearfix">
              <div class="p-item__photo ph_sys"><img src="<?= $item->img->src ?>" alt=""></div>
              <div class="p-item__inner">
<?php if (!is_empty($item->category)) { ?>
                <ul class="p-item__icons-category p-item__icons">
                  <?= $item->category_html ?>
                </ul>
<?php } ?>
                <div class="p-item__post-title"><?= $item->title ?></div>
                <div class="p-item__post-date"><?= $item->post_date ?></div>
              </div>
              <!-- /.p-item__inner -->
            </div>
            <!-- /.p-item -->
          </div>
          <!-- /.l-list -->

<?php if ($item->password_required) { ?>
          <div class="l-password_form"><?= $item->password_form ?></div>
<?php } else { ?>
          <div class="l-contents">
            <div class="system_article">
              <?= $item->contents ?>
            </div>
            <!-- /.system_article -->
          </div>
          <!-- /.l-contents -->
<?php } ?>

          <div class="prev dark back c-button"><a href="./"><?= $pagetitle ?>一覧</a></div>

        </section>
        <!-- //.list-page__main -->

      </article>
      <!-- //.list-page -->
    </main>
    <!-- //.l-main -->

    <?php include('../inc/footer.php'); ?>
  </div>
  <!-- //.l-wrapper -->
</div>
<!-- //drawer-overlay -->

</body>
</html>
