/*$(document).ready(function() {
	if (screen.width <= 991.98) {
		console.log('test menu')
		var sub_station = document.getElementById("sub_station");
		var lavage_station = document.getElementById("lavage_station");
		var l_produit = document.getElementById("l_produit");
		var c_marche = document.getElementById("c_marche");
		sub_station.style.display = "none";
		lavage_station.style.display = "none";
		l_produit.style.display = "none";
		c_marche.style.display = "none";
		$('#n_station').click(function(e) {
			l_produit.style.display = "none";
			c_marche.style.display = "none";
			if (sub_station.style.display === "block") {
			    sub_station.style.display = "none";
			 } else {
			    sub_station.style.display = "block";
			 }
		})

		$('#child_station').click(function(e) {
			l_produit.style.display = "none";
			c_marche.style.display = "none";
			if (lavage_station.style.display === "block") {
			    lavage_station.style.display = "none";
			 } else {
			    lavage_station.style.display = "block";
			 }
		})

		$('#n_carburant').click(function(e) {
			sub_station.style.display = "none";
			lavage_station.style.display = "none";
			c_marche.style.display = "none";
			if (l_produit.style.display === "block") {
			    l_produit.style.display = "none";
			 } else {
			    l_produit.style.display = "block";
			 }
		})

		$('#c_energy').click(function(e) {
			sub_station.style.display = "none";
			lavage_station.style.display = "none";
			l_produit.style.display = "none";
			if (c_marche.style.display === "block") {
			    c_marche.style.display = "none";
			 } else {
			    c_marche.style.display = "block";
			 }
		})
	}
})*/

	alert(5)

    window.addEventListener('load',() =>{
            $('.i_chil').css('display', 'none');
            $('.i_c_chil').css('display', 'none');
            menuP = (key,event) => {
                $("#sub_station"+key).attr("data-display",$("#sub_station"+key).css("display"));
                $("*[id^=sub_station]").css("display", "none");
                $("*[id^=lavage_station]").css("display", "none");
                if($("#sub_station"+key).attr("data-display") == "block") {
                    $("#sub_station"+key).css("display", "none");
                }else {
                    $("#sub_station"+key).css("display", "block");
                }
            };
            childF = (key,event) => {
                $("#lavage_station"+key).attr("data-display",$("#lavage_station"+key).css("display"));
                $("*[id^=lavage_station]").css("display", "none");
                if($("#lavage_station"+key).attr("data-display") == "block") {
                    $("#lavage_station"+key).css("display", "none");
                }else {
                    $("#lavage_station"+key).css("display", "block");
                }
                // $('#lavage_station'+key).css('display', 'block');
            };
    });