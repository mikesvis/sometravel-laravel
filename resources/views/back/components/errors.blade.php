@if ($errors->any())
    <div class="mb-3">

        <!-- Basic alert -->
        <div class="alert alert-danger alert-styled-left">
            @foreach ($errors->all() as $error)
                <div class="py-1">{{ $error }}</div>
            @endforeach
        </div>
        <!-- /basic alert -->

    </div>
@endif
