@extends('layouts.master')
@section('title', 'Input Temuan')

@section('content')
    <section class="section">
        <div class="section-header">
           <h1>Input Temuan</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{route('gmptemuan.store')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                
                                @if ($message = Session::get('failed'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload gambar </label>
                                        <input type="file" class="form-control" name="filename[]" required multiple > 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Temuan </label>
                                        <input name="deskripsi" class="form-control" required> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-scripts')

@endpush