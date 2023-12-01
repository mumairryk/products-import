@extends('layouts.app')
@section('content')
    <div class="card border-primary mb-3">
        <div class="card-header">Products List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>SrNo</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Code</th>
                        <th>SKU</th>
                        <th>QTY</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $index=>$product)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->qty}}</td>
                        </tr>
                    @empty
                        <td colspan="6">No data available</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
