
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

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

var createPhotoObject = function (photoArray) {
	var photoObject = {};
	var randomIndex = getRandomInt(1,9);
	var selectedPhoto = photoArray[randomIndex];
	var url = 'https://farm' + selectedPhoto.farm + '.staticflickr.com/' + selectedPhoto.server + '/' + selectedPhoto.id + '_' + selectedPhoto.secret + '_m.jpg'
	photoObject.url = url;	
	photoObject.total = totalPhotos;
	return photoObject;
}


function getFlickr (){ // parameter inside function will be a battleInput
	var battleInput = "cat"; //this will change to input reconstruct
    //make a variable, search_method_parameter, that stores which method we are going to use for searching.  The key should be 'method', and the value should be the 'flickr.photos.search'.  Make sure to put a & before the key
    var search_method_parameter = "&method=flickr.photos.search"
	//make a variable, search_text_parameter, that defines what text we are going to use in our search.  The key will be text, and the value will be the search_val variable we defined above.  Make sure to put a & before the key
	var search_text_parameter = "&text="+battleInput;
	//narrow down the search of the 
	var pages = "&per_page=9";
    //define a variable, search_url, that concatanates the base_flickr_url variable, the search_method_parameter variable, and the search_text_parameter variable
    var search_url = base_flickr_url+search_method_parameter+search_text_parameter+pages;
	$.ajax({
		//set the url key to your search_url variable
		url: search_url,
		//We expect json back from the ajax call, tell ajax to expect it
		dataType: 'json',
		//allow crossDomain requests.  key crossDomain, value true
		crossDomain: true,
		//define our success handler
		success: function(response){
			totalPhotos = response.photos.total;
			//set our photos variable to the appropriate information from the json. 
			photoArray = response.photos.photo;
			//fire function to select random photo
			console.log(createPhotoObject(photoArray));
			//console.log(photoObject);
			
		},	//end our success handler
		//define our error handler.  Put the received data into the "response" variable.  
		error: function(response){
			//console log out the response variable, and indicate we had an error
			console.error("Error, something went wrong with the photo avatar");
		}//end our error handler
	}); //end our ajax call


}; //end our getFlickr function





