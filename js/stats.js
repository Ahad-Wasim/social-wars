$('document').ready(function(){
    // cache jQuery objects for later use
    var $submitButton = $('#word_button'),
        $totalStat = $('#total_stat'),
        $armySize = $('#army_size'),
        $randomizer = $('#random_button'),
        $readyToPlay = $('#ready_button');
    
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

    $submitButton.click(function(e){
        var searchString = $('#new_word').val();
        // execute callback function once createPlayer has finished
        Promise.resolve(createPlayer(searchString)).then(function(player) {
            $armySize.html('Army Size : ' + player.army);
        });

        // checkForOp();
    });
}); // document.ready