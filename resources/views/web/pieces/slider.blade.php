

    <div class="crsl-items" data-navigation="navbtns">
        <nav class="slidernav">
            <div id="navbtns" class="clearfix">
                <a href="#" class="previous">prev</a>
                <a href="#" class="next">next</a>
            </div>
        </nav>
        <div class="crsl-wrap">
            @foreach($sliders as $slider)
            <div class="crsl-item">
                <div class="thumbnail">
                    <img src="{{$slider->img}}" alt="danny antonucci">
                </div>
                <p>{{ $slider->description  }}</p>
                <p class="readmore"><a href="{{$slider->url}}">Подробнее</a></p>
            </div>
                @endforeach<!-- post #2 -->
        </div>
    </div>

<script type="text/javascript">
    $(function(){
        $('.crsl-items').carousel({
            visible: 3,
            itemMinWidth: 180,
            itemEqualHeight: 370,
            itemMargin: 9,
        });

        $("a[href=#]").on('click', function(e) {
            e.preventDefault();
        });
    });
</script>