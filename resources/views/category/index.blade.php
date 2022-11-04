@extends('backend.layout')

@section('content')
        <div class="row mt-2">
            <div class="col-sm-12 col-md-8">
            <h2>List Category</h2>
            </div>
            <div class="col-sm-12 col-md-4">
                <a href="{{ route('category.create') }}" class="btn btn-warning float-end">Add Category</a>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="bg-dark text-danger">
                <tr>
                <th scope="col">Nama</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
             </tr>
     </thead>
            <tbody>
                @foreach ($categories as $category )
                <tr>
                    <th scope="row">{{ $category->nama }}</th>
                    <td>
                      <img src="{{ asset('uploads/' . $category->gambar) }}" alt=""width="100">
                    </td>
                    <td>
                        <form action="{{ route('category.delete' , ['id' =>$category->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">hapus</button>
                        <a href="{{ route('category.edit',['id' =>$category->id]) }}" class="btn btn-warning">Edit</a>
                        </form>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
@endsection
