<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\ImotiModel;

class ImotiService
{
    public $paginate = 10;
    public $visible = ['id','title','text','status','top','city','area_id','type','price','size','floor','floors','material','view','options', 'agent_id'];

    public function getImoti($class, $user)
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
            $top = $this->getTop();
            $active = $this->getActive();
            return [
                'top' => 'top',
                'user'=> $user,
            ];
        }
        
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
            if($user->role == 'admin')
            {
                $agent = 'admin';
            } else 
            {
                $agent = $user->id;
            }
            return [
                'method' => 'dashImoti',
                'agent'=> $agent,
            ];
        }
        
    }

    public function getTop()
    {
        return ImotiModel::topImoti($this->visible);
    }

    public function getActive()
    {
        return ImotiModel::homeImoti($this->paginate, $this->visible);
    }

    public function getAllImoti()
    {   
        if($user->role == 'admin')
        {
            $imoti = ImotiModel::All();
            return $imoti;
        }
        
    }
}