function InitAutoComplete(event, input) {
	
	// alert('rrrrr');

  var myAutoComplete = new AutoComplete(input);
  
  //alert('1111');

  myAutoComplete.Source = "includes/search_keyword.php";
  myAutoComplete.QueryString = "q";
  myAutoComplete.Delay = 300;
  myAutoComplete.MinLength = 1;  //start search after 1 character
  myAutoComplete.SearchCaption = "Search...";
  
  //look and feel (if you don't set this options, it will use the default css classes)
  myAutoComplete.CssClassBox = "searchBox";
  myAutoComplete.CssClassLabel = "searchLabel";
  myAutoComplete.CssClassProgress = "searchProgress";
  myAutoComplete.CssClassSelected = "searchSelected";
  
  //fire
  myAutoComplete.Execute(event);
};