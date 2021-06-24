var handlebars  = require('handlebars');

handlebars.registerHelper('select_content', function(str){
   // console.log(arguments)

   var json       = Array.prototype.slice.call(arguments,0)[0];
   var selector   = Array.prototype.slice.call(arguments,1)[0];
   var exact      = Array.prototype.slice.call(arguments,2)[0];

   /*
   console.log(json)
   console.log(selector)
   console.log(exact)
   console.log(json[selector])
   console.log(json[selector][exact])
   */

   return json[selector][exact];
});

module.exports = handlebars;