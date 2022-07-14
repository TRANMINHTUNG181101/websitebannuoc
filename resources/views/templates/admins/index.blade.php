@extends('templates.admins.layout')
@section('content')
    <div class="main">
        <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

                <div class="row">
                    <div class="col show-visitor text-view-visitor"
                        style="background-color: aquamarine;padding-top:30px;padding-bottom:30px;text-align:center;margin: 0%
                                                                                ">
                        <h5 class="title-visitor">Truy cập hôm nay</h5>
                        <span id="visitor_views" style="font-size: 24px"></span>
                    </div>
                    <div class="col sale-by-date text-view-visitor" id="statis-view"
                        style="background-color: aquamarine;padding-top:30px;padding-bottom:30px;text-align:center;margin: 0%;font-weight:bold">
                        <h5>Tiền đơn hàng hôm nay </h5><br><span id="numberMoney"></span> Đ
                    </div>

                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                </div>
                <br>
                <div class="show-chart-statis">
                    <canvas id="show-statis-by-year"></canvas>
                </div>
                <canvas class="" id="top-product-sale"
                    style="width:100%;max-width:600px;color:black;font-weight:bold">
                </canvas>

                <div class="show-doanh-thu" id="showdoanhthu">
                    <h3 id="showdoanhso"></h3>
                </div>
                <div class="export-file">
                    <button id="exportFile">Xuất file exel</button>
                </div>
                <div class="test-url">
                    {{-- <a href="{{ route('products.del', 55) }}"></a> --}}
                {{-- <img src="{{asset('uploads/product/ca-phe-nong59.jpg')}}"> --}}

                </div>
            </div>
        </main>
    </div>
@endsection

{{-- modal 'exportFile' --}}
<div class="modal fade" id="exportModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xuất file exel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('exportFile') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Chọn xuất theo: </label>
                        <select name="chooseTypeExport" id="chooseTypeExport">
                            <option value="1">Theo ngày</option>
                            <option value="2">Theo tháng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn thời gian</label>
                        <div class="chooseDayExport" id="chooseDayExport">
                            <label for="">Chọn ngày</label>
                            <input type="date" name="dataExport" id="dataExport" class="form-control">
                        </div>
                        <div class="exportbyMonth" id="exportbyMonth">
                            <label for="">Chọn tháng</label>
                            <select name="chooseMonthExport" id="chooseMonthExport">
                                <?php $monthCurr = date('m'); ?>

                                @for ($i = 1; $i < 13; $i++)
                                    { @if ($i <= $monthCurr)
                                        <option value="{{ $i }}">Tháng:
                                            {{ $i }}</option>
                                    @endif
                                    }
                                @endfor
                            </select>
                        </div>
                        <div class="exportbyyear">
                            <label for="">Chọn năm</label>
                            <input type="text" class="form-control" name="datepickyear" id="datepickyear" />
                        </div>
                    </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" id="exportExel">Xuất file</button>
            </div>
            </form>
        </div>
    </div>
</div>
