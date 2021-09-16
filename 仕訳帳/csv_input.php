<!DOCTYPE html>
<html lang="ja">

<style>

fieldset div{
  margin: 10px 0;
}

.tekiyo{
  width: 456px;
}

legend{
  font-size: x-large;
}

</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>仕訳入力画面</title>
</head>

<body>
  <form action="csv_create.php" method="POST">
    <fieldset>
      <legend>仕訳入力画面</legend>
      <a href="csv_read.php">仕訳帳</a>
      <div>
        伝票日付: <input type="date" name="slip_date">
      </div>
      <!-- <div>
        伝票番号: <input type="number" name="slip_number">
      </div>

      <div>
        借方部門CD: <input type="number" name="l_dep_cd">
      </div>
      <div>
        借方部門: <input type="text" name="l_dep">
      </div>
      <div>
        借方科目CD: <input type="text" name="l_sub_cd">
      </div> -->
      <div>
        借方科目: <input type="text" name="l_sub">　／　貸方科目: <input type="text" name="r_sub">
      </div>
      <!-- <div>
        借方補助科目CD: <input type="text" name="l_aux_sub_cd">
      </div>
      <div>
        借方補助科目: <input type="text" name="l_aux_sub">
      </div>
      <div>
        借方税区分: <input type="text" name="l_tax_class">
      </div>
      <div>
        借方税率: <input type="text" name="l_tax_rate">
      </div>
      <div>
        借方金額: <input type="text" name="l_money">
      </div> -->

      <!-- <div>
        貸方部門CD: <input type="number" name="r_dep_cd">
      </div>
      <div>
        貸方部門: <input type="text" name="r_dep">
      </div>
      <div>
        貸方科目CD: <input type="text" name="r_sub_cd">
      </div> -->
      <div>
      借方金額: <input type="text" name="l_money">　／　貸方金額: <input type="text" name="r_money">
      </div>
      <!-- <div>
        貸方補助科目CD: <input type="text" name="r_aux_sub_cd">
      </div>
      <div>
        貸方補助科目: <input type="text" name="r_aux_sub">
      </div>
      <div>
        貸方税区分: <input type="text" name="r_tax_class">
      </div>
      <div>
        貸方税率: <input type="text" name="r_tax_rate">
      </div>
      <div>
        貸方金額: <input type="text" name="r_money">
      </div> -->

      <div>
        摘　　要: <input type="text" name="des" class="tekiyo">
      </div>
      <div>
        <button>仕訳計上</button>
      </div>
    </fieldset>
  </form>

</body>

</html>