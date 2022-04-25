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

/* themes/custom/subtheme/templates/htmlpdf.html.twig */
class __TwigTemplate_01e17f151c5dbaf4f30cc5de5a8382cea9550ca9f04531e853d7c54999ab8bdb extends \Twig\Template
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
        // line 1
        echo "THIS IS PDF FIKLE :)


";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed((($__internal_compile_0 = (($__internal_compile_1 = (($__internal_compile_2 = (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_customer_name", [], "any", false, false, true, 4)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[0] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["x-default"] ?? null) : null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["value"] ?? null) : null), 4, $this->source)]));
        echo "
";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed((($__internal_compile_4 = twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_customer_name", [], "any", false, false, true, 5)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[0] ?? null) : null), 5, $this->source)]));
        echo "
";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed((($__internal_compile_5 = (($__internal_compile_6 = twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_customer_name", [], "any", false, false, true, 6)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[0] ?? null) : null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["value"] ?? null) : null), 6, $this->source)]));
        echo "



";
        // line 10
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed((($__internal_compile_7 = (($__internal_compile_8 = (($__internal_compile_9 = twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_customer_name", [], "any", false, false, true, 10)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["x-default"] ?? null) : null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[0] ?? null) : null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["value"] ?? null) : null), 10, $this->source)]));
        echo "
";
        // line 11
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed((($__internal_compile_10 = (($__internal_compile_11 = (($__internal_compile_12 = twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_customer_name", [], "any", false, false, true, 11)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["x-default"] ?? null) : null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[0] ?? null) : null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["value"] ?? null) : null), 11, $this->source)]));
        echo "

Value: ";
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "node", [], "any", false, false, true, 13), "field_customer_name", [], "any", false, false, true, 13), "value", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
        echo "


";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "node", [], "any", false, false, true, 16), "entity", [], "any", false, false, true, 16), 16, $this->source)]));
        echo "


";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, (($__internal_compile_13 = ($context["content"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["node"] ?? null) : null), "entity", [], "any", false, false, true, 19), 19, $this->source)]));
        echo "
";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_14 = ($context["content"] ?? null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14[0] ?? null) : null), "node", [], "any", false, false, true, 20), "entity", [], "any", false, false, true, 20), 20, $this->source)]));
        echo "

";
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "node", [], "any", false, false, true, 22), "entity", [], "any", false, false, true, 22), 22, $this->source)]));
        echo "
";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "entity", [], "any", false, false, true, 23), 23, $this->source)]));
        echo "

";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "langcode", [], "any", false, false, true, 25), 25, $this->source)]));
        echo "
";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "node", [], "any", false, false, true, 26), "langcode", [], "any", false, false, true, 26), 26, $this->source)]));
        echo "
";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "node", [], "any", false, false, true, 27), "langcode", [], "any", false, false, true, 27), 27, $this->source)]));
        echo "
";
        // line 28
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "langcode", [], "any", false, false, true, 28), 28, $this->source)]));
        echo "
";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\devel\Twig\Extension\Debug']->kint($this->env, $context, [0 => $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "langcode", [], "any", false, false, true, 29), 29, $this->source)]));
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/htmlpdf.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 29,  110 => 28,  106 => 27,  102 => 26,  98 => 25,  93 => 23,  89 => 22,  84 => 20,  80 => 19,  74 => 16,  68 => 13,  63 => 11,  59 => 10,  52 => 6,  48 => 5,  44 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("THIS IS PDF FIKLE :)


{{ kint(node.field_customer_name[0]['x-default'][0]['value'])  }}
{{ kint(node.field_customer_name[0])  }}
{{ kint(node.field_customer_name[0]['value'])  }}



{{ kint(node.field_customer_name['x-default'][0]['value'])  }}
{{ kint(node.field_customer_name['x-default'][0]['value'])  }}

Value: {{ content.node.field_customer_name.value  }}


{{ kint(content.node.entity)  }}


{{ kint(content['node'].entity)  }}
{{ kint(content[0].node.entity)  }}

{{ kint(content.node.entity)  }}
{{ kint(node.entity)  }}

{{  kint(node.langcode) }}
{{  kint(content.node.langcode) }}
{{  kint(page.node.langcode) }}
{{  kint(content.langcode) }}
{{  kint(node.langcode) }}", "themes/custom/subtheme/templates/htmlpdf.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/htmlpdf.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 13);
        static $functions = array("kint" => 4);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['kint']
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
