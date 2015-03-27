var playerID = 0;
var players = [];                   // pushing the players inside this empty array
                                                                 // class is player 
function Player(obj) {  
    var self = this;
     // every player is going to be a new player
    self.health = 'sdfsdf';                                          // health these are the properties of the class
    self.strength = 'sdfsdf';                                        // speed etc.
    self.speed = 'sdfsdf';              
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

function createPlayer(obj) {                                    // were grabbing teh certain value from the words
    // Promise.resolve( getFlickr() ).then(function(obj) {          // if the getTwitter is loaded
        // Promise.resolve( getFlickr(obj) ).then(function(obj) {   // if the getFlickr is loaded
        getFlickr().then(function(response) {
            console.log('response =', response);
            var o = {
                url: 'sdasdad',
                count: 'asdasdasd',
            }
            
            players.push( new Player(response) );   // create the object when both of the top stuff are loaded
        });
        // });
    // });
}

createPlayer();

