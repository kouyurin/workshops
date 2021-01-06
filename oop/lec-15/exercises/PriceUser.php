<?php
require_once "../pages/db.php";
require_once "Item.php";

try {
	// データベース節即オブジェクトを取得
	$pdo = connectDB();

	// 実行するSQLを設定
	$sql = "select * from item";
	// SQL実行オブジェクトを取得
	$pstmt = $pdo->prepare($sql);
	// SQLの実行
	$pstmt->execute();
	// SQLの実行結果をItemクラスのインスタンスの配列に入れ替える
	$records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	$items = [];
	foreach ($records as $record) {
		$id = $record["id"];
		$name = $record["name"];
		$price = $record["price"];
		$item = new Item($name, $price);
		$item->setId($id);
		$items[] = $item;
	}
} catch (PDOException $e) {
	// SQLエラーが有った場合はエラーメッセージを表示して中断
	echo $e->getMessage();
	die;
} finally {
	// データベース接続関連オブジェクトを解放
	unset($pstmt);
	unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>lec-15　課題</title>
</head>
<body>
	<h1>lec-15　課題</h1>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>商品名</th>
			<th>価格</th>
		</tr>
		<?php foreach($items as $item): ?>
		<tr>
			<td><?= $item->getId() ?></td>
			<td><?= $item->getName() ?></td>
			<td>&yen;<?= number_format($item->getPrice()) ?></td>
			<!-- number_format関数：引数に指定した整数をカンマ「,」で桁区切りされた文字列に変換する関数です。 -->
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
