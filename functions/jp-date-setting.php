<?php
  /* Prageeth Sudarshana | Tokyo */
  
  /*
		Japanes date setting
	*/

	function jpDate(
					$type		= 'Y-n-j(w) H:i:s',	// ex) 'y/n/j(w) H:i:s'
					$time_stamp,					// ex) 1266190776 ※UNIXタイムスタンプ
					$setup		= array()
				   ) {

		
		// ファンクション読み込み
		include_once("include/public_holiday.php");
		
		// 曜日のデフォルト色 r = 赤（祝祭日）, b = 青（土）
		$set['wk']		= array('r' => '#ff0000', 'b' => '#3366ff');

		// timeスタンプが無い場合は現在時間を入力
		$time_stamp	= (!$time_stamp ? time() : $time_stamp);

		// 曜日の色を囲むタグのデフォルト設定
		if (empty($setup['tag']) || $setup['tag'] == 'span') {
			$setup['tag']	= 'span';
			
		} else if ($setup['tag'] == 'font') {
			$setup['tag']	= 'font';
		}
		
		
		if (!empty($setup['color']['r']) || !empty($setup['color']['b'])) {
			// 曜日の色のデフォルト設定 r = 祝祭日, b = 土
			if (!preg_match("/^#([a-zA-Z0-9]+)$/", $setup['color']['r']) || !preg_match("/^#([a-zA-Z0-9]+)$/", $setup['color']['b'])) {
				$setup['color']	= $set['wk'];
			}
		
		} else {
			$setup['color']	= $set['wk'];
		}
		
		// 曜日の色を囲むタグのデフォルト設定 all = 全体 , week = 曜日のみ
		if (empty($setup['color_area'])) {
			$setup['color_area']	= 'week';
			  
		} else if ($setup['color_area'] != 'week') {
			$setup['color_area']	= 'all';
		}
		
		// 出力エンコード
		if (!empty($setup['encode'])) {
			if (!preg_match("/^(EUC|EUC-JP|EUCJP-WIN|SJIS|SJIS-WIN)$/", $setup['encode'])) {
				$setup['encode']	= 'UTF-8';
			}
		
		} else {
			$setup['encode']	= 'UTF-8';
		}

		// 曜日の配列を作成
		$week_jp	= array('日' , '月' , '火' , '水' , '木' , '金' , '土');

		// 曜日の配列をUTF-8エンコード変換
		if ($setup['encode'] != 'UTF-8') {

			foreach ($week_jp as $key => $value) {
				$week_jp[$key]	= mb_convert_encoding($value, $setup['encode'], 'UTF-8');
			}
		}

		// 日付に変換＆曜日部分「w」を「@」に変換
		$str	= date(str_replace("w", "@", $type), $time_stamp);

		// 祝日判定
		$hd		= get_holiday($time_stamp);
		$wnum	= date("w", $time_stamp);
		
		// 曜日の色を取得
		if ($hd['rc'] > 0 || $wnum == 0) {
			$week_color	= $setup['color']['r'];	// 祝祭日
		
		} else if ($wnum == 6) {
			$week_color	= $setup['color']['b'];	// 土
		}
		// 曜日名を取得
		$week	= $week_jp[$wnum];

		// 曜日の色と日時を混合する
		if (!empty($week_color)) {

			// spanタグ
			if ($setup['tag'] == 'span') {
			
				// 曜日のみ色を付ける
				if ($setup['color_area'] == 'week') {
					$str	= str_replace("@", "<span style=\"color:{$week_color}\">{$week}</span>", $str);

				// 全体に色を付ける	
				} else if ($setup['color_area'] == 'all') {
					$str	= "<span style=\"color:{$week_color}\">{$str}</span>";
					$str	= str_replace("@", $week, $str);

				// 不明（色は付けない）
				} else {
					$str	= str_replace("@", $week, $str);
				}

			// fontタグ
			} else if ($setup['tag'] == 'font') {
			
				// 曜日のみ色を付ける
				if ($setup['color_area'] == 'week') {
					$str	= str_replace("@", "<font color=\"{$week_color}\">{$week}</font>", $str);

				// 全体に色を付ける	
				} else if ($setup['color_area'] == 'all') {
					$str	= "<font color=\"{$week_color}\">{$str}</font>";
					$str	= str_replace("@", $week, $str);

				// 不明（色は付けない）
				} else {
					$str	= str_replace("@", $week, $str);
				}

			// 不明（色は付けない）
			} else {
				$str	= str_replace("@", $week, $str);
			}
		
		} else {	// 曜日の色変更なし
			$str	= str_replace("@", $week, $str);
		}
		return $str;
	}

?>
