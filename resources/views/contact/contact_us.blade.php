@extends('main')

@section('content')
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <h2 style="margin-bottom: 20px; margin-top: 20px;color: lawngreen;font-weight: bold"><p>Liên hệ</p> </h2>
            @if(Session::has('message_sent'))
              <div class="alert alert-success" role="alert">
                      {{Session::get('message_sent')}}
              </div>

           @endif
        <form method="post" action="{{route('contact.send')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label" style="color: springgreen">Họ và Tên:</label>
                <div class="col-sm-10">
                    <input type="text" name="name"  class="form-control" id="staticEmail" placeholder="Tên" >
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label "style="color: springgreen">Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputPassword" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label" style="color: springgreen">Số điện thoại:</label>
                <div class="col-sm-10">
                    <input type="number" name="phone" class="form-control" id="inputPassword" placeholder="Số điện thoại" >
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label" style="color: springgreen">Lời nhắn:</label>
                <div class="col-sm-10">
                    <input type="text" name="message"  class="form-control"  id="inputPassword" placeholder="Chi tiết thoại" style="height: 70px">
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary ml-5 mtext-101">Gửi </button>
        </form>
        </div>
    </section>

@endsection
