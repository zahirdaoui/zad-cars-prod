<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Spatie\FlareClient\View;

class CarsShowController extends Controller
{

    public function index()
    {
        $cars = Cars::limit(3)->get();
        $data_cars_ville = DB::table('cars')->select('ville')->distinct()->get();
        $data_cars_name = DB::table('cars')->select('name')->distinct()->get();
        return view('user.index',compact('cars','data_cars_name','data_cars_ville'));
    }

    public function allcars(Request $request)
    {
        Paginator::useBootstrap();

          $data_search_cars = [
            'data_cars_ville' => DB::table('cars')->select('ville')->distinct()->get(),
            'data_cars_name' =>DB::table('cars')->select('name')->distinct()->get(),
            'min_price' => DB::table('cars')->min('price'),
            'max_price' => Cars::max('price'),
            'min_dtc' => DB::table('cars')->min('distance_km'),
            'max_dtc' =>DB::table('cars')->max('distance_km'),
            'year'=> DB::table('cars')->select('date_out')->distinct()->get(),
          ];



         if($request->search_name_cars){

            $cars = Cars::where('name',$request->search_name_cars)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }
        if($request->search_ville){

            $cars = Cars::where('ville',$request->search_ville)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }
        if($request->search_ville &&  $request->search_name_cars){

            $cars = Cars::where('ville',$request->search_ville)->where('name','LIKE',$request->search_name_cars)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }
        if($request->price_max){

            $cars = Cars::where('price','>=',$request->price_max)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }
        if($request->price_min){

            $cars = Cars::where('price','<=',$request->price_min)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }
        if($request->price_max &&  $request->price_min){

            $cars = Cars::where('price','>=',$request->price_max)->where('price','<=',$request->price_min)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }
        if($request->kml_min){

            $cars = Cars::where('distance_km','<=',$request->kml_min)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }
        if($request->kml_max){

            $cars = Cars::where('distance_km','>=',$request->kml_max)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }
        if($request->kml_max &&  $request->kml_min){

            $cars = Cars::where('distance_km','>=',$request->kml_max)->where('distance_km','<=',$request->kml_min)->latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));

        }

        else{
            $cars = Cars::latest()->paginate(10);
           return view('user.menucars',compact('cars','data_search_cars'));
        }

    }



    public function show($id)
    {
        $cars = Cars::find($id);
        $fcars =Cars::all()->where('ville', $cars->ville);
        if($fcars->count() < 2){
            $fcars =Cars::all();
        }
        return view('user.showcar',compact('cars','fcars'));
    }
    public function AboutUs()
    {
        return view('user.aboutus');
    }
    public function contact(Request $request)
    {
         $status = false;
         $fullName =$request->fullName;
         $emailUser =$request->email;
         $phoneUser =$request->phone;
         $subject =$request->subject;
         $messageText = $request->body;

         if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] =="POST"){
            $status = true;
            $this->sendEmail($fullName, $emailUser, $phoneUser, $subject, $messageText);
         }
       return view('user.contact',["status"=>$status]);
    }

    public function sendEmail($fullName, $emailUser, $phoneUser, $subject, $messageText)
    {
        
         
        Mail::to('alirassimi00@gmail.com')->send(
            new TestMail($fullName, $emailUser, $phoneUser, $subject, $messageText)
        );

      /*  $status = true;
      // return redirect()->to('/contact',["success"=>$success]);
      return view('user.contact',["success"=>$success]); */
  
    }

    public function conditions()
    {
        return view('user.condition');
    }


}
