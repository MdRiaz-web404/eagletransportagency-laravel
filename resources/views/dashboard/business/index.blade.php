@extends('layouts.dashboardmaster')
@section('content')
<div class="col-md-12">
    <div class="card">
        <!--begin::Table container-->
        <div class="card-body">
            <h3>List of Truck Information</h3>
            <div class="text-end">
                <a class="btn btn-sm btn-primary" href="{{route('business.create')}}">Add More</a>
            </div>
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="businessdatatable">
                    <!--begin::Table head-->
                    <thead class="bg-primary text-light">
                        <tr class="border-0 text-center">
                            <th class="p-0 min-w-30px">SL</th>
                            <th class="p-0 min-w-100px">Date</th>
                            <th class="p-0 min-w-150px">Company</th>
                            <th class="p-0 min-w-100px">Load Point</th>
                            <th class="p-0 min-w-100px">Unload Point</th>
                            <th class="p-0 min-w-80px">Total Point</th>
                            <th class="p-0 min-w-150px">Truck Details</th>
                            <th class="p-0 min-w-100px">Mobile</th>
                            <th class="p-0 min-w-100px">Agency</th>
                            <th class="p-0 min-w-100px">Rent</th>
                            <th class="p-0 min-w-100px">Advance</th>
                            <th class="p-0 min-w-100px">Advance By</th>
                            <th class="p-0 min-w-100px">Damurrage</th>
                            <th class="p-0 min-w-100px">Total Due</th>
                            <th class="p-0 min-w-100px">Paid By</th>
                            <th class="p-0 min-w-100">Rate</th>
                            <th class="p-0 min-w-100px">Commission</th>
                            <th class="p-0 min-w-100px">Bill</th>
                            <th class="p-0 min-w-100px">Other</th>
                            <th class="p-0 min-w-50px text-end">action</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @forelse ($businesses as $business)
                            <tr>
                                <td>
                                    <h5>{{$loop->index+1}}</h5>
                                </td>
                                <td>
                                        <div class="d-flex justify-content-start flex-column">
                                            <span>{{$business->date}}</span>
                                        </div>
                                </td>
                                <td class="text-muted fw-bold text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->company}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->load_point}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->unload_point}}</span>
                                    </div>
                                </td>
                                <td class="text-cenetr">
                                    <div class="d-flex justify-content-center flex-column">
                                        <span>{{$business->total_point}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->truck_datails}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->mobile}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->agency}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->rent}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->advance}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->advance_by}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->demurrage}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->total_due}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->paid_by}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->rate}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->commission}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->bill}}</span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span>{{$business->other}}</span>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <a href="{{route('business.edit',$business->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <form action="{{route('business.destroy',$business->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  class=" m-1 btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
        </div>
        <!--end::Table container-->
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
    <script>
        $(document).ready(function () {
            $('#businessdatatable').DataTable();
        });
    </script>
@endsection
