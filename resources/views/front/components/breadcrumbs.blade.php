<div class="container">
    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white p-0 pt-3 pt-md-0">
                    @foreach ($breadcrumbs as $item)
                        @if ($item['url'] != null)
                            <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
                        @endif
                    @endforeach
                </ol>
            </nav>

        </div>
    </div>
</div>
