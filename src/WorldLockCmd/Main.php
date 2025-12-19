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
        $this->getLogger()->info("WorldLockCmd enabled successfully");
    }

    #[EventHandler]
    public function onCommandEvent(CommandEvent $event): void {
        $sender = $event->getSender();

        // Sirf players ke liye
        if (!$sender instanceof Player) {
            return;
        }

        // Bypass permission
        if ($sender->hasPermission("worldlockcmd.bypass")) {
            return;
        }

        // Command name
        $command = strtolower($event->getCommand());

        // World name
        $worldName = $sender->getWorld()->getFolderName();

        // Config worlds
        $worlds = $this->getConfig()->get("worlds", []);

        if (!isset($worlds[$worldName])) {
            return;
        }

        $blockedCommands = array_map("strtolower", $worlds[$worldName]);

        // Block command
        if (in_array($command, $blockedCommands, true)) {
            $event->cancel();
            $sender->sendMessage(
                (string) $this->getConfig()->get("blocked-message", "§cYou cannot use this command here.")
            );
        }
    }
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
