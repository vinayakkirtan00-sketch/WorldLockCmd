<?php

namespace WorldLockCmd;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;
use pocketmine\event\EventHandler;
use pocketmine\player\Player;

class Main extends PluginBase implements Listener {

    protected function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    #[EventHandler]
    public function handleCommand(CommandEvent $event): void {
        $sender = $event->getSender();

        if (!$sender instanceof Player) {
            return;
        }

        if ($sender->hasPermission("worldlockcmd.bypass")) {
            return;
        }

        $command = strtolower($event->getCommand());
        $worldName = $sender->getWorld()->getFolderName();

        $worlds = $this->getConfig()->get("worlds", []);
        if (!isset($worlds[$worldName])) {
            return;
        }

        $blocked = array_map("strtolower", $worlds[$worldName]);

        if (in_array($command, $blocked, true)) {
            $event->cancel();
            $sender->sendMessage($this->getConfig()->get("blocked-message"));
        }
    }
}
        if (in_array($command, $blocked, true)) {
            $event->cancel();
            $sender->sendMessage($this->getConfig()->get("blocked-message"));
        }
    }
}
