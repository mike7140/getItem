<?php
namespace getItem;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
class Main extends PluginBase implements Listener {
	public function onEnable() {
        	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
//今回は自クラスで関数を呼び出すサンプルコードです。僕が以前にコア破壊鯖を作った時に行数が軽く4000行に到達してしまい、かなり見にくくなってしまった経験があります。そんな問題を回避する方法です。
	public function onTouch(PlayerInteractEvent $event){//プレイヤーがブロックを触ったイベント
		$player = $event->getPlayer();//プレイヤー取得
		$block = $event->getBlock();//ブロック取得
		if($block->getID() == 247){//ブロックのIDが247(ネザーリアクターコア)だったら...
			$item = $this->getItem();//getItem()で下の関数を呼び出します。$itemが返ってきます。
			$player->getInventory()->addItem($item);//プレイヤーにアイテムを追加します。
		}
	}
	public function getItem(){//呼び出される関数です。
		$itemid = mt_rand(0, 15);//アイテムのidを0〜15の中からランダムで選びます。
		$item = Item::get(35, $itemid, 1);//アイテムオブジェクト(羊毛一つ)
		return $item;//呼び出した場合に$itemを返します。
	}
}
