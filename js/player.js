var playerID = 0;
var players = [];					// pushing the players inside this empty array
																 // class is player 
function Player(obj) {        // every player is going to be a new player
    this.health = null;											 // health these are the properties of the class
    this.strength = null;  										 // speed etc.
    this.speed = null;				
    this.army = createArmy(flickrPhotoCount, hashtagCount);
    this.playerID = playerID++;
    
    for (var key in obj) {
        this[key] = obj[key];
    }    
}

function createPlayer(obj) {									// were grabbing teh certain value from the words
    Promise.resolve( getTwitter() ).then(function(obj) {			// if the getTwitter is loaded
        Promise.resolve( getFlickr(obj) ).then(function(obj) {	// if the getFlickr is loaded
            players.push( new Player(obj) );	// create the object when both of the top stuff are loaded
        });
    });
}