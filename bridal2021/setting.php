<?php

$protocol = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") ? "https" : "http";

$meta = array(
  "ga_id"             => "〇〇", //info〇〇 -ここにanalyticsアカウントを記載-
  "ga4_id"            => "〇〇", //info〇〇 -ここにanalyticsアカウントを記載-
  "web_fonts"         => "uax0crw",
  "title"             => "【公式】システムデモ｜テストテストテストテスト",
  "h1"                => "システムデモ",
  "keywords"          => "",
  "description"       => "ディスクリプションが入ります。",

  "tel"               => "000-000-0000", //電話番号
  "tel_link"          => "0000000000", //電話番号（リンク用）
  "fax"               => "000-000-0000", //電話番号
  "zip"               => "〒000-0000", //住所
  "address"           => "〒000-0000 住所が入ります", //住所
  "time"              => "00:00～00:00　定休日無し", //営業時間
  "mail"              => "", //メール
  "map_link"          => "https://goo.gl/maps/nukbNDBasm42", //google mapsリンク
  "map_emb"           => "https://www.google.com/maps/embed?pb", //google maps 埋め込み地図

  "fb_link"           => "", //facebookページリンク
  "tw_link"           => "", //twitterページリンク
  "ig_link"           => "", //Instagramページリンク
  "yt_link"           => "", //youtubeチャンネルリンク
  "pin_link"          => "", //pinterestページリンク
  "tt_link"           => "", //tiktokチャンネルリンク
  "note_link"         => "", //noteページリンク
  "line_link"         => "", //lineページリンク
  "line_txt"          => urlencode("【公式】システムデモ｜テストテストテストテスト"), //「ラインで送る」テキスト

  "company"           => "", //コーポレートURL
  "mynavi"            => "", //マイナビページリンク

  "root"              => "http://gvrtk76.xbiz.jp/bridal2021", //URL
  "root_form"         => "http://gvrtk76.xbiz.jp/bridal2021", //URL（フォーム）※同じ場合も必ず記入

  "copy"              => "COPYRIGHT © ATSUMARU Inc. ALL RIGHTS RESERVED.",

  "drawer_direction"  => "drawer-top",

  //ワードプレスのファンデーション配下で構築を行う時はこの記述に変更・追加してください
  //'root'        => home_url(),
  //'root_form'   => home_url(),  // URL（フォーム）※同じ場合も必ず記入
  //'theme'       => get_template_directory_uri(),  // テーマのディレクトリ名（基本的には変更しない）



  //ディスクリプション：個別設定(description_〇〇の部分にディレクトリ名を記載)
  "description_top"    => "ディスクリプションが入ります。", //TOP
  "description_reason" => "ディスクリプションが入ります。", //選ばれる理由
  "description_number" => "ディスクリプションが入ります。", //数字で見る
  "description_news"   => "ディスクリプションが入ります。", //新着情報
);

$directory = "";
include_once(__DIR__ . "/system/wp-load.php");


//ワードプレスのファンデーション配下で構築を行う時はこの記述に変更してください
//$directory = get_template_directory_uri();


if (isset($_GET['param']) && $_GET['param'] == 'thanks') {
  global $form_type;
  global $thanks_path;

  qms3_form($form_type, 'total');
  exit();
}
