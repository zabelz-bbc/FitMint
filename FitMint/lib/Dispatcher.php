<?php
class Dispatcher {
	public static function dispatch() {
		
		$uri = $_SERVER ['REQUEST_URI'];
		$uri = strtok ( $uri, '?' );
		$uri = trim ( $uri, '/' ); 
		$uriFragments = explode ( '/', $uri ); 
		                                    
		$controllerName = 'DefaultController';
		if (! empty ( $uriFragments [0] )) {
			$controllerName = $uriFragments [0];
			$controllerName = ucfirst ( $controllerName ); 
			$controllerName .= 'Controller'; 
		}
		
		$method = 'index';
		if (! empty ( $uriFragments [1] )) {
			$method = $uriFragments [1];
		}
		
		$args = array_slice ( $uriFragments, 2 );
		
		require_once "../controller/$controllerName.php";
		
		$controller = new $controllerName ();
		$controller->$method ();
	}
}
