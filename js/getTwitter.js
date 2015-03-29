function getTwitter(string) {
    var key = 'lAy8keqohZIImu0Et0g3pe5il';
    var secret = 'hbM8eF6EdJh52gScC29skbIMQp2xEwfdtBd3zZkARHVBXShnw8';
    var token = '62672830-edmVnLsbSJ9WZ95QDnOdqqLBaZked5byfP1MpPXoO';
    var tokensecret = '4z76IzTE8brTtQxWwWMVzTcvu75WNVnshtbLkX5kCgbj9';

    var searchObj = {
        value: string  
    };

   return $.ajax({
        url: 'action/getTwitter.php',
        method: 'POST',
        dataType: 'JSON',
        data: searchObj,
        cache: false,
        success: function(response) {
            // console.log(string);
            // console.log(response);

          
        },
        error: function(response) {
           
        }
    }); //end of ajax
}
        

        


