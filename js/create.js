function createArmy(obj) {
    return Math.floor( (parseInt(obj['totalPhotoCount']) + parseInt(obj['totalPageCount'])) / 2 );
}

function getTotalStats(me, opponent){
    var avg = (me[army] + opponent[army]) / 2;
    
    //var avg = (me+opponent)/2;
    
    var avgStr = avg.toString();
    var loop = avgStr.length-2;

    var divide = '1';
    for(var i=0; i<loop; i++){
        divide += '0';
    }
    
    var statMax = Math.floor(avg / parseInt(divide));
    var statMin = statMax - 15;
    var forRandom = statMax - statMin;
    
    //console.log("Avg: " + avg + " divide: " + divide + " statMax: " + statMax + " statMin: " + statMin + " forRandom: " + forRandom);
    
    var stat = Math.floor((Math.random() * forRandom) + statMin);
    //console.log("Before bonus: " + stat);
    
    //Change to object
    if(me < opponent){
        
        var extra = Math.floor((Math.random() * 5) + 5);
        stat += extra;
        console.log("You got bonus points + " + extra);
    }
    
    return stat;
}