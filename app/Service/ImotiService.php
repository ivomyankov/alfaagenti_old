<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\ImotiModel;
use App\Models\AreaModel;
use Auth;

class ImotiService
{
    public $paginate = 10;
    public $visibleImot = ['id', 'title', 'text', 'status', 'top', 'city', 'area_id', 'type', 'price', 'size', 'floor', 'floors', 'material', 'view', 'options', 'agent_id'];
    public $visibleImoti = ['id', 'title', 'top', 'status', 'city', 'area_id', 'type', 'price', 'size', 'floor', 'floors', 'material', 'view', 'created_at'];
    public $forbiden = ['address', 'phone', 'owner', 'notes'];

    public function getImoti($class, $page)
    {        
        if($class == 'HomeController'){
            $top = $this->getTop();            
        } else {
            $top = 0;
        }
        $active = $this->getActive($page);
        $user = $this->getUser();
        return [
            'top' => $top,
            'imoti'=> $active,
            'user'=> $user,
        ];        
    }

    public function getUser(){
        // Check is user logged in
        if (Auth::user()) {   
            $user = Auth::user();
        } else {
            $user = 'guest';
        }
        return $user;
    }

    public function getImoti2($class, $user)
    {         
        if($class == 'HomeController'){
            $top = $this->getTop();
            $active = $this->getActive();
            return [
                'top' => $top,
                'imoti'=> $active,
                'user'=> $user,
            ];
        } else {
            if($user->role == 'admin'){
                $agent = 'admin';
            } else {
                $agent = $user->id;
            }
            return [
                'method' => 'dashImoti',
                'agent'=> $agent,
            ];
        }
        
    }

    public function getTop()
    {   //dd(ImotiModel::topImoti($this->visibleImoti));
        return ImotiModel::topImoti($this->visibleImoti);
    }

    public function getActive($page)
    {
        if($page == 'naem'){
            return ImotiModel::homeImotiNaem($this->paginate, $this->visibleImoti);
        } else if($page == 'prodajba'){
            return ImotiModel::homeImotiProdajba($this->paginate, $this->visibleImoti);
        } else {
            return ImotiModel::homeImoti($this->paginate, $this->visibleImoti);
        } 
    }

    public function getAllImoti()
    {   
        if(Auth::user()->role == 'admin')
        {
            $imoti = ImotiModel::All();
            return $imoti;
        }
        
    }

    public function getImotiFiltar(){
        //$data = request()->validate([
        //  'search' => 'required|min:2|max:100'
        //]);
  
        //$pieces = explode(" ", $data['search']);
        $dbFields = ['imoti.id', 'type', 'price', 'size', 'agent_id', 'status', 'imoti.area_id'];
        $pieces = ['3 Стаен', 'продажба'];
  
        $search = ImotiModel::query()  ;
        foreach ($pieces as $key => $piece) {
              //$search = $search->orWhere('firma1', "LIKE", "%{$piece}%");
              $search = $search->Where(function($query) use ($dbFields, $piece){
                          foreach ($dbFields as $key => $dbField) {
                            $query->orWhere($dbField, 'LIKE', "%{$piece}%");
                          }
                        });
        }
          
        $result = $search->select('imoti.id', 'type', 'price', 'size', 'agent_id', 'status', 'area_id')
                        //->join('area', 'area_id', '=', 'area.id')
                        ->with('area')
                        ->with('agent')
                        ->get();
        //$result = $result->makeHidden($this->forbiden);
        //$count = $result->count();
        //return view('search', compact('result', 'srch', 'count'));
        //return $result;
        //return  $search->join('kontakt', 'company.id', '=', 'kontakt.company_id')->with('contacts')->with('conversations')->toSql();
        //return $search->toSql();
        dd($result);
      } // END search
      
}
