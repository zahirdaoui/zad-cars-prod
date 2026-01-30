<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\Role;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {

        $data = Cars::all();
        $dataTrash =  Cars::onlyTrashed()->get()->count();



        return view('dashboard.index',compact('data','dataTrash'));


    }
    public function deletedCars()
    {

            $carsSf = Cars::onlyTrashed()->get();
            return view('dashboard.deletedcars',compact('carsSf'));
    }



    public function create()
    {
        return view('dashboard.addcars');
    }


    public function store(Request $request)
    {


        $request->validate([
            'nomVoiture' => "required",
            'modelV' =>"required",
            'dateVoiture' => "required",
            'numch' => "required",
            'kml' => "required ",
            'prix' => "required",
            'tva' => "required",
            'motor' => "required",
            "vitesses" => "required",
            'ville' => "required",
            'details' => 'required',
            'coverphoto' =>'required',

        ]);


        if($file_img_cover = $request->file('coverphoto')){
            $imag_nam = md5(rand(1000,100000));
            $ext = $file_img_cover->getClientOriginalExtension();
            $upload_path = 'dataimg/covercars/';
            $img_full_name_cover = $imag_nam.'.'.$ext;
            $file_img_cover->move($upload_path,$img_full_name_cover);
            $cars = new Cars([
                'name' => $request->nomVoiture,
                'name_model' => $request->modelV,
                'date_out' => $request->dateVoiture,
                'horses' => $request->numch,
                'distance_km' => $request->kml,
                'price' => $request->prix,
                'tax' => $request->tva,
                'ville' => $request->ville,
                'Gearboxe' => $request->vitesses,
                'motor' => $request->motor,
                'details' => $request->details,
                'cover' =>  $img_full_name_cover,
                'user_id' =>Auth::user()->id
            ]);
            $cars->save();
        }
        if($request->hasfile('img_p')){
            $file_img = $request->file('img_p');
            foreach($file_img as $file){
                $imag_nam = md5(rand(1000,100000));
                $ext = $file->getClientOriginalExtension();
                $upload_path = 'dataimg/imgcars/';
                $img_full_name = $imag_nam.'.'.$ext;
                $request['cars_id'] = $cars->id;
                $request['img'] = $img_full_name;
                $file->move($upload_path,$img_full_name);
                Images::create($request->all());
            }
        }
        return redirect()->back()->with('message' , 'la voiture a été ajouté avec succès');
    }


    public function show(Request $request)
    {

            $data_cars_ville = DB::table('cars')->select('ville')->distinct()->get();
          $data_cars_name = DB::table('cars')->select('name')->distinct()->get();



        if($request->search_id){

            $cars = Cars::where('id',$request->search_id)->get();
           return view('dashboard.table',compact('cars','data_cars_ville','data_cars_name'));



        }
        if($request->search_name_cars){

            $cars = Cars::where('name',$request->search_name_cars)->get();
           return view('dashboard.table',compact('cars','data_cars_ville','data_cars_name'));



        }
        if($request->search_ville){

            $cars = Cars::where('ville',$request->search_ville)->get();
           return view('dashboard.table',compact('cars','data_cars_ville','data_cars_name'));

        }
        if($request->search_date_out &&  $request->search_name_cars){

            $cars = Cars::where('date_out',$request->search_date_out)->where('name','LIKE','%',$request->search_name_cars,'%')->get();
           return view('dashboard.table',compact('cars','data_cars_ville','data_cars_name'));

        }
        else{
            $cars = Cars::all();
           return view('dashboard.table',compact('cars','data_cars_ville','data_cars_name'));


        }
        return redirect()->back();


    }



    public function edit($id)
    {
        $car = Cars::find($id);
        $user = Auth::user();



        return view('dashboard.editcars')->with("car",$car);
    }


    public function update(Request $request, $id)
    {
        $cars = Cars::find($id);

        if($request->hasFile('coverphoto')){
            if(File::exists('dataimg/covercars/'.$cars->cover)) {
                File::delete('dataimg/covercars/'.$cars->cover);
            }
            if($file_img_cover = $request->file('coverphoto')){
                $imag_nam = md5(rand(1000,100000));
                $ext = $file_img_cover->getClientOriginalExtension();
                $upload_path = 'dataimg/covercars/';
                $img_full_name_cover = $imag_nam.'.'.$ext;
                $file_img_cover->move($upload_path,$img_full_name_cover);
                $cars->update([
                    'name' => $request->nomVoiture,
                    'name_model' => $request->modelV,
                    'date_out' => $request->dateVoiture,
                    'horses' => $request->numch,
                    'distance_km' => $request->kml,
                    'price' => $request->prix,
                    'tax' => $request->tva,
                    'ville' => $request->ville,
                    'Gearboxe' => $request->vitesses,
                    'motor' => $request->motor,
                    'details' => $request->details,
                    'cover' => $img_full_name_cover
                ]);
                $cars->save();
            }
        }else{
            $cars->update([
                'name' => $request->nomVoiture,
                'name_model' => $request->modelV,
                'date_out' => $request->dateVoiture,
                'horses' => $request->numch,
                'distance_km' => $request->kml,
                'price' => $request->prix,
                'tax' => $request->tva,
                'ville' => $request->ville,
                'Gearboxe' => $request->vitesses,
                'motor' => $request->motor,
                'details' => $request->details,
            ]);
            $cars->save();


        }
        if($request->hasfile('img_p')){
            $file_img = $request->file('img_p');
            foreach($file_img as $file){
                $imag_nam = md5(rand(1000,100000));
                $ext = $file->getClientOriginalExtension();
                $upload_path = 'dataimg/imgcars/';
                $img_full_name = $imag_nam.'.'.$ext;
                $request['cars_id'] = $cars->id;
                $request['img'] = $img_full_name;
                $file->move($upload_path,$img_full_name);
                Images::create($request->all());
            }
        }







        $request->validate([
            'nomVoiture' => "required",
            'modelV' =>"required",
            'dateVoiture' => "required",
            'numch' => "required",
            'kml' => "required ",
            'prix' => "required",
            'tva' => "required",
            'motor' => "required",
            "vitesses" => "required",
            'ville' => "required",
            'details' => 'required',
            'coverphoto' =>'required',

        ]);


      return redirect()->back();



    }

    public function softDelete($id)
    {
        $carsSf = Cars::find($id)->delete();
        return redirect()->back()->with('message' ,'L\'élément a été ajouté avec succès à la corbeille');


    }
    public function BackFromsoftDelete($id)
    {
        $carsSf = Cars::onlyTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('message' , 'L\'article a été retourné avec succès');
    }
    public function destroyimagescars($id)
    {
        $iamges = Images::find($id);
        if(File::exists('dataimg/imgcars/'.$iamges->img)) {
            File::delete('dataimg/imgcars/'.$iamges->img);
        }
        $iamges->delete();
        return redirect()->back();
    }
    public function destroyimagecover($id)
    {
        $iamges_cover = Cars::find($id);
        if(File::exists('dataimg/covercars/'.$iamges_cover->cover)) {
            File::delete('dataimg/covercars/'.$iamges_cover->cover);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $carsSf = Cars::onlyTrashed()->find($id);
        if(File::exists('dataimg/covercars/'.$carsSf->cover)) {
            File::delete('dataimg/covercars/'.$carsSf->cover);
        }
        $images = Images::where('cars_id',$carsSf->id)->get();
        foreach($images as $image ){

            if(File::exists('dataimg/imgcars/'.$image->img)) {
                File::delete('dataimg/imgcars/'.$image->img);
            }
        }
        $carsSf->forceDelete();
        return redirect()->back()->with('message_delete' , 'L\'élément a été supprimé avec succès');
    }
}
