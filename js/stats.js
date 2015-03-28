$('document').ready(function(){
    
    var searchString = $('#new_word');
    var submitButton = $('#word_button');
    var totalStat = $('#total_stat');
    var armySize = $('#army_size');
    var randomizer = $('#random_button');
    var readyToPlay = $('#ready_button');
    
    submitButton.click(function(){
        var p = players[0];
        console.log(searchString); 
        createPlayer(searchString);
        //set army
        p.army = totalArmy(p);
}
                       
        
        
    });
}); //end of document.ready