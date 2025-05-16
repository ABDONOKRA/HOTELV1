<!-- gallery -->
<div class="gallery">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage" style="text-align: center; margin: 30px 0; padding: 20px; background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%); border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
               <h2 style="margin: 0; font-size: 2.2em; color: #2c3e50; font-family: 'Arial', sans-serif; text-transform: uppercase; letter-spacing: 1px; position: relative; display: inline-block;">
                  GALLERY
                  <span style="position: absolute; bottom: -8px; left: 0; width: 100%; height: 3px; background: linear-gradient(to right, #3498db, #9b59b6);"></span>
               </h2>
            </div>
            <p style="margin: 25px auto;font-size: 1.3em; color: #2d3748; line-height: 1.8; max-width: 800px; font-family: 'Georgia', serif; font-weight: 400;letter-spacing: 0.3px;text-align: center;">
               Découvrez en images le charme et le confort de notre établissement. Parcourez notre galerie pour explorer nos chambres élégantes, nos espaces de détente, nos installations modernes, ainsi que l'ambiance chaleureuse qui fait la renommée de notre hôtel.
            </p>
         </div>
      </div>
      <div class="scroll-section">
         <div class="horizontal-scroll-wrapper">
            <div class="gallery-container" id="gallery-container">
               @foreach($gallary as $gallary)
                  <div class="gallery-item">
                     <div class="gallery_img">
                        <figure>
                           <img src="/gallary/{{$gallary->image}}" alt="#" onclick="openLightbox(this.src)"/>
                        </figure>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      <div class="dots-navigation" id="galleryDots">
         <!-- Dots will be added dynamically -->
      </div>
   </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" onclick="closeLightbox(event)">
   <span class="close-btn">&times;</span>
   <img id="lightbox-img" class="lightbox-content" src="" alt="Gallery Image">
</div>

<style>
.gallery {
   padding: 40px 0;
   background: #f8f9fa;
}

.horizontal-scroll-wrapper {
   width: 100%;
   overflow: hidden;
   padding: 30px 0;
}

.gallery-container {
   display: flex;
   gap: 25px;
   padding: 10px 40px;
   transition: transform 0.5s ease;
}

.gallery-item {
   min-width: 400px;
   transition: transform 0.3s ease;
}

.gallery-item:hover {
   transform: scale(1.05);
}

.gallery_img {
   position: relative;
   overflow: hidden;
   border-radius: 15px;
   box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.gallery_img figure {
   margin: 0;
}

.gallery_img img {
   width: 400px;
   height: 300px;
   object-fit: cover;
   transition: transform 0.5s ease;
}

.gallery_img:hover img {
   transform: scale(1.1);
}

/* Updated Dots Navigation Styling */
.dots-navigation {
   text-align: center;
   margin: 30px auto;
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

/* Remove slider styles */
.slider-container,
.segmented-slider,
.segment {
   display: none;
}

/* Lightbox styles */
.lightbox {
   display: none;
   position: fixed;
   z-index: 999;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background-color: rgba(0, 0, 0, 0.9);
   display: flex;
   justify-content: center;
   align-items: center;
   opacity: 0;
   visibility: hidden;
   transition: opacity 0.3s ease, visibility 0.3s ease;
}

.lightbox.active {
   opacity: 1;
   visibility: visible;
}

.lightbox-content {
   max-width: 90%;
   max-height: 90vh;
   object-fit: contain;
   border-radius: 4px;
   box-shadow: 0 0 20px rgba(0,0,0,0.3);
   transform: scale(0.95);
   transition: transform 0.3s ease;
}

.lightbox.active .lightbox-content {
   transform: scale(1);
}

.close-btn {
   position: absolute;
   top: 20px;
   right: 30px;
   color: #fff;
   font-size: 40px;
   font-weight: bold;
   cursor: pointer;
   transition: color 0.3s ease;
}

.close-btn:hover {
   color: #bbb;
}

/* Make gallery images clickable */
.gallery_img img {
   cursor: pointer;
}
</style>

<script>
let currentGalleryPage = 0;
const galleryItemsPerPage = 3; // Changed from 4 to 3 items per page due to larger size

function createGalleryDots() {
   const container = document.getElementById('gallery-container');
   const totalItems = container.children.length;
   const maxPages = Math.ceil(totalItems / galleryItemsPerPage);
   const dotsContainer = document.getElementById('galleryDots');
   
   // Clear existing dots
   dotsContainer.innerHTML = '';
   
   // Create dots based on number of pages needed
   for (let i = 0; i < maxPages; i++) {
      const dot = document.createElement('span');
      dot.className = 'dot' + (i === 0 ? ' active' : '');
      dot.onclick = () => moveToGalleryPage(i);
      dotsContainer.appendChild(dot);
   }
}

function moveToGalleryPage(pageIndex) {
   const container = document.getElementById('gallery-container');
   const dots = document.querySelectorAll('#galleryDots .dot');
   const totalItems = container.children.length;
   const maxPages = Math.ceil(totalItems / galleryItemsPerPage);

   if (pageIndex >= 0 && pageIndex < maxPages) {
      currentGalleryPage = pageIndex;
      const offset = pageIndex * galleryItemsPerPage * -425; // Adjusted for new width (400px + 25px gap)
      container.style.transform = `translateX(${offset}px)`;

      // Update dots
      dots.forEach((dot, index) => {
         dot.classList.toggle('active', index === pageIndex);
      });
   }
}

// Initialize dots and first page
document.addEventListener('DOMContentLoaded', () => {
   createGalleryDots();
   moveToGalleryPage(0);
});

function openLightbox(imageSrc) {
   const lightbox = document.getElementById('lightbox');
   const lightboxImg = document.getElementById('lightbox-img');
   
   lightboxImg.src = imageSrc;
   lightbox.style.display = 'flex';
   
   // Trigger reflow before adding active class for animation
   void lightbox.offsetWidth;
   lightbox.classList.add('active');
   
   // Prevent scrolling of the background
   document.body.style.overflow = 'hidden';
}

function closeLightbox(event) {
   const lightbox = document.getElementById('lightbox');
   const lightboxImg = document.getElementById('lightbox-img');
   
   // Only close if clicking outside the image
   if (event.target !== lightboxImg) {
      lightbox.classList.remove('active');
      
      // Wait for animation to finish before hiding
      setTimeout(() => {
         lightbox.style.display = 'none';
         // Restore scrolling
         document.body.style.overflow = '';
      }, 300);
   }
}

// Close lightbox with Escape key
document.addEventListener('keydown', function(event) {
   if (event.key === 'Escape') {
      closeLightbox(event);
   }
});
</script>