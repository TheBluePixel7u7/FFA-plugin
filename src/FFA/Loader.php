<?php
namespace FFA;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerItemHeldEvent;
// commands
use FFA\Commands\SelectMapCommand;

class Loader extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		$this->getLogger()->info("Enabled.");
		$this->getServer()->getCommandMap()->register("select", new SelectMapCommand($this));
	}
}
