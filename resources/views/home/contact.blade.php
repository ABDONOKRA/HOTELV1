 <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                <div class="titlepage" style="text-align: center; margin: 30px 0; padding: 20px; background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%); border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    <h2 style="margin: 0; font-size: 2.2em; color: #2c3e50; font-family: 'Arial', sans-serif; text-transform: uppercase; letter-spacing: 1px; position: relative; display: inline-block;">
        Contact Us
        <span style="position: absolute; bottom: -8px; left: 0; width: 100%; height: 3px; background: linear-gradient(to right, #3498db, #9b59b6);"></span>
    </h2>
</div>
                  @if(session()->has('message'))
                  
                  <div class="alert alert-success">

                  <button type="button" class="close" data-bs-dismiss='alert'>X</button>{{session()->get('message')}}
                  </div>  
            @endif                
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="main_form" action="{{url('contact')}}" method="Post">
                  @csrf
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="type" name="name" requerid> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="email" name="email" requerid> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="number" name="phone" requerid>                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" name="message">Message</textarea>
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>