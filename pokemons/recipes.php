<?php
$data=file_get_contents('recipes.json');
echo $_SERVER['REQUEST_METHOD'] . '<br>';

 /* print_r( $_SERVER);  */
 $request_method = $_SERVER['REQUEST_METHOD'];
 if($request_method==='GET'){
    echo $data;
} 
    $uri = $_SERVER['REQUEST_URI'];
    echo 'URI:'.$uri . '<br>';
    $parts = parse_url($uri);
    echo 'Parts:';
print_r( $parts) . '<br>';
    parse_str($parts['query'], $params);
    echo '<div>Params:';
     print_r($params) ;
     echo '</div>';

    $exploded_parts = explode('/', $parts['path']);
    echo '<div>exploded parts:';
    print_r($exploded_parts);
    echo '</div>';

    switch($request_method) {
        case 'GET':
            get_recipes();
            break;
        case 'POST':
            add_new_recipe();
            break;
        case 'PUT':
            update_recipe();
            break;
        case 'DELETE':
            remove_recipe();
            break;
        default: 
            echo json_encode(array('message' => 'An error has occured'));
            break;
    }
/* if we don't have an id then return all recipes, if we have it - show only id recipe*/
    function get_recipes(){
        $i=0;
        
        function check($i){
    
        $json=json_decode($GLOBALS['data']);
        $recipes=$json->recipes;
        
        if (isset($GLOBALS['exploded_parts'][2])&&$GLOBALS['exploded_parts'][2]===$recipes[$i]->id) {
           echo '<div>One recipe:';
            print_r($recipes[$i]);
            echo '</div>';} else{echo 'All recipes:'. $GLOBALS['data'];}
            
        
        }   
    check($i);
/* function check(){
    $json=json_decode($GLOBALS['data']);
        $recipes=$json->recipes;
        for($i=0; $i<count($recipes); $i++){
        if (isset($GLOBALS['exploded_parts'][2])&&$GLOBALS['exploded_parts'][2]==$recipes[$i]->id) {
           echo '<div>One recipe:';
            print_r($recipes[$i]);
            echo '</div>';}
            
        } 
    }    */
       
       
       /* echo 'All recipes:'. $GLOBALS['data']; */
       
            /* print_r($recipes[0]->name);
            echo json_encode(array('recipe' => 'here is your recipe')); */
    
    }






?>