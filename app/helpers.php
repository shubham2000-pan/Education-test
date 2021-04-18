<?php

use Carbon\Carbon;

if (! function_exists('testHelper')) {
    function testHelper() {
        return 'Working....';
    }
}
if (! function_exists('dateFormat')) {
    function dateFormat($date) {
      if ($date) {
            $dt = new DateTime($date);

        return $dt->format('l j F Y'); // 27/10/2021
    }

    }
}

if (! function_exists('timeFormat')) {
    function timeFormat($time) {
      if ($time) {
            $dt = new DateTime($time);

        return $dt->format('g:i a'); 
    }

    }
}

if (! function_exists('rating')) {
    function rating($id) {
      
      $data = DB::table('comments')->leftJoin('cources','cources.id','comments.cource_id')
                        ->select('cources.id','comments.rating','comments.cource_id')
                        ->where('cources.id','=',$id)
                        ->get();
        if(!empty($data)){
            $res = $data->avg('rating');
        }else{
            $res = '';
        }
        return $res;

    }
}

if (! function_exists('payment')) {
    function payment($id) {
      
      $data = DB::table('cources')->leftJoin('payment','payment.cource_id','cources.id')
                    ->select('cources.*','payment.*')
                    ->where('cources.id','=',$id)
                    ->first();
        if(!empty($data)){
            $res = $data->cource_id;
        }else{
            $res = '';
        }
        return $res;

    }
}

if (! function_exists('Reviws')) {
    function Reviws($id) {
      
      $data = DB::table('comments')->leftJoin('cources','cources.id','comments.cource_id')
                        ->select('cources.id','comments.rating','comments.cource_id')
                        ->where('cources.id','=',$id)
                        ->get();
        if(!empty($data)){
            $res = $data->count('cource_id');
        }else{
            $res = '';
        }
        return $res;

    }
}

if (! function_exists('teachercources')) {
    function teachercources($id) {
      
      $data = DB::table('cources')->leftJoin('teacher','teacher.id','cources.added_by')
                        ->select('cources.*','teacher.image as img')
                        ->where('cources.added_by',$id)->get();
        if(!empty($data)){
            $res = $data->count('added_by');
        }else{
            $res = '';
        }
        return $res;

    }
}


if (! function_exists('getfeestype')) {
    function getfeestype($id) {
    	$data = DB::table('fees_types')->where('id',$id)->first();
    	if(!empty($data)){
    		$res = $data->name;
    	}else{
    		$res = '';
    	}
        return $res;
    }
}

if (! function_exists('getaddedby')) {
    function getaddedby($id) {
    	$data = DB::table('teacher')->where('id',$id)->first();
    	if(!empty($data)){
    		$res = $data->name;
    	}else{
    		$res = '';
    	}
        return $res;
    }
}

if (! function_exists('getsyllabus')) {
    function getsyllabus($id) {
    	$data = DB::table('syllabus')->where('id',$id)->first();
    	if(!empty($data)){
    		$res = $data->name;
    	}else{
    		$res = '';
    	}
        return $res;
    }
}

if ( ! function_exists( 'getRouteInfo' ) ) {
	/**
	 * Get routing information
	 * @return array
	 */
	function getRouteInfo() {

		if ( ! App::runningInConsole() ) {

			

			$routeArray       = app( 'request' )->route()->getAction();

			$controllerAction = class_basename( $routeArray['controller'] );

			
			list( $controller, $action ) = explode( '@', $controllerAction );

			return [ 'controller' => $controller, 'action' => $action ];
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'getActiveClass' ) ) {
	/**
	 * Get Active Class information/ Active menus
	 * @return array
	 */
	function getActiveClass( $controllerArray = array(), $actionArray = array() ) {
		$routeArray = getRouteInfo();
		
		if ( ! empty( $routeArray ) && in_array( $routeArray['controller'], $controllerArray ) && in_array( $routeArray['action'], $actionArray ) ) {
			echo 'active';
		} else {
			echo '';
		}

	}
}

?>