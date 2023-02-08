@extends('docs/layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('docs.create') }}"> Create New doc</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Deleted</th>
            <th>Date limit to sign</th>
            <th>Signed</th>
            <th>Company</th>
            <th>Created By</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($docs as $doc)
        <tr>
            <td>{{ $doc->id }}</td>
            <td>{{ $doc->name }}</td>
            <td>{{ $doc->deleted }}</td>
            <td>{{ $doc->date_limit_to_sign }}</td>
            <td>{{ $doc->signed }}</td>
            <td>{{ $doc->company_id }}</td>
            <td>{{ $doc->created_by }}</td>
            <td>
                <form action="{{ route('docs.destroy',$doc->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('docs.show',$doc->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('docs.edit',$doc->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $docs->links('pagination.default') !!}
      
@endsection