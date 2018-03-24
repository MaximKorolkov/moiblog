<div class="container ">
 <div class="row ">
     <div class="col-sm-12 ">

         @foreach($novosti as $novost)
        <div class="col-sm-3 " ">
            <img src="{{$novost->general_image}}"
                 alt="{{$novost->title}}"
                 title="{{$novost->title}}"
                 width="{{$novost->img_width}}"
                 height="{{$novost->img_height}}"
                 class="thumbnail" />
         <div class="caption" style="height: 150px;">
            <h4 class>{{ $novost->title  }}</h4>
            <a href="{{'news' .'/'. $novost->url}}" class="btn btn-primary">Читать далее</a>
         </div>
        </div>
             @endforeach
     </div>
 </div>
</div>