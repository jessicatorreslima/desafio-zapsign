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

    @if ($errors->any())
        <div class="alert alert-danger">
        There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
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
            <td>{{ substr($doc->date_limit_to_sign,0,10) }}</td>
            <td>
                {{ $doc->signed ? 'Yes ' : 'No '}}
                @if ($doc->signed == false)
                    <form action="{{ route('docs.update',$doc->id) }}" method="POST" style="display:inline  ">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="signed" class="form-control" value=1>
                        <button type="submit" class="btn btn-success">Sign</button>
                    </form>
                @else
                    <button type="submit" class="btn btn-success" disabled>Sign</button>
                @endif
            </td>
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