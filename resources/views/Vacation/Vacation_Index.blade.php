@extends('header')
@section('header')
<link href="{{ asset('public/backstage/js/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <h5>請假作業</h5><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ url('/backstage/vacation/add') }}" class="btn btn-sm btn-info width-60 m-r-2"><i class="fa fa-plus"></i> 新增</a>
        </div>
        <div class="panel-body"> <!-- 開始-->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="manager_table">
                    <thead>
                        <tr>
                            <th>員編</th>
                            <th>姓名</th>
                            <th>假別</th>
                            <th>請假起日期時間</th>
                            <th>請假迄日期時間</th>
                            <th>請假時數</th>
                            <th>狀態</th>
                            <th width="20%">編輯</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($info as $infolist) 
                        <tr class="odd gradeX"> 
                            <td>{{ $infolist['pno'] }}</td>
                            <td>{{ $infolist['cname'] }}</td>
                            <td>
                                @if (trim($infolist['vtype']) == '0')  
                                    事假
                                @elseif (trim($infolist['vtype']) == '1')  
                                    公假
                                @elseif (trim($infolist['vtype']) == '2')  
                                    病假
                                @elseif (trim($infolist['vtype']) == '3')  
                                    特休
                                @elseif (trim($infolist['vtype']) == '4')  
                                    補休
                                @elseif (trim($infolist['vtype']) == '5')  
                                    喪假
                                @elseif (trim($infolist['vtype']) == '6')  
                                    婚假
                                 @endif</td>
                            <td>{{ $infolist['vsday'] }}</td>
                            <td>{{ $infolist['veday'] }}</td>
                            <td>{{ $infolist['sumday'] }} 日 {{ $infolist['sumhour'] }} 小時</td>
                            <td>
                                 @if (trim($infolist['peocheck']) == '')  
                                          審核中
                                 @elseif (trim($infolist['peocheck']) == 'OK')  
                                          審核通過
                                 @elseif (trim($infolist['peocheck']) == 'NOOK')  
                                          審核不通過
                                 @endif
                            </td>
                            <td >
                                <a href="{{ url('/backstage/vacation/view',['id'=>$infolist['id']]) }}" class="btn btn-sm btn-warning width-60 m-r-2"><i class="fa fa-money "></i> 檢視</a>
                                <a href="{{ url('/backstage/vacation/mod',['id'=>$infolist['id']]) }}" class="btn btn-sm btn-primary width-60 m-r-2"><i class="fa fa-edit "></i> 修改</a>
                                <a href="{{ url('/backstage/vacation/del',['id'=>$infolist['id']]) }}" class="btn btn-sm btn-danger width-60 m-r-2"><i class="fa fa-pencil "></i> 刪除</a>
                            </td>
                        </tr>
                    @endforeach                                    
                    </tbody>
                </table>
            </div>                            
        </div><!-- 結束-->
    </div>


@endsection

@section('footer')
<script src="{{ asset('public/backstage/js/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/backstage/js/dataTables/dataTables.bootstrap.js') }}"></script>
<script>
  $('#manager_table').dataTable({
    "language": {
	        "zeroRecords": "目前無任何資料",   
		  },
  });
</script>
<script src="{{ asset('public/backstage/js/custom-scripts1.js') }}"></script>
@endsection