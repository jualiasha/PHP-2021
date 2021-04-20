<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatted-Pokemons</title>
</head>
<style>
.next{
    background-color: aquamarine;
    padding: 0.5rem;
    margin: 1rem;
    text-decoration: none;
    color: orange;
    border-radius: 10px;
    box-shadow: 0 0 5px #333;
}

.disabled{
    background-color: #d6fff1;
    padding: 0.5rem;
    margin: 1rem;
    text-decoration: none;
    color: orange;
    border-radius: 10px;
    box-shadow: 0 0 5px #333;
}

main{
    margin-bottom:30px;
}
</style>
<body>
    <?php
    $data = file_get_contents('data.json');

    // echo '<pre>';
    $formatted_data = json_decode($data, true);
    $results = $formatted_data['results'];
    $formatted_results = array();

    for ($i = 0; $i < count($results); $i++){
        // $results[$i]['name'] = strtoupper($results[$i]['name']); Notice that this is illegal 
        $formatted_results[$i]['name'] = strtoupper($results[$i]['name']);
        $formatted_results[$i]['url'] = $results[$i]['url'];
    }

    // print_r($formatted_data);
    // echo '</pre>';

    $json_formatted_results = json_encode($formatted_results);
    /* echo $json_formatted_results; */

    /**
     * Create new JSON file
     */
    $write_file_result = file_put_contents('formatted_data.json', $json_formatted_results);
?>

<?php



$results50=array_chunk($formatted_results, 50, true);

$page=$_GET['page'];
$pagecount=0;
    while($pagecount<count($results50)){
        echo "<a href=/formatted_pokemon.php/?page=" . $pagecount . ">" . $pagecount ."</a>" . " ";
        $pagecount++;
    }

    
echo '<h1> You are requesting page number:' . $page . '</h1>';
/* echo '<button onclick="Next_page()">Next page</button><br>'; */
echo '<main>';

if($page==0) { echo "<a class=" . "disabled" . " href=#"  . "><<< Previous page     </a>";}else
{ echo "<a class=" . "next" . " href=/formatted_pokemon.php/?page=" .$page-1 . "><<< Previous page     </a>";}  
if($page==count($results50)-1) { echo "<a class=" . "disabled" . " href=#"  . "><<< Next page     </a>";}else
{echo "<a class=" . "next" . " href=/formatted_pokemon.php/?page=" .$page+1 . ">Next page >>></a>";}
echo '</main>';

echo '<pre>';
echo print_r($results50[$page]);
echo '</pre>';


?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'&&!empty($_POST['name'])&&!empty($_POST['id'])){
$newname=$_POST['name'];
$newid=$_POST['id'];
$newtype=$_POST['type'];
$newarray=array();
array_push($newarray, [
          'name'=>$newname,
          'id'=>$newid,
          'type'=>$newtype,
      ] );
      echo '<pre>';
      print_r ($newarray);
      echo '</pre>';

   
for ($i = 0; $i <= 50; $i++){
       if($newname!=$results50[$page][$i]['name']){
        array_push($results50[$page], $newarray); 
        echo '<h1>New pokemon added</h1>';
        echo '<pre>';
        print_r ($results50[$page]);
        echo '</pre>'; } 
        else{
            echo 'mistake';
        }
        
    }    


   

}

  

?>




</body>
</html>


