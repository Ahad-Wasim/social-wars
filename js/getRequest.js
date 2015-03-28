
function getTwitter(string) {

    var key = 'lAy8keqohZIImu0Et0g3pe5il';
    var secret = 'hbM8eF6EdJh52gScC29skbIMQp2xEwfdtBd3zZkARHVBXShnw8';
    var token = '62672830-edmVnLsbSJ9WZ95QDnOdqqLBaZked5byfP1MpPXoO';
    var tokensecret = '4z76IzTE8brTtQxWwWMVzTcvu75WNVnshtbLkX5kCgbj9';
    
    var searchValue = string;

    var searchObj = {
        value: string  
    };

    console.log('Search value = ' + searchObj.value)

    var defer = Q.defer();

   $.ajax({
        url: 'action/getRequest.php',
        method: 'POST',
        dataType: 'JSON',
        data: searchObj,
        cache: false,
        success: function(response) {
            console.log(string);
            console.log(response);

            defer.resolve(response);
        },
        error: function(response) {
            defer.reject(response);
        }
    }); //end of ajax

    return defer.promise;

}
        

        


