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
class __TwigTemplate_4d4646288e76238d7b4f4198b43e3b4ed26dcbd3659adb9bfac4fcdcf0cb9de1 extends \Twig\Template
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
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_barrio_subtheme/unbxd-left-accordion-menu"), "html", null, true);
        echo "
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js\"></script>

";
        // line 5
        $context["path"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<current>");
        // line 6
        $context["user"] = $this->extensions['Drupal\bamboo_twig_loader\TwigExtension\Loader']->loadCurrentUser();
        // line 7
        echo "
<div class=\"left_profile_menu\">
<ul>
<li class=\"orders ";
        // line 10
        if ((($context["path"] ?? null) == "/my-orders")) {
            echo "  active ";
        }
        echo "\"><a href=\"/my-orders\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 10, $this->source), "html", null, true);
        echo "/images/icons/basket_icon.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 10, $this->source), "html", null, true);
        echo "\">My Orders</a></li>



<div class=\"  \">

<div class=\"accordion\" id=\"accordionExample\">
  <div class=\"accordion-item\">
    <p class=\"accordion-header\" id=\"headingOne\">
      <button class=\"accordion-button collapsed ";
        // line 19
        if (((($context["path"] ?? null) == "/my-documents") || (($context["path"] ?? null) == "/my-samples"))) {
            echo "  active ";
        }
        echo "\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
       <img src=\"/";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 20, $this->source), "html", null, true);
        echo "/images/icons/Documents.png\" style=\"margin-right: 8px;\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 20, $this->source), "html", null, true);
        echo "\">Documents
      </button>
    </p>
    <div id=\"collapseOne\" class=\"accordion-collapse collapse ";
        // line 23
        if (((($context["path"] ?? null) == "/my-documents") || (($context["path"] ?? null) == "/my-samples"))) {
            echo "  show ";
        }
        echo "\" aria-labelledby=\"headingOne\" data-bs-parent=\"#accordionExample\">
      <div class=\"accordion-body second_nav\">

<p class=\" ";
        // line 26
        if ((($context["path"] ?? null) == "/my-documents")) {
            echo "  active_submenu ";
        }
        echo "\" ><a href=\"/my-documents\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 26, $this->source), "html", null, true);
        echo "/images/icons/Documents.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 26, $this->source), "html", null, true);
        echo "\">My documents</a></p>
<p class=\" ";
        // line 27
        if ((($context["path"] ?? null) == "/my-samples")) {
            echo "  active_submenu ";
        }
        echo "\" ><a href=\"/my-samples\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 27, $this->source), "html", null, true);
        echo "/images/icons/Documents.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 27, $this->source), "html", null, true);
        echo "\">My samples</a></p>

    

      </div>
    </div>
  </div>


</div>


</div>


<li class=\"account ";
        // line 42
        if ((($context["path"] ?? null) == ("/user/" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "uid", [], "any", false, false, true, 42), "value", [], "any", false, false, true, 42)))) {
            echo "  active ";
        }
        echo "\"><a href=\"/user\"><img src=\"/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 42, $this->source), "html", null, true);
        echo "/images/icons/My-account.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 42, $this->source), "html", null, true);
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
        return array (  131 => 42,  107 => 27,  97 => 26,  89 => 23,  81 => 20,  75 => 19,  57 => 10,  52 => 7,  50 => 6,  48 => 5,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
{{ attach_library('bootstrap_barrio_subtheme/unbxd-left-accordion-menu') }}
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js\"></script>

{%  set path = path('<current>') %}
{% set user = bamboo_load_currentuser() %}

<div class=\"left_profile_menu\">
<ul>
<li class=\"orders {%  if path==\"/my-orders\" %}  active {% endif %}\"><a href=\"/my-orders\"><img src=\"/{{ directory }}/images/icons/basket_icon.png\" alt=\"{{ site_name }}\">My Orders</a></li>



<div class=\"  \">

<div class=\"accordion\" id=\"accordionExample\">
  <div class=\"accordion-item\">
    <p class=\"accordion-header\" id=\"headingOne\">
      <button class=\"accordion-button collapsed {%  if path==\"/my-documents\" or path==\"/my-samples\"  %}  active {% endif %}\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
       <img src=\"/{{ directory }}/images/icons/Documents.png\" style=\"margin-right: 8px;\" alt=\"{{ site_name }}\">Documents
      </button>
    </p>
    <div id=\"collapseOne\" class=\"accordion-collapse collapse {%  if path==\"/my-documents\" or path==\"/my-samples\"  %}  show {% endif %}\" aria-labelledby=\"headingOne\" data-bs-parent=\"#accordionExample\">
      <div class=\"accordion-body second_nav\">

<p class=\" {%  if path==\"/my-documents\" %}  active_submenu {% endif %}\" ><a href=\"/my-documents\"><img src=\"/{{ directory }}/images/icons/Documents.png\" alt=\"{{ site_name }}\">My documents</a></p>
<p class=\" {%  if path==\"/my-samples\" %}  active_submenu {% endif %}\" ><a href=\"/my-samples\"><img src=\"/{{ directory }}/images/icons/Documents.png\" alt=\"{{ site_name }}\">My samples</a></p>

    

      </div>
    </div>
  </div>


</div>


</div>


<li class=\"account {%  if path==\"/user/\" ~ user.uid.value  %}  active {% endif %}\"><a href=\"/user\"><img src=\"/{{ directory }}/images/icons/My-account.png\" alt=\"{{ site_name }}\">My Account</a></li>
</ul>










</div>







", "themes/custom/subtheme/templates/parts/left_profile_menu.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/parts/left_profile_menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 5, "if" => 10);
        static $filters = array("escape" => 2);
        static $functions = array("attach_library" => 2, "path" => 5, "bamboo_load_currentuser" => 6);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                ['attach_library', 'path', 'bamboo_load_currentuser']
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
