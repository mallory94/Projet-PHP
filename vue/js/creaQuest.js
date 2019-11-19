$function toggle_visibility(myRadio) {
	var r2 = document.getElementById("r2");
	var r3 = document.getElementById("r3");
	var r4 = document.getElementById("r4");
	if(myRadio.value==2){
		r2.style.display = "inline-block";
		r3.style.display = "none";
		r4.style.display = "none";
	}

	if(myRadio.value==3){
		r2.style.display = "inline-block";
		r3.style.display = "inline-block";
		r4.style.display = "none";
	}

	if(myRadio.value==4){
		r2.style.display = "inline-block";
		r3.style.display = "inline-block";
		r4.style.display = "inline-block";
	}
}