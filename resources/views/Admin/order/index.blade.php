@extends('layouts.admin')
@section('content')
    <div class="container-fluid" style="min-height: 100vh;">

        <!-- Page Heading -->


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">الطلبات</h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>

                            <th>اسم العميل</th>
                            <th>العنوان</th>
                            <th>حالة الطلب</th>
                            <th>الاجمالى</th>
                            <th>عرض المنتجات</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user_address }}</td>

                                <td>{{$order->status}}</td>
                                <td>{{$order->total}}</td>
                                <td><a class="btn btn-primary" href="{{route('admin.order.show',$order->id)}}"> عرض المنتجات </a></td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    @if ($orders->lastPage() > 1)
                        <ul class="pagination">
                            @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                <a href="{{ url('/admin/order?page=' . $i) }}">
                                    <li class="{{ ($orders->currentPage() == $i) ? 'btn btn-danger' : 'btn btn-primary' }}">
                                        {{ $i }}
                                    </li>
                                </a>
                            @endfor
                        </ul>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
