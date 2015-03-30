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
            <button class="btn btn-default" id="login_button" type="button">Login</button>
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
                    <input type="text" name="health" id="health_input"> </br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 align-right">
                    <label for="status"> Speed: </label>
                </div>
                <div class="col-xs-7 align-left">
                    <input type="text" name="speed" id="speed_input">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 align-right">
                    <label for="status"> Damage: </label>
                </div>
                <div class="col-xs-7 align-left">
                    <input type="text" name="damage" id="damage_input"> </br>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-xs-5 align-right">
                    <label for="status"> Army Size: </label>
                </div>
                <div class="col-xs-7 align-left">
                    <input type="text" name="army" id="army_input"> </br>
                </div>-->
            </div>
        </div>
    </div>
    <div class="bottom_container">
        <div id="total_stat">Stat Points Remaining: #####</div>
        <div id="army_size">Your Army: #####</div></br>
        <button class="btn btn-default" id="random_button">Random</button>
        <button class="btn btn-default" id="ready_button">Ready</button>
    </div>
</div>
