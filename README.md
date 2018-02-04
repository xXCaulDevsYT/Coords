# Coords
![](http://isitmaintained.com/badge/resolution/kenygamer/Coords.svg)
![](https://img.shields.io/github/release/kenygamer/Coords/all.svg)
![](https://img.shields.io/github/downloads/kenygamer/Coords/total.svg)

A PocketMine-MP plugin to see your or someone's coordinates. To see your coordinates, use /coords. To see someone's else coordinates, use /coords \<player\>
## Commands
| Command | Usage | Description |
| ------- | ----- | ----------- |
| `/coords` | `/coords [player]` | See your or someone's coordinates.
## Permissions
```yml
coords:
 description: Allows access to all Coords features.
 default: false
 children:
  coords.command:
   description: Allows access to all Coords commands.
   default: false
   children:
    coords.command.coords:
     description: Allows access to the coords command.
     default: op
     children:
      coords.command.coords.others:
       description: "Permission to see someone else's coordinates."
       default: op
 ```
