@extends('layouts.plain')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold mb-4">Pilih Template CV</h2>

  <div class="row g-4">
    @foreach ($templates as $t)
      <div class="col-md-4">
        <div class="card shadow-sm">
          <img src="{{ asset('img/fitur/' . $t['thumb']) }}" class="card-img-top object-fit-cover" style="height:180px;">
          <div class="card-body">
            <h5 class="card-title">{{ $t['title'] }}</h5>
            <p class="card-text text-muted">{{ $t['desc'] }}</p>
            <a href="{{ route('cv.create', $t['id']) }}" class="btn btn-primary">Use Template</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
