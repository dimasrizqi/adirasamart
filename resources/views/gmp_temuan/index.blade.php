@extends('layouts.master')
@section('title', 'Data Temuan')

@section('content')
    <section class="section">
        <div class="section-header">
        <div class="row">
            <div class="col-md-12">
            @if ( $jumlahtemuan >= 400)
            disk penuh tidak bisa menambah temuan
            @else
            <h1><a href="{{ route('gmptemuan.create') }}" class="btn btn-info">Tambah Temuan</a>
            </h1>
            @endif
            </div>
        </div>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            @foreach ($datatemuan as $no => $item)
              <div class="col-12 col-sm-3 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <div class="card-header-action">
                      <a href="#" class="btn btn-primary">Detail</a>
                        @if ($item->status == 0)
                        <a href=" {{route('gmpclosing.edit',$item->id)}} " class="btn btn-warning">Status Open</a>
                        @elseif ($item->status == 1)
                        <a href="{{route('gmpclosing.edit',$item->id)}}" class="btn btn-success">Status Close</a>
                        @else
                        Status Tidak diketahui
                        @endif
                    </div>
                  </div>
                  <div class="card-body">
                        <div data-crop-image="200" style="overflow: hidden; position: relative; height: 200;">
                          <img alt="image" alt="alternative text" src="images/{{$item->filename}}" class="img-fluid">
                        </div>
                    <p>
                    {{$item->description}}
                    </p>
                  </div>
                </div>
              </div>
             @endforeach
             <div class="col-md-12">
            {{ $datatemuan->onEachSide(1)->links() }}
               </div>
            </div>
            
    </div>
    </div>
@endsection

@push('page-script')

@endpush
