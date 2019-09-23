@if (isset($sliders['mainSplash']) && count($sliders['mainSplash']->enabledImages))
<div class="slider slider--splash">
    <ul class="list-unstyled">
        @foreach ($sliders['mainSplash']->enabledImages as $image)
        <li class="slider__slide" style="background-image:url({{ $image->path }})">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-12">
                        {!! $image->description !!}
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif
