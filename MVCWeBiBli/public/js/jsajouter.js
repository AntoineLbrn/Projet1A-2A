function change()
{
	var valeur = document.getElementById('selectType').options[document.getElementById('selectType').selectedIndex].value
	if (valeur =='musique')
	{
		document.getElementById('album').style.display="inline";		
	}
	else
	{
		document.getElementById('album').style.display="none";		
	}


	if (valeur == 'livre')
	{
		document.getElementById('ISBN').style.display="inline";		
		document.getElementById('tome').style.display="inline";				
		document.getElementById('type').style.display="inline";				
	}
	else
	{
		document.getElementById('ISBN').style.display="none";		
		document.getElementById('tome').style.display="none";				
		document.getElementById('type').style.display="none";			
	}
	if (valeur == 'partition')
	{
		document.getElementById('instrument').style.display="unset";
		document.getElementById('plus').style.display="inline";

		document.getElementById('difficulté').style.display="inline";				
	}
	else
	{
		document.getElementById('instrument').style.display="none";
		document.getElementById('plus').style.display="none";	
		document.getElementById('difficulté').style.display="none";		
	}
	
}
function afficheGenre()
{
	document.getElementById('bouton+').style.display="none";		
	document.getElementById('nouveauGenre').style.display="inline";
	document.getElementById('selectGenre').selectedIndex = 0;

}
function remet()
{
		document.getElementById('bouton+').style.display="inline";		
		document.getElementById('nouveauGenre').style.display="none";		
}
function recherche()
{
	document.getElementById('myTable').style.display="inline";		
	if (document.getElementById('myInput').value=="")
	{
		document.getElementById('myTable').style.display="none";		
	}
}
function remplacer(char)
{
	document.getElementById('myTable').style.display="none";		
	document.getElementById('myInput').value=char;
}
function myFunction() {  
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable"); 
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else { 
        tr[i].style.display = "none";
      }
    } 
  }
} 