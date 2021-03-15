let elmt = document.getElementById("podium");
let elmt1 = document.getElementById("podium1");
let elmt2 = document.getElementById("podium2");

test = function(){

	setTimeout(function() {
	// on récupère l'élément
	var elmt = document.getElementById("podium");
	
	// on modifie son style
	elmt.style.display = "block";
	
	}, 4000);

	setTimeout(function() {
		// on récupère l'élément
		var elmt1 = document.getElementById("podium1");
		
		// on modifie son style
		elmt1.style.display = "block";
		
		},3000);

	setTimeout(function() {
		// on récupère l'élément
		var elmt2 = document.getElementById("podium2");
			
		// on modifie son style
		elmt2.style.display = "block";
			
		}, 5000);
	}


	elmt.onload = test();
	elmt1.onload = test();
	elmt2.onload = test();