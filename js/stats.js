$('document').ready(function(){
    
    var $submitButton = $('#word_button');
    var $totalStat = $('#total_stat');
    var $armySize = $('#army_size');
    var $randomizer = $('#random_button');
    var $readyToPlay = $('#ready_button');
    $submitButton.click(function(e){
        var searchString = $('#new_word').val();

        var defer = Q.defer();
        createPlayer(searchString).then(function() {
            var army = createArmy(players[0]);
            players[0].army = createArmy(players[0]);

            $armySize.html(players[0].army);
        });
        
       
     
     
    });
    

    
}); //end of document.ready