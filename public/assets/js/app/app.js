// var editor;  
(function($) {

    console.log('here we go');
    
    /* Save forms using ajax */
    //see form.js




    /* Run Modal 'Do you really want to do this?' check */
    $(document).on( 'click', '.confirmation-check', function(e) {
        var message = $(this).attr('confirmation-message');
        if (!confirm(message)){
          return false;
        }
    });

    /* Make sure the first pill in each pills nav & tab-pane is active */
    $("ul.nav.nav-pills").each(function() {
        $(this).find('li').first().addClass('active');
    });
    $("div.tab-content").each(function() {
        $(this).find('div.tab-pane').first().addClass('active');
    });
    $("div.panel-accordian").each(function() {
        $(this).find('div.collapse').first().addClass('in');
    });

    /* Turn cards into clickable divs */
    $("card").click(function(){
        window.location=$(this).find("a").attr("href");
        return false;
    });

    // $('.wysihtml5').each(function() {
    //     $(this).wysihtml5();
    // });
    



    /* Add rows to a table (used for searches, order forms etc) */
    $(document).on( 'click', '.add_row', function(e) {
        e.preventDefault();

        //get table & rows
        var tableId = $(this).data('tableid');
        console.log('table id', tableId);
        var table = $('table#'+tableId);
        var row = table.find("tbody tr:last").clone();

        //empty the inputs
        row.find('input').val('');

        //If there is a typahead the reinitilaise the typeahead
       
        //append ot the table as last row
        $('tr:last', table).after(row);
    });


    
    /* Add list itmes to a <ul> for search page */
    $(document).on( 'click', '.add_li_item', function(e) {
        e.preventDefault();
        var ulId = $(this).attr('ul-id');

        $('#'+ulId+' li:last').clone().removeClass('hide').insertBefore('#'+ulId+' li:last');
    });

    /* Remove a row */
    $(document).on( 'click', '.remove_li_item', function(e) {
        e.preventDefault();
        $(this).closest('li').remove();
        // $(this).parent().remove();
    });

    //Unhide a div
    $(document).on( 'click', '.unhide_div', function(e) {
        e.preventDefault();
        var divClass = $(this).attr('div-class');
        $('.'+divClass).removeClass('hide');

    });

    /* Copy first name to nickname in contacts/show */
    // $("#create-first_name").keyup(function () {
    //   var value = $(this).val();
    //   $("#create-nickname").val(value);
    // }).keyup();
    $("#copy-source").keyup(function () {
      var value = $(this).val();
      $(".copy-destination").val(value);
    }).keyup();

    /* Intialise... */
    //$("[class='bootstrap-switch']").bootstrapSwitch();
    
    /* flippant.js */
    // var front = document.getElementById('flipthis')
    //     , back_content = "<h2>I'm the back!</h2><button id='closeCard'>&laquo; Back</button>"
    //     , back
    // document.getElementById("flipCard").addEventListener('click',function(e){
    //     back = flippant.flip(front, back_content)
    //     document.getElementById("closeCard").addEventListener('click',function(e){
    //         back = back.close();
    //     })
    // })



console.log('all done');

$('.wysihtml5').summernote({focus: true, height: 300});

})(jQuery);