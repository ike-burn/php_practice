<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>PHP基礎編</title>
</head>

<body>
	<p>
		<?php
		// クラスを定義する
		class Product {
			// プロパティを定義する
			public $name;

			// メソッドを定義する
			public function set_name(string $name) {
				$this->name = $name;
			}
			public function show_name() {
				echo $this->name . '<br>';
			}
		}

		// インスタンス化する
		$coffee = new Product();

		// メソッドにアクセスして実行する
		$coffee->set_name('コーヒー');
		$coffee->show_name();

		// インスタンス化する
		$shampoo = new Product();

		// プロパティにアクセスし、値を代入する
		$shampoo->name = 'シャンプー';

		// プロパティにアクセスし、値を出力する
		echo $shampoo->name;
		?>
	</p>
	<p>
		<?php
		// クラスを定義する
		class User {
			// プロパティを定義する
			private $name;
			private $age;
			private $gender;

			// コンストラクタを定義する
			public function __construct(string $name, int $age, string $gender) {
				$this->name =$name;
				$this->age =$age;
				$this->gender =$gender;
			}
		}

		// インスタンス化する
		$user = new User('侍太郎', 36, '男性');

		// インスタンス$userの各プロパティの値を出力する
		print_r($user);
		?>
	</p>
	<p>
		<?php

		class Event
		{
			private $name;
			private $date;
			private $location;

			// コンストラクタ
			public function __construct($name, $date, $location)
			{
				$this->name = $name;
				$this->date = new DateTime($date);
				$this->location = $location;
			}

			// 各プロパティの値を取得するメソッド
			public function getName()
			{
				return $this->name;
			}

			public function getDate()
			{
				return $this->date->format('Y-m-d');
			}

			public function getLocation()
			{
				return $this->location;
			}

			// 開催日までの日数を返すメソッド
			public function daysUntilEvent()
			{
				$today = new DateTime();
				$interval = $today->diff($this->date);
				return $interval->days;
			}
		}

		// 実行結果
		$event = new Event(
			'プログラミング初心者向けセミナー',
			'2025-10-1', // 現在より未来の仮日付を設定
			'東京国際フォーラム'
		);

		// 各プロパティにアクセスして値を出力
		echo "イベント名: " . $event->getName() . PHP_EOL;
		echo "開催日:" . $event->getDate() . PHP_EOL;
		echo "開催場所:" . $event->getLocation() . PHP_EOL;

		// 開催日までの日数を出力
		echo "開催日までの日数: " . $event->daysUntilEvent() . "日" . PHP_EOL;

		?>
	</p>
</body>

</html>