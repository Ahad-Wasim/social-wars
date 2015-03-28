var playerID = 0;
var players = [];                   // pushing the players inside this empty array
                                                                 // class is player 
function Player(obj) {  
    var self = this;
     // every player is going to be a new player
    self.health = '';                                          // health these are the properties of the class
    self.strength = '';                                        // speed etc.
    self.speed = '';              
    // this.army = createArmy(flickrPhotoCount, hashtagCount);
    self.playerID = playerID++;
    console.log(obj);
    for (var key in obj) {
        console.log(key);
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
    var defer = Q.defer();                                  // were grabbing teh certain value from the words
    // Promise.resolve( getFlickr() ).then(function(obj) {          // if the getTwitter is loaded
        // Promise.resolve( getFlickr(obj) ).then(function(obj) {   // if the getFlickr is loaded
        getFlickr(str).then(function(resp1) {
            getTwitter(str).then(function(resp2) {
                for (var key in resp1) {
                    resp2[key] = resp1[key];
                }

                players.push( new Player(resp2) );   // create the object when both of the top stuff are loaded
                defer.resolve(players);
                //push data to php file
                send_players_to_server();
            }).catch(function(response) {
                console.error(response);
                defer.reject(response);
            })
        }).catch(function(response) {
            console.error(response);
            defer.reject(response);
        });
        // });
    // });
    return defer.promise;
}


