@while ($modelIterator->parentRecursive != null )
    @if ($modelIterator->parent_id > 1)
        <span class="ml-4"></span>
    @endif
    @php
        $modelIterator = $modelIterator->parentRecursive;
    @endphp
@endwhile
