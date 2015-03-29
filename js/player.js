var playerID = 0;
var players = [];                   
                                                                
function Player(obj) {  
    var self = this;
    
    self.health = '';                                       
    self.strength = '';                                      
    self.speed = '';              
    
    self.playerID = playerID++;

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
    return Promise.resolve(getFlickr(str)).then(function(resp1) {
        var resp1 = {
            'url': createPhotoObject(resp1.photos.photo),
            'totalPhotoCount': parseFloat(resp1.photos.total),
            'totalPages': parseFloat(resp1.photos.pages),
        }

        var player = new Player(resp1);

        Promise.resolve(getTwitter(str)).then(function(resp2) {
            for (var key in resp2) {
                player[key] = resp2[key];
            }
            
            player.army = createArmy(player);

            players.push( player );  
            
            // send_players_to_server();
        });

        console.log(player);

        return player;
    });

};
