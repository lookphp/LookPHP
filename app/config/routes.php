<?php
$router->map( 'GET', '/', function() {
    echo 'hello world!';
});

// map user details page
$router->map( 'GET', '/user/[i:id]/', function( $id ) {
    echo $id;
});