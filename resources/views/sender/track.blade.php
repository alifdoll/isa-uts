<ul class="list-group">
    <li class="list-group-item list-group-item-action active">Lokasi Barang</li>
    @foreach ($stops[0]->details as $index => $stop)
    <li class="list-group-item">{{ $stop->current_location }}</li>
    @endforeach
</ul>