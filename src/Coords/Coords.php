<?php

/*
 * Coords - A PocketMine-MP plugin to see your or someone else's coordinates
 * Copyright (C) 2017 Kevin Andrews <https://github.com/kenygamer/Coords>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
*/

declare(strict_types=1);

namespace Coords;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Coords extends PluginBase{
  
  /**
   * @param CommandSender $sender
   * @param Command $cmd
   * @param string $label
   * @param array $args
   *
   * @return bool
   */
  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
    if(isset($args[0]) and !$sender instanceof Player){
      $sender->sendMessage(TextFormat::RED . "Please run command in-game.");
      return true;
    }
    if(!isset($args[0])){
      if(!$sender->hasPermission("coords") || !$sender->hasPermission("coords.command.me")){
        $sender->sendMessage(TextFormat::RED . "You do not have permission to use this command");
        return true;
      }
      $x = round($sender->getX());
      $y = round($sender->getY());
      $z = round($sender->getZ());
      $level = $sender->getLevel()->getName();
      $sender->sendMessage("X: " . TextFormat::GREEN . $x . TextFormat::WHITE . " Y: " . TextFormat::GREEN . $y . TextFormat::WHITE . " Z: " . TextFormat::GREEN . $z . TextFormat::WHITE . "\n" . "Level: " . TextFormat::GREEN . $level);
      return true;
    }
    
    if(!$sender->hasPermission("coords") || !$sender->hasPermission("coords.command.others")){
      $sender->sendMessage(TextFormat::RED . "You do not have permission to use this command");
      return true;
    }
    
    $player = strtolower($args[0]);
    if(($player = $this->getServer()->getPlayer($player)) === null){
      $sender->sendMessage(TextFormat::RED . "Player is not online.");
      return true;
    }
    $x = round($player->getX());
    $y = round($player->getY());
    $z = round($player->getZ());
    $level = $player->getLevel()->getName();
    $sender->sendMessage(TextFormat::GREEN . $player->getName() . "'s" . TextFormat::WHITE . " coordinates: [" . TextFormat::GREEN . $x . TextFormat::WHITE . ", " . TextFormat::GREEN . $y . TextFormat::WHITE . ", " . TextFormat::GREEN . $z . TextFormat::WHITE . "] (level: " . TextFormat::GREEN . $level . TextFormat::WHITE . ")");
    return true;
  }
  
}
