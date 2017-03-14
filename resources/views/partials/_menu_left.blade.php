
<div class="col-md-2">
               <div class="sidebar">
                   <h1>search</h1>
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
                   <div class="sidebar no-space">
                       <h1>Maoreet facilis</h1>
                           <div class="sidebar-posts">
                               <i class="fw-icon-bell-alt"></i>
                               <h1>Vivamus </h1>
                               <p>Nulla nec praesent placerat risus..</p>
                           </div>
                           <div class="sidebar-posts">
                               <i class="fw-icon-beer"></i>
                               <h1>John</h1>
                               <p>Nulla nec praesent placerat risus..</p>
                           </div>
                           <div class="sidebar-posts no-border">
                               <i class="fw-icon-quote-right"></i>
                               <h1>Amenda</h1>
                               <p>Nulla nec praesent placerat risus..</p>
                      	   </div>
                   </div>
             </div>
</div>
