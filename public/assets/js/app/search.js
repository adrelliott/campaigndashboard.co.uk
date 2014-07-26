/**
 * search.js – handles UI interactions on the search form page
 */

$(function()
{
    function updateValue ( condition )
    {
        var $condition = $(condition),
            $productDropdown = $condition.find('.productDropdown'),
            $variantDropdown = $condition.find('.variantDropdown'),
            $searchValue = $condition.find('.searchValue');

        $searchValue.attr('name', $productDropdown.val() + '::' + ($variantDropdown.val() ? $variantDropdown.val() : ''));
    }

    $(document).on('click', '#searchForm .addRemove .add', function(e)
    {
        e.preventDefault();

        var $wrapper = $(this).parents('.productConditions'),
            conditionHtml = $($wrapper.attr('data-template')).html();

        $wrapper.append(conditionHtml);
    });

    $(document).on('click', '#searchForm .addRemove .remove', function(e)
    {
        e.preventDefault();

        $(this).parents('.productCondition').remove();
    });

    $('#searchForm .productConditions:first(.productCondition) .addRemove .remove').remove();
    $(document).on('change', '#searchForm .triggerInputDropdown', function(){ updateValue($(this).parents('.productCondition')) });

    /**
     * When the user changes the product dropdown, load its variants
     */
    $(document).on('change', '#searchForm .productDropdown', function(e)
    {
        e.preventDefault();

        var id = $(this).val(),
            url = $(this).parents('.productConditions').attr('data-variant-url').replace('-ID-', id);

        $(this).parents('.productCondition').find('.productVariant').load(url);
    });
});