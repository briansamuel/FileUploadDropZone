<?php

namespace VanVu\FileUploadDropZone\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DropZoneController extends Controller
{
    //
    public function __construct() {
	   //$this->middleware('auth');
	}

	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/

	public function multifileupload()
	{
	    

	    return view('FileUploadDropZone::dropzone');
	}

	public function store(Request $request)
    {
    	
    	$image = $request->file('file');
        $imageName = time().'_'.$image->getClientOriginalName();
        $path = public_path('images');
        if(!File::isDirectory($path)){
	        File::makeDirectory($path, 0777, true, true);
	    }
        $upload_success = $image->move(public_path('images'),$imageName);
        
        if ($upload_success) {
            $url = url('images/'.$imageName);
            return response()->json($url, 200);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }
}
