import './bootstrap';
$(document).on('turbolinks:load', function() {
   $('.get-started').on('submit', function(){
        const data = $(this).serialize();
        const form = $(this);
        form.addClass('loading');

        form.append('<div class="ui message error"></div>');
        $.ajax({
            type: "POST",
            url: "/post/get-started",
            data: data,
            success: function(response){
                if(response.status_code === 201){
                    Turbolinks.visit('/getting-started?user='+response.email)
                }
                else{
                    form.removeClass('loading');
                    $(document).find('.error').html(response.message).addClass('negative').css("display", "block");
                }
            },
            error: function(jqxhr, jqerror, jqstatus){
                form.removeClass('loading');
                $(document).find('.error').text(jqxhr.responseJSON.message).addClass('negative').css("display", "block");
            }
        });
        return false;
   });

   $('.next-btn').on('click', function(){
    const $this = $(this);
    if ($('.name').val() === '') {
        if ($('.name').parent().find('small').length > 0) {
          return;
        }
        $('.name').parent().append('<small class="text text-danger">We need to know your name</small>');
        $('.name').focus();
        return false;
      }
      else{
        $('.date').removeClass('hidden');
        $this.attr('type', 'submit');
      }
   })


   // hide name error
   $('.name').on('keyup', function(){
    if($(this).parent().find('small').length > 0){
        $(this).parent().find('small').remove();
    }
   })

   // calculate age
   $('.dob').on('change', function() {
    var dob = new Date($(this).val());
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();

    // Check if birthday hasn't happened yet this year
    if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
      age--;
    }

    $('.age').text(age + " years");
  });

  // register the user
  $('.register-form').on('submit', function(){
    const form = $(this);
    form.addClass('loading');
    form.append('<div class="ui message error"></div>');
    const data = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "/post/register",
        data: data,
        success: function(response){
            if(response.status_code == 201){
                Turbolinks.visit(`/verify`);
            }
            else{
                form.removeClass('loading');
                $(document).find('.error').html(response.message).addClass('negative').css("display", "block");
            }
        },
        error: function(xhr, error, status){
            form.removeClass('loading');
            $(document).find('.error').html(xhr.responseJSON.message).addClass('negative').css("display", "block");
        }
    })
    return false;
  })
});
