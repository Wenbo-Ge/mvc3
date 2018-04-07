8df25373e2ca625f7ba9376f5a885f4d


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Weather</title>
  </head>
  <body>
    <h1>Weather Report</h1>

<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city"  placeholder="Enter City">
    <button type="submit" class="btn btn-primary btn-block" onclick="searchWeather()">Submit</button>
 </div>

<!-- render weather info here -->
 <div id="info">
 	
 </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	function searchWeather(){
    		var search=$('#city').val();
    		var apiKey='8df25373e2ca625f7ba9376f5a885f4d';
    		console.log(search);
    		// 前端 restful api 就是ajax
    		// api：用ajax 和rest的方式  按照标准把后端数据返回前端
    		$.get(
    			'http://api.openweathermap.org/data/2.5/weather?q=' +search  +'&appid='+apiKey,
    			// 接callback function
    			function(data){
    				// data 返回的是json，用json formatter看格式
    				$('#info').html('<h3 class="text-primary">Humidity: '+data.main.humidity+'</h3>'+'<br><h3 class="text-primary">Humidity: '+data.main.humidity+'</h3>');
    			}
    			);

    	}
    </script>
  </body>
</html>