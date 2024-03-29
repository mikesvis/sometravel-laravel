@isset($breadcrumbs)
    <div class="col-12 col-lg-auto">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $item)
                @if ($item['url'] != null)
                    <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
                @endif
            @endforeach
        </ol>
    </div><!-- /.col -->
@endisset
