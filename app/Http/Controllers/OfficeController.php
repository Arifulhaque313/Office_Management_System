<?php

namespace App\Http\Controllers;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
class OfficeController extends Controller
{
    //
    public function create(){
        return view('office_create');
    }

    //add function start
public function add(Request $request){

        
            $validator = Validator::make($request->all(),[
                'office_id'   => 'required|unique:offices,office_id,',
                'office_name' => 'required|unique:offices,office_name,',
            ]);            
    
           if( $validator->fails() ){
               return response()->json(['errors' => $validator->errors()] ,422);
           }else{
                try{
                    $office = new Office();
                    $office->office_id = $request->office_id;
                    $office->office_name = $request->office_name;
                    
                    if( $office->save() ){
                        return response()->json(['success' => 'New '.$office->office_name.' Created Successfully'], 200);
                    }
    
                }catch( Exception $e ){
                    return response()->json(['error' => $e->getMessage()],200);
                }
           }
        
    }
}
