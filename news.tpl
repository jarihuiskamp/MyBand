

<h3>Current page: {$current_page}</h3>


<div class="nextprev">
{if $current_page gt 1}
    <a href="index.php?page=news&pageno={$current_page - 1}">PREVIOUS</a>
{/if}

{if $current_page lt $number_of_pages}
    <a href="index.php?page=news&pageno={$current_page + 1}">NEXT</a>
{/if}
</div>

<p>
    {foreach from=$articles item=article}
        {*{foreach from=$article item=part}*}
            <h3>{$article[0]}</h3>
            <p>{$article[1]}</p>
            <p>{$article[2]}</p>
        {*{/foreach}*}
    {/foreach}
</p>
