<div class="our_room">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Room</h2>
               <p class="margin_0">Détendez-vous dans un havre de paix conçu pour votre confort. Notre chambre allie élégance moderne et chaleur authentique pour vous offrir une expérience inoubliable</p>
            </div>
         </div>
      </div>
      <div class="scroll-section">
         <div class="horizontal-scroll-wrapper">
            <div class="rooms-container" id="rooms-container">
               @foreach($room as $rooms)
                  <div class="room-card">
                     <div id="serv_hover" class="room">
                        <div class="room_img">
                           <figure><img style="height:200px;width:350px" src="room/{{$rooms->image}}" alt="#"/></figure>
                        </div>
                        <div class="bed_room">
                           <h3>{{$rooms->room_title}}</h3>
                           <p style="padding:10px">{!! Str::limit($rooms->description,100)!!}</p>
                           <a class="btn btn-primary" href="{{url('room_details',$rooms->id)}}">Room Details</a>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      <div class="dots-navigation" id="roomDots">
         <!-- Dots will be added dynamically -->
      </div>
   </div>
</div>

<style>
.scroll-section {
   position: relative;
   overflow: hidden;
}

.horizontal-scroll-wrapper {
   width: 100%;
   overflow: hidden;
   padding: 20px 0;
}

.rooms-container {
   display: flex;
   gap: 20px;
   padding: 10px 40px;
   transition: transform 0.5s ease;
}

.room-card {
   min-width: 350px;
   transition: transform 0.3s ease;
}

.room-card:hover {
   transform: translateY(-10px);
}

/* Custom styling for room cards */
.room {
   background: white;
   border-radius: 15px;
   overflow: hidden;
   box-shadow: 0 4px 15px rgba(0,0,0,0.1);
   height: 100%;
}

.room_img {
   position: relative;
   overflow: hidden;
}

.room_img img {
   transition: transform 0.5s ease;
   width: 100%;
   height: 200px;
   object-fit: cover;
}

.room:hover .room_img img {
   transform: scale(1.1);
}

.bed_room {
   padding: 20px;
   text-align: center;
}

.bed_room h3 {
   margin-bottom: 15px;
   color: #333;
   font-size: 24px;
}

.bed_room p {
   color: #666;
   margin-bottom: 20px;
}

.btn-primary {
   background: #007bff;
   border: none;
   padding: 10px 25px;
   border-radius: 25px;
   transition: all 0.3s ease;
}

.btn-primary:hover {
   background: #0056b3;
   transform: translateY(-2px);
   box-shadow: 0 5px 15px rgba(0,123,255,0.3);
}

/* Updated Dots Navigation Styling */
.dots-navigation {
   text-align: center;
   margin: 20px auto;
   padding: 10px;
}

.dot {
   height: 10px;
   width: 10px;
   margin: 0 6px;
   background-color: #d6d6d6;
   border-radius: 50%;
   display: inline-block;
   cursor: pointer;
   transition: all 0.3s ease;
}

.dot.active {
   background-color: #666666;
}

.dot:hover {
   background-color: #999999;
}

/* Segmented Slider styling */
.slider-container {
   width: 80%;
   margin: 20px auto;
   padding: 0 20px;
}

.segmented-slider {
   display: flex;
   width: 100%;
   height: 4px;
   background: #ddd;
   border-radius: 2px;
   overflow: hidden;
   position: relative;
}

.segment {
   flex: 1;
   height: 100%;
   background: #ddd;
   position: relative;
   cursor: pointer;
   transition: all 0.3s ease;
}

.segment:not(:last-child)::after {
   content: '';
   position: absolute;
   right: 0;
   top: -3px;
   width: 2px;
   height: 10px;
   background: #fff;
   z-index: 2;
}

.segment.active {
   background: #007bff;
}

.segment:hover {
   background: #0056b3;
}

/* Remove old slider styles */
.room-slider, 
.room-slider::-webkit-slider-thumb,
.room-slider::-moz-range-thumb {
   display: none;
}
</style>

<script>
let currentPage = 0;
const itemsPerPage = 3; // Number of items to show per page

function createDots() {
   const container = document.getElementById('rooms-container');
   const totalItems = container.children.length;
   const maxPages = Math.ceil(totalItems / itemsPerPage);
   const dotsContainer = document.getElementById('roomDots');
   
   // Clear existing dots
   dotsContainer.innerHTML = '';
   
   // Create dots based on number of pages needed
   for (let i = 0; i < maxPages; i++) {
      const dot = document.createElement('span');
      dot.className = 'dot' + (i === 0 ? ' active' : '');
      dot.onclick = () => moveToPage(i);
      dotsContainer.appendChild(dot);
   }
}

function moveToPage(pageIndex) {
   const container = document.getElementById('rooms-container');
   const dots = document.querySelectorAll('#roomDots .dot');
   const totalItems = container.children.length;
   const maxPages = Math.ceil(totalItems / itemsPerPage);

   if (pageIndex >= 0 && pageIndex < maxPages) {
      currentPage = pageIndex;
      const offset = pageIndex * itemsPerPage * -350; // 350px is the width of each card plus gap
      container.style.transform = `translateX(${offset}px)`;

      // Update dots
      dots.forEach((dot, index) => {
         dot.classList.toggle('active', index === pageIndex);
      });
   }
}

// Initialize dots and first page
document.addEventListener('DOMContentLoaded', () => {
   createDots();
   moveToPage(0);
});
</script>