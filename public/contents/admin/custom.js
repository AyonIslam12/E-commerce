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

    function toaster(icon, message){
        Toast.fire({
            icon: icon,
            title: message,
        })
    }
});
