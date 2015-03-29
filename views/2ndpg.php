<div class="container battlepg_border">
    <div class="top_container">
        <form>
            <div class="row">
                <div class="col-xs-5 align-right"> 
            <label for="status"> New Word: </label>
                </div>
            <div class="col-xs-7 align-left">
            <input type="text" id="new_word">
            <button class="btn btn-default" id="word_button" type="button">Submit</button>
            </div>
            </div>
            <div class="playersrdy" id="playersReady">PLAYER 1/2</div>
        </form>
    </div>
    <div class="mid_container">
        <div class="">
            <div class="row">
                <div class="col-xs-5 align-right">
                    <label for="health"> Health: </label>
                </div>
                <div class="col-xs-7 align-left">
                    <input type="text" name="health" id="health_input" value="00"> </br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 align-right">
                    <label for="status"> Speed: </label>
                </div>
                <div class="col-xs-7 align-left">
                    <input type="text" name="speed" id="speed_input" value="00">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 align-right">
                    <label for="status"> Damage: </label>
                </div>
                <div class="col-xs-7 align-left">
                    <input type="text" name="damage" id="damage_input" value="00"> </br>
                </div>
            </div>
            
        </div>
    </div>
    <div class="bottom_container">
        <label for="total_stat">Stat Point: </label>
        <div id="total_stat">#####</div>
        <label for="army_size">Army Size: </label>
        <div id="army_size">#####</div></br>
        <button class="btn btn-default" id="randomBtn">Random</button>
        <button class="btn btn-default">Ready</button>
    </div>
</div>
