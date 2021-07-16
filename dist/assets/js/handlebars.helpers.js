var handlebars = require('handlebars');

handlebars.registerHelper('selectContent', function (str) {
  // console.log(arguments)
  // One method of copying the arguments then pulling from them.
  var json = Array.prototype.slice.call(arguments, 0)[0];
  var selector = Array.prototype.slice.call(arguments, 1)[0];
  var exact = Array.prototype.slice.call(arguments, 2)[0];
  return json[selector][exact];
});
handlebars.registerHelper('classConcat', function (value, locals, options) {
  // Makes more sense to separate out the parameters from the beginning.
  var prepend = value;
  var classNames = locals.hash.classNames;
  prepend = value + "__";
  classNames = classNames.split(' ');
  classNames = classNames.map(className => prepend + className);
  classNames = classNames.join(' ');
  return classNames;
});
module.exports = handlebars;