@extends('layouts.app')
@section('content')
    <form method="post" id="import_form" action="{{route('products.import')}}" enctype="multipart/form-data">
        @csrf
        <div class="card border-primary mb-3">
            <div class="card-header">Products Import</div>
            <div class="card-body">
                <p>
                    <a href="{{route('products.import',['download'=>'true'])}}" class="btn btn-primary">Download Sample</a>
                </p>
                <p>
                    <div class="alert alert-warning">
                        Please don't change column names from sample file during import.
                    </div>
                </p>
                <div class="form-group">
                    <input type="hidden" name="import" value="true"/>
                    <label for="formFile" class="form-label mt-4">Choose Excel File</label>
                    <input required class="form-control" accept=".xlsx" name="file" type="file" id="formFile">
                </div>
            </div>
            <div class="card-footer">
                <button onclick="document.getElementById('import_form').submit()" type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
@endsection
