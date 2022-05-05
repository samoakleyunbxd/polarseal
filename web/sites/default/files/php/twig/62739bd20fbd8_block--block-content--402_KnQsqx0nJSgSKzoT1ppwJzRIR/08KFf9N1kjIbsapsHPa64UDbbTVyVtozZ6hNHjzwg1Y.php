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

/* themes/custom/subtheme/templates/profile page/center profile column/block--block-content--402f6ed8-35fa-44ef-9a53-61e3d1a88f32.html.twig */
class __TwigTemplate_cfae7f616bf47b0710ac26203be472bfe892304e73688cc4e0ffb5ad8f90a58e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
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

<div class=\"profile-column\">


\t<div";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 35, $this->source), "html", null, true);
        echo ">
\t  ";
        // line 36
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 36, $this->source), "html", null, true);
        echo "


\t<p class=\"column_header\">COMPANY DETAILS</p>


\t";
        // line 42
        $context["user"] = $this->extensions['Drupal\bamboo_twig_loader\TwigExtension\Loader']->loadCurrentUser();
        // line 43
        echo "\t\t";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_telephone", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
        echo "
\t";
        // line 44
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_telephone"] ?? null), 44, $this->source), "html", null, true);
        echo "


\t<div class=\"item\">
\t\t<div style=\"width:100%;display: flex;\">
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"label\">Name</span>
\t\t\t</div>
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"data\">";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "field_company_name", [], "any", false, false, true, 53), "value", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
        echo "</span>
\t\t\t</div>
\t\t</div>
\t</div>


\t<div class=\"item\">
\t\t<div style=\"width:100%;display: flex;\">
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"label\">Address</span>
\t\t\t</div>
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"data\">";
        // line 65
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "field_company_address", [], "any", false, false, true, 65), "value", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
        echo "</span>
\t\t\t</div>
\t\t</div>
\t</div>


\t<div class=\"item\">
\t\t<div style=\"width:100%;display: flex;\">
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"label\">Email</span>
\t\t\t</div>
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"data\">";
        // line 77
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "field_company_email", [], "any", false, false, true, 77), "value", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
        echo "</span>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"item\">
\t\t<div style=\"width:100%;display: flex;\">
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"label\">Telephone</span>
\t\t\t</div>
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"data\">";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "field_company_telephone", [], "any", false, false, true, 88), "value", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
        echo "</span>
\t\t\t</div>
\t\t</div>
\t</div>

\t  
\t  ";
        // line 94
        $this->displayBlock('content', $context, $blocks);
        // line 97
        echo "
</div>


</div>";
    }

    // line 94
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 95
        echo "\t    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 95, $this->source), "html", null, true);
        echo " 
\t  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/profile page/center profile column/block--block-content--402f6ed8-35fa-44ef-9a53-61e3d1a88f32.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 95,  143 => 94,  135 => 97,  133 => 94,  124 => 88,  110 => 77,  95 => 65,  80 => 53,  68 => 44,  63 => 43,  61 => 42,  52 => 36,  48 => 35,  40 => 30,);
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

<div class=\"profile-column\">


\t<div{{ attributes }}>
\t  {{ title_prefix }}


\t<p class=\"column_header\">COMPANY DETAILS</p>


\t{% set user = bamboo_load_currentuser() %}
\t\t{{content.field_telephone}}
\t{{field_telephone}}


\t<div class=\"item\">
\t\t<div style=\"width:100%;display: flex;\">
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"label\">Name</span>
\t\t\t</div>
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"data\">{{ user.field_company_name.value }}</span>
\t\t\t</div>
\t\t</div>
\t</div>


\t<div class=\"item\">
\t\t<div style=\"width:100%;display: flex;\">
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"label\">Address</span>
\t\t\t</div>
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"data\">{{ user.field_company_address.value }}</span>
\t\t\t</div>
\t\t</div>
\t</div>


\t<div class=\"item\">
\t\t<div style=\"width:100%;display: flex;\">
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"label\">Email</span>
\t\t\t</div>
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"data\">{{ user.field_company_email.value }}</span>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"item\">
\t\t<div style=\"width:100%;display: flex;\">
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"label\">Telephone</span>
\t\t\t</div>
\t\t\t<div style=\"width:50%\">
\t\t\t\t<span class=\"data\">{{ user.field_company_telephone.value }}</span>
\t\t\t</div>
\t\t</div>
\t</div>

\t  
\t  {% block content %}
\t    {{ content }} 
\t  {% endblock %}

</div>


</div>", "themes/custom/subtheme/templates/profile page/center profile column/block--block-content--402f6ed8-35fa-44ef-9a53-61e3d1a88f32.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/profile page/center profile column/block--block-content--402f6ed8-35fa-44ef-9a53-61e3d1a88f32.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 42, "block" => 94);
        static $filters = array("escape" => 30);
        static $functions = array("attach_library" => 30, "bamboo_load_currentuser" => 42);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block'],
                ['escape'],
                ['attach_library', 'bamboo_load_currentuser']
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
