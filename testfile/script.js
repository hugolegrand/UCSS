$(document).ready(function( ) {
	htmleditor = ace.edit("htmleditor");
	var HtmlScriptMode = require("ace/mode/html").Mode;
	htmleditor.getSession().setMode(new HtmlScriptMode());
    ucsseditor = ace.edit("ucsseditor");
    $("#test").bind("click", afficheTest);
    $("#renderButton").bind("click", getRender);
    $("#saveButton").bind("click", save);
    $("#loadButton").bind("click", load);
    $("#removeButton").bind("click", remove);
    renderSavedList();

});

function afficheTest(){
	$("#renderBody").css("display", "none");
	$("#testBody").css("display","block");

	$("#test").parent().addClass("active")
	$("#render").parent().removeClass("active")


	$("#test").unbind("click", afficheTest);
	$("#render").bind("click", afficheRender);
}

function afficheRender(){
	$("#testBody").css("display", "none");
	$("#renderBody").css("display","block");                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                

	$("#render").parent().addClass("active")
	$("#test").parent().removeClass("active")


	$("#test").bind("click", afficheTest);
	$("#render").unbind("click", afficheRender);

}

function getRender(){
	//TODO

}

function save(){


	if ($("#nameSave").val() != '' && $("#nameSave").val() != 'renderlist' ){
	var tosave = [];
	tosave[0] = htmleditor.getSession().getValue();
	tosave[1] = ucsseditor.getSession().getValue();
	}
	if (!localStorage['renderlist']){ //test si la liste existe deja
		var list = [];
		localStorage['renderlist']= JSON.stringify(list);
	}
	if(localStorage["render"+$("#nameSave").val()]){ //si la clé existe déja on a pas a réecrire dans la liste
		localStorage["render"+$("#nameSave").val()] = JSON.stringify(tosave);
		return;
	}
	var list = JSON.parse(localStorage['renderlist']); // on extrait la liste
	list.push("render"+$("#nameSave").val()); //on ajoute la clé dans la liste
	localStorage['renderlist']= JSON.stringify(list); //on réenregistre la liste
	localStorage["render"+$("#nameSave").val()] = JSON.stringify(tosave); //on enregistre la valeur
	renderSavedList();
	return;

	

}

function load(){
	var file = 'render' + $('#selectLoad').val(); //création du nom de la file à charger
	htmleditor.getSession().setValue(JSON.parse(localStorage[file])[0]);
	ucsseditor.getSession().setValue(JSON.parse(localStorage[file])[1]);

	$('body').append(JSON.parse(localStorage[file])[0]);
	

}

function remove(){
	var file = 'render' + $('#selectLoad').val();
	localStorage.removeItem(file);
	var list= JSON.parse(localStorage['renderlist']);
	var newlist = [];
	var j = 0;
	for(var i= 0; i < list.length; i++) {
		if(list[i] != file){
			newlist[j] = list[i];
			j++;
		}
	}
	localStorage['list']= JSON.stringify(newlist);
	renderSavedList();
}




function renderSavedList(){

	$('#selectLoad').html('');//vide les éléments actuels
	var list = JSON.parse(localStorage['renderlist']); //parse la list
	for(var i= 0; i < list.length; i++)//pour chaque liste on crée le option 
{
	var string = list[i].substring(6, list[i].length);
	$('#selectLoad').append('<option>' + string + '</option>');
}
}

