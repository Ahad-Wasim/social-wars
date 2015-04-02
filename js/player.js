var playerID = 0;
var players = [];                   // pushing the players inside this empty array
                                                                 // class is player 
function Player(obj) {  
    var self = this;
     // every player is going to be a new player
    self.health = '';                                          // health these are the properties of the class
    self.attack = '';                                        // speed etc.
    //self.speed = '';              
    self.army = '';
    self.speed = '';
    self.position = '';
    self.userID = '';
    self.playerID = playerID++;
    console.log(obj);
    for (var key in obj) {
        //console.log(key);
        self[key] = obj[key];
    }   
}

Player.prototype.set = function(prop, val) {
    this['prop'] = val;
}

Player.prototype.get = function(prop) {
    return this['prop'];
}
function send_player_to_server(player)
{
    console.log("send player to server called", player);
    var data  = {player: player};
    $.ajax({
        url: 'action/updatePlayer.php',
        cache: false,
        data: data,
        dataType: 'json',
        method: 'post',
        success: function(response){
            player.position = response.player.position;
            player.userID = response.player.userID;
            console.log("Player updated: ", player);
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
                //console.log("Create player resonse: " + resp2);
                players.push( new Player(resp2) );   // create the object when both of the top stuff are loaded
                defer.resolve(players);
                //push data to php file
                //send_army_to_server();
            }).catch(function(response) {
                console.error("Error in create player: ",response);
                defer.reject(response);
            })
        }).catch(function(response) {
            console.error("Error in create player: ",response);
            defer.reject(response);
        });
        // });
    // });
    return defer.promise;
}


