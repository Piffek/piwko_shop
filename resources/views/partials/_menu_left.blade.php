
<div class="col-md-2">
               <div class="sidebar">
                   <h1>Wyszukaj</h1>
                       <div class="input-append">
					  		<input class="span12" id="appendedInput" type="text">
					  		<span class="add-on"><i class="fw-icon-search"></i></span>
						</div>
                                
                                
               </div>
                  <div class="sidebar">
                     <h1>Kategorie</h1>
                     <ul>
                     
                     @foreach($kinds as $kind)
                     <li><a href="#">{{$kind->name}}</a></li>
                      @endforeach 
                     </ul>
                   </div>
                   
             </div>
</div>
