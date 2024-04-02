<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
class ProfileController extends Controller{
use ImageProcessing;
public function update(ProfileUpdateRequest $request){
    $user=$request->User();
    $validateData=$request->validated();
    if($request->hasFile('image')){
        $user->image? $this->deleteImage($user->image):'';
        $validateData['image']=$this->saveImage($request->file('image'));
    }
    $user->update($validateData);
    $user= $user->refresh();
    $user->image? $user->image = $user->image_url:'';
    $user->image_url;
    $success['user']=$user;
    $success['success']=true;
    return response()->json($success,200);
}
public function uuudu(Request $request){
    if($request->has('image')){
        $image=$request->image;
    $name = time().'-'.$image->gitClientOriginalExtension();
    // $file_name =;
    dd($name);
    // $path=public_path('imagesfp');
    // $image->move($path,$file_name);
    // return response()->json(['data'=>'','message'=>'yyyyyyy.'],200);

}
}
}
