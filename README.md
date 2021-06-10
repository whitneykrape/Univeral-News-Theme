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

Ghost Template Use:
1. At the moment, copying over the original Casper theme. (More details incoming.)
2. Commit, have a post-receive hook that reboots Ghost. 
```
cd /var/www/ghostbasediretory/html/;ghost restart
```

Netlify Hugo Template Use:
1. Copy /site and /src into the base /netlify install.
2. Modify CSS by copying over the /src/css/style.css (and map) files.
3. Yarn Build, have a GIT in your DIST that doesn't get wiped out. 
4. Push to live.

WordPress Template Use:
Coming soon.

Next 3 commits:
1. Usable WordPress template (basic container for blocks.)
2. webpack for proper mod management.
3. Gulp? that that eliminates above. Deals templates with "ease." 