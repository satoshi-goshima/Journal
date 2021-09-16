<?php

header("Content-Type: text/html; charset=UTF-8");

$filepath = __DIR__ . "/test_sjis.csv";

// mb_convert_encodingでCSVから取得した文字列をsjisからutf-8に変換
$buf = mb_convert_encoding(file_get_contents($filepath), "utf-8", "sjis");

// tmpfile関数で一時ファイルを作成
$handle = tmpfile();

// $bufの内容を $handleが指しているファイル・ストリームに書き込む
fwrite($handle, $buf);

// $handleのファイル位置指示子を、ファイルストリームの先頭にセット
rewind($handle);

while (($line = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $records[] = $line;
}
fclose($handle);
var_dump($records);

// var_dump($_POST);
// exit();

// データの受け取り
$slip_date = $_POST["slip_date"];
$slip_number = $_POST["slip_number"];
$l_dep_cd = $_POST["l_dep_cd"];
$l_dep = $_POST["l_dep"];
$l_sub_cd = $_POST["l_sub_cd"];
$l_sub = $_POST["l_sub"];
$l_aux_sub_cd = $_POST["l_aux_sub_cd"];
$l_aux_sub = $_POST["l_aux_sub"];
$l_tax_class = $_POST["l_tax_class"];
$l_tax_rate = $_POST["l_tax_rate"];
$l_money = $_POST["l_money"];
$r_dep_cd = $_POST["r_dep_cd"];
$r_dep = $_POST["r_dep"];
$r_sub_cd = $_POST["r_sub_cd"];
$r_sub = $_POST["r_sub"];
$r_aux_sub_cd = $_POST["r_aux_sub_cd"];
$r_aux_sub = $_POST["r_aux_sub"];
$r_tax_class = $_POST["r_tax_class"];
$r_tax_rate = $_POST["r_tax_rate"];
$r_money = $_POST["r_money"];
$des = $_POST["des"];

// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$slip_date},{$l_sub},{$l_money},{$r_sub},{$r_money},{$des}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/journal.csv', 'a');

// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

// ファイルのロックを解除する
flock($file, LOCK_UN);

// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:csv_input.php");