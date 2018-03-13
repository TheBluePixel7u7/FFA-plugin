<?php
namespace FFA;

use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\network\Sourceinterface;
use FFA\Loader;
class SlidePlayer extends Player {
    private $base;

    public function __construct(Sourceinterface $interface, $clientID, $ip, $port){
        parent::__construct($interface, $clientID, $ip, $port);
        $this->base = Loader::getInstance();
    }

    public function PlayerJoin(){
        $arenaname = $this->base->getConfig()->get("ffacore.arena.name");
        if (!$this->base->getServer()->isLevelLoaded($arenaname)){
            $this->base->getServer()->loadLevel($arenaname);
        }
        $arenalevel = $this->getServer()->getLevelByName($arenaname);
        $arenaspawn = $arenalevel->getSafeSpawn();
        $arenalevel->loadChunk($arenaspawn->getX(), $arenaspawn->getZ());
        $this->teleport($arenaspawn, 0, 0);
        $this->giveKit();
        $this->sendMessage($this->base->getConfig()->get("ffacore.player.join.inarena"));
        return true;
    }
    public function PlayerLeave(){
        $default = $this->base->getServer()->getDefaultLevel();
        $spawn = $default->getSafeSpawn();
        $this->teleport($spawn, 0, 0);
        $this->setFood(20);
        $this->setHealth(20);
        $this->getInventory()->clearAll();
        $this->sendMessage($this->base->getConfig()->get("ffacore.player.leave"));
		if($this->base->getConfig()->get("ffacore.hub.gamemode.adventure") == true){
			$this->sendPopup(":D");
		}
        return true;
    }
    /**
     * @return bool
     */
	 public function TopKill(){
		 null
	 }
	 /**
$contents = array();

foreach($this->getConfig()->get("Items") as $datos){
$data = explode(":", $datos);
if(($item = Item::get($data[0], $data[1], $data[2])) instanceof Item){
$contenido[] = $item;
}
}

	 */
    public function giveKit(){
        $inv = $this->getInventory();
        $inv->clearAll();
        $slots = array(1, 2, 3, 4, 5, 6, 7, 8);
        foreach ($slots as $s) {
            $inv->setItem($s, Item::get(282));
        }
        if ($this->base->getConfig()->get("ffacore.kit.vip") == true && $this->hasPermission($this->base->getConfig()->get("ffacore.perm.kit.vip"))){
			foreach()
            $sword = $this->base->getConfig()->get("ffacore.items.sword");
			$i1 = $this->base->getConfig()->get("ffacore.items.1");
			$i2 = $this->base->getConfig()->get("ffacore.items.2");
			$i3 =$this->base->getConfig()->get("ffacore.items.3");
            $helmet = $this->base->getConfig()->get("ffacore.armor.helmet");
            $chestplate = $this->base->getConfig()->get("ffacore.armor.chestplate");
            $leggings = $this->base->getConfig()->get("ffacore.armor.leggings");
            $boots = $this->base->getConfig()->get("ffacore.armor.boots");
        }else{
            $sword = $this->base->getConfig()->get("ffacore.items.sword.vip");
			$i1 = $this->base->getConfig()->get("ffacore.items.1.vip");
			$i2 = $this->base->getConfig()->get("ffacore.items.2.vip");
			$i3 =$this->base->getConfig()->get("ffacore.items.3.vip");
            $helmet = $this->base->getConfig()->get("ffacore.armor.helmet.vip");
            $chestplate = $this->base->getConfig()->get("ffacore.armor.chestplate.vip");
            $leggings = $this->base->getConfig()->get("ffacore.armor.leggings.vip");
            $boots = $this->base->getConfig()->get("ffacore.armor.boots.vip");
        }
        $inv->setItem(0, Item::get($sword));
        $inv->setHelmet(Item::get($helmet));
        $inv->setChestplate(Item::get($chestplate));
        $inv->setLeggings(Item::get($leggings));
        $inv->setBoots(Item::get($boots));
        $inv->sendArmorContents($this);
        $this->setFood(20);
        $this->setHealth(20);
        return true;
    }
}
