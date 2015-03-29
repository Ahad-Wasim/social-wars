$(document).ready(function()
{
    var $health_input = $("#health_input");
    var $speed_input = $("#speed_input");
    var $damage_input = $("#damage_input");
    var $ready_button = $("#ready_button");
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
        $stat_total = parseInt($health_input.val()) + parseInt($speed_input.val()) + parseInt($damage_input.val());
        if($stat_total == 20){
            $ready_button.prop('disabled',false);
        }
    }
});

