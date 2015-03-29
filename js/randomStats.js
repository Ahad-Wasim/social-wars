var statDummyValue = 30; //document.querySelector("#total_stat").innerHTML
var sum = 0;

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
function shuffle(o){ 
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};



$(document).ready(function(){

    var numbArray = [];
    var finalArray = [];
    var healthInput = $("#health_input");
    var speedInput = $("#speed_input");
    var damageInput = $("#damage_input");

    if (statDummyValue!=NaN) {
        var i = getRandomInt(1,100);
        //console.log("i", i);
        numbArray.push(i);
        var q = 100 - i;
        //console.log("q", q);
        numbArray.push(100 - i);
        //console.log(numbArray);
        
        if (numbArray[0] > numbArray[1])
        {
            var split = numbArray[0];
            var firstIndexSplit = Math.floor((getRandomInt(1, 100)/100)*numbArray[0]);
            var otherPortion = (split - firstIndexSplit);
            //console.log("First Index 1 part: ",firstIndexSplit);
            //console.log("First Index 2nd part: ",otherPortion);
            numbArray.splice(0,1, firstIndexSplit);
            numbArray.push(otherPortion);
            //console.log("final array", numbArray);
        }
        else 
        {
            var splish = numbArray[1];
            var secondIndexSplit = Math.floor((getRandomInt(1, 100)/100)*numbArray[1]);
            var otherPortioni = (splish - secondIndexSplit);
            //console.log("Second Index 1 part: ",secondIndexSplit);
            //console.log("Second Index 2nd part: ",otherPortioni);
            numbArray.splice(1,1, secondIndexSplit);
            numbArray.push(otherPortioni);
            //console.log("final array", numbArray);
        }
        shuffle(numbArray);
        //console.log("Shuffled", numbArray);
        var total = 0;

        for(var j=0; j<numbArray.length; j++) {
            var increment = 0;
            
            numbArray[j] = (Math.floor (numbArray[j]/10))*10;

            if(numbArray[j]===0) 
            {
                increment++;
            }
            
            if(j==2 && increment==2) 
            {
                numbArray[j]+=20;
            } else if(j==2)
            {
                numbArray[j]+=10;
            } 
            //console.log("each number is: ", numbArray[j]);
            

            total+=numbArray[j];
            //console.log("the total equals", total);

            if (j==2 && total == 90) 
            {
                numbArray[j]+=10;
            } else if (j==2 && total == 90) 
            {
                numbArray[j]-=10;
            }
            finalArray.push(numbArray[j]);

        }
        
        //console.log("FinalArray without statTotal", finalArray);
        for (var l = 0; l < finalArray.length; l++) 
        {
            var logTHis = finalArray[l]/100;
            var newii = logTHis * statDummyValue;
            finalArray[l] = newii;

        }
        //console.log("Distribution of random statPointValue", finalArray);
    } 
    else {
        console.log("Error");
    }
    healthInput.attr("value", finalArray[0]);
    speedInput.attr("value", finalArray[1]);
    damageInput.attr("value", finalArray[2]);
    
    
});