$('document').ready(function(){
    // cache jQuery objects for later use
    var $submitButton = $('#word_button');
    var $totalStat = $('#total_stat');
    var $armySize = $('#army_size');
    var $randomizer = $('#random_button');
    var $readyToPlay = $('#ready_button');

    $submitButton.click(function(e){
        var searchString = $('#new_word').val();

        // execute callback function once createPlayer has finished
        Promise.resolve(createPlayer(searchString)).then(function(player) {
            $armySize.html('Army Size : ' + player.army);
        });
    });
}); //end of document.ready