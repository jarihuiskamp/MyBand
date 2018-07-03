<div class="topnav">
    <a href="index.php?page=home"><i class="fas fa-home"></i> HOME</a>
    <a href="index.php?page=news"><i class="far fa-newspaper"></i> NEWS</a>
    <a href="index.php?page=contact"><i class="fas fa-envelope"></i> CONTACT</a>
    <a class="login" href="index.php?page=login"><i class="fas fa-user"></i> LOGIN</a>
</div>

<h1>CMS</h1>

<table>

    {foreach from=$articles item=article}
        <tr>
            <td>{$article[0]}</td>
            <td>{$article[1]}</td>
            <td>{$article[2]}</td>
            <td><a href="index.php?page=edit&id={$article[0]}" </td>
            <td><a href="index.php?page=delete&id={$article[0]}" </td>
        </tr>
    {/foreach}
</table>