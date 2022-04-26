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

/* themes/custom/subtheme/templates/profile page/left profile fields/block--block-content--34000488-0253-408e-a3fc-485a5ff52bcf.html.twig */
class __TwigTemplate_b3d3933aa644f72c2bb94c6b2c35db57ca5e5a1fb566a948dd00ba69648c0eb4 extends \Twig\Template
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


<div";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 35, $this->source), "html", null, true);
        echo ">
  ";
        // line 36
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 36, $this->source), "html", null, true);
        echo "


<p class=\"column_header\">MY DETAILS</p>


";
        // line 42
        $context["user"] = $this->extensions['Drupal\bamboo_twig_loader\TwigExtension\Loader']->loadCurrentUser();
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_telephone", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
        echo "
";
        // line 44
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_telephone"] ?? null), 44, $this->source), "html", null, true);
        echo "



<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Name</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">";
        // line 54
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, true, 54), "value", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
        echo "</span>
\t\t</div>
\t</div>
</div>

<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Surname</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">";
        // line 65
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "field_surname", [], "any", false, false, true, 65), "value", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
        echo "</span>
\t\t</div>
\t</div>
</div>

<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Role</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">";
        // line 76
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "field_role", [], "any", false, false, true, 76), "value", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
        echo "</span>
\t\t</div>
\t</div>
</div>


<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Email</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "field_name", [], "any", false, false, true, 88), "value", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
        echo "</span>
\t\t</div>
\t</div>
</div>


<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Telephone</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">";
        // line 100
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "field_telephone", [], "any", false, false, true, 100), "value", [], "any", false, false, true, 100), 100, $this->source), "html", null, true);
        echo "</span>
\t\t</div>
\t</div>
</div>















  
  ";
        // line 120
        $this->displayBlock('content', $context, $blocks);
        // line 123
        echo "</div>


</div>";
    }

    // line 120
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 121
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 121, $this->source), "html", null, true);
        echo " 
  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/profile page/left profile fields/block--block-content--34000488-0253-408e-a3fc-485a5ff52bcf.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 121,  170 => 120,  163 => 123,  161 => 120,  138 => 100,  123 => 88,  108 => 76,  94 => 65,  80 => 54,  67 => 44,  63 => 43,  61 => 42,  52 => 36,  48 => 35,  40 => 30,);
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


<div{{ attributes }}>
  {{ title_prefix }}


<p class=\"column_header\">MY DETAILS</p>


{% set user = bamboo_load_currentuser() %}
{{content.field_telephone}}
{{field_telephone}}



<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Name</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">{{ user.name.value }}</span>
\t\t</div>
\t</div>
</div>

<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Surname</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">{{ user.field_surname.value }}</span>
\t\t</div>
\t</div>
</div>

<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Role</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">{{ user.field_role.value }}</span>
\t\t</div>
\t</div>
</div>


<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Email</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">{{ user.field_name.value }}</span>
\t\t</div>
\t</div>
</div>


<div class=\"item\">
\t<div style=\"width:100%;display: flex;\">
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"label\">Telephone</span>
\t\t</div>
\t\t<div style=\"width:50%\">
\t\t\t<span class=\"data\">{{ user.field_telephone.value }}</span>
\t\t</div>
\t</div>
</div>















  
  {% block content %}
    {{ content }} 
  {% endblock %}
</div>


</div>", "themes/custom/subtheme/templates/profile page/left profile fields/block--block-content--34000488-0253-408e-a3fc-485a5ff52bcf.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/profile page/left profile fields/block--block-content--34000488-0253-408e-a3fc-485a5ff52bcf.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 42, "block" => 120);
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
