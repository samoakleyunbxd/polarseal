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

/* themes/custom/subtheme/templates/header/block--headertopbar.html.twig */
class __TwigTemplate_7852a0cba0f05d2a51ee875494670415d0e2bf8e65a9ce91fcee64e1b6270f1d extends \Twig\Template
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
        echo "
";
        // line 31
        $context["user2"] = $this->extensions['Drupal\bamboo_twig_loader\TwigExtension\Loader']->loadCurrentUser();
        // line 32
        echo "




<div ";
        // line 37
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 37, $this->source), "html", null, true);
        echo ">
       <a href=\"/user/";
        // line 38
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user2"] ?? null), "uid", [], "any", false, false, true, 38), "value", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
        echo "\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 38, $this->source), "html", null, true);
        echo "/images/assets/header_logo.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 38, $this->source), "html", null, true);
        echo "\"> </a><h3>Welcome, <span id=\"user_name\" style=\"text-transform: capitalize;\"> ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "displayname", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
        echo "</span></h3>


<div class=\"right_header\">
<form method=\"get\" action=\"/search/content\">

\t<div style=\"position:relative;\"> 
<input type=\"\" name=\"keys\" style=\"height:43px;width:230px;    padding-left: 15px;\">
<input class=\"submit_img\" type=\"image\" src=\"/";
        // line 46
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 46, $this->source), "html", null, true);
        echo "/images/icons/search.png\" alt=\"Submit Form\" />
</div>
</form>
<div class=\"round_icon\"><img src=\"/";
        // line 49
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 49, $this->source), "html", null, true);
        echo "/images/icons/bell_icon.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 49, $this->source), "html", null, true);
        echo "\"></div>
<div class=\"round_icon\"><img class=\"profile_img\" width=\"85\" src=\"";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user2"] ?? null), "user_picture", [], "any", false, false, true, 50), "entity", [], "any", false, false, true, 50), "uri", [], "any", false, false, true, 50), "value", [], "any", false, false, true, 50), 50, $this->source)), "html", null, true);
        echo "\"></div>
<div class=\"round_icon\"><a href=\"/user/logout\"><img src=\"/";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 51, $this->source), "html", null, true);
        echo "/images/icons/exit_icon.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 51, $this->source), "html", null, true);
        echo "\"></a></div>
</div>


</div>




<style type=\"text/css\">

#block-headertopbar
{
display: flex;

}



.right_header
{
    margin-left: auto;
    display: flex;
        align-items: center;
}


.round_icon
{
    height: 43px;
    width: 43px;
    background-color: #FFFFFF;
    box-shadow: 0 4px 10px 0 rgb(0 0 0 / 12%);
    border-radius: 50px;
    display: flex;
    align-items: center;
    align-content: center;
    align-self: center;
    justify-content: center;
    justify-self: center;
    justify-items: center;
    margin-left:20px;
}



.round_icon img
{
width:20px;
}



.round_icon .profile_img
{
\t    width: 100%;
    object-fit: cover;
    border-radius: 25px;
}




.right_header input {

  border-radius: 21.5px;
  background-color: #ECF1F8;
  box-shadow: 0 4px 10px 0 rgba(0,0,0,0.14);
      border: 0px;
}



.submit_img
{
\tposition: absolute;
    right: 0px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    padding: 10px;
        background: transparent!important;
    background-color: transparent!important;
    box-shadow: none!important;
}




</style>



";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/header/block--headertopbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 51,  84 => 50,  78 => 49,  72 => 46,  55 => 38,  51 => 37,  44 => 32,  42 => 31,  39 => 30,);
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

{% set user2 = bamboo_load_currentuser() %}





<div {{ attributes }}>
       <a href=\"/user/{{ user2.uid.value }}\"><img src=\"/{{ directory }}/images/assets/header_logo.png\" alt=\"{{ site_name }}\"> </a><h3>Welcome, <span id=\"user_name\" style=\"text-transform: capitalize;\"> {{ user.displayname }}</span></h3>


<div class=\"right_header\">
<form method=\"get\" action=\"/search/content\">

\t<div style=\"position:relative;\"> 
<input type=\"\" name=\"keys\" style=\"height:43px;width:230px;    padding-left: 15px;\">
<input class=\"submit_img\" type=\"image\" src=\"/{{ directory }}/images/icons/search.png\" alt=\"Submit Form\" />
</div>
</form>
<div class=\"round_icon\"><img src=\"/{{ directory }}/images/icons/bell_icon.png\" alt=\"{{ site_name }}\"></div>
<div class=\"round_icon\"><img class=\"profile_img\" width=\"85\" src=\"{{ file_url(user2.user_picture.entity.uri.value) }}\"></div>
<div class=\"round_icon\"><a href=\"/user/logout\"><img src=\"/{{ directory }}/images/icons/exit_icon.png\" alt=\"{{ site_name }}\"></a></div>
</div>


</div>




<style type=\"text/css\">

#block-headertopbar
{
display: flex;

}



.right_header
{
    margin-left: auto;
    display: flex;
        align-items: center;
}


.round_icon
{
    height: 43px;
    width: 43px;
    background-color: #FFFFFF;
    box-shadow: 0 4px 10px 0 rgb(0 0 0 / 12%);
    border-radius: 50px;
    display: flex;
    align-items: center;
    align-content: center;
    align-self: center;
    justify-content: center;
    justify-self: center;
    justify-items: center;
    margin-left:20px;
}



.round_icon img
{
width:20px;
}



.round_icon .profile_img
{
\t    width: 100%;
    object-fit: cover;
    border-radius: 25px;
}




.right_header input {

  border-radius: 21.5px;
  background-color: #ECF1F8;
  box-shadow: 0 4px 10px 0 rgba(0,0,0,0.14);
      border: 0px;
}



.submit_img
{
\tposition: absolute;
    right: 0px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    padding: 10px;
        background: transparent!important;
    background-color: transparent!important;
    box-shadow: none!important;
}




</style>



", "themes/custom/subtheme/templates/header/block--headertopbar.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/header/block--headertopbar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 31);
        static $filters = array("escape" => 37);
        static $functions = array("bamboo_load_currentuser" => 31, "file_url" => 50);

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape'],
                ['bamboo_load_currentuser', 'file_url']
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
