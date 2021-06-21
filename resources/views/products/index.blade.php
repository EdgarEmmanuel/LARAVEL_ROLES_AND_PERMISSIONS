@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products Management</h2>
        </div>
        <div class="pull-right">
            @can('role-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            @endcan
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
       <th>No</th>
       <th>Name</th>
       <th>Detail</th>
       <th width="280px">Action</th>
    </tr>
      @foreach ($products as $key => $product)
      <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->detail }}</td>
          <td>
              <a class="btn btn-info" href="{{ route('products.show',$product) }}">Show</a>
              @can('product-edit')
                  <a class="btn btn-primary" href="{{ route('products.edit',$product) }}">Edit</a>
              @endcan
              @can('product-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product],'style'=>'display:inline']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
              @endcan
          </td>
      </tr>
      @endforeach
  </table>
  
  
  {!! $products->render() !!}

  
@endsection