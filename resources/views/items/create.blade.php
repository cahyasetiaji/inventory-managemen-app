@extends('layout')

@section('content')
    <h1>Tambah Item</h1>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Item</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="quantity">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
