<div class="withDataTable">
    <h3 class="text-primary"><i class="fa fa-group"></i> Notes</h3>

    <div class="table-responsive clearfix">
        <table class="table table-striped table-bordered table-hover dataTable" data-config="notesTable">
            <thead>
                <tr>
                    <th>Note</th>
                </tr>
            </thead>

            <tbody></tbody>
        </table>
    </div>

    <div class="pull-right margin_top_15" style="margin-top:10px">
        <a class="btn btn-primary pull-right open-modal" href="#" modal-source="{{ URL::route('app.contacts.notes.create', array('contact_id' => $model->id)) }}" data-view="show_modal" >
            <i class="fa fa-plus"></i> Create New Note
        </a>
    </div>
</div>

@section('end_of_page')
    <script type="text/javascript">
        window.dataTableConfig['notesTable'] = function()
        {
            return {
                paging: false,
                columns: [
                    { name: 'note_title', data: 'note_title' }
                ],
                serverSide: true,
                ajax: {
                    url: '<?= URL::route("app.contacts.notes.index", $model->id) ?>'
                }
            };
        };
    </script>
@append