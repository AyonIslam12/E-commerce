$(function () {
    $(".delete_btn").on("click", function (e) {
        e.preventDefault();
        if (confirm("Are sure to delete?")) {
            $.ajax({
                url: $(this).attr("href"),
                type: "delete",
                success: (res) => {
                    $(this).parents("tr").remove();
                    toaster('success','Data Deleted Successfully');
                },
            });
        }
    });
    //for focus
    $("input").on("focus", function (e) {
        $(this).siblings("span").html(" ");
    });
    $("select").on("focus", function (e) {
        $(this).siblings("span").html(" ");
    });
    //for for focus
    $("textarea").on("focus", function (e) {
        $(this).siblings("span .text-danger ").html(" ");
    });

    //for inser data
    $(".insert_form").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData($(this)[0]);

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: (res) => {
                console.log(res);
                $(this).trigger("reset");
                $('.note-editable').html('');
                $(".preloader").hide();
                toaster('success',' Data Added successfully');
            },
            error: (err) => {
                //console.log(err.responseJSON.errors);
                let errors = err.responseJSON.errors;
                for (const key in errors) {
                    if (Object.hasOwnProperty.call(errors, key)) {
                        const element = errors[key];
                        $(`.${key}`).text(element);
                        /*    console.log(key,element);  for show output in console*/
                    }
                }
                toaster('error','pleace check below for errors ');
                $(".preloader").hide();
            },
            beforeSend: () => {
                $(".preloader").show();
            },
        });
    });

    //for Update data
    $(".update_form").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData($(this)[0]);

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: (res) => {
                $(".preloader").hide();
                toaster('success','Data Updated Successfully');
            },
            error: (err) => {
                //console.log(err.responseJSON.errors);
                let errors = err.responseJSON.errors;
                for (const key in errors) {
                    if (Object.hasOwnProperty.call(errors, key)) {
                        const element = errors[key];
                        $(`.${key}`).text(element);
                        /*    console.log(key,element);  for show output in console*/
                    }
                }
                toaster('error','pleace check below for errors ');
                $(".preloader").hide();
            },
            beforeSend: () => {
                $(".preloader").show();
            },
        });
    });

  // component form ajax
  $('.component_form_submit').off().on('click',function(){
    let form = $(this).parents('.component_form');
    let target_select = $(this).parents('.component_form').data('target_select');
    let action = $(this).parents('.component_form').attr('action');
    let inputs = $(form[0]).children('.modal-body').children('.form-group').children('div').children('input');
    let textareas = $(form[0]).children('.modal-body').children('.form-group').children('div').children('textarea');
    let selects = $(form[0]).children('.modal-body').children('.form-group').children('div').children('.select_ontime').children('select');

    // let formData = new FormData(form);
    let temp_form = $(document.createElement('form'));
    $(temp_form).attr('method','POST');

    for (const key in inputs) {
        if (Object.hasOwnProperty.call(inputs, key)) {
            const element = inputs[key];
            if( parseInt(key) >= 0 && typeof parseInt(key) === "number"){
                $(temp_form).append($(element).clone());
            }
        }
    }

    for (const key in textareas) {
        if (Object.hasOwnProperty.call(textareas, key)) {
            const element = textareas[key];
            if( parseInt(key) >= 0 && typeof parseInt(key) === "number"){
                $(temp_form).append($(element).clone());
            }
        }
    }

    for (const key in selects) {
        if (Object.hasOwnProperty.call(selects, key)) {
            const element = selects[key];
            if( parseInt(key) >= 0 && typeof parseInt(key) === "number"){
                $(temp_form).append($(element).clone());
            }
        }
    }

    let formData = new FormData(temp_form[0]);

    $.ajax({
        url : action,
        type : "POST",
        data : formData,
        success : (res)=>{
            // console.log(res.html,action);
            $('.component_preloader').hide();
            toaster('success','data inserted successfully.');
            $('.modal').modal('hide');
            $('.component_form input').val('');
            $('.component_form textarea').val('');
            $('.component_form select').html('');
            $(target_select).prepend(res.html);
            $(target_select).val(res.value);
        },
        error: (err)=>{
            // console.log(err.responseJSON.errors);
            let errors = err.responseJSON.errors;
            for (const key in errors) {
                if (Object.hasOwnProperty.call(errors, key)) {
                    const element = errors[key];
                    $(`.component_form .${key}`).text(element);
                }
            }
            toaster('error','check below for errors');
            $('.component_preloader').hide();
        },
        beforeSend:()=>{
            $('.component_preloader').show();
        }
    })

    // console.log(form, action, inputs, textareas, temp_form);
});



    //Load option
    $('.load_options').on('click',function(e){
        e.preventDefault();
        let url = $(this).data('url');
        $.get(url,(res)=>$(this).siblings('select').html(res));

    })

    const get_all_image = ()=>{
        $.get('/file-manager/get-files',(res)=>{
            $('.file_manager_image').html(res);
        })
    }

    $('.input_file_body').on('click',function(){
        get_all_image();
   })

    //Insert Image
    $('.fm_file_importer').on('change',function(){
        let temp_form = $(document.createElement('form'));
        $(temp_form).attr('method','POST');
        $(temp_form).append($(this).clone());
        let formData = new FormData(temp_form[0]);
        $.post('/file-manager/store-file',formData,(res)=>{
            if(res){
                $(this).val('');
                get_all_image();
                toaster('success','Image Upload successfully');
            }

        })


    })



});
