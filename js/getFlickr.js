var server="https://api.flickr.com/";
var services="services/rest?";
var api_key="&api_key=403d5274ed5eb1c0131d74485aaa30dd";
var method="&method=flickr.photos.search";
var format="&format=json";
var nojsoncallback="&nojsoncallback=1";


//make a variable, base_url, that represents your base flickr query, absent any method specific information.  It should include keys that:
//prevent a json callback
//supply the api key
var base_flickr_url = server+services+api_key+format+nojsoncallback;

var photoArray = [];
var totalPhotos = null;
var totalPages = null;

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

var createPhotoObject = function (photoArray) {
    var randomIndex = getRandomInt(1,9);
    var selectedPhoto = photoArray[randomIndex];
    var url = 'https://farm' + selectedPhoto.farm + '.staticflickr.com/' + selectedPhoto.server + '/' + selectedPhoto.id + '_' + selectedPhoto.secret + '_m.jpg';

    return url;
}

function getFlickr (str){ 
	// parameter inside function will be a battleInput
    var battleInput = str; //this will change to input reconstruct
    //make a variable, search_method_parameter, that stores which method we are going to use for searching.  The key should be 'method', and the value should be the 'flickr.photos.search'.  Make sure to put a & before the key
        search_method_parameter = "&method=flickr.photos.search",
    //make a variable, search_text_parameter, that defines what text we are going to use in our search.  The key will be text, and the value will be the search_val variable we defined above.  Make sure to put a & before the key
        search_text_parameter = "&text="+battleInput,
    //narrow down the search of the 
        pages = "&per_page=" + getRandomInt(9, 300),
    //define a variable, search_url, that concatanates the base_flickr_url variable, the search_method_parameter variable, and the search_text_parameter variable
        search_url = base_flickr_url+search_method_parameter+search_text_parameter+pages;

   	return $.ajax({
        //set the url key to your search_url variable
        url: search_url,
        //We expect json back from the ajax call, tell ajax to expect it
        dataType: 'json',
        //allow crossDomain requests.  key crossDomain, value true
        crossDomain: true,
        //define our success handler
        success: function(response){
            console.log('getFlickr success');
        },  //end our success handler
        //define our error handler.  Put the received data into the "response" variable.  
        error: function(response){
            console.Error('getFlickr error');
        }
    });

}
