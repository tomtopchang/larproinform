@extends('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <input class="form-control" id="pno" type="text" placeholder="" value="{{ $info[0]['pno'] }}" >
                        </div>
                        <div class="form-group">
                            <label>身分證字號</label>
                            <input class="form-control" id="idno" type="text" placeholder="" value="{{ $info[0]['idno'] }}" >
                        </div>
                        <div class="form-group">
                            <label for="disabledSelect">性別</label>
                                <select id="sex" class="form-control" >
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
                            <input class="form-control" id="tel" type="text" placeholder="" value="{{ $info[0]['tel'] }}" >
                        </div>
                        <div class="form-group">
                            <label>職稱</label>
                            <input class="form-control" id="jobname" type="text" placeholder="" value="{{ $info[0]['jobname'] }}" >
                        </div>
                        <div class="form-group">
                            <label>離職日</label>
                             <input class="form-control datepicker" id="outday" type="text" placeholder="" value="{{ $info[0]['outday'] }}" >
                        </div>                           
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>姓名</label>
                            <input class="form-control" id="cname" type="text" placeholder="" value="{{ $info[0]['cname'] }}">
                        </div>
                        <div class="form-group">
                            <label>出生日期</label>
                            <input class="form-control datepicker" id="birsday" type="text" placeholder="" value="{{ $info[0]['birsday'] }}" >
                        </div>
                        <div class="form-group">
                            <label>地址</label>
                            <input class="form-control" id="address" type="text" placeholder="" value="{{ $info[0]['address'] }}" >
                        </div>
                        <div class="form-group">
                            <label>單位</label>
                            <input class="form-control" id="depname" type="text" placeholder="" value="{{ $info[0]['depname'] }}" >
                        </div>
                        <div class="form-group">
                            <label>到職日</label>
                            <input class="form-control datepicker" id="inday" type="text" placeholder="" value="{{ $info[0]['inday'] }}" >
                        </div>         
                        <input type="hidden" id="p_id" name="p_id" value="{{ $info[0]['id'] }}" />                
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
                <div class="row">
                    
                    <div class="col-lg-1">
                    <a href="{{ url('/backstage/manager') }}" class="btn btn-sm btn-danger width-60 m-r-2"> 取消</a>
                    <a id='btn_confirm'  class="btn btn-sm btn-info width-60 m-r-2"> 確認</a>
                    </div>               
                </div>
            </div>
            <!-- /.panel-body -->
        </form>
    </div>
    <!-- /.panel -->


@endsection

@section('footer')

<script>
      $('#btn_confirm').click(function() {
		var form_data = new FormData();
        form_data.append('id', $('#p_id').val());
    	form_data.append('pno', $('#pno').val());
    	form_data.append('cname', $('#cname').val());
        form_data.append('idno', $('#idno').val());
        form_data.append('birsday', $('#birsday').val());
        form_data.append('sex', $('#sex').val());
        form_data.append('address', $('#address').val());
        form_data.append('tel', $('#tel').val());
        form_data.append('depname', $('#depname').val());
        form_data.append('jobname', $('#jobname').val());
        form_data.append('inday', $('#inday').val());
        form_data.append('outday', $('#outday').val());
		form_data.append('_token', '{{ csrf_token() }}');
		$.ajax({
        	url: "{{ url('/backstage/manager/edit') }}", // point to server-side PHP script 
        	dataType: 'text',  // what to expect back from the PHP script, if anything
        	cache: false,
        	contentType: false,
        	processData: false,
        	data: form_data,
        	type: 'post',
			success: function(response){
				console.log(1);
				response = JSON.parse(response);
				console.log(response.messge);
                //console.log(response.error.error);
				if(response.success === 'true'){
					console.log(2);
					Swal.fire({
  						position: "top-end",	
  						icon: "success",
  						title: response.info,
  						showConfirmButton: false,
  						timer: 1500
					});
					window.location.href='/larproinform/backstage/manager';
				}else if(response.success === 'false'){
                    console.log(qq2);
					Swal.fire({
  						icon: "error",
  						title: "錯誤",
  						text: response.messge
					});
				}
			}
		});
	});
</script>
@endsection