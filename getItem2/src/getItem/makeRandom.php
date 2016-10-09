<?php
namespace getItem;
class Random{//Main.phpから呼び出しがあった場合に動作します。
	public function makeRandom(){
		$itemid = mt_rand(0, 15);//0〜15の中で乱数を作ります
		return $itemid;//乱数を返します。
	}
}
