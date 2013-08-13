jQuery.getJSON("js/jsonp.js", 
function(data) {
    alert("Symbol: " + data.symbol + ", Price: " + data.price);
});