jQuery(document).ready(function(){
    $("#p_ITEM_CODE").change(function(){
        var p_ITEM_CODE = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"/receive/editdtl/"+p_ITEM_CODE,
            type:"POST",
            dataType:"JSON",
            data:{
                p_ITEM_CODE : p_ITEM_CODE
            },
            success:function(response){
                jQuery("#p_UNIT_CODE").val(response.status[0].unit_name);
                jQuery("#p_PO_QNTY").val(response.status[0].qnty);
                jQuery("#p_rate").val(response.status[0].rate);
            }
        })
    });

    // $('#mjr_cat').change(function() {
    //     var _mjr_cat_code = $(this).val();
    
    //     $.get('/supplier/majorsub/' + _mjr_cat_code, function(response) {
    //         $('#mjr_sub_cat').empty();
    //         $.each(response, function(key, value) {
    //             $('#mjr_sub_cat').append('<option value="'+value.mjr_sub_cat_code+'">'+value.mjr_sub_cat_desc+'</option>');
    //         });
    //     });
    // });
    
    $('#mjr_cat').change(function() {
        var _mjr_cat_code = $(this).val();

        $.ajax({
            url:"/supplier/majorsub/" + _mjr_cat_code,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                $('#mjr_sub_cat').empty();
                $('#mjr_sub_cat').append('<option value="">---Major Sub Category---</option>');
                $.each(response.majorsub, function(key, value){
                    $('#mjr_sub_cat').append('<option value="'+value.mjr_sub_cat_id+'">'+value.mjr_sub_cat_id+'~'+value.mjr_sub_cat_desc+'</option>');
                });
            }
        })
    });

    $('#mjr_sub_cat').change(function() {
        var _mjr_sub_cat_id = $(this).val();
    
        $.ajax({
            url:"/supplier/minorsub/" + _mjr_sub_cat_id,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                $('#mnr_sub_cat').empty();
                $('#mnr_sub_cat').append('<option value="">---Minor Sub Category---</option>');
                $.each(response.minorsub, function(key, value) {
                    $('#mnr_sub_cat').append('<option value="'+value.mnr_sub_cat_id+'">'+value.mnr_sub_cat_id+'~'+value.mnr_sub_cat_desc+'</option>');
                });
            }
        })
    });

    $('#mnr_sub_cat').change(function(){
        var _mnr_sub_cat_id = $(this).val();

        $.ajax({
            url:"/supplier/item/" + _mnr_sub_cat_id,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                $('#item').empty();
                $('#item').append('<option value="">---Item---</option>');
                $.each(response.item, function(key, value) {
                    $('#item').append('<option value="'+value.item_id+'">'+value.item_code+'~'+value.item_name+'</option>');
                });
            }
        })
    })

    $('#item').change(function(){
        var _item_id = $(this).val();

        $.ajax({
            url:"/supplier/itemCN/" + _item_id,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                $("#item_code").val(response.item.item_code);
                $("#item_name").val(response.item.item_name);
            }
        })
    })

    $('#pur_no').change(function(){
        var _po_id = $(this).val();

        $.ajax({
            url:"/allocation/getPoNo/" + _po_id,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                $("#p_PO_NO").val(response.alloc.po_no);
            }
        })
    })

    $('#office_code').change(function() {
        // var _office_code = $(this).val();
        var selectedValue = $(this).val();
        var selectedValuesArray = selectedValue.split('~');

        var _office_code = selectedValuesArray[0];
        var _item_code = selectedValuesArray[1];
    
        $.ajax({
            url:"/allocation/office/" + _office_code + "/" + _item_code,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                jQuery("#req_no").val(response.alloc[0].req_no);
                jQuery("#item").val(response.alloc[0].item_code+'~'+response.alloc[0].item_name);
                jQuery("#qnty").val(response.alloc[0].qnty);
            }
        })
    });

    // $('#req_no').change(function() {
    //     var _req_no = $(this).val();
    
    //     $.ajax({
    //         url:"/allocation/item/" + _req_no,
    //         type:"GET",
    //         dataType:"JSON",
    //         success:function(response){
    //             $('#item').empty();
    //             $('#item').append('<option value="">---Item---</option>');
    //             $.each(response.alloc, function(key, value) {
    //                 $('#item').append('<option value="'+value.item_code+'">'+value.item_code+'~'+value.item_name+'</option>');
    //             });
    //         }
    //     })
    // });

    // $('#item').change(function() {
    //     var _item_code = $(this).val();
    
    //     $.ajax({
    //         url:"/allocation/quantity/" + _item_code,
    //         type:"GET",
    //         dataType:"JSON",
    //         success:function(response){
    //             jQuery("#qnty").val(response.alloc[0].qnty);
    //         }
    //     })
    // });

    $('#p_Office_code').change(function() {
        var _office_code = $(this).val();

        $.ajax({
            url:"/issue/allocNo/" + _office_code,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                $('#p_alloc_no').empty();
                $('#p_alloc_no').append('<option value="">---Allocation No---</option>');
                $.each(response.issue, function(key, value){
                    $('#p_alloc_no').append('<option value="'+value.alloc_no+'">'+value.alloc_no+'</option>');
                });
            }
        })
    });
})

