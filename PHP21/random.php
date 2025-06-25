<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>PHP基礎編</title>
</head>

<body>
	<p>
		<?php
		// 変数$diceにサイコロの出目（1〜6までのランダムな整数）を代入する
		$dice = mt_rand(1,6);

		// サイコロの出目を出力する
		echo "{$dice}の目が出ました。";
		?>
	</p>
	<p>
		<?php
		// おみくじの結果を入れた配列$omikujiを作成する
		$omikuji = ['大吉', '中吉', '小吉', '吉', '末吉', '凶', '大凶'];

		// 変数$keyにランダムな配列のキー（インデックス）を代入する
		$key = array_rand($omikuji);

		// 取得した配列のキー（インデックス）を使ってその値を取得し、変数$resultに代入する
		$result = $omikuji[$key];

		// おみくじの結果を出力する
		echo "おみくじの結果は{$result}です。";
		?>
	</p>
</body>

</html>





<?php
// 応用問題
// セッションを開始
session_start();

// ランダムな数値を生成してセッションに保存（初回アクセス時のみ）
if (!isset($_SESSION['target_number'])) {
    $_SESSION['target_number'] = mt_rand(1, 100);
}

// 結果メッセージを初期化
$message = '';

// プレイヤーの入力を処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームから送信された値を取得
    $user_input = filter_input(INPUT_POST, 'guess', FILTER_VALIDATE_INT);

    if ($user_input === false || $user_input < 1 || $user_input > 100) {
        $message = '数字は1から100の間で入力してください';
    } else {
        $target_number = $_SESSION['target_number'];
        if ($user_input > $target_number) {
            $message = 'もっと小さいです！';
        } elseif ($user_input < $target_number) {
            $message = 'もっと大きいです！';
        } else {
            $message = '正解です！おめでとうございます！';
            // ゲームをリセット
            $_SESSION['target_number'] = mt_rand(1, 100);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数字当てゲーム</title>
</head>
<body>
    <h1>数字当てゲーム</h1>
    <p>1から100の間の数字を当ててください！</p>
    
    <form method="POST">
        <label for="guess">あなたの数字:</label>
        <input type="number" id="guess" name="guess" required>
        <button type="submit">送信</button>
    </form>

    <?php if ($message): ?>
        <p><strong><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></strong></p>
    <?php endif; ?>
</body>
</html>