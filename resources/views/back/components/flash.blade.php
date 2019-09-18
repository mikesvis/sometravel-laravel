<script type="text/javascript">
    var notis = [];
@if(session()->has("flashes"))
    @foreach (session("flashes") as $message)
        notis.push({
            text: '{{ $message[0] }}',
            type: '{{ $message[1] }}',
            options: {
                closeButton: true,
                debug: false,
                newestOnTop: false,
                preventDuplicates: true,
                progressBar: true,
                positionClass: 'toast-bottom-right',
                timeOut: {{ $message[2] }},
                extendedTimeOut: {{ $message[2] }}
            }
        });
    @endforeach
    {{ session()->forget('flashes') }}
@endif
</script>
