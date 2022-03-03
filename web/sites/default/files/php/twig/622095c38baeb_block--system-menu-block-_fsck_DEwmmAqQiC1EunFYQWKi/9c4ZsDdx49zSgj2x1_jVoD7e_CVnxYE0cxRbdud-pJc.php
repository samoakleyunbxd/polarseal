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

/* themes/contrib/dxpr_theme/templates/block--system-menu-block--main.html.twig */
class __TwigTemplate_89428c5649485453c5d1d91c9cdde6e4f94167710fa2f26f870092e3245579f5 extends \Twig\Template
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
        // line 36
        $context["designRegions"] = [];
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 37), "block_design_regions", [], "any", false, false, true, 37));
        foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
            // line 38
            echo "   ";
            if ($context["name"]) {
                // line 39
                echo "   ";
                $context["designRegions"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["designRegions"] ?? null), 39, $this->source), [0 => $context["name"]]);
                // line 40
                echo "   ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        $context["classes"] = [0 => "block", 1 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 45
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 45), 45, $this->source))), 2 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 46
($context["plugin_id"] ?? null), 46, $this->source))), 3 => "clearfix", 4 => (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 48
($context["theme"] ?? null), "settings", [], "any", false, false, true, 48), "block_well", [], "any", false, false, true, 48) && twig_in_filter(($context["region"] ?? null), ($context["designRegions"] ?? null)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 48), "block_well", [], "any", false, false, true, 48)) : (""))];
        // line 52
        $context["title_classes"] = [0 => "block-title", 1 => (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 54
($context["theme"] ?? null), "settings", [], "any", false, false, true, 54), "title_well", [], "any", false, false, true, 54) && twig_in_filter(($context["region"] ?? null), ($context["designRegions"] ?? null)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 54), "title_well", [], "any", false, false, true, 54)) : (""))];
        // line 57
        echo "<section";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 57), 57, $this->source), "html", null, true);
        echo ">
  ";
        // line 58
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 58, $this->source), "html", null, true);
        echo "
  ";
        // line 59
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 59), "title_sticker", [], "any", false, false, true, 59) && twig_in_filter(($context["region"] ?? null), ($context["designRegions"] ?? null)))) {
            // line 60
            echo "    <div class=\"wrap-block-title\">
  ";
        }
        // line 62
        echo "  ";
        if (($context["label"] ?? null)) {
            // line 63
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($context["title_classes"] ?? null)], "method", false, false, true, 63), 63, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 63, $this->source), "html", null, true);
            echo "</h2>
  ";
        }
        // line 65
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 65), "title_sticker", [], "any", false, false, true, 65) && twig_in_filter(($context["region"] ?? null), ($context["designRegions"] ?? null)))) {
            // line 66
            echo "    </div>
  ";
        }
        // line 68
        echo "  ";
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 68), "block_divider", [], "any", false, false, true, 68) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 68), "block_divider_thickness", [], "any", false, false, true, 68)) && twig_in_filter(($context["region"] ?? null), ($context["designRegions"] ?? null)))) {
            // line 69
            echo "    <hr class=\"block-hr\">
  ";
        }
        // line 71
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 71, $this->source), "html", null, true);
        echo "

  ";
        // line 73
        $this->displayBlock('content', $context, $blocks);
        // line 76
        echo "</section>
";
    }

    // line 73
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 74
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 74, $this->source), "html", null, true);
        echo "
  ";
    }

    public function getTemplateName()
    {
        return "themes/contrib/dxpr_theme/templates/block--system-menu-block--main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 74,  120 => 73,  115 => 76,  113 => 73,  107 => 71,  103 => 69,  100 => 68,  96 => 66,  93 => 65,  85 => 63,  82 => 62,  78 => 60,  76 => 59,  72 => 58,  67 => 57,  65 => 54,  64 => 52,  62 => 48,  61 => 46,  60 => 45,  59 => 43,  52 => 40,  49 => 39,  46 => 38,  42 => 37,  40 => 36,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/dxpr_theme/templates/block--system-menu-block--main.html.twig", "/home/runcloud/webapps/polarseal/web/themes/contrib/dxpr_theme/templates/block--system-menu-block--main.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 36, "for" => 37, "if" => 38, "block" => 73);
        static $filters = array("merge" => 39, "clean_class" => 45, "escape" => 57);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if', 'block'],
                ['merge', 'clean_class', 'escape'],
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
