<?php
$page_directory = "top";

include("setting.php");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<?php include('inc/link.php'); ?>
<?php include('inc/meta.php'); ?>

<!-- 必ずここはページ毎に名前変更+settingにも追記 -->
<meta name="description" content="<?= $meta['description_top'] ?>">
<meta property="og:description" content="<?= $meta['description_top'] ?>">
<!-- ここまで -->

<meta property="og:title" content="<?= $meta['title'] ?>">
<title><?= $meta['title'] ?></title>

<link rel="stylesheet" media="all" href="css/common.css">
<link rel="stylesheet" media="all" href="css/system.css">
<link rel="stylesheet" media="all" href="css/slick.css">
<link rel="stylesheet" media="all" href="css/top.css">
<?php include('inc/js_cmn.php'); ?>
<script src="js/other/slick.min.js"></script>
<script src="js/topevent.js"></script>

<?php include('inc/analytics.php'); ?>
</head>

<body class="l-<?= $page_directory ?> drawer <?= $meta['drawer_direction'] ?>" id="top">
<?php include('inc/other_tag.php'); ?>
<div role="banner" class="sp">
  <?php include('inc/menu.php'); ?>
</div>

<div class="drawer-overlay">
  <div class="l-wrapper">
    <?php include('inc/header.php'); ?>

    <main class="l-main">
      <article class="list-page">

        <section class="l-visual">
        </section>
        <!-- //.l-visual -->



<?php
// ========================================================================== //
// 新着情報一覧 取得設定

$param = array();
$param['count'] = 4;
$list = qms3_list('news', $param);

// ========================================================================== //
?>
        <section class="l-news l-system">
          <div class="l-news__container">
            <div class="list-page__header">
              <h2 class="title">新着</h2>
              <p class="subtitle">NEWS</p>
            </div>
            <!-- //.list-page__header -->
            <div class="l-news__list clearfix">
<?php foreach ($list as $item) { ?>
              <div class="p-item-news p-item <?= $item->new_class ?> <?= $item->password_class ?>">
                <a href="news/detail.php?id=<?= $item->id ?> clearfix">
                  <div class="p-item__photo ph_sys"><img src="<?= $item->img->src ?>" alt="<?= $item->title(-1, false) ?>"></div>
                  <div class="p-item__inner">
<?php if (!is_empty($item->category)) { ?>
                    <ul class="p-item__icons-category p-item__icons">
                      <?= $item->category_html ?>
                    </ul>
<?php } ?>
                    <div class="p-item__post-title ellipsis"><?= $item->title ?></div>
                    <div class="p-item__post-date"><?= $item->post_date ?></div>
                  </div>
                </a>
              </div>
              <!-- //.p-item-news -->
<?php } ?>
            </div>
            <!-- //.l-news__list -->
            <div class="dark c-button"><a href="news/">詳しく見る</a></div>
          </div>
          <!-- //.l-news__unit-->
        </section>
        <!-- .l-news -->








      </article>
      <!-- //.list-page -->
    </main>
    <!-- //.l-main -->


    <?php include('inc/footer.php'); ?>
  </div>
  <!-- //.l-wrapper -->
</div>
<!-- //drawer-overlay -->

</body>
</html>
