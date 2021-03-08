   function addExpireMonths()
   {
      var expireMonths = document.getElementById("expireMonth");
            
      for(month = 1; month <= 12; month++)
      {
         var option = document.createElement("option");
         option.innerHTML = month.toString();
         option.value = month.toString();
                expireMonths.add(option);
      }
   }
        
   function addExpireYears()
   {
      var expireYears = document.getElementById("expireYear");

      for(year = 2019; year <= 2045; year++)
      {
         var option = document.createElement("option");
         option.innerHTML = year.toString();
         option.value = year.toString();
         expireYears.add(option);
      }
   }

	addExpireMonths();
	addExpireYears();

   	function displayState(str)
   	{ 
      		if (str == "")
		{
			var st = document.getElementById("stateDiv")
			if (st != null) {
				st.remove();
			}
			return;
		}

         	var xhttp;
         
       	  	xhttp = new XMLHttpRequest();
         	xhttp.onreadystatechange = function()
         	{
            		if (this.readyState == 4 && this.status == 200)
			{
               			addState(this.responseText);
			}            
         	};

		xhttp.open("GET", "getStates.php?q="+str, true);
        	xhttp.send();
   	}

	function addState(states)
	{
		var newDiv = document.createElement("div");
		newDiv.innerHTML = "State/Province<br>";
		newDiv.id = "stateDiv";

		var oldElement = document.getElementById("stateDiv");
	
		if (oldElement != null)
		{
			oldElement.remove();
		}

      		if (states == "")
      		{
			addNonUS();
			return;
       		}

         	var statesList = states.split(";");

         	var newFormElement = document.createElement("select");
		newFormElement.id = "stateSelect";
        	
		newFormElement.addEventListener("change", changeCity);
		
		newFormElement.name = "state";
		newFormElement.required = true;

		var defaultOption = document.createElement("option");
		defaultOption.innerHTML = "Select a state:";
		defaultOption.value = "";
		newFormElement.add(defaultOption);

         	for (i = 0; i < statesList.length; i++)
         	{
            		var option = document.createElement("option");
            		option.innerHTML = statesList[i];
            		option.value = statesList[i];
            		newFormElement.add(option);
         	}	

		newDiv.appendChild(newFormElement);

		var dynamicDiv = document.getElementById("dynamicDiv");
      		dynamicDiv.appendChild(newDiv);
	}

	function addNonUS()
	{
		nonUSState();
		nonUSCity();
		addZip();
	}

	function nonUSState()
	{
		var newFormElement = document.createElement("input");
		newFormElement.type = "text";
		newFormElement.name = "state";
        	newFormElement.required = true;

		var newDiv = document.createElement("div");
		newDiv.innerHTML = "State/Province<br>";
		newDiv.id = "stateDiv";

		newDiv.appendChild(newFormElement);

		var dynamicDiv = document.getElementById("dynamicDiv");
      		dynamicDiv.appendChild(newDiv);	
	}

	function nonUSCity()
	{
		var oldDiv = document.getElementById("cityDiv");
		if (oldDiv != null)
		{
			oldDiv.remove();
		}	

		var cityFormElement = document.createElement("input");
		cityFormElement.type = "text";
		cityFormElement.name = "city";
		cityFormElement.required = true;

		
		var newDiv = document.createElement("div");
		newDiv.innerHTML = "<br>City<br>";
		newDiv.id = "cityDiv";
			
		newDiv.appendChild(cityFormElement);
		
		var dynamicDiv = document.getElementById("stateDiv");
		dynamicDiv.appendChild(newDiv);
	}


	function test()
	{
		alert("testing");
	}


	function changeCity(state)
	{
		var state = document.forms["purchaseForm"]["state"].value;

		if (state == "")
			return
		
		else
		{
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function()
			{
				if (this.readyState == 4 && this.status == 200)
				{
					addCity(this.responseText);
				}
			};

			xhttp.open("GET", "getCities.php?state="+state, true);
			xhttp.send();
		}
	}


	function addCity(cities)
	{
		var newFormElement = document.createElement("select");

		var newDiv = document.createElement("div");
		newDiv.innerHTML = "<br>City<br>";
		newDiv.id = "cityDiv";
		
		var oldElement = document.getElementById("cityDiv");

		if (oldElement != null)
		{
			oldElement.remove();
		}

		var defaultOption = document.createElement("option");
		defaultOption.innerHTML = "Select a city:";
		defaultOption.value = "";
		newFormElement.add(defaultOption);

		var cityList = cities.substr(0,cities.length - 1).split(";");
			
		for (i = 0; i < cityList.length; i++)
		{
			var option = document.createElement("option");
			option.innerHTML = cityList[i];
			option.value = cityList[i];
			newFormElement.add(option);
		}

		newFormElement.name = "city";
		newFormElement.required = true;

		newDiv.appendChild(newFormElement);
		
		var dynamicDiv = document.getElementById("stateDiv");
		dynamicDiv.appendChild(newDiv);

		addZip();
	}


	function addZip()
	{
		var oldDiv = document.getElementById("zipDiv");
		if (oldDiv != null)
		{
			oldDiv.remove();
		}

		var zipFormElement = document.createElement("input");
		zipFormElement.type = "text";
		zipFormElement.name = "zip";
		zipFormElement.maxlength = "5";
		zipFormElement.size = "6";
		zipFormElement.required = true;

		var newDiv = document.createElement("div");
		newDiv.innerHTML = "<br>Zip<br>";
		newDiv.id = "zipDiv";

		newDiv.appendChild(zipFormElement);

		var dynamicDiv = document.getElementById("stateDiv");
		dynamicDiv.appendChild(newDiv);

	}


