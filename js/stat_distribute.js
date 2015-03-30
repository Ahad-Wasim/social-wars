$(document).ready(function()
{
    var $health_input = $("#health_input");
    var $speed_input = $("#speed_input");
    var $damage_input = $("#damage_input");
    var $ready_button = $("#ready_button");
    var $totalStat = $('#total_stat');
    var reamaining_stats = totalStats;
    $ready_button.prop('disabled',true);
    $health_input.keyup(function(){
        console.log("health input changed");
        stat_assign();
    });
    $speed_input.keyup(function(){
        console.log("speed input changed");
        stat_assign();
    });
    $damage_input.keyup(function(){
        console.log("damage input changed");
        stat_assign();  
    });
    var stat_assign = function(){
        $ready_button.prop('disabled',true);
        $stat_total = getInputTotal();
        remaining_stats = totalStats - $stat_total;
        //console.log("totalStats: " + totalStats + " stat_total: " + $stat_total);
        $totalStat.text("Stat Points Remaining: " + remaining_stats);
        if($stat_total == totalStats){
            $ready_button.prop('disabled',false);
        }
    }
    
    function getInputTotal(){
        var inputs = [parseInt($health_input.val()), parseInt($speed_input.val()), parseInt($damage_input.val())];
        var total = 0;
        
        for(var i in inputs){
            if(inputs[i] > 0){
                total += inputs[i];
            }
        }
        return total;
    }
});

