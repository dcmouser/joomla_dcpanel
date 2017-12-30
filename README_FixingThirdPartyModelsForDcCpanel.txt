// common bug with cpanel admin modules is they always assume they are on start page of admin section so they submit their forms to that
// we need to make them submit their form to the CURRENT page they are shown on:
//
// change
// JRoute::_('index.php');
// to
// JUri::getInstance();
//