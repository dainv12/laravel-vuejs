@php
@endphp
@foreach ($posts as $item)
    {{$item->id}} - {{ $item->name}} <br>
@endforeach