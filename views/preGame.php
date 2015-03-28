<div class="container">
    <div class="top_container">
        <form>
            <label for="status"> New Word: </label>
            <input type="text" id="new_word">
            <button id="word_button" type="submit" value="submit">Submit</button>
            <div class="playersrdy">PLAYER 1/2</div>

    </div>
    <div class="mid_container">
        <div class="" style="background-color:red">
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
            <div class="row">
                <div class="col-xs-5 align-right">
                    <label for="status"> Army Size: </label>
                </div>
                <div class="col-xs-7 align-left">
                    <input type="text" name="army" id="army_input"> </br>
                </div>
            </div>
        </div>

        <div class="bottom_container">
            <div id="total_stat">Stat Point : #####</div>
            <div id="army_size">Army Size : #####</div>
            <button class="btn btn-default">Random</button>
            <button class="btn btn-default">Ready</button>
        </div>
        </form>
    </div>
</div>