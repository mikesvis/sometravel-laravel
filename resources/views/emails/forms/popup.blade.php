@foreach ($data as $field)
@empty($field['name']) @continue @endempty
{{ $field['name'] }} : {{ $field['value'] }}
@endforeach

@isset($data['parameter'])
@foreach ($data['parameter'] as $field)
{{ $field['name'] }} : {{ $field['value'] }}
@endforeach
@endisset

@isset($data['parameter_regular'])
@foreach ($data['parameter_regular'] as $field)
{{ $field['name'] }} : {{ $field['value'] }}
@endforeach
@endisset
