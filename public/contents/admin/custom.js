$(function () {

  const init_delete_function = () =>{
    $(".delete_btn").off().on("click", function (e) {
        e.preventDefault();
        if (confirm("Are sure to delete?")) {
            $.ajax({
                url: $(this).attr("href"),
                type: "delete",
                success: (res) => {

                    $(this).parents("tr").remove();
                    $(this).parents("li").remove();
                    $(this).parents($(this).data('parent')).remove();

                    toaster('success','Data Deleted Successfully');
                },
            });
        }
    });
  }

  init_delete_function();

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
                //console.log(res);
                $(this).trigger("reset");
                $('.product_insert_form select').val('').trigger("change");
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
                //$('.product_update_form select').val('').trigger("change");
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
            init_delete_function();
            activate_image_function();
        })
    }

    // Modal trigger
    let selected_file_input = '';
    $('.input_file_body').on('click',function(){
        get_all_image();
        selected_file_input = $(this).children('input')[0];

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

    let selected_images = [];
    let selected_images_id = [];
    const activate_image_function = () =>{
        selected_images = [];
        $('.fm_checkbox').on('click',function(){
            let value = $(this).data('name');
            let  value_id = $(this).val();
            let check_exit = selected_images.includes(value);

            if(check_exit){
                selected_images = selected_images.filter(name=>name != value);
                selected_images_id = selected_images_id.filter(id=>id != value_id);
            }else{
                selected_images.push(value);
                selected_images_id.push(value_id);
            }
            //console.log(value,selected_images);
        })
    }

    $('#fm_confirm_btn').on('click',function(e){
        e.preventDefault();
        if(selected_images.length){
           //
           if($(selected_file_input)[0].multiple === false){
            $(selected_file_input).val(selected_images)[0];
            $(selected_file_input).siblings('img').attr('src','/'+ selected_images[0]);
           }else{
            //$(selected_file_input).val(JSON.stringify(selected_images));
            $(selected_file_input).val(JSON.stringify(selected_images_id));
            $(selected_file_input).siblings('img').remove();
                for (let index = 0; index < selected_images.length; index++) {
                    const element = selected_images[index];
                    $(selected_file_input).parents('.input_file_body').prepend('<img src="/'+element +'" alt="product image" style="height: 50px;margin: 5px;" />');

                }
           }
            $('#fileManagerModal').modal('hide');
        }else{
            toaster('error','No file selected');
        }

    });


});
