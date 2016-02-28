![Logo](http://i.imgur.com/icvQwoU.png)

**What is the Ullr Game Engine?** Simply, its a engine to develop a text based RPG game. Ullr is not an out of the box game, work will need done before you could launch a game.

Ullr has been made with the [MakeWebGames](http://www.makewebgames.com) community in mind. This is it's official home where you'll be able to find Updates, Help and Plugins. [Ullr on MWG](http://www.makewebgames.com/forum/game-engines/ullr)

**The engine consists of 2 main parts -**
The **Core**, which handles everything and has the main functions built into it.
The **Plugins** - These are what turns your copy of Ullr from an engine into a Game!
The engine is built upon a few main things. PHP, SQL (at this stage just MySQL), Bootstrap and an MVC structure.

**Whats is the Core?** The core is made using an Model View Controller structure which handles all the requests in and out of the engine.
It holds all the main functions that a large variety of plugins will need to use to transfer information between the engine and a plugin.

**What can the Engine do?** Currently the engine has the ability to - register an user, approve their account via email, let them login where they will be greeted with the internal Homepage.
From there its up to the plugins you install.
The engine also stores the main parts to a users account - Personal Information, Stats (ie. Strength, Speed, Health, etc.) and currency. (More may be added if there is a need across the engine for it).

**The Plugins - **This is where you really start to make a difference. ​Installing Plugins is as simple as 1,2,3.
1. Drop the plugin into the plugin folder of the engine.
2. Add any SQL.
3. Add a link/s to the game so your users can access it.
The means that a plugin does not need to rely on anything but the engine to work.

Creating a plugin is slightly harder, you can check that out on [MWG](http://www.makewebgames.com/forum/game-engines/ullr)

Ullr comes with two plugins pre-installed to get you going.
**Profile** - This can either display a users profile through a link or the user can edit their own profile information.
The second is a **Crime** plugin and demo. It is heavily commented in the code so that you can get an understanding of how plugins work. With this plugin, the user can commit a crime using energy and if they are successful gain experiance in return. If they fail the crime, they loose the energy. Then on the admin side, an admin can add, edit or delete crimes for users to commit.
This plugin is ment to be simple to show you how it works.

**Design -** The layout of the front end of the engine uses a simple structured design and bootstrap to implement it. This means you just add your own styling to the custom css sheets and the entire look is changed.
Because the design is completely separate from any logic code, it also means that you can add your own template and it wont break the engine.
This can be as easy as dropping your template into the correct folder and changing 1 line of code in the cofig file. None of that going through every file business.

**Where to for Ullr?** I will continue to make Ullr better and develop a few plugins to go with it. I'd like this to very much be a community driven engine, and i'll be taking on board every bit of advice or criticism. Updates will be as regular as possible to the core, so again i'd urge you not to change anything in the core apart from the *.custom.css sheets and any Views. Those will be removed from updates so you can have your own style/design.

**Cost?** Free , but feel free to send me a [donation](www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=979GQB4HL3T8G) if you want.

Hopefully you find it a valuable tool in creating your next game.

Hedge

