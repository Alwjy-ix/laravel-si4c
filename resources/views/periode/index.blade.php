<h2>Data fakultas</h2>
@foreach ($result as $item)
    {{ $item->tahun_akademik }} - {{ $item->kode_smt }}<br/>
@endforeach


