
<h2>Data periode</h2>
@foreach ($result as $item)
    {{ $item->nama }} - {{ $item->singkatan }} - {{ $item->dekan }} <br/>
@endforeach