(function($) {
    
    $('table.data-table').each( function() {
        createDataTable( this );
    } );

    function createDataTable( selector )
    {
        var t = $( selector );

        //Set up the default settings
        var o = {
            oLanguage: {
                "sEmptyTable": '<p class="lead">Bit quiet round here, isn\'t it?</p><p>I couldn\'t find any matching records <i>anywhere</i>. <br>(I even looked under the bed...)<p>',
            },
            // // aoColumnDefs: [],
            iDisplayLength: 5,
            bDestroy: true,
            sPaginationType: "bootstrap",
            bLengthChange: false,
            aLengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],
            // aaSorting: [],
            aoColumnDefs: [],
            /* Changes by tellenis 15/01/14 */
            // fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //     var numStart =  this.fnPagingInfo().iStart;
            //     var index =  iDisplayIndexFull;
            //     $(nRow).attr("id",index );
            //     return nRow;
            // }
            /* End of changes */
            bProcessing: true,
            bServerSide: true,
            sAjaxSource: "",
        };

        //Now Iterate over the dataTablesOptions object and test to see if we've passed a new attribute
        $.each(o, function(k, v) {
            var newk = k.toLowerCase(); //we cannot pass camelCase
            if ( t.data(newk) ){
                o[k] = t.data(newk); //Overwrite with the new value
            }
        });


        var a = {
            // tableid : "",
            linkurl: false,
            linkclass: "",
            deleteurl: false,
            toggleurl: false,
            modalsource: "",
            ajaxsource: false,
            toggleclass: false,
            showid: false,
            alertclass: "",
            view: "",
            postprocess: false
        };

        // Iterate over the attributes object and test to see if we've passed a new attributes
        $.each(a, function(k, v) {
            if (t.data(k)){
                a[k] = t.data(k); //Overwrite with the new value
            }
        });

        // Is it an ajax table?
        if ( a.ajaxsource ) {
            o.sAjaxSource = a.ajaxsource;
        }

        //Do we show the id col (always the first col)
        if( ! a.showid ) {
            o.aoColumnDefs.push( {
                aTargets: [0],
                bVisible: false
            } );
        }

        //Add a link to each row
        if ( a.linkurl ) {
            o.aoColumnDefs.push( {
                aTargets: ['_all'],
                // aTargets: [1],
                mRender: function ( data, type, row ) {
                    var url = '#';
                    if ( a.linkurl !== '#') {
                        url = a.linkurl+'/'+row[0]+'/edit';
                    }
                    return '<a href="'+url+'" data-id="'+row[0]+'" modal-source="'+a.modalsource+'" data-alert_class="'+a.alertclass+'" data-view="'+a.view+'" class="'+a.linkclass+'"  >'+data+'</a>';
                }
            } );
        }


// console.log('o=', o);

        var oTable = t.dataTable( $.extend( true, o, {
            "bProcessing": true,
        } ) );
        //console.log(oTable);
        return oTable;
    };
})(jQuery);
