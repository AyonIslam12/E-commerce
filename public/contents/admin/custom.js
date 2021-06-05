$(function(){
   $('.delete_btn').on('click', function(e){
       e.preventDefault();
       if(confirm('Are sure to delete?')){
       $.ajax({
           url:$(this).attr('href'),
           type: 'delete',
           success:(res)=>{
               $(this).parents('tr').remove();
               Toast.fire({
                icon: 'success',
                title: 'data deleted'
            })
           }

       })
    }
   });

   //for inser data
   $('.insert_form').on('submit', function(e){
    e.preventDefault();
  /*  let data = {
    name: $('.insert_form input[name=name]').val(),
    logo: $('.insert_form input[name=logo]').val(),
   }; */
  let formData = new FormData($(this)[0]);
   $.ajax({
       url: $(this).attr('action'),
       type: 'POST',
       data: formData,
       success: (res)=>{
        console.log(res);
        $(this).trigger('reset');
       },
       error: (err)=>{
        //console.log(err.responseJSON.errors);
        let errors = err.responseJSON.errors;
        for (const key in errors) {
            if (Object.hasOwnProperty.call(errors, key)) {
                const element = errors[key];
                $(`.${key}`).text(element);
                console.log(key,element);

            }
        }
       }
   });
});

})
