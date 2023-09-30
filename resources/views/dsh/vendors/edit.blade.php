@extends('dsh.parent')

@section('title','Edit Vendor')
@section('page-big-title','Edit Vendor')
@section('page-main-title','Vendor')
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
                  <h3 class="card-title">Edit Vendor</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="edit-form">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name </label>
                      <input type="text" value="{{$vendor->name}}" class="form-control" id="name"  placeholder="Enter name">
                    </div>

                    <div class="form-group">
                      <label for="email">Email </label>
                      <input type="text" value="{{$vendor->email}}" class="form-control" id="email"  placeholder="Enter email">
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="button" onclick="update('{{$vendor->id}}')" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection

@section('scripts')
<script>

    function update(id){
        axios.put('/dsh/admin/vendors/'+id,{
            name: document.getElementById('name').value,
            email:document.getElementById('email').value,
        }).then(function(response) {
            console.log(response);
            window.location.href='/dsh/admin/vendors';
            toastr.success(response.data.message);
        }).catch(function (error) {
                // handle error
                console.log(error);
                toastr.error(error.response.data.message);
            });
    }


</script>
@endsection
