<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Models\Activity;
use App\Models\ActivityBooking;
use App\Models\SpaBooking;


 
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

        $data->room_id = $id;
        $data->user_id = auth()->id();
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
        
        public function hotels_services()
        {
            $activities = Activity::orderBy('created_at', 'desc')->get();
            return view('home.hotels_services', compact('activities'));
        }

        public function activity_details($id)
        {
            $activity = Activity::findOrFail($id);
            return view('home.activity_details', compact('activity'));
        }

        public function spa_details($id)
        {
            $activity = Activity::findOrFail($id);
            return view('home.spa_details', compact('activity'));
        }

        public function book_activity(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'booking_date' => 'required|date|after:today',
                'booking_time' => 'required'
            ]);

            $activity = Activity::findOrFail($id);
            
            $booking = new ActivityBooking();
            $booking->user_id = auth()->id();
            $booking->activity_id = $id;
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->phone = $request->phone;
            $booking->booking_date = $request->booking_date;
            $booking->booking_time = $request->booking_time;
            $booking->number_of_people = 1; // Default to 1 if not specified
            $booking->total_price = $activity->price;
            $booking->status = 'pending';
            $booking->save();

            return redirect()->back()->with('message', 'Activity booked successfully!');
        }

        public function book_spa(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'booking_date' => 'required|date|after:today',
                'booking_time' => 'required'
            ]);

            $activity = Activity::findOrFail($id);
            
            $booking = new SpaBooking();
            $booking->user_id = auth()->id();
            $booking->spa_service_id = $id;
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->phone = $request->phone;
            $booking->booking_date = $request->booking_date;
            $booking->booking_time = $request->booking_time;
            $booking->price = $activity->price;
            $booking->status = 'pending';
            $booking->save();

            return redirect()->back()->with('message', 'Spa service booked successfully!');
        }

        public function my_reservations()
        {
            // Check if user is authenticated
            if (!auth()->check()) {
                return redirect('login');
            }

            // Get user's room bookings
            $bookings = Booking::where('user_id', auth()->id())
                ->where('status', '!=', 'cancelled')
                ->with('room')
                ->get()
                ->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'type' => 'room',
                        'name' => $booking->room->room_title ?? 'Chambre non disponible',
                        'image' => $booking->room->image ?? null,
                        'booking_date' => $booking->start_date,
                        'end_date' => $booking->end_date,
                        'status' => $booking->status ?? 'pending',
                        'total_price' => $booking->room->price ?? 0,
                        'number_of_people' => 0,
                        'special_requests' => null,
                        'details_url' => url('/room_details/' . $booking->room_id),
                    ];
                });

            // Get user's activity bookings
            $activityBookings = ActivityBooking::where('user_id', auth()->id())
                ->where('status', '!=', 'cancelled')
                ->with('activity')
                ->get()
                ->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'type' => 'activity',
                        'name' => $booking->activity->name ?? 'Activité non disponible',
                        'image' => $booking->activity && $booking->activity->image ? 'activities/' . $booking->activity->image : null,
                        'booking_date' => $booking->booking_date,
                        'booking_time' => $booking->booking_time,
                        'status' => $booking->status ?? 'pending',
                        'total_price' => $booking->total_price ?? 0,
                        'number_of_people' => $booking->number_of_people ?? 1,
                        'special_requests' => $booking->special_requests,
                        'details_url' => $booking->activity ? url('/activity/' . $booking->activity->id) : '#',
                    ];
                });

            // Get user's spa bookings
            $spaBookings = SpaBooking::where('user_id', auth()->id())
                ->where('status', '!=', 'cancelled')
                ->with('spaService')
                ->get()
                ->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'type' => 'spa',
                        'name' => $booking->spaService->name ?? 'Spa non disponible',
                        'image' => $booking->spaService && $booking->spaService->image ? 'activities/' . $booking->spaService->image : null,
                        'booking_date' => $booking->booking_date,
                        'booking_time' => $booking->booking_time,
                        'status' => $booking->status ?? 'pending',
                        'total_price' => $booking->price ?? 0,
                        'number_of_people' => 1,
                        'special_requests' => $booking->special_requests,
                        'details_url' => $booking->spaService ? url('/spa/' . $booking->spaService->id) : '#',
                    ];
                });

            // Merge all reservations and sort by booking_date descending
            $reservations = $bookings
                ->concat($activityBookings)
                ->concat($spaBookings)
                ->sortByDesc('booking_date')
                ->values();

            return view('home.my_reservations', [
                'reservations' => $reservations
            ]);
        }

        public function cancelReservation(Request $request, $id)
        {
            $type = $request->input('type');
            if ($type === 'room') {
                $booking = Booking::where('id', $id)->where('user_id', auth()->id())->first();
                if ($booking) {
                    $booking->status = 'cancelled';
                    $booking->save();
                    return response()->json(['success' => true]);
                }
            } elseif ($type === 'activity') {
                $booking = ActivityBooking::where('id', $id)->where('user_id', auth()->id())->first();
                if ($booking) {
                    $booking->status = 'cancelled';
                    $booking->save();
                    return response()->json(['success' => true]);
                }
            } elseif ($type === 'spa') {
                $booking = SpaBooking::where('id', $id)->where('user_id', auth()->id())->first();
                if ($booking) {
                    $booking->status = 'cancelled';
                    $booking->save();
                    return response()->json(['success' => true]);
                }
            }
            return response()->json(['success' => false, 'message' => 'Reservation not found.']);
        }

}
