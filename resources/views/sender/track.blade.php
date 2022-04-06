<ul class="list-group">
    <li class="list-group-item list-group-item-action active">Lokasi Barang</li>
    @if (count($stops[0]->details) == 0)
        <li class="list-group-item">Barang Belum Diambil Oleh Kurir!!</li>
    @else
        @foreach ($stops[0]->details as $index => $stop)
            <li class="list-group-item">{{ decrypt($stop->current_location) }}</li>
        @endforeach
    @endif
</ul>
