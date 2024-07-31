@extends('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('header')
@endsection
@section('content')
    <h5>請假作業新增</h5><br>
    <div class="panel panel-default">
        <form role="form" action="#" method="post">
        @csrf
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">                    
                        <div class="form-group">
                            <label>員工編號</label>
                            <input class="form-control" id="pno" type="text" placeholder="" value="{{ $per[0]['pno'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label for="disabledSelect">假別</label>
                                <select id="vtype" class="form-control" >
                                    <option  value=""> </option>
                                    @foreach ($vtypelist as $key => $value) 
                                        <option value="{{ $value }}" >{{ $key }} </option>
                                    @endforeach  
                                </select>
                        </div>
                        <div class="form-group">
                            <label>請假起日期時間</label>
                             <input class="form-control datepicker" id="vsday" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label>請假天數</label>
                             <input class="form-control datepicker" id="sumday" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label>請假事由</label>
                            <textarea class="form-control" id="reasson" rows="3"></textarea>
                        </div>                                               
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>姓名</label>
                            <input class="form-control" id="cname" type="text" placeholder="" value="{{ $per[0]['cname'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>單位</label>
                            <input class="form-control" id="depname" type="text" placeholder="" value="{{ $per[0]['depname'] }}" disabled="">
                        </div>
                        <div class="form-group">
                            <label>請假迄日期時間</label>
                             <input class="form-control datepicker" id="veday" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label>請假時數</label>
                             <input class="form-control datepicker" id="sumhour" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label>備註</label>
                            <textarea class="form-control" id="memo" rows="3"></textarea>
                        </div>                                               
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
                <div class="row">
                    <div class="col-lg-1">
                    <a href="{{ url('/backstage/vacation') }}" class="btn btn-sm btn-danger width-60 m-r-2"> 取消</a>
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
    	form_data.append('pno', $('#pno').val());
    	form_data.append('cname', $('#cname').val());
        form_data.append('vtype', $('#vtype').val());
        form_data.append('vsday', $('#vsday').val());
        form_data.append('veday', $('#veday').val());
        form_data.append('sumday', $('#sumday').val());
        form_data.append('sumhour', $('#sumhour').val());
        form_data.append('reason', $('#reason').val());
        form_data.append('memo', $('#memo').val());
        form_data.append('_token', '{{ csrf_token() }}');
		$.ajax({
        	url: "{{ url('/backstage/vacation/create') }}", // point to server-side PHP script 
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
					window.location.href='/larproinform/backstage/vacation';
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