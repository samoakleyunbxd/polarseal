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

/* themes/custom/subtheme/templates/parts/left_profile_menu.html.twig */
class __TwigTemplate_eb7fd6efe077daaf9a382966985d07fcb9ae16c9fee666db7991688592e715a2 extends \Twig\Template
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
        echo "

";
        // line 3
        $context["path"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<current>");
        // line 4
        echo "
<div class=\"left_profile_menu\">
<ul>
<li class=\"orders ";
        // line 7
        if ((($context["path"] ?? null) == "/my-orders")) {
            echo "  active ";
        }
        echo "\"><a href=\"/my-orders\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 7, $this->source), "html", null, true);
        echo "/images/icons/basket_icon.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 7, $this->source), "html", null, true);
        echo "\">My Orders</a></li>

<li class=\"documents ";
        // line 9
        if ((((($context["path"] ?? null) == "/documents") || (($context["path"] ?? null) == "/my-documents")) || (($context["path"] ?? null) == "/my-samples"))) {
            echo "  active ";
        }
        echo "\"><a href=\"/documents\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 9, $this->source), "html", null, true);
        echo "/images/icons/Documents.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 9, $this->source), "html", null, true);
        echo "\">Documents <img class=\"doc_arrow\" src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 9, $this->source), "html", null, true);
        echo "/images/icons/arrow_down_light.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 9, $this->source), "html", null, true);
        echo "\"></a></li>

<div class=\"second_nav  ";
        // line 11
        if ((((($context["path"] ?? null) != "/documents") && (($context["path"] ?? null) != "/my-documents")) && (($context["path"] ?? null) != "/my-samples"))) {
            echo "  hidden ";
        }
        echo "\">

<p class=\" ";
        // line 13
        if ((($context["path"] ?? null) == "/my-documents")) {
            echo "  active_submenu ";
        }
        echo "\" ><a href=\"/my-documents\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 13, $this->source), "html", null, true);
        echo "/images/icons/Documents.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 13, $this->source), "html", null, true);
        echo "\">My documents</a></p>
<p class=\" ";
        // line 14
        if ((($context["path"] ?? null) == "/my-samples")) {
            echo "  active_submenu ";
        }
        echo "\" ><a href=\"/my-samples\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 14, $this->source), "html", null, true);
        echo "/images/icons/Documents.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 14, $this->source), "html", null, true);
        echo "\">My samples</a></p>

</div>

<li class=\"account ";
        // line 18
        if ((($context["path"] ?? null) == "/user")) {
            echo "  active ";
        }
        echo "\"><a href=\"/user\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 18, $this->source), "html", null, true);
        echo "/images/icons/My-account.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 18, $this->source), "html", null, true);
        echo "\">My Account</a></li>
</ul>
</div>







";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/parts/left_profile_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 18,  93 => 14,  83 => 13,  76 => 11,  61 => 9,  50 => 7,  45 => 4,  43 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

{%  set path = path('<current>') %}

<div class=\"left_profile_menu\">
<ul>
<li class=\"orders {%  if path==\"/my-orders\" %}  active {% endif %}\"><a href=\"/my-orders\"><img src=\"/{{ directory }}/images/icons/basket_icon.png\" alt=\"{{ site_name }}\">My Orders</a></li>

<li class=\"documents {%  if path==\"/documents\" or path==\"/my-documents\"  or path==\"/my-samples\"%}  active {% endif %}\"><a href=\"/documents\"><img src=\"/{{ directory }}/images/icons/Documents.png\" alt=\"{{ site_name }}\">Documents <img class=\"doc_arrow\" src=\"/{{ directory }}/images/icons/arrow_down_light.png\" alt=\"{{ site_name }}\"></a></li>

<div class=\"second_nav  {%  if path!=\"/documents\" and path!=\"/my-documents\"  and path!=\"/my-samples\"%}  hidden {% endif %}\">

<p class=\" {%  if path==\"/my-documents\" %}  active_submenu {% endif %}\" ><a href=\"/my-documents\"><img src=\"/{{ directory }}/images/icons/Documents.png\" alt=\"{{ site_name }}\">My documents</a></p>
<p class=\" {%  if path==\"/my-samples\" %}  active_submenu {% endif %}\" ><a href=\"/my-samples\"><img src=\"/{{ directory }}/images/icons/Documents.png\" alt=\"{{ site_name }}\">My samples</a></p>

</div>

<li class=\"account {%  if path==\"/user\" %}  active {% endif %}\"><a href=\"/user\"><img src=\"/{{ directory }}/images/icons/My-account.png\" alt=\"{{ site_name }}\">My Account</a></li>
</ul>
</div>







", "themes/custom/subtheme/templates/parts/left_profile_menu.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/parts/left_profile_menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 3, "if" => 7);
        static $filters = array("escape" => 7);
        static $functions = array("path" => 3);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                ['path']
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
