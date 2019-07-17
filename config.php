<?php
/**
 * Created by PhpStorm.
 * User: julioxavier
 * Date: 14/07/19
 * Time: 19:17
 */

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


$request    = explode( '/' ,  $_SERVER[ 'REQUEST_URI' ]  );
$site       = $request[ 1 ];
$server     = $_SERVER[ 'SERVER_NAME' ];
$url_server = "http://{$server}";
$url        = "{$url_server}/{$site}/";


define( 'ROOT_URL', $url );
define( 'ASSETS_URL', $url . 'assets' );
define( 'PATH_SITE', dirname( __FILE__ ) . '/' );
define( 'DB_HOST', 'localhost'  );
define( 'DB_NAME', 'forlogic'   );
define( 'DB_USER', 'root'       );
define( 'DB_PASS', '1234'       );

//Default timezone for time function
date_default_timezone_set( 'America/Sao_Paulo' );

function autoload( $class )
{
    $file = "class/{$class}.php";
    if ( file_exists( $file ) ) {
        include_once $file;
    }
}

spl_autoload_register( 'autoload' );



if ( isset( $_POST[ 'action' ] ) && !empty( $_POST[ 'action' ] ) ) {
    $request = new Functions();
    $result = $request->process( $_POST );
}


function dump( $obj )
{
    echo '<pre>';
    var_dump( $obj );
    exit;
}