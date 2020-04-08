<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

use DB;
use App\States;
use App\MainCategory;
use App\SubCategory;
use App\Advertisement;


class UsersController extends Controller
{

    public function searchadd(Request $request){
    if($request->get('city') && $request->get('category')){
        $category=$request->get('category');
        $city=$request->get('city');
        $carbikes=DB::table('advertisements')
        ->where(['city'=>$city,'maincategoryid'=>$category])
        ->get();
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
            ->get();
return view('users.categories.searchloc',['output'=>$output,'carbikes'=>$carbikes]);    }
    
    }

    public function index(){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
            ->get();
    	return view('users.user',['output'=>$output]);
    }
    public function fetch(Request $request){
    	if($request->get('indiastates')){
    		$query = $request->get('indiastates');
    		$data  = DB::table('states')->where('statename','like','%'.$query.'%')->get();	
    		// print_r($data);	
    				$output ='<ul id="statesstyle" style="display:block !important"; class="dropdown-menu">';
    				if($data->count()>0){
    					foreach($data as $row){
    					$output .= '<li class="searchState" id="search" name="searchState" style="cursor:pointer;" value="'.$row->id.'">'.$row->stateName.'</li>';
    					}
    				
    				$output .= '</ul>';
    				echo $output;
    		    	}
    		    	else{
    		    		$output .= '<li>Record not found</li>';
    				echo $output;
    		    	}
    	
    }
}


public function cities(Request $request){
    $query=$request->get('id');
    $data=DB::table('cities')->where('stateId',$query)->get();
    // echo $data;
    $output ='';
                    if($data->count()>0){
                        foreach($data as $row){
                        $output .= '<li id="searchCity" name="searchCity" style="cursor:pointer;">'.$row->cityName.'</li>';
                        }
                    $output .= '';
                    echo $output;
                    }
                    else{
                        $output .= '<li>City not found</li>';
                    echo $output;
                    }
        
}

public function retrive(Request $request){
   $data=DB::table('main_categories')->get();
   $output ='';
   foreach ($data as $row) {
       $output .='<option value="'.$row->id.'">'.$row->maincategory.'</option>';
   }
   echo $output;
}


public function postadd(){
   $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
            ->get();
        return view('users.postadd',['output'=>$output]);
}
public function categories(Request $request,$maincategory,$id){
    if($id == 2){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
              ->get();


        $subcategories=DB::table('main_categories')
            ->select('*')
            ->join('sub_categories','sub_categories.maincategory','=','main_categories.id')
            ->where(['main_categories.id'=>$id])
            ->get();
        $states=States::all(); 


        return view('users.publishads.mobile',['output'=>$output,'subcategories'=>$subcategories,'states' => $states]);
    }  
    else if($id == 3){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
            ->get();


        $subcategories=DB::table('main_categories')
            ->select('*')
            ->join('sub_categories','sub_categories.maincategory','=','main_categories.id')
            ->where(['main_categories.id'=>$id])
            ->get();
        $states=States::all(); 
       
        return view('users.publishads.electronics',['output'=>$output,'subcategories'=>$subcategories,'states' => $states]);
    }
    else if($id == 4){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
            ->get();


        $subcategories=DB::table('main_categories')
            ->select('*')
            ->join('sub_categories','sub_categories.maincategory','=','main_categories.id')
            ->where(['main_categories.id'=>$id])
            ->get();
        $states=States::all(); 
        
        return view('users.publishads.realestate',['output'=>$output,'subcategories'=>$subcategories,'states' => $states]);
    } 
    else if($id == 5){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
            ->get();

        $subcategories=DB::table('main_categories')
            ->select('*')
            ->join('sub_categories','sub_categories.maincategory','=','main_categories.id')
            ->where(['main_categories.id'=>$id,'subcategories'=>$subcategories,'states' => $states])
            ->get();
        $states=States::all(); 
        
        return view('users.publishads.service',['output'=>$output,'subcategories'=>$subcategories,'states' => $states]);
    }
    else if($id == 6){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
            ->get();
       
        $subcategories=DB::table('main_categories')
            ->select('*')
            ->join('sub_categories','sub_categories.maincategory','=','main_categories.id')
            ->where(['main_categories.id'=>$id])
            ->get();
        $states=States::all(); 

        return view('users.publishads.carsbike',['output'=>$output,'subcategories'=>$subcategories,'states' => $states]);
    }  
}

public function postcarbikes(Request $request){

$this->validate($request,[

'subcategoryid'=>'required',
'productname'=>'required',
'yearofpurchase'=>'required',
'expsellprice'=>'required',
'name'=>'required',
'mobile'=>'required',
'email'=>'required',
'state'=>'required',
'city'=>'required',
'city'=>'required', 
'photos'=>'required',
'photos.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
]);
$ads = new Advertisement;
        
        if($request->hasfile('photos'))
         {

            foreach($request->file('photos') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/uploads/', $name);  
                 // $data[] = $name;
                 $url=URL::to("/")."/uploads/".$name;
             $arr[]=$url;  
            }
         }
    $image= implode(",",$arr);
    $ads->maincategoryid=$request->input('maincategoryid');
    $ads->subcategoryid=$request->input('subcategoryid');
    $ads->productname=$request->input('productname');
    $ads->yearofpurchase=$request->input('yearofpurchase');
     $ads->expsellprice=$request->input('expsellprice');
    $ads->name=$request->input('name');
    $ads->mobile=$request->input('mobile');
    $ads->email =$request->input('email');
    $ads->state =$request->input('state');
    $ads->city =$request->input('city');
    $ads->photos=$image;

    $ads->save();
   return redirect('/')->with('message', 'Ad is published!');

}             
public function viewads(Request $request,$maincategory,$id){
    
if($id == 6){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
              ->get();

        $carbikes=DB::table('advertisements')
            ->where(['maincategoryid'=>$id])
            ->get();

        return view('users.categories.carbikes',['output'=>$output,'carbikes'=>$carbikes]);
    }
if($id == 2){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
              ->get();

        $carbikes=DB::table('advertisements')
            ->where(['maincategoryid'=>$id])
            ->get();
            
        return view('users.categories.mobile',['output'=>$output,'carbikes'=>$carbikes]);
    }
    if($id == 3){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
              ->get();

        $carbikes=DB::table('advertisements')
            ->where(['maincategoryid'=>$id])
            ->get();
            
        return view('users.categories.electronics',['output'=>$output,'carbikes'=>$carbikes]);
    }
    if($id == 4){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
              ->get();

        $carbikes=DB::table('advertisements')
            ->where(['maincategoryid'=>$id])
            ->get();
            
        return view('users.categories.realestate',['output'=>$output,'carbikes'=>$carbikes]);
    }
    if($id == 5){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
              ->get();

        $carbikes=DB::table('advertisements')
            ->where(['maincategoryid'=>$id])
            ->get();
            
        return view('users.categories.service',['output'=>$output,'carbikes'=>$carbikes]);
    }
    if($id==1){
       return redirect()->back()->with('message', 'All categories here!');
    }
}

public function productsearch(Request $request){
$query=$request->get('searchproduct');
$output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
              ->get();
        $carbikes=DB::table('advertisements')
            ->where('productname','like','%'.$query.'%')
            ->get();
     return view('users.categories.search',['output'=>$output,'carbikes'=>$carbikes]);       
}

    public function linkads(Request $request,$id){
        $output = DB::table('main_categories')
            ->select('main_categories.maincategory','main_categories.id','icons.icon')
            ->join('icons','icons.id','=','main_categories.id')
              ->get();
        $data=DB::table('advertisements')
        ->where(['id'=>$id])
        ->get();
     return view('users.linkads',['output'=>$output,'data'=>$data]);
    }

public function getads(){
   $query=DB::table('advertisements')->get();
   // print_r($query);
   $output='';
   if(count($query)>0){
    foreach ($query as $row) {
        $output .='<div class="col-md-4">
<div class="card mt-2 ml-3 mr-3 mb-2 ">
  <div class="card-body">
<img src='.strtok($row->photos,',').' style="padding:10px!important;width:100%;
height:182px;">
<div style="margin:12px;">
<h3>'.$row->productname.'</h3>
<p>Rs.'.$row->expsellprice.'</p>
<p>'.$row->city.'</p>
<a href='.$_SERVER['HTTP_REFERER'].'product/view/'.$row->id.' class="btn btn-success"> View about more</a>
        </div>
        </div>
        </div>
        </div>
        ';
    }
    $output .='';
    echo $output;
   }
}





}