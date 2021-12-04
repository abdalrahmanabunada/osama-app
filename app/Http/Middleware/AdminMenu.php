<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Link;
use Session;

use App\Models\Users_links;
use App\Models\Role_links;
use Illuminate\Support\Facades\View;
class AdminMenu
{
    public function handle($request, Closure $next)
    {
        $request = $next($request);
        //جيب اسم الرابط الذي نحن به
        $routeName = \Route::currentRouteName();
        
        $user = auth()->user();

        if(!$user['active']){
            return redirect(route('admin.logout'));
        }
        //Session::flash('menu', "gggggggg");
        
        if ($user) {
        
            $links = Link::where('parent_id', 0)->get()->toArray();
		    $tree = [];
		    foreach($links as $link) {
                if($link['show_in_menu']){
                    $linkHasRole = Role_links::whereRaw('links_id = ? and roles_id = ?',["{$link['id']}", "1"])
			        ->get()->count() > 0;

                    if($linkHasRole) {
                        $havePermission = $user->links()->where("route_name", $link['route_name'])->count()>0;
                        $haveRole = false;
                        $listRoles = $user->roles()->get();
                        foreach($listRoles as $rol){
                            $hasPerm = $rol->links()->where("route_name", $link['route_name'])->count()>0;
                            if($hasPerm){
                                $haveRole = true;
                                break;
                            }
                        }
                        if($havePermission || $haveRole) {
                            $icon = $link['icon'];
			                $count =  Link::where([['parent_id','=',$link['id']]])->get()->count();
			
                            $lk = $link['route_name'];
                            //$opened = $routeName == $lk;
                            //dd($opened);
			                $node = [
			                    'id' => $link['id'],
			                    'text' => $link['title'],
                                'url' => $lk,
                                 'route_name' => Route($link['route_name']),

			                    'state' => [
				                    'selected'	=> true,
				                    'opened'	=> true
			                    ],
			                    'icon' => $icon,
			                ];
			
			                if($count > 0){
				                $node["children"] = $this->perm_tree_fun($link['id'], $user->id, $user);//[ $this->perm_tree_fun($link['id'], $id) ];
			                }
			                array_push($tree, $node);
                         }
                    }
                }
		    }
		    $json = json_encode($tree);
            //dd($tree);
            //Session::flash('menu', $json);
            //dd($json);
            //Session::put('menu', $json);
            //View::share('menu', $json);
            //$request->put('menu', $json);
        }
        //dd($request);
        if(strpos($routeName, 'down') !== false)
        {
            return $request;
        }
        else if(strpos($routeName, 'export') !== false)
        {
            return $request;
        }
        else if(strpos($routeName, 'Csv') !== false)
        {
            return $request;
        }
        else if(strpos($routeName, 'getimg') !== false)
        {
            return $request;
        }
        return $request->withCookie(cookie()->forever('menu', $json));
    }
    public function perm_tree_fun($id, $userid, $user) {
		$padre =  Link::where([['parent_id','=',$id]])->get()->toArray();  
        $arr = [];
        foreach($padre as $link){
            if($link['show_in_menu']) {

                $linkHasRole = Role_links::whereRaw('links_id = ? and roles_id = ?',["{$link['id']}", "1"])
			    ->get()->count() > 0;

                if($linkHasRole) {
                    $havePermission = $user->links()->where("route_name", $link['route_name'])->count()>0;
                    $haveRole = false;
                    $listRoles = $user->roles()->get();
                    foreach($listRoles as $rol){
                        $hasPerm = $rol->links()->where("route_name", $link['route_name'])->count()>0;
                        if($hasPerm){
                            $haveRole = true;
                            break;
                        }
                    }
                    if($havePermission || $haveRole) {
                        $count =  Link::where([['parent_id','=',$link['id']]])->get()->count();
			            $icon = $link['icon'];
			            
			            $node = [
				            'id'	=>	$link['id'],
				            'text' => $link['title'],
                            'url' => $link['route_name'],
                            'route_name' => Route($link['route_name']),
				            'state' => [
					            'selected'	=> true,//$hasperm > 0,
					            'opened'	=> true
				            ],
				            'icon' => $icon
			            ];

			            if($count > 0){
				            $node["children"] = $this->perm_tree_fun($link['id'], $userid, $user);//[ $this->perm_tree_fun($link['id'], $userid) ];
			            }
			            array_push($arr, $node);
                    }
                }
            }
		}
        return $arr;
	}
}
