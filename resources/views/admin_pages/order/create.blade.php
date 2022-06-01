@extends('templates.admins.layout')
@section('content')

<div class="content-order">
    <div class="container-fluid p-0">
        <h1 class="h6 mb-3">Tạo mới đơn hàng</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fa fa-info"></i> Sản phẩm</h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fa fa-tasks"></i> Thông tin khách hàng</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn-add-info">
                            Thêm thông tin khách hàng
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
<div class="modal-order">
    <div class="modal_overlay"></div>
    <div class="modal_body">
        <div class="modal_close">
            <i class="fa fa-times"></i>
        </div>
        <header class="modal_header">
            THÔNG TIN KHÁCH HÀNG
        </header>
        <div class="modal-order-content">
            <div class="search-auto">
                <input class="input" placeholder="Tìm khách hàng đã đăng kí" />
                <i class="fa fa-search" aria-hidden="true"></i>
                <ul class="list-cus">

                    <li class="list-cus-item">
                    </li>

                </ul>
            </div>
            <div class="row form-submit mra-2">
                <div class="col-12">
                    <div class="form_group">
                        <label>Họ tên</label>
                        <input autocomplete='off' class="form_control" />
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form_group">
                        <label>Email</label>
                        <input autocomplete='off' class="form_control" />
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form_group">
                        <label>Số điện thoại</label>
                        <input autocomplete='off' class="form_control" />
                    </div>

                </div>
                <div class="col-12">
                    <div class="form_group">
                        <label>Địa chỉ chi tiết</label>
                        <textarea autocomplete='off' class="form_control"> </textarea>
                    </div>
                </div>
            </div>
        </div>
        <footer class="modal_footer">
            <a href="" class="btn gray">Huỷ</a>
            <a href="" class="btn primary">Lưu</a>
        </footer>
    </div>
</div>
<script>
window.onload = () => {
    const btnInfo = document.querySelector('.btn-add-info');
    const close = document.querySelector('.modal-order .modal_close');
    const modal = document.querySelector('.modal-order');
    const modalBody = document.querySelector('.modal-order .modal_body');
    const ul = document.querySelector('.list-cus');

    const inputAuto = document.querySelector('.input');


    close.addEventListener("click", () => {
        modal.classList.remove('showmodal_order')
    })

    modal.addEventListener("click", () => {
        modal.classList.remove('showmodal_order')
    })
    modalBody.addEventListener("click", (e) => {
        e.stopPropagation();
    })
    btnInfo.addEventListener('click', () => {
        modal.classList.add('showmodal_order');
    })


    const order = {
        customer: [],

        getData: function() {
            (async () => {
                let url = "{{route('get.customer')}}";
                const response = await fetch(
                    url);
                if (response && response.status === 200) {

                    const cus = await response.json();
                    this.customer = cus.customer;
                    this.renderCustomer();
                } else {
                    alert('Lấy dữ liệu thất bại!!!')
                }
            })();
        },
        renderCustomer: function() {
            let data = this.customer.map((item, index) => {
                return (
                    `<li class="list-cus-item" data-id='${item.id}'>
                    ${index + 1}.  
                    ${item.ten || 'Khách hàng ' + index} 
                    ${item.email ? ' - ' + item.email : '' }
                    ${item.sodienthoai ? ' - ' + item.sodienthoai : ''}
                    </li>`
                )
            }).join('');
            ul.innerHTML = data || `<li>Không có dữ liệu.</li>`;
        },

        start: function() {
            this.getData();
        }
    }

    order.start();

    inputAuto.addEventListener('click', (e) => {
        ul.classList.add('show-order');
    })


}
</script>

@stop