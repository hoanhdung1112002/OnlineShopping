@extends('user.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">Đơn hàng của bạn       <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>Id</th>
            <th>Mã hóa đơn</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Số lượng</th>
            <th>Phí vận chuyển</th>
            <th>Tổng thanh toán</th>
            <th>Trạng thái</th>
            <th>Tùy chọn</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{number_format($order->shipping->price),2}}VNĐ</td>
            <td>{{number_format($order->total_amount,2)}}VNĐ</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">{{$order->status}}</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">{{$order->status}}</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">{{$order->status}}</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">Thông tin đơn hàng</h4>
              <table class="table">
                    <tr class="">
                        <td>Mã hóa đơn</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>Ngày lập</td>
                        <td> : {{$order->created_at->format('d/m/Y')}} at {{$order->created_at->format('H:i:s')}} </td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                      @php
                          $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
                      @endphp
                        <td>Phí vận chuyển</td>
                        <td> :{{number_format($order->shipping->price),2}}VNĐ</td>
                    </tr>
                    <tr>
                        <td>Tổng thanh toán</td>
                        <td> :{{number_format($order->total_amount,2)}}VNĐ</td>
                    </tr>
                    <tr>
                      <td>Loại thanh toán</td>
                      <td> : @if($order->payment_method=='cod') Thanh toán khi nhận hàng @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>Trạng thái thanh toán</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">Địa chỉ nhận hàng</h4>
              <table class="table">
                    <tr class="">
                        <td>Họ tên</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>Quốc gia</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>Mã bưu điện</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
