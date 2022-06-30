@if(session()->has('messageLogin'))
<script>
    toastr.success("{{session()->get('messageLogin')}}", "Thông báo");
</script>
@endif

@if(session()->has('messageUpdate'))
<script>
    toastr.info("{{session()->get('messageUpdate')}}", "Thông báo");
</script>
@endif


@if(session()->has('activeAcc'))
<script>
    $.confirm({
            type: 'orange',
            title: 'THÔNG BÁO',
            content: "{{session()->get('activeAcc')}}",
            buttons: {
                'Xác nhận': {
                    btnClass: 'btn-orange',
                   
                },
            }
        });
</script>
@endif
