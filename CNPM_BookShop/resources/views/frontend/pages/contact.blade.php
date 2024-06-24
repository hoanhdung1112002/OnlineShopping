@extends('frontend.layouts.master')
@section('main-content')
@section('title','Liên hệ')


    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.110234829975!2d105.69356111392273!3d18.659048669796512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cc2ca3ccbf09%3A0xbd183e7e516c5dac!2zxJDhuqFpIEjhu41jIFZpbmg!5e0!3m2!1svi!2s!4v1640086127234!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Thông tin liên hệ</span>
                            <h2>Liên hệ với chúng tôi</h2>
                            <p style="font-size: 18px">Hỗ trợ từ 24/24h</p>
                        </div>
                        <ul>
                            @php
                                $settings=DB::table('settings')->get();
                            @endphp
                            @foreach($settings as $key=>$setting)
                            <li>
                                <h4>Thông tin</h4>
                                <p style="font-size: 18px; padding: 2px">Email: {{$setting->email}}</p>
                                <p style="font-size: 18px; padding: 2px">Điện thoại: {{$setting->phone}}</p>
                                <p style="font-size: 18px; padding: 2px">Địa chỉ: {!! $setting->address!!}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="{{route('contact.submit')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Họ và tên của bạn">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="subject" placeholder="Chủ đề">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Email">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="phone" placeholder="Điện thoại">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Nội dung bạn muốn gửi"></textarea>
                                    <button type="submit" class="site-btn">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
