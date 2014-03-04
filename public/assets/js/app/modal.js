 /* Open modal */
    // $('a.open-modal').click(function(e) {
    $(document).on( 'click', '.open-modal', function(e) {
        e.preventDefault();

        var url = $(this).attr('modal-source');
        var post = {modal: 'modal'};

        //Now turn the 'data-xxx' attributes into $_POST array
        $.each($(this).data(), function(k,v) {
            post[k] = v;
        });

        /* check we are logged in */
        // $.ajax({ 
        //     url: '/ajax/contacts/check_login', 
        //     success: function (data) {
        //         r = $.parseJSON(data);
        //         if ( r.logged_in == false) {
        //             window.location = '/site/login';
        //         }
        //     } 
        // });


        $('#modal').modal('show');
        //if we have a url, the load the view from that url
        if ( url ) {
            $('.modal-body').html('');
            $('.modal-loader').addClass('loader');
            
            //Now get the view
            $.ajax({
                url: url,
                type: 'GET',
                // data: data,
                success: function(html) {
                    $('.modal-body').html(html);
                    $('.modal-loader').removeClass('loader');
                    
                }
            });
        }
    });


    $('#modal').on('hidden.bs.modal', function (e) {
      // do something...
      console.log('modal closed');
    })


