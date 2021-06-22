# UNN-News-Theme
Starting from a simple HTML theme to be a universal theme for multiple platforms.

Started from:
Skeleton https://github.com/dhg/Skeleton (move to https://github.com/Selekkt/skelet)
Craft base template.
Ghost base template.
Hugo Netlify https://github.com/netlify-templates/one-click-hugo-cms

Need to update Gulp. Been running Sass right from the scss folder with: (Almost fixed.)
sass style.scss:../css/style.css --watch --style compressed

The style.css and style.css.map in /base-html/assets/css/ (and more places in the future) don't carry simlinks into Git. Will manually shoehorn some sort of fix in.

Craft Template Use:
1. Copy everything in /base-craft into the install (note to self research multiple templates in craft)
2. Modify CSS by copying over the /web/static/styles/style.css (and map) files.
3. Repo the overall Craft install directory but ignore the unneeded directories.  
# (Upcoming commit will have Gulp moving and packing files. Composer install craft.)

Ghost Template Use:
1. At the moment, copying over the original Casper theme. (More details incoming.)
2. Commit, have a post-receive hook that reboots Ghost. 
```
cd /var/www/ghostbasediretory/html/;ghost restart
```
# (Upcoming commit will have Gulp moving and packing files. Yarn install Ghost without needing global?)

Netlify Hugo Template Use:
1. Copy /site and /src into the base /netlify install.
2. Modify CSS by copying over the /src/css/style.css (and map) files.
3. Yarn Build, have a GIT in your DIST that doesn't get wiped out. 
4. Push to live.
# (Upcoming commit will have Gulp moving and packing files. Standardize to Hugo One-Click, that gets regular updates.)

WordPress Template Use:
1. WordPress template is now started in standard WordPress folder structure, so composer can build an example WordPress for smoke test, initial integration.
# (Upcoming commit will have Gulp moving and packing files.)

Next 3 commits:
1. Usable WordPress template (basic container for blocks.)
2. webpack for proper mod management.
3. Gulp? that that eliminates above. Deals templates with "ease." 
# All of these are in but need refining, strongly, so:
3.5. Refine webpack, gulp, split templates, develop WordPress template.
4. Have the ability to choose a theme and it refactor for the particular CMS. 

X. Have a dependency for theme updates from Craft, Ghost, Hugo? and WordPress. Very open ended, but as the templates evolve, have a way of pulling in those iterated pieces.


Stop reading... Here.
Tried some other translation avenues, not ideal. Translations will be in proper formats, manually created for main pieces. Translation on this repo is more for learning, will make it easy to sidestep.

こんいちわ

日本語指導

すみません、初挑戦です 

翻訳はいつか適切になるだろう

Bonjour, 

Après ce sont des instructions en français.

Excusez-moi, il s'agit d'une traduction de premier passage et sera améliorée.