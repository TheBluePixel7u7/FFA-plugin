<?php
namespace FFA\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\Level;
use pocketmine\math\Vector3;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\utils\TextFormat;
// Centro xd
use FFA\Loader;

class SelectMapCommand extends PluginCommand{
	
	public function __construct(Loader $plugin){
	parent::__construct("select", $plugin);
	$this->setDescription("Select ffa arena Command");
	$this->setAliases(["selectmap", "smap"]);
	$this->base = $plugin;
}

    public function execute(CommandSender $sender, $label, array $args){
		if(empty($args[0])){
		$sender->sendMessage("§bFFA§6Core§7> §9Use /select <map> \n §aAvaliable maps: §f[1, 2, 2]");
	return false;
	}
	if($args[0] == "1"){

$sender->sendMessage("Teleporting...");//porque agregar "§f" cuando ya el color es blanco? XD

$name = $this->base->getConfig()->get("ffacore.world1.name");//conseguir el nombre del mundo

if(!$this->base->getServer()->isLevelLoaded($name)){//verificar que el mundo no este cargado
$this->base->getServer()->loadLevel($name);//cargar si no lo esta
}
$world = $this->base->getServer()->getLevelByName($name);
if($world instanceof Level){//verificar si el mundo es válido
$sender->teleport($world->getSafeSpawn());
}else{
$sender->sendMessage("error");//error en caso que no lo sea
}

}
	}
}
