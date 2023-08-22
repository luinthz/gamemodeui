<?php
namespace gamemode\lu\forms;

use gamemode\lu\Main;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\player\GameMode;
use pocketmine\player\Player;

class GamemodeForm{
    public static function sendForm(Player $player) : void
    {
        $form = new SimpleForm(function (Player $player, int $data = null) {
            if ($data === null) return true;

            switch ($data) {

                case 0:
                    $b = Main::getInstance()->formconfig()->get("message1");
                    $player->setGamemode(GameMode::CREATIVE());
                    $player->sendMessage($b);
                    break;

                case 1:
                    $b = Main::getInstance()->formconfig()->get("message2");
                    $player->setGamemode(GameMode::SURVIVAL());
                    $player->sendMessage($b);
                    break;

                case 2:
                    $b = Main::getInstance()->formconfig()->get("message3");
                    $player->setGamemode(GameMode::SPECTATOR());
                    $player->sendMessage($b);
                    break;

                case 3:
                    $player->sendMessage("Close Menu.");
                    break;
            }


        });
        $c = Main::getInstance()->formconfig();
        $title = $c->get("title");
        $description = $c->get("description");
        #Creative
        $b1 = $c->get("button1");
        $t1 = $c->get("texture1");
        #Survival
        $b2 = $c->get("button2");
        $t2 = $c->get("texture2");
        #Spectator
        $b3 = $c->get("button3");
        $t3 = $c->get("texture3");



        $form->setTitle("$title");
        $form->setContent("$description");
        $form->addButton("$b1", 0, "$t1");
        $form->addButton("$b2", 0, "$t2");
        $form->addButton("$b3", 0, "$t3");
        $form->addButton("§cClose", 0);

        $form->sendToPlayer($player);

    }
}