<?php

if ( !defined( 'ABSPATH' ) ) exit;

// 分割したファイルパスを配列に追加
$function_files = [
  '/src/assets/functions/load.php',
  '/src/assets/functions/init.php',
  '/src/assets/functions/load_css_async.php',
  '/src/assets/functions/custom_breadcrumb.php',
  '/src/assets/functions/custom_labels.php',
  '/src/assets/functions/custom-function.php',
];

foreach ($function_files as $file) {
  if ((file_exists(__DIR__ . $file))) { // ファイルが存在する場合
    // ファイルを読み込む
    locate_template($file, true, true);
  } else { // ファイルが見つからない場合
    // エラーメッセージを表示
    trigger_error("`$file`ファイルが見つかりません", E_USER_ERROR);
  }
}



