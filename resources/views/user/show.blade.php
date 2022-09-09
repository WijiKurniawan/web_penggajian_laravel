@extends('_layouts.main')

@section('container')
    <div class="my-3 mx-2">
        <div class="container d-flex justify-content-center align-items-center" style="height: 70vh; flex-direction: column">
            <h4>{{ $title }}</h4>

            <form action="/logout" method="post" class="mt-2">
                @csrf
                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin keluar?')">Keluar</button>
            </form>
        </div>

    </div>
@endsection
