<!DOCTYPE html>
<html lang="ja">

<style>

legend{
  font-size: x-large;
}

#myTable .tablesorter-header {
	cursor: pointer;
	outline: none;
}

#myTable .tablesorter-header-inner::after { 
	content: '▼';
	font-size: 12px;
	margin-left: 5px;
}

table {
  margin-top: 10px;
  border-collapse: collapse;
  border-spacing: 0;
}

thead{
  background-color: skyblue;
}

th {
    text-align: center;
    border:solid;
    width: 5%;
}

td {
    border:solid;
    width: 5%;
    padding-left: 10px;
}

table tr td:nth-of-type(3){
  text-align: right;
  padding-right: 10px;
}

table tr td:nth-of-type(5){
  text-align: right;
  padding-right: 10px;
}

.tekiyou{
    width: 20%;
}

</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js"></script>

  <title>仕訳帳</title>
</head>

<body>

  <fieldset>
    <legend>仕訳帳</legend>
    <a href="csv_input.php">仕訳入力</a>
    <table class="tablesorter" id="myTable">
      <thead>
        <tr>
          <th>日　付</th>
          <th>借方科目</th>
          <th>借方金額</th>
          <th>貸方科目</th>
          <th>貸方金額</th>
          <th class="tekiyou">摘　　要</th>
        </tr>
      </thead>
        <tbody>
        <?php

// データまとめ用の空文字変数
$str = '';

// ファイルを開く（読み取り専用）
$file = fopen('data/journal.csv', 'r');
// ファイルをロック
flock($file, LOCK_EX);

while (($array = fgetcsv($file)) !== FALSE) {
	
	//空行を取り除く
	if(!array_diff($array, array(''))){
		continue;
	}
	
	echo "<tr class='item'>";
	for($i = 0; $i < count($array); ++$i ){
		$elem = nl2br(mb_convert_encoding($array[$i], 'UTF-8', 'UTF-8'));
		$elem = $elem === "" ?  "&nbsp;" : $elem;
		echo("<td>".$elem."</td>");
	}
	echo "</tr>";
	
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// `$str`に全てのデータ（タグに入った状態）がまとまるので，HTML内の任意の場所に表示する

?>

      </tbody>
    </table>
  </fieldset>

<script>

$(document).ready(function() { 
	$("#myTable").tablesorter();
});

$("#myTable").tablesorter({
	sortList: [[0, 0]]
});

</script>

</body>

</html>