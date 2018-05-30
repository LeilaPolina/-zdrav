
function isValidDate (input_date) {
  input_date=input_date.replace(/\s/g,'');
  var date_pattern=RegExp('19\\d\\d$|20\\d\\d$');
  if(!date_pattern.test(input_date))  {
    return false;
  }
  var date=Number(input_date);
  var current_year=new Date().getFullYear();
  if(date > current_year) {
    return false;
  }
  return true;
}

function isValidHeight(input_height) {
    input_height=input_height.replace(/\s/g,'');
    var height_pattern=RegExp('^\\d+$');
    if(!height_pattern.test(input_height)) {
        return false;
    }
    var height=Number(input_height);
    if(height < 50 || height > 250) {
      return false;
    }
    return true;
}

function isValidWeight(input_weight) {
  input_weight=input_weight.replace(/\s/g,'');
  var weight_pattern=RegExp('^\\d+([.]\\d+)?$');
  if(!weight_pattern.test(input_weight)) {
    return false;
  }
  var weight=Number(input_weight)
  if(weight < 10 || weight > 500) {
    return false;
  }
  return true;
}
