<?php

namespace wq2ne;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getConfig()->save();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDisable(): void {
        $this->getConfig()->save();
    }

    public function onJoin(PlayerJoinEvent $event): void {
        $event->setJoinMessage("");
    }

    public function PlayerJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $playerName = $player->getName();
        $joinmsg = $this->getConfig()->get("joinmsg");
        $joinmsg = str_replace("{player}", $playerName, $joinmsg);
        $event->setJoinMessage($joinmsg);
    }

    public function PlayerLeave(PlayerQuitEvent $event): void {
        $player = $event->getPlayer();
        $playerName = $player->getName();
        $leavemsg = $this->getConfig()->get("leavemsg");
        $leavemsg = str_replace("{player}", $playerName, $leavemsg);
        $event->setQuitMessage($leavemsg);
    }
}