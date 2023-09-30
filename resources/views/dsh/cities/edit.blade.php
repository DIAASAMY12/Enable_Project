@extends('dsh.parent')

@section('title','Edit City')
@section('page-big-title','Edit City')
@section('page-main-title','Cities')
@section('page-sub-title','Edit')

@section('style')

@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit City</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                </div>
                @endif
                @if (session()->has('message'))
                <div class="alert alert-{{session('alert-type')}} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{session('message')}}
                </div>
                @endif


                <form method="POSt" action="{{route('cities.update',$city->id)}}">
                    @method('PUT')
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" @if(old('name')) value="{{old('name')}}" @else value="{{$city->name}}" @endif class="form-control" name="name" id="name">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection

@section('scripts')

@endsection
