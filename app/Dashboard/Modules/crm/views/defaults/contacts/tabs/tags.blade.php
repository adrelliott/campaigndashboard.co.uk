<h3 class="text-primary"><i class="fa fa-tags"></i> Tags</h3>

<input type="text" name="tags" class="taggingInput form-control input" />

@section('end_of_page')
    <script src="/assets/js/bootstrap/typeahead.bundle.js" type="text/javascript" charset="utf-8"></script>
    <script src="/assets/js/bootstrap/bootstrap-tagsinput.min.js" type="text/javascript" charset="utf-8"></script>

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/bootstrap-tagsinput.css">

    <script type="text/javascript">
        $(document).ready(function()
        {
            input = taggingInput(<?= json_encode($allTags) ?>);

            <?php foreach($tags as $tag): ?>
                input.tagsinput('add', { value: '<?= $tag->id ?>', label: '<?= $tag->tag_title ?>' });
            <?php endforeach; ?>
        });
    </script>
@append