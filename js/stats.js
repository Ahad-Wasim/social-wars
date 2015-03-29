$('document').ready(function(){
    
    var $submitButton = $('#word_button');
    var $totalStat = $('#total_stat');
    var $armySize = $('#army_size');
    var $randomizer = $('#random_button');
    var $readyToPlay = $('#ready_button');
    $submitButton.click(function(e){
        var searchString = $('#new_word').val();

        Promise.resolve(createPlayer(searchString)).then(function(player) {
            console.log('look at me', player);
            
            console.log(player['army']);

            $armySize.html('Army Size : ' + player.army);
        });
        
       
     
     
    });
    

    
}); //end of document.ready