// check values form add new material

// $('#btn-add-material').click(function (e) {
//     e.preventDefault();
//     var nameMaterial=document.getElementById('MaterialName').value;
//     if(nameMaterial.length==0){
//        document.getElementById('show-error-nameMaterial').innerHTML="bạn chưa nhập tên";
//     }
// });

// $("#form-add-material").validate({
//     onfocusout: false,
//     onkeyup: false,
//     onclick: false,
//     rules: {
//         MaterialName: {
//             required: true,
//             maxlength: 255,
//         },
//         MaterialImage: {
//             required: true,
//         },
//         ImportPrice: {
//             required: true,
//             maxlength: 255,
//         },
//         MaterialQuantily: {
//             required: true,
//             maxlength: 255,
//         },
//         ExpiredDate: {
//             required: true,
//         },
//     },
//     messages: {
//         MaterialName: {
//             required: "Bạn chưa nhập tên nguyên liệu",
//             maxlength: "Hãy nhập tối đa 255 ký tự",
//         },

//         ImportPrice: {
//             required: "Bạn chưa nhập giá nhập kho",
//         },
//         MaterialQuantily: {
//             required: "Bạn chưa nhập số lượng",
//         },
//         ExpiredDate: {
//             required: "Bạn chưa nhập ngày hết hạn",
//         },
//     },
// });








function preview_image(input) {
    var file = $("input[type=file]").get(0).files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $("#preview_images").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}


function preview_image_add(input) {
    var file = $("input[type=file]").get(0).files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $("#hinh_anh_add").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}


$().ready(function() {
    $('#notify-del-mal').delay(2000);
    $('#notify-del-mal').hide(1200);
});



function formatMoney() {

    var x = document.getElementById('ImportPrice').value;


    console.log(x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));


    // document.getElementById('ImportPrice').value = x;
    // x.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

    console.log(x);
}