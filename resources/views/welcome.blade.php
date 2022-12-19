@extends('layouts.app')

@section('content')
    <div class="m-auto p-lg-5">

        <h1 class="display-4">
            Import 1 Million Data form csv
        </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($id != null)
            <div class="alert alert-primary">
                <p>
                    Importing Data

                </p>
            </div>

        @else
            <form action="{{route("upload")}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>

                <button class="btn btn-primary" type="submit">Upload</button>
            </form>
        @endif


    </div>

@endsection

