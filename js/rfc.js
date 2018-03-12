'use strict';

var rfc = function(){

	var name = undefined;
	var surname = undefined;
	var date = undefined;
	var txtName = undefined;
	var txtSurname = undefined;
	var txtBirthDay = undefined;
	var btRFC = undefined;
	var txtRFC = undefined;

	var init = function init(){
		txtName = $("#name");
		txtSurname = $("#surname");
		txtBirthDay = $("#txtBirthday");
		btRFC = $(".btRFC button");
		txtRFC = $("#txtRFC");

		applyListeners();
	}

	var applyListeners = function applyListeners() {
		btRFC.click(function(e){
			e.preventDefault();

			name = txtName.val().trim();
			surname = txtSurname.val().trim();
			date = txtBirthDay.val();

			if((name != undefined && name.length > 0 && surname != undefined && surname.length > 0) && (date != undefined && date.length > 0)){
				var firstExpression = getFisrtExpression(surname, name);
				var secondExpression = getsecondExpression(date);

				var rfc = firstExpression+secondExpression;

				rfc = inconvenientWord(rfc);

				var length = rfc.length;

				txtRFC.val(rfc)
			}
		});
	};

	var getFisrtExpression = function getFisrtExpression(surname, name){
		

		var apellidos = surname.split(' ');
		var apWords = new Array();
		var apLabels = new Array();
		var w = 0, l = 0;
		for(var a = 0; a < apellidos.length; a++){
			var ap = apellidos[a];

			if(ap != "de" && ap != "la" && ap != "del"){
				apWords[w] = ap;
				w++;
			}else{
				apLabels[l] = ap;
				l++;
			}
		}

		var nombres = name.split(' ');

		var expression = undefined;
		switch(apLabels.length){
			case 0:
				var ap = undefined, am = undefined, n = undefined;
				var vowel = undefined;
				switch(apWords.length){
					case 1:
						ap = apWords[0][0];
						am = apWords[0][1];
						n = nombres[0][0] + nombres[0][1];
						break;
					case 2:
						if(apWords[0].length > 3){
							/*
								REGLA 1
								1.	La primera letra del apellido paterno y la siguiente primera vocal del mismo.
								2.	La primera letra del apellido materno.
								3.	La primera letra del nombre.
							*/
							
							ap = apWords[0][0];
							for(var v = 1; v <= apWords[0].length; v++){
								var p = apWords[0];
								if(isVowel(p[v])){
									vowel = p[v];
									break;
								}
							}

							ap = ap + vowel;
							am = apWords[1][0];
							if(nombres.length == 1){
								n = nombres[0][0];
							}else if(nombres[0] != "Maria" && nombres[0] != "Jose"){
								n = nombres[0][0];
							}else if(nombres[1] != "Maria" && nombres[1] != "Jose"){
								n = nombres[1][0];
							}
						}else{
							/*
								REGLA 2
								1.	La primera letra del apellido paterno.
								2.	La primera letra del apellido materno.
								3.	La primera y segunda letra del nombre.
							*/
							ap = apWords[0][0];
							am = apWords[1][0];
							n = nombres[0][0] + nombres[0][1];
						}
						break;
					case 3:
							ap = apWords[0][0] + apWords[0][1];
							am = apWords[2][0];
							n = nombres[0][0];
						break;
				}
				expression = ap + am + n;
			break;
			case 1:
				switch(apWords.length){
					case 2:
						
						break;
					case 3:
							ap = apWords[0][0] + apWords[0][1];
							am = apWords[1][0];
							n = nombres[0][0];
						break;
				}
				expression = ap + am + n;
			break;
			break;
			case 2:
				switch(apWords.length){
					case 2:
						/*
							REGLA 2
							1.	La primera letra del apellido paterno.
							2.	La primera letra del apellido materno.
							3.	La primera y segunda letra del nombre.
						*/
						var ap = undefined, am = undefined, n = undefined;
						var letter = undefined;
						ap = apWords[0][0];
						am = apWords[1][0];

						n = nombres[0][0] + nombres[0][1];
						break;
					case 3:
							ap = apWords[0][0] + apWords[0][1];
							am = apWords[2][0];
							n = nombres[0][0];
						break;
				}
				expression = ap + am + n;
			break;
		}

		return expression.toUpperCase();
	}

	var getsecondExpression = function getsecondExpression(date){
		var split = date.split('-');

		var year = split[0][2] + split[0][3];
		var month = split[1];
		var day = split[2];

		var expression = year+month+day;

		return expression;
	};

	var isVowel = function isVowel(c) {

		return (/^[aeiou]$/i).test(c);
	}

	var inconvenientWord = function inconvenientWord(expression){
		var incExps = ["KACA", "KACO", "KAGA", "KAGO", "BUEI","BUEY","CACA","CACO","CAGA","CAGO","CAKA","COGE","COJA","COJE","COJI","COJO","CULO","FETO","GUEY","JOTO","KOGE","KOJO","KAKA","KULO","MAME MAMX","MAMO","MEAR","MEON","MION","MOCO","MULA","PEDA","PEDO","PENE","PUTA","PUTO", "QULO", "RATA", "RUIN"];
		var x = undefined;
		for(var i = 0; i < incExps.length; i++){
			if(expression == incExps[i]){
				x = expression.replace(expression[expression.length - 1], 'X');
				return x;
			}
		}

		return expression;
	}

	init();
}();