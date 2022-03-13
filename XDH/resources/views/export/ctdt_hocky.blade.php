<tr>
    <td colspan="8" style="font-size: 10pt;font-family: Times New Roman;text-align: center; font-size: 13pt;">Chương
        trình đào tạo ngành công nghệ thông tin</td>
</tr>
<tr>
    <td colspan="8" style="font-size: 10pt;font-family: Times New Roman; font-size: 13pt;">Kế hoạch giảng dạy (Teaching
        plan)</td>
</tr>

<table style="font-size: 10pt; border: 1px solid black; ">
    <thead>
        <tr>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;  "
                rowspan="2"><b>STT</b></th>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;  valign: middle;"
                rowspan="2"><b>Mã HP</b></th>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;  valign: middle;"
                rowspan="2"><b>Tên học phần</b></th>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center; "
                rowspan="2"><b>Số tín chỉ</b></th>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center; "
                colspan="2"><b>Loại HP</b></th>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center; "
                colspan="2"><b>Số tiết</b></th>
        </tr>
        <tr>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"><b>Bắt buộc</b></th>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black; "><b>Tự chọn</b></th>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black; "><b>Lý thuyết</b></th>
            <th style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;"><b>Thực hành, Thí
                    nghiệm</b></th>
        </tr>
    </thead>


    <tbody>

        @foreach ($ctdt_hocphan as $value)
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $row = 0;
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->hocky == 1)
                    <tr>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->mahocphan }}</td>
                        <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
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
                                <td
                                    style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
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
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;">
                            {{ $value->sotietthuchanh }}</td>
                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="8"><b>Học kỳ
                        I: {{ $stt }} TC (Bắt buộc: {{ $sttbc }}
                        TC; Tự chọn: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->hocky == 2)
                    <tr>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;font-size: 10pt;">
                            {{ $value->mahocphan }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;font-size: 10pt;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += (int) $value->sotinchi;
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
                                <td
                                    style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
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
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietthuchanh }}</td>
                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="8"><b>Học kỳ
                        II: {{ $stt }} TC (Bắt buôc:
                        {{ $sttbc }} TC; Tự chon: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->hocky == 3)
                    <tr>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;font-size: 10pt;">
                            {{ $value->mahocphan }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;font-size: 10pt;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += (int) $value->sotinchi;
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
                                <td
                                    style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
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
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietthuchanh }}</td>
                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="8"><b>Học kỳ
                        III: {{ $stt }} TC (Bắt buôc:
                        {{ $sttbc }} TC; Tự chon: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->hocky == 4)
                    <tr>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;font-size: 10pt;">
                            {{ $value->mahocphan }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;font-size: 10pt;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += (int) $value->sotinchi;
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
                                <td
                                    style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
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
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietthuchanh }}</td>
                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="8"><b>Học kỳ
                        IV: {{ $stt }} TC (Bắt buôc:
                        {{ $sttbc }} TC; Tự chon: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->hocky == 5)
                    <tr>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;font-size: 10pt;">
                            {{ $value->mahocphan }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;font-size: 10pt;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += (int) $value->sotinchi;
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
                                <td
                                    style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
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
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietthuchanh }}</td>
                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="8"><b>Học kỳ
                        V: {{ $stt }} TC (Bắt buôc:
                        {{ $sttbc }} TC; Tự chon: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->hocky == 6)
                    <tr>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;font-size: 10pt;">
                            {{ $value->mahocphan }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;font-size: 10pt;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += (int) $value->sotinchi;
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
                                <td
                                    style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
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
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietthuchanh }}</td>
                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="8"><b>Học kỳ
                        VI: {{ $stt }} TC (Bắt buôc:
                        {{ $sttbc }} TC; Tự chon: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->hocky == 7)
                    <tr>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;font-size: 10pt;">
                            {{ $value->mahocphan }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;font-size: 10pt;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += (int) $value->sotinchi;
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
                                <td
                                    style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
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
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietthuchanh }}</td>
                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="8"><b>Học kỳ
                        VII: {{ $stt }} TC (Bắt buôc:
                        {{ $sttbc }} TC; Tự chon: {{ $stttt }})</b></td>
            </tr>
            @php
                $stt = 0;
                $sttbc = 0;
                $stttt = 0;
                $nhomhocphantuchonid = 0;
            @endphp
            @foreach ($ctdt_hocphan as $value)
                @if ($value->hocky == 8)
                    <tr>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $loop->iteration }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;font-size: 10pt;">
                            {{ $value->mahocphan }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;font-size: 10pt;">
                            {{ $value->tenhocphantiengviet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotinchi }}</td>
                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                            <td
                                style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                                {{ $value->sotinchi }}</td>
                            @php
                                $sttbc += (int) $value->sotinchi;
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
                                <td
                                    style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center;"
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
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietlythuyet }}</td>
                        <td
                            style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;text-align: center">
                            {{ $value->sotietthuchanh }}</td>
                    </tr>
                    @php
                        $stt = $stttt + $sttbc;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td style="font-size: 10pt;font-family: Times New Roman; border: 1px solid black;" colspan="8"><b>Học kỳ
                        VIII: {{ $stt }} TC (Bắt buôc:
                        {{ $sttbc }} TC; Tự chon: {{ $stttt }})</b></td>
            </tr>
        @break
        @endforeach

    </tbody>

</table>
