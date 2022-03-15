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
class __TwigTemplate_f4a05e11437375d0342bdee37c47b0f256a894e883453a320eed7e5b50f727c4 extends \Twig\Template
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
<div";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 33, $this->source), "html", null, true);
        echo ">
       <a href=\"/user/";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user2"] ?? null), "uid", [], "any", false, false, true, 34), "value", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
        echo "\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 34, $this->source), "html", null, true);
        echo "/images/assets/header_logo.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 34, $this->source), "html", null, true);
        echo "\"> </a><h3>Welcome, <span id=\"user_name\" style=\"text-transform: capitalize;\"> ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "displayname", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
        echo "</span></h3>
</div>

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
        return array (  51 => 34,  47 => 33,  44 => 32,  42 => 31,  39 => 30,);
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

<div{{ attributes }}>
       <a href=\"/user/{{ user2.uid.value }}\"><img src=\"/{{ directory }}/images/assets/header_logo.png\" alt=\"{{ site_name }}\"> </a><h3>Welcome, <span id=\"user_name\" style=\"text-transform: capitalize;\"> {{ user.displayname }}</span></h3>
</div>

", "themes/custom/subtheme/templates/header/block--headertopbar.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/header/block--headertopbar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 31);
        static $filters = array("escape" => 33);
        static $functions = array("bamboo_load_currentuser" => 31);

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape'],
                ['bamboo_load_currentuser']
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
