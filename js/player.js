var players = [];                   
                                                                
function Player(obj) {  
    Player.id = 0;

    var self = this;
    
    self.health = '';                                       
    self.strength = '';                                      
    self.speed = '';              
    
    self.playerID = Player.id++;

    for (var key in obj) {
        self[key] = obj[key];
    }   
}

Player.prototype.set = function(prop, val) {
    this['prop'] = val;
}

Player.prototype.get = function(prop) {
    return this['prop'];
}
function send_players_to_server()
{
    console.log("send players to server called", players);
    var data  = {players: players};
    $.ajax({
        url: 'action/receive_player_initial_info.php',
        cache: false,
        data: data,
        method: 'post',
        success: function(response){
            console.log(response);
        }
    })
}
function createPlayer(str) {

    // Outputs new player object with properties from the flickr and twitter api
    // as well as calculated army

    // After getFlickr finishes, it passes its ouput to the callback flickrResponse     
    return Promise.resolve(getFlickr(str)).then(function(flickrResponse) {

        // convert flickrResponse to wanted player properties which we pass to new player
        var passInfo = {
            'url': createPhotoObject(flickrResponse.photos.photo),
            'totalPhotoCount': parseFloat(flickrResponse.photos.total),
            'totalPages': parseFloat(flickrResponse.photos.pages),
        }

        var player = new Player(passInfo);

        // callback function returns a promise which waits for getTwitter to finish then 
        // passes its output to the next callback
        return Promise.resolve(getTwitter(str)).then(function(twitterResponse) {
            // add twitter to player properties
            for (var key in twitterResponse) {
                player[key] = twitterResponse[key];
            }
            
            // calculate army size as twitter and flickr info set by here
            player.army = createArmy(player);

            players.push( player );  

            // pass the new player object to the next callback
            return player;
            
            // send_players_to_server();
        });

    
    }).then(function(output) {
        // output is the player object which we return for the on click handler to use
        // to update the view
        return output;
    });

};
