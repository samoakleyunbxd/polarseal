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

/* themes/custom/subtheme/templates/block--leftmainmenu.html.twig */
class __TwigTemplate_5f48e7f0c2c89af5984e5a64280ffe8076e11d4ecd243389e3c03f3c02260fae extends \Twig\Template
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
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 30, $this->source), "html", null, true);
        echo ">
  ";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 31, $this->source), "html", null, true);
        echo "



<div id=\"menu\">
  <div id=\"menu-bar\" onclick=\"menuOnClick()\">
    <div id=\"bar1\" class=\"bar\"></div>
    <div id=\"bar2\" class=\"bar\"></div>
    <div id=\"bar3\" class=\"bar\"></div>
  </div>
  <nav class=\"nav\" id=\"nav\">
";
        // line 42
        $this->loadTemplate((($context["directory"] ?? null) . "/templates/parts/left_profile_menu.html.twig"), "themes/custom/subtheme/templates/block--leftmainmenu.html.twig", 42)->display($context);
        // line 43
        echo "  </nav> 
</div>

<div class=\"menu-bg\" id=\"menu-bg\"></div>






";
        // line 53
        $this->loadTemplate((($context["directory"] ?? null) . "/templates/parts/left_profile_menu.html.twig"), "themes/custom/subtheme/templates/block--leftmainmenu.html.twig", 53)->display($context);
        // line 54
        echo "

<div style=\"position:relative;\" class=\"follow_wrapper\"> 
<img class=\"follow_us first\" src=\"/themes/custom/subtheme/images/assets/follow_us_main.png\">
<img class=\"follow_us second\" src=\"/themes/custom/subtheme/images/assets/follow_us_img_circle.png\">
</div>

<div class=\"floow_us_info\">

<p>Follow us on social channels</p>
<img class=\"\" src=\"/themes/custom/subtheme/images/icons/right_arrow_light.png\">
</div>





</div>




<script type=\"text/javascript\">

function menuOnClick() {
  document.getElementById(\"menu-bar\").classList.toggle(\"change\");
  document.getElementById(\"nav\").classList.toggle(\"change\");
  document.getElementById(\"menu-bg\").classList.toggle(\"change-bg\");
}
</script>

<style type=\"text/css\">



</style>";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/block--leftmainmenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 54,  72 => 53,  60 => 43,  58 => 42,  44 => 31,  39 => 30,);
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
<div{{ attributes }}>
  {{ title_prefix }}



<div id=\"menu\">
  <div id=\"menu-bar\" onclick=\"menuOnClick()\">
    <div id=\"bar1\" class=\"bar\"></div>
    <div id=\"bar2\" class=\"bar\"></div>
    <div id=\"bar3\" class=\"bar\"></div>
  </div>
  <nav class=\"nav\" id=\"nav\">
{% include directory ~ '/templates/parts/left_profile_menu.html.twig' %}
  </nav> 
</div>

<div class=\"menu-bg\" id=\"menu-bg\"></div>






{% include directory ~ '/templates/parts/left_profile_menu.html.twig' %}


<div style=\"position:relative;\" class=\"follow_wrapper\"> 
<img class=\"follow_us first\" src=\"/themes/custom/subtheme/images/assets/follow_us_main.png\">
<img class=\"follow_us second\" src=\"/themes/custom/subtheme/images/assets/follow_us_img_circle.png\">
</div>

<div class=\"floow_us_info\">

<p>Follow us on social channels</p>
<img class=\"\" src=\"/themes/custom/subtheme/images/icons/right_arrow_light.png\">
</div>





</div>




<script type=\"text/javascript\">

function menuOnClick() {
  document.getElementById(\"menu-bar\").classList.toggle(\"change\");
  document.getElementById(\"nav\").classList.toggle(\"change\");
  document.getElementById(\"menu-bg\").classList.toggle(\"change-bg\");
}
</script>

<style type=\"text/css\">



</style>", "themes/custom/subtheme/templates/block--leftmainmenu.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/block--leftmainmenu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 42);
        static $filters = array("escape" => 30);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['escape'],
                []
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
