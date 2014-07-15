/**
 * search.js – handles UI interactions on the search form page
 */

$(function()
{
    function updateName ( condition )
    {
        var $condition = $(condition),
            $columnSelect = $condition.find('.columnSelect'),
            $predicateSelect = $condition.find('.predicateSelect'),
            $searchValue = $condition.find('.searchValue');

        $searchValue.attr('name', $columnSelect.val() + '_' + $predicateSelect.val());
    }

    $(document).on('click', '#searchForm .addRemove .add', function(e)
    {
        e.preventDefault();

        var conditionHtml = $('#searchConditionTemplate').html(),
            $wrapper = $(this).parents('#searchForm').find('#searchConditions');

        $wrapper.append(conditionHtml);
        updateName($wrapper.children(':last'));
    });

    $(document).on('click', '#searchForm .addRemove .remove', function(e)
    {
        e.preventDefault();

        $(this).parents('.searchCondition').remove();
    });

    $(document).on('change', '#searchForm .searchCondition select', function(){ updateName($(this).parents('.searchCondition')) });
    updateName($('#searchConditions').children(':first'));
});