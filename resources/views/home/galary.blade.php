 <div  class="gallery">
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
                                       Découvrez en images le charme et le confort de notre établissement. Parcourez notre galerie pour explorer nos chambres élégantes, nos espaces de détente, nos installations modernes, ainsi que l’ambiance chaleureuse qui fait la renommée de notre hôtel.
               </p>
               </div>
            </div>
            <div class="row">
            @foreach($gallary as $gallary)
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="/gallary/{{$gallary->image}}" alt="#"/></figure>
                  </div>
               </div>
           @endforeach
            </div>
         </div>
      </div>