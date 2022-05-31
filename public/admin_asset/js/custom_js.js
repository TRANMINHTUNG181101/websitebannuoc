$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function preview_image(input) {
    var file = $("input[type=file]").get(0).files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $("#preview_images").attr("src", reader.result);
        };

        reader.readAsDataURL(file);
    }
}

function preview_image_add(input) {
    var file = $("input[type=file]").get(0).files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $("#hinh_anh_add").attr("src", reader.result);
        };

        reader.readAsDataURL(file);
    }
}

$().ready(function() {
    $("#notify-del-mal").delay(2000);
    $("#notify-del-mal").hide(1200);

    // fetchMaterial();
    fetchData();

    //#region thong ke 5 san pham doc ban nhieu
    function fetchData() {
        $.ajax({
            type: "get",
            url: "/fetchData",
            dataType: "json",
            success: function(response) {
                var xValues = response.top_sale_name;
                var yValues = response.top_sale_num;
                var barColors = [
                    "#b91d47",
                    "#00aba9",
                    "#2b5797",
                    "#e8c3b9",
                    "#1e7145",
                ];

                new Chart("top-product-sale", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues,
                        }, ],
                    },
                    options: {
                        title: {
                            display: true,
                            text: "top 5 san phham duoc ban nhieu nhat",
                        },
                    },
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert("Fail to send ");
            },
        });
    }

    //#endregion

});

// them nguyen lieu moi
$("#btn-show-addmal").click(function(e) {
    e.preventDefault();
    getMaterialUnit();
    showModalAdd();

    function getMaterialUnit() {
        $.ajax({
            type: "get",
            url: "/admin/them-nguyen-lieu-ajax",
            dataType: "json",
            success: function(response) {
                setSelectOtption(response);
                showModalAdd();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            },
        });
    }

    function showModalAdd() {
        $("#addMaterialModal").modal("show");
    }

    function setSelectOtption(response) {
        var json_data = response.dv_ngl;
        var result = [];
        //convert json to array
        for (var i in json_data) {
            result.push([json_data[i].ten_don_vi]);
        }
        var stringSelect = "";

        for (let i = 0; i < result.length; i++) {
            stringSelect +=
                "<option value='" + result[i] + "'>" + result[i] + "</option>";
        }

        document.getElementById("selectUnit").innerHTML = stringSelect;
        var sel = document.getElementById("selectUnit");
        sel.selectedIndex = "0";
    }
});

function fetchMaterial() {
    $.ajax({
        type: "get",
        url: "/admin/nguyen-lieu-ajax",
        dataType: "json",
        success: function(response) {
            $("tbody").html("");
            $.each(response.nguyenlieu, function(key, item) {
                var timeIn = new Date(item.ngay_nhap * 1000);
                var timeIn_D = timeIn.getDate();
                var timeIn_M = timeIn.getMonth() + 1;
                var timeIn_Y = timeIn.getFullYear();

                var timeExpired = new Date(item.ngay_het_han * 1000);
                var timeE_D = timeExpired.getDate();
                var timeE_M = timeExpired.getMonth() + 1;
                var timeE_Y = timeExpired.getFullYear();

                $("tbody").append("<tr>\
                    <td>" + item.id + "</td>\
                    <td>" + item.ten_nglieu + "</td>\
                    <td>" + item.gia_nhap +"</td>\
                    <td>" + item.hinh_anh + "</td>\
                    <td>" + item.so_luong + "</td>\
                    <td>" + item.don_vi_nglieu + "</td>\
                    <td>" + timeIn_D + "-" + timeIn_M + "-" + timeIn_Y + "</td>\
                    <td>" + timeE_D + "-" + timeE_M + "-" + timeE_Y + "</td>\
                    <td>" + item.trang_thai + "</td>\
                    <td><button class='deletebtn' type='button' value='"+item.id+"'>del</button>\
                  <button class=editbtn' type='button' value='"+item.id+"'>edit</button></td>\
                     < /tr>"
                );
            });
        },
    });
}

$('#editbtn').click(function (e) { 
    e.preventDefault();

    $('#editMaterialModal').modal('show');
    
});


$("#btn-add-mal").click(function(e) {
    e.preventDefault();
    sendValueToServe();

    function sendValueToServe() {
        // var data = { name: 'David', marks: 97, distinction: true };
        var nameMal = document.getElementById("inputNameMal").value;
        var numberMal = document.getElementById("soluong").value;
        var dateEpx = document.getElementById("ngay_het_han").value;
        var importPrices = document.getElementById("gia_nhap").value;
        var malUnit = $("#selectUnit option:selected").text();
        var timec = new Date(dateEpx).getTime() / 1000;

        $.ajax({
            type: "post",
            url: "/admin/them-nguyen-lieu-ajax1",
            data: {
                ten_nl: nameMal,
                so_luong: numberMal,
                gia_nhap: importPrices,
                ngay_het_han: timec,
                don_vi_nglieu: malUnit,
            },
            dataType: "json",
            success: function(response) {
                $("#addMaterialModal").modal("hide");
                $("#addMaterialModal").find("input").val(" ");
                fetchMaterial();
                toastr.success('them thanh cong');
            },
            error: function(error) {
                console.log(error);
            },
        });
    }
});

//#region delete material
//set id de xoa
$(document).on('click', '.deletebtn', function () {
    var stud_id = $(this).val();
    $('#DeleteModal').modal('show');
    $('#deleteing_id').val(stud_id);
});

$(document).on('click', '.delete_student', function (e) {
    e.preventDefault();
    var id = $('#deleteing_id').val();
    $.ajax({
        type: "post",
        url: "/admin/xoa-nguyen-lieu-ajax/" + id,
        dataType: "json",
        success: function (response) {
            console.log(response.msg);
            $('#DeleteModal').modal('hide');
            fetchMaterial();
            toastr.success("xoa thanh cong");
            
        }
    });
});

//#endregion


