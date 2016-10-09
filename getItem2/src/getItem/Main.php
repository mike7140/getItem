<?php
namespace getItem;
require_once "makeRandom.php";//Main.phpと一緒に入っているmakeRandom.phpを読み込みます。makeRandom.phpの関数が使用できるようになります。
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
	public function onTouch(PlayerInteractEvent $event){//プレイヤーがブロックを触ったイベント
		$player = $event->getPlayer();//プレイヤー取得
		$block = $event->getBlock();//ブロック取得
		if($block->getID() == 247){//ブロックのIDが247(ネザーリアクターコア)だったら...
			$m = new Random();//makeRandom.phpのクラスを読み込みます。
			$itemid = $m->makeRandom();//クラスRandomのmakeRandomという関数を実行します。
			$item = Item::get(35, $itemid, 1);
			$player->getInventory()->addItem($item);
		}
	}
}
