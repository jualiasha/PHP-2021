<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/formatted_pokemon.php/?page=0" method="POST">
        <input type="text" name="id" id="id" placeholder="id"value="1">
        <input type="text" name="name" id="name" placeholder="name" value="Julia">
        <select name="type" id="type" value="normal">
            <option value="normal">normal</option>
            <option value="fire">fire</option>
            <option value="flighting">flighting</option>
            <option value="water">water</option>
            <option value="flying">flying</option>
            <option value="grass">grass</option>
            <option value="poison">poison</option>
            <option value="electric">electric</option>
            <option value="ground">ground</option>
            <option value="psychic">psychic</option>
            <option value="rock">rock</option>
            <option value="ice">ice</option>
            <option value="bug">bug</option>
            <option value="dragon">dragon</option>
            <option value="ghost">ghost</option>
            <option value="dark">dark</option>
            <option value="steel">steel</option>
            <option value="fairy">fairy</option>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>