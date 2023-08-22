<?php
namespace gamemode\lu;
use gamemode\lu\cmds\GamemodeCMD;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase implements  Listener{
    use SingletonTrait;
    public static Main $main;
    public function onEnable(): void
    {
        $this->saveDefaultConfig();
        $this->saveResource("CmdConfig.yml");
        $this->saveResource("FormConfig.yml");
        $this->getServer()->getCommandMap()->register("gm", new GamemodeCMD());
        $this->getLogger()->info("-> ready");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onLoad():void{
        self::$main = $this;
    }
    public static function getInstance() :self{
        return self::$main;
    }
    public function cmdconfig(): Config{
        return new Config($this->getDataFolder(). "CmdConfig.yml", Config::YAML);
    }
    public function formconfig(): Config{
        return new Config($this->getDataFolder(). "FormConfig.yml", Config::YAML);
    }
}

// L.U