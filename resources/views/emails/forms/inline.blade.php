@foreach ($data as $field)
@empty($field['name']) @continue @endempty
{{ $field['name'] }} : {{ $field['value'] }}
@endforeach
