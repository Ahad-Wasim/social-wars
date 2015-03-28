function battle(attacker, defender, dice){
    var attack = attacker.totalHealth * dice;
    
    defender.totalHealth -= attack;
    
    return attack;
}
    
function totalHealth(player){
    return player.army * player.health;
}

function totalDPS(player){
    return player.strength * player.speed;
}
    
function rollDice(player){
    return Math.floor((Math.random() * 10) + 5);
}

function prepareForBattle(player){
    player.totalHealth = totalHealth(player);
    player.totalDamage = totalDPS(player);
}

function totalArmy(player){
    return Math.floor((player.totalPhotos + player.pageCount) / 2);
}