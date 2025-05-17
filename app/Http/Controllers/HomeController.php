<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Http\Controllers\Compact;
use App\Models\Reservation;


 
class HomeController extends Controller
{
    public function room_details($id)
    {

        $room = Room::find($id);
        return view('home.room_details',compact('room'));
    }

 public function add_booking(Request $request,$id)
    {

            $request->validate([

                'atartDate'=>'requerd|date',

                'endDate'=>'date|after:startDate',


            ]);
        
            $data = new Booking;

        $data->room_id =$id;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        $data->start_date = $request->startDate;

        $data->end_date =$request->endDate;

        $data->save();

        return redirect()->back()->with('message','Room Booked Successfully');


        }
        public function Contact(Request $request)
        {

            $contact = new Contact;

            $contact->name = $request->name;

            $contact->email = $request->email;

            $contact->phone = $request->phone;

            $contact->message = $request->message;
            $contact->save();
            return redirect()->back()->with('message','Message Sent Seccussfully');

            
        }
        public function our_rooms()
        {
            $room = Room::all();
            return view('home.our_rooms',compact('room'));


        }
         public function hotel_gallary()
        {
            $gallary = Gallary::all();
           
            return view('home.hotel_gallary', compact('gallary'));


        }
         public function contact_us()
        {

             
            return view('home.contact_us');


        }
        
        public function index()
        {
            $room = Room::all();
            $gallary = Gallary::all();
            return view('home.index', compact('room', 'gallary'));
        }
        
        public function my_reservations()
        {
            // Check if user is authenticated
            if (!auth()->check()) {
                return redirect('login');
            }

            // Get user's reservations
            $reservations = Reservation::where('user_id', auth()->id())
                ->with('room') // Eager load room relationship
                ->get()
                ->map(function ($reservation) {
                    return [
                        'id' => $reservation->id,
                        'room_name' => $reservation->room->room_title ?? 'Chambre non disponible',
                        'image' => $reservation->room->image ?? null,
                        'check_in' => $reservation->check_in,
                        'check_out' => $reservation->check_out,
                        'status' => $reservation->status ?? 'pending',
                        'total_price' => $reservation->room->price ?? 0,
                        'created_at' => $reservation->created_at
                    ];
                });

            return view('home.my_reservations', compact('reservations'));
        }



}
