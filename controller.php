<?php

function homepage_action() {
    global $smarty;
    $articles = get_articles();
    $smarty->assign('articles',$articles);
    $smarty->display('header.tpl');
    $smarty->display('home.tpl');
    $smarty->display('footer.tpl');
}

function page_not_found_action() {
    global $smarty;
    $smarty->display('notfound.tpl');
}

function contact_action() {
    global $smarty;
    $smarty->display('header.tpl');
    $smarty->display('contact.tpl');
    $smarty->display('footer.tpl');

}

function news_action() {
    global $smarty, $pageno, $page, $searchterm;
    $articles = get_some_articles();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page', $pageno);
    $smarty->assign('number_of_pages',$number_of_pages);
    $smarty->assign('articles',$articles);
    display_page($page);
}

function login_action() {
    global $smarty;
    $smarty->display('header.tpl');
    $smarty->display('login.tpl');
    $smarty->display('footer.tpl');
    login();
}

function cms_action() {
    global $smarty;
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('footer.tpl');
    cmstable();
}

function display_page($page) {
    global $smarty;
    $smarty->assign('title',strtoupper($page));
    $smarty->display('header.tpl');
    $smarty->display('menu.tpl');
    $smarty->display($page . '.tpl');
    $smarty->display('footer.tpl');
}
