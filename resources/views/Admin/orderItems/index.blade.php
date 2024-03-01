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

                            <th>اسم المنتج</th>
                            <th>الكمية</th>
                            <th>السعر</th>


                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($order_items as $order_item)
                            <tr>
                                <td>{{ $order_item->product->name }}</td>
                                <td>{{ $order_item->quantity }}</td>

                                <td>{{$order_item->price}}</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    @if ($order_items->lastPage() > 1)
                        <ul class="pagination">
                            @for ($i = 1; $i <= $order_items->lastPage(); $i++)
                                <a href="{{ url('/admin/order_items?page=' . $i) }}">
                                    <li class="{{ ($order_items->currentPage() == $i) ? 'btn btn-danger' : 'btn btn-primary' }}">
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
