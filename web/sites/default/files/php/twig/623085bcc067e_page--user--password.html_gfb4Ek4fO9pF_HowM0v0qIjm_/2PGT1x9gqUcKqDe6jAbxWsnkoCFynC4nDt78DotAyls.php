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

/* themes/custom/subtheme/templates/page--user--password.html.twig */
class __TwigTemplate_16bf5555e006aa02316d4f29bb7be0f82a57df3de5dcf0b7c50e994fbf0ffc5c extends \Twig\Template
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
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_barrio_subtheme/unbxd-styling-login-form"), "html", null, true);
        echo "
<div id=\"login_box\" class=\"password\">
  <div id=\"top_part\">
    <h1 id=\"the_logo\">
      <a href=\"";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        echo "\">
        <img src=\"/";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 6, $this->source), "html", null, true);
        echo "/images/assets/login_title.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 6, $this->source), "html", null, true);
        echo "\">
      </a>
    </h1>
  </div>

  <div id=\"login_main_part\">
    <h2 class=\"title\">";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 12, $this->source), "html", null, true);
        echo "</h2>

    ";
        // line 14
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
        echo "
    ";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["messages"] ?? null), 15, $this->source), "html", null, true);
        echo "

    ";
        // line 17
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
        echo "
  </div>

  <div id=\"login_bottom_part\">
  ";
        // line 21
        if (($context["login_page_link"] ?? null)) {
            // line 22
            echo "    <div class=\"login_link\">
      <a href=\"";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.login"));
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Login"));
            echo "</a>
    </div>
\t";
        }
        // line 26
        echo " ";
        if (($context["create_accounts"] ?? null)) {
            // line 27
            echo "    <div class=\"register_link\">
      <a href=\"";
            // line 28
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.register"));
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Register a new account"));
            echo "</a>
    </div>
 ";
        }
        // line 30
        echo "\t
";
        // line 31
        if (($context["back_to_homes"] ?? null)) {
            // line 32
            echo "    <div class=\"back_link\">
      <a href=\"";
            // line 33
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
            echo "\">&larr; ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Back"));
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 33, $this->source), "html", null, true);
            echo "</a>
    </div>
 ";
        }
        // line 35
        echo "\t
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/page--user--password.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 35,  117 => 33,  114 => 32,  112 => 31,  109 => 30,  101 => 28,  98 => 27,  95 => 26,  87 => 23,  84 => 22,  82 => 21,  75 => 17,  70 => 15,  66 => 14,  61 => 12,  50 => 6,  46 => 5,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ attach_library('bootstrap_barrio_subtheme/unbxd-styling-login-form') }}
<div id=\"login_box\" class=\"password\">
  <div id=\"top_part\">
    <h1 id=\"the_logo\">
      <a href=\"{{ url('<front>') }}\">
        <img src=\"/{{ directory }}/images/assets/login_title.png\" alt=\"{{ site_name }}\">
      </a>
    </h1>
  </div>

  <div id=\"login_main_part\">
    <h2 class=\"title\">{{ title }}</h2>

    {{ page.highlighted }}
    {{ messages }}

    {{ page.content }}
  </div>

  <div id=\"login_bottom_part\">
  {% if login_page_link  %}
    <div class=\"login_link\">
      <a href=\"{{ path('user.login') }}\">{{ 'Login'|t }}</a>
    </div>
\t{% endif %}
 {% if create_accounts  %}
    <div class=\"register_link\">
      <a href=\"{{ path('user.register') }}\">{{ 'Register a new account'|t }}</a>
    </div>
 {% endif %}\t
{% if back_to_homes  %}
    <div class=\"back_link\">
      <a href=\"{{ url('<front>') }}\">&larr; {{ 'Back'|t }} {{ site_name }}</a>
    </div>
 {% endif %}\t
  </div>
</div>
", "themes/custom/subtheme/templates/page--user--password.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/page--user--password.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 21);
        static $filters = array("escape" => 1, "t" => 23);
        static $functions = array("attach_library" => 1, "url" => 5, "path" => 23);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 't'],
                ['attach_library', 'url', 'path']
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
