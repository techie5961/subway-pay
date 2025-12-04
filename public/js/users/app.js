
// auto fill
function AutoFill(amount,input,callback=null){
  input.value=amount;
  if(callback !== null){
    callback(amount,input);
  }
}