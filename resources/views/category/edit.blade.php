@extends('backend.layout')

@section('content')
<form method="POST" action="{{ route('category.update', ['id' => $category->id]) }}" class="mt-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row mt-3">
       <div class="col-lg-6">
          <div class="mb-3">
          <label for="nama" class="form-label">Nama Category</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ $category->nama }}">
       </div>
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary">submit</button>
       </div>
    </div>
  </form>
@endsection
