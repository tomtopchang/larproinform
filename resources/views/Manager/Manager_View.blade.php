@extends('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@section('header')
@endsection
@section('content')
    <h5>人員基本資料檢視明細</h5><br>
    <div class="panel panel-default">
        <form role="form">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">                    
                        <div class="form-group">
                            <label>員工編號</label>
                            <input class="form-control" id="pno" type="text" placeholder="" value="{{ $info[0]['pno'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>身分證字號</label>
                            <input class="form-control" id="idno" type="text" placeholder="" value="{{ $info[0]['idno'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label for="disabledSelect">性別</label>
                                <select id="sex" class="form-control" disabled="">
                                    <option  value=""> </option>
                                    @foreach ($sexlist as $key => $value) 
                                        @if ($value == $info[0]['sex'] )  
                                            <option value="{{ $value }}" selected >{{ $key }} </option>
                                        @else
                                            <option value="{{ $value }}" >{{ $key }} </option>
                                        @endif
                                    @endforeach  
                                </select>
                        </div>
                        <div class="form-group">
                            <label>電話</label>
                            <input class="form-control" id="tel" type="text" placeholder="" value="{{ $info[0]['tel'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>職稱</label>
                            <input class="form-control" id="jobname" type="text" placeholder="" value="{{ $info[0]['jobname'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>離職日</label>
                             <input class="form-control datepicker" id="outday" type="text" placeholder="" value="{{ $info[0]['outday'] }}" disabled="">
                        </div>                           
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>姓名</label>
                            <input class="form-control" id="cname" type="text" placeholder="" value="{{ $info[0]['cname'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>出生日期</label>
                            <input class="form-control datepicker" id="birsday" type="text" placeholder="" value="{{ $info[0]['birsday'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>地址</label>
                            <input class="form-control" id="address" type="text" placeholder="" value="{{ $info[0]['address'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>單位</label>
                            <input class="form-control" id="depname" type="text" placeholder="" value="{{ $info[0]['depname'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>到職日</label>
                        <input class="form-control datepicker" id="inday" type="text" placeholder="" value="{{ $info[0]['inday'] }}" disabled="">
                        </div>                         
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
                <div class="row">
                    <div class="col-lg-1">
                    <a href="{{ url('/backstage/manager') }}" class="btn btn-sm btn-success width-60 m-r-2"> 返回</a>
                    </div>               
                </div>
            </div>
            <!-- /.panel-body -->
        </form>
    </div>
    <!-- /.panel -->


@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $('.datepicker').datepicker();
</script>
@endsection