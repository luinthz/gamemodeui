<?php
namespace gamemode\lu\cmds;

use gamemode\lu\forms\GamemodeForm;
use gamemode\lu\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\Server;

class GamemodeCMD extends Command implements Listener{
    public function __construct()
    {
        $db = Main::getInstance()->cmdconfig();
        $c = $db->get("message-noaccess");
        $d = $db->get("description");
        parent::__construct("gm");
        $this->setPermission("gm.cmd");
        $this->setPermissionMessage("$c");
        $this->setDescription("$d");
        $this->setUsage("gm");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args) : void
    {
        if (!$sender instanceof Player) $sender->sendMessage("Console not accepted.");
        if ($sender->hasPermission("gm.cmd") or Server::getInstance()->isOp($sender->getName())) {
            if($sender instanceof Player){
                GamemodeForm::sendForm($sender);
            }
        }

    }
}