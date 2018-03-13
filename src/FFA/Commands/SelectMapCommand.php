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
use FFA\SlidePlayer;
use FFA\Tasks\Task;

class SelectMapCommand extends PluginCommand{
	
	public function __construct(Loader $plugin){
	parent::__construct("select", $plugin);
	$this->setDescription("Select ffa arena Command");
	$this->setAliases(["ffa", "smap"]);
	$this->base = $plugin;
}
       // based in SoupFFA by McpeBooster
    public function execute(CommandSender $sender, $label, array $args){
		if(empty($args[0])){
		$sender->sendMessage("§bFFA§6Core§7> §9Use /select <1> \n §a
}Avaliable maps: §f[1]");
	return false;
	}
    if($args[0] == "1"){
		 
		 $player = $sender;
         $world = $sender->getLevel()->getFolderName();
         $arena = $this->base->getConfig()->get("ffacore.player.join");
         if ($arena == $world) {
             $player->sendMessage($this->base->getConfig()->get("ffacore.player.join"));
             return false;
                    }
                    if ($arena == $world){
                        $player->sendMessage($this->base->getConfig()->get("ffacore.arena.player.isalready"));
                        return false;
                    } else {
                        $player->PlayerJoin();
						$player->Task();
                        return true;
                    }
	        }elseif ($args[0] == "leave" or $args[0] == "quit"){
					$player = $sender;
                    $world = $player->getLevel()->getFolderName(); // que sea un mundo xd
                    $arena = $this->base->getConfig()->get("ffacore.player.leave");
                    if ($arena == $world) {
                        $player->PlayerLeave();
                        return true;
                    }
	}
}
}
