@extends('layouts.manager')

@section('title')
    Chương trình đào tạo
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <a href="{{ route('manager.ctdt_hocphan',['id'=>-1]) }}" style=" color: black;">
                        <h5>CHƯƠNG TRÌNH ĐÀO TẠO</h5>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="row mb-2 ">
                        <div class="col-sm-9">

                            <form action="{{ route('manager.ctdt_hocphan.ajax') }}" method="get">
                                @csrf
                                <div class="row mb-2 ">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control select2bs4" style="width: 100%;" id="ctdt_id_SHOW"
                                                name="ctdt_id_SHOW">
                                                <option>-- Chọn tên chương trình đào tạo --</option>
                                                @foreach ($ctdt as $value)
                                                    <option value="{{ $value->id }}"> {{ $value->tenctdt }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row mb-2 ">
                                <div class="col-sm-9">
                                    <h3 class="card-title">Danh sách chương trình đào tạo
                                    </h3>
                                </div>

                                <div class="col-sm-3">
                                    


                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 100%;">
                            <table id="TableTimKiemtv" class="table table-bordered text-nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">#</th>
                                        <th style="font-size: 10pt; vertical-align: middle;">Mã HP</th>
                                        <th style="font-size: 10pt;vertical-align: middle; ">Tên học phần</th>
                                        <th style="font-size: 10pt;vertical-align: middle;;">Số tín chỉ</th>
                                        <th style="font-size: 10pt;">HP Bắt buộc</th>
                                        <th style="font-size: 10pt;">HP Tự chọn</th>
                                        <th style="font-size: 10pt;">ST Lý thuyết</th>
                                        <th style="font-size: 10pt;">ST Thực hành</th>
                                        <th style="font-size: 10pt;">DK Tiên quyết</th>
                                        <th style="font-size: 10pt;">DK Học trước</th>
                                        <th style="font-size: 10pt;">DK Song Hành</th>
                                        <th style=" font-size: 10pt;vertical-align: middle;">Học kỳ (Đự kiến)
                                        </th>
                                        <th style=" font-size: 10pt;vertical-align: middle;">Xóa</th>
                                    </tr>
                                </thead>


                                <tbody>
									@php
                                        $row = 0;
                                        $nhomhocphantuchonid = 0;
                                    @endphp
                                    @foreach ($ctdt_hocphan as $value)
                                        @php
                                            $editLink = "getXoaAll(" . $value->ctdt_id . "); return false;";
                                        @endphp
                                        <tr>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $value->hocphan->mahocphan }}</td>
                                            <td>{{ $value->hocphan->tenhocphantiengviet }}</td>
                                            <td style="text-align: center">{{ $value->hocphan->sotinchi }}</td>
                                            @if ($value->hocphan->loaihocphan->tenloaihocphan == 'Bắt buộc')
                                                <td style="text-align: center">{{ $value->hocphan->sotinchi }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            @if ($value->hocphan->loaihocphan->tenloaihocphan == 'Tự chọn')
                                                @if ($value->hocphan->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                                    @php
                                                        $nhomhocphantuchonid = $value->hocphan->nhomhocphantuchon_id;
                                                    @endphp
                                                    @foreach ($ctdt_hocphan as $value1)
                                                        @if ($value1->hocphan->nhomhocphantuchon_id == $nhomhocphantuchonid)
                                                            @php
                                                                $row = $row + 1;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <td style="text-align: center" rowspan="{{ $row }}">
                                                        {{ $value->hocphan->nhomhocphantuchon->tongsotinchi }}</td>
                                                    @php
                                                        $row = 0;
                                                    @endphp
                                                @endif
                                            @else
                                                <td></td>
                                            @endif
                                            <td style="text-align: center">{{ $value->hocphan->sotietlythuyet }}</td>
                                            <td style="text-align: center">{{ $value->hocphan->sotietthuchanh }}</td>
                                            <td style="text-align: center">{{ $value->hocphan->dkhocphantienquyet }}</td>
                                            <td style="text-align: center">{{ $value->hocphan->dkhocphanhoctruoc }}</td>
                                            <td style="text-align: center">{{ $value->hocphan->dkhocphansonghanh }}</td>
                                            @if ($value->hocphan->hocky == 1)
                                                <td style="text-align: center">I</td>
                                            @endif
                                            @if ($value->hocphan->hocky == 2)
                                                <td style="text-align: center">II</td>
                                            @endif
                                            @if ($value->hocphan->hocky == 3)
                                                <td style="text-align: center">III</td>
                                            @endif
                                            @if ($value->hocphan->hocky == 4)
                                                <td style="text-align: center">IV</td>
                                            @endif
                                            @if ($value->hocphan->hocky == 5)
                                                <td style="text-align: center">V</td>
                                            @endif
                                            @if ($value->hocphan->hocky == 6)
                                                <td style="text-align: center">VI</td>
                                            @endif
                                            @if ($value->hocphan->hocky == 7)
                                                <td style="text-align: center">VII</td>
                                            @endif
                                            @if ($value->hocphan->hocky == 8)
                                                <td style="text-align: center">VIII</td>
                                            @endif
                                            <td style="text-align: center">
                                                <a href="#xoa" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal"
                                                    data-target="#deleteModal"
                                                    onclick="getXoa('{{ $value->id }}','{{ $value->ctdt_id }}'); return false;"><i
                                                        class="far fa-trash-alt"></i></a>
                                                        
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
@section('javascript')
    <script>
        function getCapNhat(hocPhan) {
            hocPhan = JSON.parse(hocPhan);
            console.log(hocPhan.id);
            $('#id_edit').val(id);
            $('#ctdt_id_edit').val(ctdt_id);
        }

        function getXoa(id, ctdt_id) {

            $('#id_delete').val(id);
            $('#ctdt_id_delete').val(ctdt_id);
        }

        function getXoaAll(ctdt_id) {
            //ctdt_hocphan = JSON.parse(JSON.parse(ctdt_hocphan));
            $('#ctdt_id_deleteall').val(ctdt_id);
        }

        @if ($errors->has('ctdt_id_dt') || $errors->has('ctdt_id_tm'))
            $('#addModal').modal('show');
        @endif

        @if ($errors->has('hocphan_id') || $errors->has('ctdt_id'))
            $('#addHPModal').modal('show');
        @endif

        @if ($errors->has('nhomhocphantuchon_id') || $errors->has('ctdt_id'))
            $('#addNHPModal').modal('show');
        @endif

        @if ($errors->has('nganhhoc_id_edit') || $errors->has('bomon_id_edit') || $errors->has('bomon_id_edit') || $errors->has('mactdt_edit') || $errors->has('tenctdt_edit') || $errors->has('tongsotinhchi_edit') || $errors->has('trangthi_edit'))
            $('#editModal').modal('show');
        @endif


        $(function() {
            $('.select2').select2()


            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

    </script>
    <script type="text/javascript">
        $('#ctdt_id_SHOW').change(function() {
            let valueuu = $(this).val();
            $.ajax({
                url: "{{ route('manager.ctdt_hocphan.ajax') }}",
                dataType: 'json',
                data: {
                    id: valueuu
                },
                type: 'get',
                success: function(data_return) {
                    
                    $('#TableTimKiemtv').find('tbody').html(data_return.du_lieu);
                    

                }
            });
        });

    </script>




@endsection
