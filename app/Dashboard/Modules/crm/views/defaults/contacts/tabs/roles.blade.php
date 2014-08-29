<div class="withDataTable">
    <h3 class="text-primary"><i class="fa fa-group"></i> Roles</h3>

    <div class="table-responsive clearfix">
        <table class="table table-striped table-bordered table-hover dataTable" data-config="rolesTable">
            <thead>
                <tr>
                    <th>Role Name</th>
                    <th>Start date</th>
                    <th>End Date</th>
                    <!-- <th></th>
                    <th></th> -->
                </tr>
            </thead>

            <tbody></tbody>
        </table>
    </div>

    <div class="pull-right margin_top_15" style="margin-top:10px">
        <a class="btn btn-primary pull-right open-modal" href="#" modal-source="{{ URL::route('app.contacts.roles.create', array('contact_id' => $model->id)) }}" data-view="show_modal" >
            <i class="fa fa-plus"></i> Create New Role
        </a>
    </div>
</div>

@section('end_of_page')
    <script type="text/javascript">
        window.dataTableConfig['rolesTable'] = function()
        {
            return {
                paging: false,
                columns: [
                    { name: 'role', data: 'role' },
                    { name: 'start', data: 'start', defaultContent: '' },
                    { name: 'end', data: 'end', defaultContent: '' },
                    // { name: 'edit', data: 'edit', defaultContent: '' },
                    // { name: 'delete', data: 'delete', defaultContent: '' },
                ],
                serverSide: true,
                ajax: {
                    url: '<?= URL::route("app.contacts.roles.index", $model->id) ?>'
                }
            };
        };
    </script>
@stop