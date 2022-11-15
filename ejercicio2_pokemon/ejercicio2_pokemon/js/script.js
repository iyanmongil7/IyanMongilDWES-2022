window.addEventListener("load", iniciar);

//FUNCION INICIAR()
function iniciar() {
    const random = Math.floor(Math.random() * (152 - 1)) + 1;
    obtenerPokemon(random);
}

function obtenerPokemon(id){
    fetch(`https://pokeapi.co/api/v2/pokemon/${id}`)
    .then(function (response) {
        //Transforma la respuesta. En este caso lo convierte a JSON    
        return response.json()
    })
    .then(function (data) {
        let template = document.getElementById('card').content;
        let clone = template.cloneNode(true);

        clone.querySelector('.card-body-img').setAttribute('src', data.sprites.other.dream_world.front_default);
        clone.querySelector('.card-body-text').textContent = data.base_experience + ' exp';
        clone.querySelector('.card-body-title').innerHTML = data.name + " "+ "<span>" + data.stats[0].base_stat + "</span>";
       var pies =  clone.querySelectorAll('.card-footer-social h3');
       pies[0].textContent = data.stats[1].base_stat + "k";
       pies[1].textContent = data.stats[3].base_stat + "k";
       pies[2].textContent = data.stats[2].base_stat + "k";
        document.querySelector('.flex').appendChild(clone);

    }).catch(function(ex) { 
        console.error('Error', ex.message) }); 

}
