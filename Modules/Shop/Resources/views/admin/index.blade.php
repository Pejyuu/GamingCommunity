@extends('core::admin.master')

@section('title', 'product Index' )

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="far fa-file-alt"></i> products</h1>
    <hr>
    <a href="{{ route('product.create')}}" class="btn btn-success">Create New product</a>
    <hr>
    <div class="table-responsive table-sm">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Produktnavn</th>
                    <th>Updated / Created</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                <tr>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category['name']}}</td>
                    <td>
                    <a class="btn btn-sm btn-info" href="{{ url('product/'. $product->id )}}">View</a>
                    <a class="btn btn-sm btn-info" href="{{ route('product.edit', ['id' => $product->id] )}}">Edit</a>

                    {!! Form::open(['method' => 'DELETE',  'style'=> 'display: inline', 'route' => ['product.destroy', $product->id] ]) !!}
                    {!! Form::button('<i class="fas fa-times-circle"></i>', ['class' => 'btn btn-sm btn-danger', 'title'=> 'Delete product', 'type' => 'submit']) !!}
                    {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@stop
