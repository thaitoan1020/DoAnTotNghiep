<tr>
    <td colspan="12" style="text-align: center; font-size: 13pt;">Chương trình đào tạo ngành công nghệ thông tin</td>
</tr>
<tr>
    <td colspan="12" style=" font-size: 13pt;">Cấu trúc chương trình đào tạo</td>
</tr>
<table style="font-size: 10pt; border: 1px solid black; ">
    <thead>
        <tr>
            <th style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                rowspan="2"><b>STT</b></th>
            <th style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                rowspan="2"><b>Mã HP</b></th>
            <th style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                rowspan="2"><b>Tên học phần</b></th>
            <th style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                rowspan="2"><b>Số tín chỉ</b></th>
            <th style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                colspan="2"><b>Loại HP</b></th>
            <th style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                colspan="2"><b>Số tiết</b></th>
            <th style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                colspan="3"><b>Điều kiện tiên quyết</b></th>
            <th style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                rowspan="2"><b>Học kỳ (Đự kiến)</b>
            </th>
        </tr>
        <tr>
            <th
                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                <b>Bắt buộc</b>
            </th>
            <th
                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                <b>Tự chọn</b>
            </th>
            <th
                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                <b>Lý thuyết</b>
            </th>
            <th
                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                <b>Thực hành,<br>thí nghiệm</b>
            </th>
            <th
                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                <b>Tiên quyết</b>
            </th>
            <th
                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                <b>Học trước</b>
            </th>
            <th
                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                <b>Song Hành</b>
            </th>

        </tr>
    </thead>


    <tbody>
        @foreach ($ctdt_hocphan as $value)
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $row = 0;
                $nhomhocphan = '';
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->khoikienthuc_id == 1)
                    @if ($value->nhomhocphan_id == '')
                        <tr>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $loop->iteration }}</td>
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->mahocphan }}</td>
                            <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;">
                                {{ $value->tenhocphantiengviet }}</td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->sotinchi }}</td>
                            @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    {{ $value->sotinchi }}</td>
                                @php
                                    $sttbc += $value->sotinchi;
                                @endphp
                            @else
                                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                            @endif
                            @if ($value->loaihocphan->tenloaihocphan == 'Tự chọn')
                                @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                    @php
                                        $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                    @endphp
                                    @foreach ($ctdt_hocphan as $value1)
                                        @if ($value1->nhomhocphantuchon_id == $nhomhocphantuchonid && $value1->ctdt_id == $value->ctdt_id )
                                            @php
                                                $row = $row + 1;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <td style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                                        rowspan="{{ $row }}">
                                        {{ $value->nhomhocphantuchon->tongsotinchi }}</td>
                                    {{-- @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid) --}}
                                    @php
                                        $stttt += (int) $value->nhomhocphantuchon->tongsotinchi;
                                        // $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                        $row = 0;
                                    @endphp

                                    {{-- @endif --}}
                                @endif
                            @else
                               <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                            @endif
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->sotietlythuyet }}</td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->sotietthuchanh }}</td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->dkhocphantienquyet }}
                            </td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->dkhocphanhoctruoc }}
                            </td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->dkhocphansonghanh }}
                            </td>
                            @if ($value->hocky == 1)
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    I</td>
                            @endif
                            @if ($value->hocky == 2)
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    II</td>
                            @endif
                            @if ($value->hocky == 3)
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    III</td>
                            @endif
                            @if ($value->hocky == 4)
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    IV</td>
                            @endif
                            @if ($value->hocky == 5)
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    V</td>
                            @endif
                            @if ($value->hocky == 6)
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    VI</td>
                            @endif
                            @if ($value->hocky == 7)
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    VII</td>
                            @endif
                            @if ($value->hocky == 8)
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    VIII</td>
                            @endif

                        </tr>
                    @endif
                    @if ($value->nhomhocphan_id != $nhomhocphan && $value->nhomhocphan_id != null)
                        <tr>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $loop->iteration }}</td>
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->nhomhocphan->manhomhocphan }}</td>
                            <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;">
                                {{ $value->nhomhocphan->tennhomhocphan }}</td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->nhomhocphan->tongsotinchi }}</td>
                            @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    {{ $value->nhomhocphan->tongsotinchi }}</td>
                                @php
                                    $sttbc += $value->nhomhocphan->tongsotinchi;
                                @endphp
                            @else
                               <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                            @endif
                           <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>

                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->nhomhocphan->sotietlythuyet }}
                            </td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->nhomhocphan->sotietthuchanh }}
                            </td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->nhomhocphan->dkhocphantienquyet }}</td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->nhomhocphan->dkhocphanhoctruoc }}</td>
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->nhomhocphan->dkhocphansonghanh }}</td>
                            @if ($value->nhomhocphan->hocky == '1,2')
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    I,II</td>
                            @endif
                            @if ($value->nhomhocphan->hocky == '3,4,5')
                                <td
                                    style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                    III,IV.V</td>
                            @endif
                            @php
                                $nhomhocphan = $value->nhomhocphan_id;
                            @endphp
                        </tr>
                    @endif


                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="12"><b>Khối
                        kiến thức đại cương: {{ $stt }} TC (Bắt buộc:
                        {{ $sttbc }}
                        TC; Tự chọn: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphan = '';
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->khoikienthuc_id == 2)
                    <tr>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->mahocphan }}</td>
                        <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += $value->sotinchi;
                            @endphp
                        @else
                            <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                        @endif
                        @if ($value->loaihocphan->tenloaihocphan == 'Tự chọn')
                            @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                @php
                                    $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                @endphp
                                @foreach ($ctdt_hocphan as $value1)
                                   @if ($value1->nhomhocphantuchon_id == $nhomhocphantuchonid && $value1->ctdt_id == $value->ctdt_id )
                                        @php
                                            $row = $row + 1;
                                        @endphp
                                    @endif
                                @endforeach
                                <td style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                                    rowspan="{{ $row }}">
                                    {{ $value->nhomhocphantuchon->tongsotinchi }}</td>
                                {{-- @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid) --}}
                                @php
                                    $stttt += (int) $value->nhomhocphantuchon->tongsotinchi;
                                    // $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                    $row = 0;
                                @endphp

                                {{-- @endif --}}
                            @endif
                        @else
                            <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                        @endif
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotietthuchanh }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphantienquyet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphanhoctruoc }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphansonghanh }}</td>
                        @if ($value->hocky == 1)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                I</td>
                        @endif
                        @if ($value->hocky == 2)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                II</td>
                        @endif
                        @if ($value->hocky == 3)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                III</td>
                        @endif
                        @if ($value->hocky == 4)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                IV</td>
                        @endif
                        @if ($value->hocky == 5)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                V</td>
                        @endif
                        @if ($value->hocky == 6)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VI</td>
                        @endif
                        @if ($value->hocky == 7)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VII</td>
                        @endif
                        @if ($value->hocky == 8)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VIII</td>
                        @endif

                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="12"><b>Khối
                        kiến thức cơ sở ngành: {{ $stt }} TC (Bắt buộc:
                        {{ $sttbc }}
                        TC; Tự chọn: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphan = '';
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->khoikienthuc_id == 3)
                    <tr>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->mahocphan }}</td>
                        <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += $value->sotinchi;
                            @endphp
                        @else
                            <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                        @endif
                        @if ($value->loaihocphan->tenloaihocphan == 'Tự chọn')
                            @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                @php
                                    $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                @endphp
                                @foreach ($ctdt_hocphan as $value1)
                                   @if ($value1->nhomhocphantuchon_id == $nhomhocphantuchonid && $value1->ctdt_id == $value->ctdt_id )
                                        @php
                                            $row = $row + 1;
                                        @endphp
                                    @endif
                                @endforeach
                                <td style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                                    rowspan="{{ $row }}">
                                    {{ $value->nhomhocphantuchon->tongsotinchi }}</td>
                                {{-- @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid) --}}
                                @php
                                    $stttt += (int) $value->nhomhocphantuchon->tongsotinchi;
                                    // $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                    $row = 0;
                                @endphp

                                {{-- @endif --}}
                            @endif
                        @else
                            <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                        @endif
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotietthuchanh }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphantienquyet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphanhoctruoc }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphansonghanh }}</td>
                        @if ($value->hocky == 1)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                I</td>
                        @endif
                        @if ($value->hocky == 2)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                II</td>
                        @endif
                        @if ($value->hocky == 3)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                III</td>
                        @endif
                        @if ($value->hocky == 4)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                IV</td>
                        @endif
                        @if ($value->hocky == 5)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                V</td>
                        @endif
                        @if ($value->hocky == 6)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VI</td>
                        @endif
                        @if ($value->hocky == 7)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VII</td>
                        @endif
                        @if ($value->hocky == 8)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VIII</td>
                        @endif

                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="12"><b>Khối
                        kiến thức chuyên ngành: {{ $stt }} TC (Bắt buộc:
                        {{ $sttbc }}
                        TC; Tự chọn: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphan = '';
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->khoikienthuc_id == 4)
                    <tr>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->mahocphan }}</td>
                        <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += $value->sotinchi;
                            @endphp
                        @else
                            <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                        @endif
                        @if ($value->loaihocphan->tenloaihocphan == 'Tự chọn')
                            @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                @php
                                    $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                @endphp
                                @foreach ($ctdt_hocphan as $value1)
                                   @if ($value1->nhomhocphantuchon_id == $nhomhocphantuchonid && $value1->ctdt_id == $value->ctdt_id )
                                        @php
                                            $row = $row + 1;
                                        @endphp
                                    @endif
                                @endforeach
                                <td style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
                                    rowspan="{{ $row }}">
                                    {{ $value->nhomhocphantuchon->tongsotinchi }}</td>
                                {{-- @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid) --}}
                                @php
                                    $stttt += (int) $value->nhomhocphantuchon->tongsotinchi;
                                    // $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                    $row = 0;
                                @endphp

                                {{-- @endif --}}
                            @endif
                        @else
                            <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"></td>
                        @endif
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotietthuchanh }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphantienquyet }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphanhoctruoc }}</td>
                        <td
                            style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->dkhocphansonghanh }}</td>
                        @if ($value->hocky == 1)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                I</td>
                        @endif
                        @if ($value->hocky == 2)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                II</td>
                        @endif
                        @if ($value->hocky == 3)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                III</td>
                        @endif
                        @if ($value->hocky == 4)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                IV</td>
                        @endif
                        @if ($value->hocky == 5)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                V</td>
                        @endif
                        @if ($value->hocky == 6)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VI</td>
                        @endif
                        @if ($value->hocky == 7)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VII</td>
                        @endif
                        @if ($value->hocky == 8)
                            <td
                                style="font-size: 10pt;font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                                VIII</td>
                        @endif

                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="12"><b>Kiến
                        thức thực tập nghề nghiệp, khóa luận tốt nghiệp/các học phần thay thế: {{ $stt }} TC
                        (Bắt buộc:
                        {{ $sttbc }}
                        TC; Tự chọn: {{ $stttt }})</b></td>
            </tr>
        @break
        @endforeach
    </tbody>

</table>
