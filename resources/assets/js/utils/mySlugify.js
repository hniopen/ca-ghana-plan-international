import slugify from 'slugify'
const standardOptions = {'lower': true, 'remove': /[^a-z|A-Z|0-9|\s]/}; 

const mySlugify = function (string, options = {}) {
  var options = Object.assign({}, standardOptions, options);
  return slugify(string, options);
} 
  
export default mySlugify;
