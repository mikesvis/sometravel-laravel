<div class="visaCalcForm border-bottom vpm__pb">
    <div class="container">
        <div class="row">

            {!! $calculator[0] !!}

            @for ($i = 1; $i < count($calculator)-1; $i++)
                {!! $calculator[$i] !!}
            @endfor

            @if ($i % 2 != 0 && count($calculator) > 1)
                {!! $calculator[count($calculator)-1] !!}
            @endif

        </div>
    </div>
</div>

<div class="visaCalcForm vpm__mb">
    <div class="container">
        <div class="row align-items-end">

            @if ($i % 2 == 0)
                {!! $calculator[count($calculator)-1] !!}
            @else
                <div class="col-10 col-sm-12 col-lg-6">&nbsp;</div>
            @endif

            <div class="col-10 col-sm-12 col-lg-6">
                <div class="row align-items-center vpm__mt">
                    <div class="col-12 col-xl-12 col-xxl-5 col-xxxl-4 text-center text-lg-right">
                        <div class="h1 mb-3 mb-md-2 mb-xxl-0 mt-3 mt-lg-0"><strong>от <span id="visaCalculatedPrice">{{ $visa->getPrice() }}</span> ₽</strong></div>
                    </div>
                    <div class="col-12 col-xl-12 col-xxl-7 col-xxxl">
                        <div class="radioButtons row justify-content-center">
                            <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6">
                                <button type="submit" name="proceed" class="btn btn-primary rounded-pill btn-block"><strong>Оформить онлайн</strong></button>
                            </div>
                            <div class="col-12 col-sm-6 col-xxl-6 col-xxxl-6 mt-3 mt-sm-0">
                                <span class="btn btn-outline-primary bg-white text-primary rounded-pill btn-block cursor-pointer"><strong>Оформить в офисе</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
