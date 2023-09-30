@extends('dsh.parent')

@section('title','')
@section('page-big-title','')
@section('page-main-title','')
@section('page-sub-title','')

@section('style')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Responsive Hover Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($vendors as $vendor )
                  <tr>
                    <td>{{$vendor->id}}</td>
                    <td>{{$vendor->name}}</td>
                    <td>{{$vendor->email}}</td>
                    <td>1{{$vendor->created_at}}</td>
                    <td>{{$vendor->updated_at}}</td>
                    <td><div class="btn-group">
                        <a href="{{route('vendors.edit',$vendor->id)}}" class="btn btn-info">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" onclick="confirmDestroy('{{$vendor->id}}',this)" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')
<script>
    function confirmDestroy(id,refernce){
        // alert('sdsd');
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            destroy(id,refernce);
        }
    });
    }

    function destroy(id,refernce){
    axios.delete('/dsh/admin/vendors/'+id)
        .then(function (response) {
            // handle success
            console.log(response);
            refernce.closest('tr').remove();
            showMessage(response.data);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
            showMessage(error.response.data);
        });
    }

    function showMessage(data){
        Swal.fire({
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
@endsection
