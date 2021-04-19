<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP content</title>
</head>
<body> 
    <div id="pokemon__wrapper">
        <div class="pokemon__name">test pokemon</div>
    </div>
    <button id="next" class="navigate">Next</button>
    <button id="prev" class="navigate">Previous</button>
    <script>
        let pokemons=[];
        let currentPage = 0;
        
        fetchNewPokemons(currentPage);
        let lastPage = 20, firstPage = 0;
        document.querySelectorAll('.navigate').forEach(btn => {
            btn.addEventListener('click', (e) => {
                getPokemon(e.target.id);
            })
        })
        
        function getPokemon(direction) {
            if (direction === 'next' && currentPage !== lastPage) {
                currentPage++;
                fetchNewPokemons(currentPage);
            } else if (direction === 'prev' && currentPage !== firstPage) {
                currentPage--;
                fetchNewPokemons(currentPage);
            } 
        }
        function fetchNewPokemons(pageNumber) {
            document.getElementById('pokemon__wrapper').innerHTML = '';
            
            fetch('contact.php?page=' + pageNumber, {
                method: 'GET'
                
            })
            .then(resp => resp.json())
            .then(pokemons => {
                console.log(pokemons);
                pokemons.forEach(pokemon => {
                    const newPokemon = document.createElement('div');
                    newPokemon.className = 'pokemon__name';
                    newPokemon.innerText = pokemon.name;
                    document.getElementById('pokemon__wrapper').appendChild(newPokemon);
                })
            })
            .catch(err => {
                console.log(err);
            })
        }

        
        
let inputdata={
    name: document.getElementById("name").value,
    id: document.getElementById('id').value,
    type: document.getElementById('type').value,
}



    /* async function postData(url='', data={}){
        const response=await fetch(url, {
                method: "POST",
                body: JSON.stringify(data),
            });
            return await response.json();
    }

    postData('new_pokemon.php',inputdata).then((inputdata)=>{
        console.log(inputdata);
    }) */

    async function postData(){
        const response=await fetch('new_pokemon.php', {
                method: "POST",
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
                body: JSON.stringify(inputdata),
            });
            const content= await response.json();
            console.log(content);
    };

    postData();

    
    
            

        
            
    </script>
</body>
</html>