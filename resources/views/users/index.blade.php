@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
             <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <div class="alert alert-info">
                        Sample table page
                    </div>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                                <th width="5%">#</th>
                                <th width="20%">Name</th>
                                <th width="8%">Username</th>
                                <th width="25%">Email</th>
                                <th width="12%">Phone No.</th>
                                <th width="5%">Role</th>
                                <th width="10%">Status</th>
                                <th class="notexport" width="15%">Action</th>
                            </tr>
                  </thead>
                  <tbody>
                  
                   @for($i = 0; $i <20;$i++)
                   

                  
                  @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_no }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <!-- todo: have problem in mobile device -->
                                        <div class="icheck-primary d-inline">
                        <input type="checkbox"  data-pk="{{$user->id}}" id="radioPrimary1" name="r1" @if($user->status) checked @endif >
                        <label for="radioPrimary1">
                        </label>
                      </div>
                                           </td>
                                           <td>
                                        {{--<div class="btn-group">--}}
                                            {{--<a title="Details"  href="{{URL::route('users.show',$user->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                        <div class="btn-group">
                                            <a title="Edit" href="{{URL::route('users.edit',$user->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            </a>
                                        </div>
                                        <!-- todo: have problem in mobile device -->
                                        <div class="btn-group">
                                            <a title="Edit Permission" href="{{URL::route('user.permission',$user->id)}}" class="btn btn-info btn-sm"><i class="fa fa-user-times"></i></a>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form  class="myAction" method="POST" action="{{URL::route('users.destroy', $user->id)}}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            @endfor
                        
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
    </div>
    <!-- /.content -->
@endsection
@push('styles')

  
 

@endpush
@push('scripts')

<script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('js/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('js/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('js/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging--s": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush