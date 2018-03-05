<?php
namespace FFA\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\utils\TextFormat;
// Centro xd
use FFA\Loader;

class SelectMapCommand extends PluginCommand{
	
	public function __construct(Loader $plugin){
	parent::__construct("select", $plugin);
	$this->setDescription("Select ffa arena Command");
	$this->setAliases(["selectmap", "smap"]);
}

    public function execute(CommandSender $sender, $label, array $args){
		if(empty($args[0])){
		$sender->sendMessage("§bFFA§6Core§7> §9Use /select <map> \n §aAvaliable maps: §f[1, 2, 2]");
	return false;
	}
	if($args[0] == "1"){
		$sender->sendMessage("§fTeleporting.....");
	}
	}
}
