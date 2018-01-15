# Coords

A PocketMine-MP plugin to see your or someone's coordinates. To see your coordinates, use /coords. To see someone's else coordinates, use /coords <player>
## Commands
| Command | Usage | Description |
| ------- | ----- | ----------- |
| `/coords` | `/coords [player]` | See your or someone's coordinates.
## Permissions
```yml
coords.command:
 description: Allows access to all Coords features.
 default: op
 children:
  coords.command.me:
   description: Permission to see your coordinates.
   default: true
  coords.command.others:
   description: Permission to see someone else's coordinates.
   default: op
 ```
