<?php

namespace WorldLockCmd;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

class Main extends PluginBase implements Listener {

    protected function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommandUse(PlayerCommandPreprocessEvent $event): void {
        $player = $event->getPlayer();

        // Bypass permission
        if ($player->hasPermission("worldlockcmd.bypass")) {
            return;
        }

        $message = strtolower(trim($event->getMessage()));
        if (!str_starts_with($message, "/")) {
            return;
        }

        $command = explode(" ", substr($message, 1))[0];
        $worldName = $player->getWorld()->getFolderName();

        $worlds = $this->getConfig()->get("worlds", []);
        if (!isset($worlds[$worldName])) {
            return;
        }

        $blocked = array_map("strtolower", $worlds[$worldName]);

        if (in_array($command, $blocked, true)) {
            $event->cancel();
            $player->sendMessage($this->getConfig()->get("blocked-message"));
        }
    }
}
