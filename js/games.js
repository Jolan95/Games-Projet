 
 // Function to get cookie of language
function getCookie(name) {
        const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}
lang = getCookie("lang") == "fr" ? "fr" : "en";
             
// Reqest Ajax for game list
fetch('./games.json').then((response) => {
    if(!response.ok){
        throw new Error("Impossible de récupérer la liste de jeux.")
    }
    return response.json();
})
.then((json) => {
    var list =  json; 
    gamesList = list[lang]
    // Render game list
    for (let i = 0; i < gamesList.length; i++){
        games.innerHTML += '<div class="box-game col-8 offset-2 offset-lg-0 col-lg-6"><a href='+gamesList[i].link+'><div class="box-content"><img class="games-image" src='+gamesList[i].image+'><div class="text-center"><h2>'+gamesList[i].name+'</h2><p class="text-center">'+gamesList[i].description+'</p></div></div></a></div>'                                
    }          
})