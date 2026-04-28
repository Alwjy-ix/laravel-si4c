<h1>Ini Berita</h1>
@foreach ($result as $item)
    <h2>{{ $item->judul }}</h2> <p>{{ $item->deskripsi }}<br/></p> 
@endforeach