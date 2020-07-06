<?php
namespace FFA;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerJoinEvent;
// commands
use FFA\Commands\SelectMapCommand;
use FFA\SlidePlayer;
use FFA\Tasks\Task;

class Loader extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		$this->getLogger()->info("Enabled.");
		$this->getServer()->getCommandMap()->register("select", new SelectMapCommand($this));
	}
	
	public function HudTask(){
	$this->getScheduler()->scheduleRepeatingTask(new TimeTask($this), 30)->getTaskId();
	}
	
	public function onJoin(PlayerJoinEvent $ev){
		$player = $ev->getPlayer();
		
		$player->sendMessage($this->getConfig()->get("ffacore.player.join.server","")); //thx becraft <3
	}
}
