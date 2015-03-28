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
            players[0].army = createArmy(players[0]);
            send_player_to_server(players[0]);
            $armySize.html('Your Army: ' + players[0].army);
        });//end createPlayer
        checkForOp();
    });//end submit button
    
    function checkForOp(){
        
        console.log("checking for opponent");
        
        $.ajax({
            url: '',
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data){
                if(data.success){
                    players.push(data.player);
                }else{
                    setTimeout(checkForOp, 2000);
                }
            }
        });
    }
}); //end of document.ready