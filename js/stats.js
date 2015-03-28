$('document').ready(function(){
    
    var submitButton = $('#word_button');
    var totalStat = $('#total_stat');
    var armySize = $('#army_size');
    var randomizer = $('#random_button');
    var readyToPlay = $('#ready_button');
    submitButton.click(function(e){
        var searchString = $('#new_word').val();
        var p = players[0];
        var defer = Q.defer();
        createPlayer(searchString).then(function() {
            p.army = totalArmy(p);
        });
        
        //set army
     
     
    });
    

    
}); //end of document.ready