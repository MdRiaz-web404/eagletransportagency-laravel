@extends('layouts.dashboardmaster')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <span>{{$error}}</span>
                    </div>
                    @endforeach
                @endif
                <h3>Add Position</h3>
                <form action="{{route('role.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Position Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>List of Staff Position</h3>
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="border-0">
                            <th class="p-0 min-w-100px">SL</th>
                            <th class="p-0 min-w-200px">Position</th>
                            <th class="p-0 min-w-50px">Delete</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td class="text-start"> {{$loop->index+1}}</td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        <!--begin::Name-->
                                        <div class="d-flex justify-content-start flex-column">
                                            <h4>{{$role->position_name}}</h4>
                                        </div>
                                        <!--end::Name-->
                                    </div>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('role.destroy',$role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
        </div>
    </div>
@endsection
@section('custom_JS')
    <script>
    @if (session('success'))
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: "{{session('success')}}"
        })
    @endif
    </script>
@endsection
