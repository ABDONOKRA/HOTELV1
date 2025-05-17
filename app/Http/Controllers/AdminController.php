<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use App\Models\Contact;
use Notification;
use App\Notifications\SendEmailNotification;
use App\Models\Activity;
use App\Models\ActivityBooking;
use App\Models\SpaBooking;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user(); // Récupère l'objet User complet
            
            // Accède à la propriété usertype de l'utilisateur
            if ($user->usertype == 'user') {


                

                 $room = Room::all();

                 $gallary = Gallary::all();

                return view('home.index',compact('room','gallary'));
            }
            else if ($user->usertype == 'admin') {
                return view('admin.index');
            }
            else {
                return redirect()->back();
            }
        }
        
        // Redirection si l'utilisateur n'est pas authentifié
        return redirect()->route('login');
    }

    public function home()
    {
        $room = Room::all();
        $gallary = Gallary::all();
        return view('home.index',compact('room','gallary'));

    }
         public function create_room()
    {

        return view('admin.create_room');

    }

           public function add_room(Request $request)
    {

        
            $data = new Room;

        $data->room_title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->wifi = $request->wifi;

        $data->room_type = $request->type;

        $image=$request->image;
        if($image)
        {

            $imagename=time().'.'.$image->getClientoriginalExtension();

            $request->image->move('room',$imagename);

            $data->image=$imagename;

        }

        $data->save();

        return redirect()->back();      

    }
      public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room' ,compact('data'));

    }
    public function room_delete($id)
    {

       $data = Room::find($id);
       $data->delete();
       return redirect()->back(); 
    }
 

        public function room_update($id)
    {

       $data = Room::find($id);
     return view('admin.update_room',compact('data'));
    }

   public function edit_room(Request $request ,$id)
    {

       $data = Room::find($id);

       $data->room_title =$request->title;

       $data->description =$request->description;

       $data->price =$request->price;

      

       $data->wifi =$request->wifi;

       $data->room_type =$request->type ;
       $image=$request->image;


        if($image)
    {
         $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room',$imagename);

            $data->image=$imagename;
    }
        $data->save();

        return redirect()->back() ;
    }

       public function bookings()
        {
            $data=Booking::all();
            return view('admin.booking',compact('data'));


        }
        public function delete_booking($id)
        {
            $data = Booking::find($id);

            $data->delete();

            return redirect()->back();

        }
        public function approve_book($id)
        {
            $booking = Booking::find($id);

            $booking->status='approve';

            $booking->save();
            return redirect()->back();            


        }
        public function reject_book($id)
        {
            $booking = Booking::find($id);

            $booking->status='rejected';

            $booking->save();
            return redirect()->back();            


        }
           public function view_gallary()
        {
             $gallary = Gallary::all();
            return view('admin.gallary',compact('gallary'));


        }
            public function upload_gallary(Request $request)
 {
                    $data = new Gallary;

                    $image =$request->image;

                if($image)
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('gallary',$imagename);

        $data ->image = $imagename;

        $data->save();

        return redirect()->back();

     }


  }
  public function delete_gallary($id)
        {
            $data = Gallary::find($id);

             
            $data->delete();
             
            return redirect()->back();            


        }
        public function all_messages()
        {
            $data = Contact::all();
return view('admin.all_messages',compact('data'));


        }

        public function send_mail($id)
        {
            $data = Contact::find($id);

            return view('admin.send_mail',compact('data'));


        }


        public function mail(Request $request,$id)
        {
            $data = Contact::find($id);

            $details = [
                'greeting' => $request->greeting,

                'body' => $request->body,

                'action_text' => $request->action_text,

                'action_url' => $request->action_url,

                'endline' => $request->endline,




            ]; 
            Notification::send($data,new SendEmailNotification($details));

            return redirect()->back();

        }

    public function create_activity()
    {
        return view('admin.create_activity');
    }

    public function store_activity(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:activity,spa',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'duration_in_hours' => 'required|integer|min:1',
            'difficulty' => 'nullable|in:easy,moderate,hard',
            'elevation' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $activity = new Activity;
        $activity->name = $request->name;
        $activity->type = $request->type;
        $activity->description = $request->description;
        $activity->price = $request->price;
        $activity->duration_in_hours = $request->duration_in_hours;
        $activity->difficulty = $request->difficulty;
        $activity->elevation = $request->elevation;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('activity', $imageName);
            $activity->image = $imageName;
        }

        $activity->save();

        return redirect()->back()->with('message', 'Activity/Service added successfully');
    }

    public function view_activities()
    {
        $activities = Activity::all();
        return view('admin.view_activities', compact('activities'));
    }

    public function edit_activity($id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.edit_activity', compact('activity'));
    }

    public function update_activity(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:activity,spa',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'duration_in_hours' => 'required|integer|min:1',
            'difficulty' => 'nullable|in:easy,moderate,hard',
            'elevation' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $activity = Activity::findOrFail($id);
        $activity->name = $request->name;
        $activity->type = $request->type;
        $activity->description = $request->description;
        $activity->price = $request->price;
        $activity->duration_in_hours = $request->duration_in_hours;
        $activity->difficulty = $request->difficulty;
        $activity->elevation = $request->elevation;

        if($request->hasFile('image')) {
            // Delete old image
            if($activity->image) {
                $oldImagePath = public_path('activity/' . $activity->image);
                if(file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('activity', $imageName);
            $activity->image = $imageName;
        }

        $activity->save();

        return redirect()->back()->with('message', 'Activity/Service updated successfully');
    }

    public function delete_activity($id)
    {
        $activity = Activity::findOrFail($id);
        
        // Delete image file
        if($activity->image) {
            $imagePath = public_path('activity/' . $activity->image);
            if(file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $activity->delete();
        return redirect()->back()->with('message', 'Activity/Service deleted successfully');
    }

    public function view_activity_bookings()
    {
        $bookings = ActivityBooking::with(['user', 'activity'])->get();
        return view('admin.activity_bookings', compact('bookings'));
    }

    public function view_spa_bookings()
    {
        $bookings = SpaBooking::with(['user', 'spaService'])->get();
        return view('admin.spa_bookings', compact('bookings'));
    }

    public function confirm_activity_booking($id)
    {
        $booking = ActivityBooking::findOrFail($id);
        $booking->status = 'confirmed';
        $booking->save();
        return redirect()->back()->with('message', 'Activity booking confirmed successfully');
    }

    public function cancel_activity_booking($id)
    {
        $booking = ActivityBooking::findOrFail($id);
        $booking->status = 'cancelled';
        $booking->save();
        return redirect()->back()->with('message', 'Activity booking cancelled successfully');
    }

    public function confirm_spa_booking($id)
    {
        $booking = SpaBooking::findOrFail($id);
        $booking->status = 'confirmed';
        $booking->save();
        return redirect()->back()->with('message', 'Spa booking confirmed successfully');
    }

    public function cancel_spa_booking($id)
    {
        $booking = SpaBooking::findOrFail($id);
        $booking->status = 'cancelled';
        $booking->save();
        return redirect()->back()->with('message', 'Spa booking cancelled successfully');
    }
}
      