<div  class="our_room">
         <div class="container">
            <div class="row">
    <div class="col-md-12">
        <div class="titlepage" style="text-align: center; margin: 30px 0; padding: 20px; background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%); border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <h2 style="margin: 0; font-size: 2.2em; color: #2c3e50; font-family: 'Arial', sans-serif; text-transform: uppercase; letter-spacing: 1px; position: relative; display: inline-block;">
                Our Rooms
                <span style="position: absolute; bottom: -8px; left: 0; width: 100%; height: 3px; background: linear-gradient(to right, #3498db, #9b59b6);"></span>
            </h2>
            
        </div>
    </div>
</div>
         <p style="margin: 25px auto;font-size: 1.3em; color: #2d3748; line-height: 1.8; max-width: 800px; font-family: 'Georgia', serif; font-weight: 400;letter-spacing: 0.3px;text-align: center;">
                                         Nos chambres offrent un cadre confortable et moderne, parfaitement adapté aux séjours de loisirs ou d'affaires.
                                             Chaque chambre est équipée d’un lit spacieux, d’une salle de bain privative, de la climatisation, 
                                                d’un accès Wi-Fi gratuit, d’une télévision à écran plat et d’un espace de travail. Profitez d’un 
                                                   séjour agréable dans un environnement calme et soigné.
         </p>

          <br><br>
            <div class="row">
            @foreach($room as $rooms)
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img style="height:200px;width:350px" src="room/{{$rooms->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$rooms->room_title}} </h3>
                        <p style ="padding:10px ">{!! Str::limit($rooms->description,100)!!} </p>

                        <a   class="btn btn-primary" href="{{url('room_details',$rooms->id)}}"> Room Details </a>
                     </div>
                  </div>
               </div>              
            @endforeach
            </div>
         </div>
      </div>