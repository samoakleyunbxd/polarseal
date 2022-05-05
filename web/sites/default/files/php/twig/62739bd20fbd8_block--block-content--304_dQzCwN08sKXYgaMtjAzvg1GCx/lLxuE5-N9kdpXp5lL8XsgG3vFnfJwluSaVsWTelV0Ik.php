<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/subtheme/templates/profile page/right profile column/block--block-content--3049a403-1510-44a4-b142-6f8d5820200f.html.twig */
class __TwigTemplate_50002f61a6099fbfb266c0544c77ba14bcfaba49cbf9ceaa51ebb7bce24c107e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_barrio_subtheme/unbxd-styling-profile-page"), "html", null, true);
        echo "






<div id=\"notifications\"></div>

<script type=\"text/javascript\">


//add style to notification column on pforile page
window.addEventListener('load', function () {
  jQuery('.block-views-blocknotifications-block-1').addClass(\"profile-column right_column\");



setTimeout(function(){
get_notifications_ids();
},1000)




//add event to expand notification body on arrow click
setTimeout(function(){

jQuery('.views-field-nothing').click(function(){
jQuery(this).find('.not-right').toggleClass('show_notification');
jQuery(this).find('.notification_arrow').toggleClass('rotate_down');
});



//add notifications arrows right and down to control
jQuery('.views-field-nothing').append('<span class=\"notification_arrow\"></span>')
jQuery('.right_column').append('<span style=\"transform: translateX(-50%) rotate(180deg);left:45%\" class=\"scroll_notifications\" onclick=\"scrollWin(`down`)\"></span>')
jQuery('.right_column').append('<span style=\"left:60%\" class=\"scroll_notifications\" onclick=\"scrollWin(`up`)\"></span>')





//bind function to scroll down/up notification window
var scrollWrapper = jQuery('.right_column .view-content.row');
var scrollBtn = jQuery('.scroll_notifications');

scrollWrapper.scrollTop(0)
jQuery('#scrollBtn').on('click', function() {
  scrollWrapper.scrollTop(scrollWrapper.scrollTop() + 50)
});




},1000)


});




//function to scroll down/up notification window
function scrollWin(dir) {

if(dir=='up')
{
document.getElementsByClassName(\"view-content\")[0].scrollTop += 150;
}
else
document.getElementsByClassName(\"view-content\")[0].scrollTop -= 150;
}

var foot = jQuery(\".right_column\");
foot.scrollTop(foot.scrollTop() + 150); // scroll 75px down from current

var ids_array =[];


//grab all notifications node ID to tick as seen if needed
function get_notifications_ids()
{

var lista = jQuery('.view-id-notifications .views-infinite-scroll-content-wrapper');
var lista2 = jQuery(lista)[0];
var a_list = jQuery(lista).find('a');

ids_array =[];



jQuery.each(a_list, function( index, value ) {
var str = jQuery(this).attr('href');
var str2 = str.replace('/node/',\"\");
ids_array.push(str2)


});




var items = jQuery('.right_column').find('.views-row')



jQuery.each(items, function( index, value ) {


jQuery(this).append('<span class=\"bell_seen\" onclick=\"tick_as_seen('+index+',this)\" style=\"position: absolute;left: 7px;top: 14px;\"><img width=\"16px\" src=\"/themes/custom/subtheme/images/icons/bell_icon.png\"></span>');

});




}




function tick_as_seen(index,elem)
{


console.log(index);
console.log(elem);

jQuery.post('/polar_seal/read-notification/'+ids_array[index]);





jQuery(elem).closest('.views-row').addClass('slide_out');


setTimeout(function(){


jQuery(elem).closest('.views-row').addClass('hide_row');


},1000)

}






</script>

<style type=\"text/css\">

.user-logged-in .profile-column.projects-list
{
\tdisplay:none!important;
}


.bell_seen:hover
{
\tcursor:pointer;
\t  -webkit-filter: drop-shadow(1px 1px 3px green);
    filter: drop-shadow(1px 1px 3px green);
}


.rotate_down
{
\ttransform:rotate(90deg);
}

.notification_arrow
{
\ttransition:all .5s;
}




.field-content:hover
{
cursor:pointer;
}



.views-row
{
\t    transition: all 1s;
}



.slide_out
{

    transform: translateX(-300px);


}


.hide_row
{
height: 1px!important;
    overflow: hidden;
    margin: 0px!important;
    padding: 0px!important;
}



.views-infinite-scroll-content-wrapper 
{
\ttransition: all 1s;
}


</style>




";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/profile page/right profile column/block--block-content--3049a403-1510-44a4-b142-6f8d5820200f.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 30,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - plugin_id: The ID of the block implementation.
 * - label: The configured label of the block if visible.
 * - configuration: A list of the block's configuration values.
 *   - label: The configured label for the block.
 *   - label_display: The display settings for the label.
 *   - provider: The module or other provider that provided this block plugin.
 *   - Block plugin specific settings will also be stored here.
 * - content: The content of this block.
 * - attributes: array of HTML attributes populated by modules, intended to
 *   be added to the main container tag of this template.
 *   - id: A valid HTML ID and guaranteed unique.
 * - title_attributes: Same as attributes, except applied to the main title
 *   tag that appears in the template.
 * - title_prefix: Additional output populated by modules, intended to be
 *   displayed in front of the main title tag that appears in the template.
 * - title_suffix: Additional output populated by modules, intended to be
 *   displayed after the main title tag that appears in the template.
 *
 * @see template_preprocess_block()
 *
 * @ingroup themeable
 */
#}
{{ attach_library('bootstrap_barrio_subtheme/unbxd-styling-profile-page') }}






<div id=\"notifications\"></div>

<script type=\"text/javascript\">


//add style to notification column on pforile page
window.addEventListener('load', function () {
  jQuery('.block-views-blocknotifications-block-1').addClass(\"profile-column right_column\");



setTimeout(function(){
get_notifications_ids();
},1000)




//add event to expand notification body on arrow click
setTimeout(function(){

jQuery('.views-field-nothing').click(function(){
jQuery(this).find('.not-right').toggleClass('show_notification');
jQuery(this).find('.notification_arrow').toggleClass('rotate_down');
});



//add notifications arrows right and down to control
jQuery('.views-field-nothing').append('<span class=\"notification_arrow\"></span>')
jQuery('.right_column').append('<span style=\"transform: translateX(-50%) rotate(180deg);left:45%\" class=\"scroll_notifications\" onclick=\"scrollWin(`down`)\"></span>')
jQuery('.right_column').append('<span style=\"left:60%\" class=\"scroll_notifications\" onclick=\"scrollWin(`up`)\"></span>')





//bind function to scroll down/up notification window
var scrollWrapper = jQuery('.right_column .view-content.row');
var scrollBtn = jQuery('.scroll_notifications');

scrollWrapper.scrollTop(0)
jQuery('#scrollBtn').on('click', function() {
  scrollWrapper.scrollTop(scrollWrapper.scrollTop() + 50)
});




},1000)


});




//function to scroll down/up notification window
function scrollWin(dir) {

if(dir=='up')
{
document.getElementsByClassName(\"view-content\")[0].scrollTop += 150;
}
else
document.getElementsByClassName(\"view-content\")[0].scrollTop -= 150;
}

var foot = jQuery(\".right_column\");
foot.scrollTop(foot.scrollTop() + 150); // scroll 75px down from current

var ids_array =[];


//grab all notifications node ID to tick as seen if needed
function get_notifications_ids()
{

var lista = jQuery('.view-id-notifications .views-infinite-scroll-content-wrapper');
var lista2 = jQuery(lista)[0];
var a_list = jQuery(lista).find('a');

ids_array =[];



jQuery.each(a_list, function( index, value ) {
var str = jQuery(this).attr('href');
var str2 = str.replace('/node/',\"\");
ids_array.push(str2)


});




var items = jQuery('.right_column').find('.views-row')



jQuery.each(items, function( index, value ) {


jQuery(this).append('<span class=\"bell_seen\" onclick=\"tick_as_seen('+index+',this)\" style=\"position: absolute;left: 7px;top: 14px;\"><img width=\"16px\" src=\"/themes/custom/subtheme/images/icons/bell_icon.png\"></span>');

});




}




function tick_as_seen(index,elem)
{


console.log(index);
console.log(elem);

jQuery.post('/polar_seal/read-notification/'+ids_array[index]);





jQuery(elem).closest('.views-row').addClass('slide_out');


setTimeout(function(){


jQuery(elem).closest('.views-row').addClass('hide_row');


},1000)

}






</script>

<style type=\"text/css\">

.user-logged-in .profile-column.projects-list
{
\tdisplay:none!important;
}


.bell_seen:hover
{
\tcursor:pointer;
\t  -webkit-filter: drop-shadow(1px 1px 3px green);
    filter: drop-shadow(1px 1px 3px green);
}


.rotate_down
{
\ttransform:rotate(90deg);
}

.notification_arrow
{
\ttransition:all .5s;
}




.field-content:hover
{
cursor:pointer;
}



.views-row
{
\t    transition: all 1s;
}



.slide_out
{

    transform: translateX(-300px);


}


.hide_row
{
height: 1px!important;
    overflow: hidden;
    margin: 0px!important;
    padding: 0px!important;
}



.views-infinite-scroll-content-wrapper 
{
\ttransition: all 1s;
}


</style>




", "themes/custom/subtheme/templates/profile page/right profile column/block--block-content--3049a403-1510-44a4-b142-6f8d5820200f.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/profile page/right profile column/block--block-content--3049a403-1510-44a4-b142-6f8d5820200f.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 30);
        static $functions = array("attach_library" => 30);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
