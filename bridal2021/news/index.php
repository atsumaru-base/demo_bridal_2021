<?php
$type = "news";
$pagetitle = "新着情報";
$page_directory = "news";

include('../setting.php')
?>
<?php
// ========================================================================== //

// 新着情報 その他一覧 取得設定
$param = array();

if (isset($_GET['CAT'])  ) { $param['cat']   = $_GET['CAT'];   }
if (isset($_GET['YEAR']) ) { $param['year']  = $_GET['YEAR'];  }
if (isset($_GET['MONTH'])) { $param['month'] = $_GET['MONTH']; }
if (isset($_GET['PAGE']) ) { $param['page']  = $_GET['PAGE'];  }

$list = qms3_list($type, $param);
$page_info = $list->page_info;


// 新着情報 カテゴリー取得設定
$param = array();
$category_list = qms3_category_list($type, $param);

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


<body class="l-index l-system l-<?= $page_directory ?> l-page drawer <?= $meta['drawer_direction'] ?>" id="top">
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


        <section class="list-page__main clearfix">

          <div class="list-page__list">
<?php if (isset($_GET['CAT'])) { ?>
            <h3 class="list-page__list-title"><?= esc_html($_GET['CAT']) ?></h3>
<?php } ?>
<?php if (!is_empty($rec_list)) { ?>
            <h3 class="list-page__list-title">その他の記事</h3>
<?php } ?>
            <div class="l-<?= $page_directory ?>__list l-list l-column_03 clearfix">
<?php foreach ($list as $item) { ?>
              <div class="p-item-<?= $page_directory ?> p-item <?= $item->new_class ?> <?= $item->password_class ?>">
                <a
                  id="news<?= $item->id ?>"
                  href="detail.php?id=<?= $item->id ?>"
                  class="clearfix"
                >
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
              <!-- //.p-item -->
<?php } ?>
            </div>
            <!-- //.l-list -->


<?php if ($page_info->has_prev || $page_info->has_next) { ?>
            <ul class="l-pager clearfix">
<?php if ($page_info->has_prev) { ?>
              <li class="prev dark back c-button">
                <a href="?<?= $page_info->prev_query ?>">前の<?= $page_info->prev_count ?>件を見る</a>
              </li><!-- /.next -->
<?php } ?>

<?php if ($page_info->has_next) { ?>
              <li class="next dark c-button">
                <a href="?<?= $page_info->next_query ?>">次の<?= $page_info->next_count ?>件を見る</a>
              </li><!-- /.next -->
<?php } ?>
            </ul>
<?php } ?>
          </div>
          <!-- //.list-page__list -->

          <aside class="list-page__side">
            <div class="widget">
              <p class="widget__header en">ARCHIVE</p>
              <div class="widget__main">
                <div class="widget__main-nextback en clearfix">
<?php if (qms3_has_prev_year_posts($type)) { ?>
                  <p class="widget__main-back"><a href="?YEAR=<?php qms3_prev_year($type) ?>"><span>BACK</span></a></p>
<?php } ?>
                  <p class="widget__main-year"><?php qms3_current_year() ?></p>
<?php if (qms3_has_next_year_posts($type)) { ?>
                  <p class="widget__main-next"><a href="?YEAR=<?php qms3_next_year($type) ?>"><span>NEXT</span></a></p>
<?php } ?>
                </div>
                <ul class="widget__main-month">
<?php
$html='<li><a href="?YEAR=[year]&amp;MONTH=[month]">[month]月（[count]）</a></li>';
?>
<?php qms3_archive_list($type, $html) ?>
                </ul>
              </div>
              <!-- //.widget__main -->
            </div>
            <!-- //.widget -->

            <div class="widget">
              <p class="widget__header en">CATEGORY</p>
              <div class="widget__main">
                <ul>
<?php foreach ($category_list as $item) { ?>
                  <li><a href="?CAT=<?= $item->slug ?>"><?= $item->name ?>（<?= $item->count ?>）</a></li>
<?php } ?>
                </ul>
              </div>
              <!-- //.widget__main -->
            </div>
            <!-- //.widget -->
          </aside>
          <!-- //.list-page__side -->

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
