<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GellaryImagee;
class ProfileController extends Controller
{
    public function dashboard(Request $request){
        $query=GellaryImagee::where('user_id',auth()->id());
        if($request->category){
            $query->where('category',$request->category);
          }

          if($request->sort_by){
            $order=($request->sort_by=='oldest')?'ASC':'DESC';
            $query->orderBy('created_at',$order);
          }else{
              $query->orderBy('created_at','desc');
          }
  
        $data['images']=$query->paginate(3);
        return view('dashboard',$data);
    }
}
