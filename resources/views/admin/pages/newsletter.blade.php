@extends('admin.layouts.master')

@section('style')
@endsection

@section('body')

    @include('admin.layouts.partials.header.sidebar')

    <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card wow mb-4">
                    <div class="card-body">
                     <div class="d-flex justify-content-between">
                      <h4 style="font-size: 20px;" class="mb-0">Tous les news</h4>
                      <div class="group-btn">
                        {{-- <button class="btn btn-primary"><i class="fas fa-sort-alpha-up"></i></button>
                      <button class="btn btn-primary"><i class="fas fa-sort-alpha-down"></i></button> --}}
                      </div>
                      {{-- <div class="form-group w-25 d-flex mb-0">
                        <input type="text" class="form-control" placeholder="Recherche ici..." style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        <button class="btn btn-primary btn-sm" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                          <i class="fas fa-search"></i>
                        </button>
                      </div> --}}
                     </div>
                     <div class="row mt-3">
                       <div class="col-lg-12">
                        <table class="table table-striped table-responsive-sm">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Email</th>
                              <th scope="col">Date</th>
                              
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($news as $key => $new)
                                <tr >
                                    {{-- <td><img src="{{ asset('assets/images/users/'.$new->image) }}" alt=""></td> --}}
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $new->email }}</td>
                                    <td>{{ $new->created_at->diffForHumans() }}</td>
                                    
                                    <td><a class="text-danger" href="{{ route('admin.news.delete', [$new->id]) }}">Supprimer</a></td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                       </div>
                     </div>
                    </div>
                  </div>
                </div>
           
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@section('script')
@endsection
