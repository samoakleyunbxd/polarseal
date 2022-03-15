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

/* themes/custom/subtheme/templates/page--user--login.html.twig */
class __TwigTemplate_58c8e7747498d731eb735f9fe59c49254223fbbf787236e50e7145b9452b49ac extends \Twig\Template
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
<div class=\"form-wrapper\">
<div id=\"login_box\" class=\"login\">
  <div id=\"top_part\">
    <h1 id=\"the_logo\">
      <a href=\"";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        echo "\">
        <img src=\"/";
        // line 7
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 7, $this->source), "html", null, true);
        echo "/images/assets/login_title.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 7, $this->source), "html", null, true);
        echo "\">
      </a>
    </h1>
  </div>



  <div id=\"login_main_part\">
    <h2 class=\"title\">";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 15, $this->source), "html", null, true);
        echo "</h2>

    ";
        // line 17
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["messages"] ?? null), 17, $this->source), "html", null, true);
        echo "

    ";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
        echo "

  </div>

  <div id=\"login_bottom_part\">
  ";
        // line 24
        if (($context["forgot_password"] ?? null)) {
            // line 25
            echo "    <div class=\"password_link\">
      <a href=\"";
            // line 26
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.pass"));
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Forgot your password?"));
            echo "</a>
    </div>
  ";
        }
        // line 29
        echo "   ";
        if (($context["create_accounts"] ?? null)) {
            // line 30
            echo "    <div class=\"register_link\">
      <a href=\"";
            // line 31
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.register"));
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Register a new account"));
            echo "</a>
    </div>
  ";
        }
        // line 34
        echo "   ";
        if (($context["back_to_homes"] ?? null)) {
            // line 35
            echo "    <div class=\"back_link\">
      <a href=\"";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
            echo "\">&larr; ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Back"));
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 36, $this->source), "html", null, true);
            echo "</a>
    </div>
\t";
        }
        // line 39
        echo "  </div>
</div>
</div>


<script>

let openModalButton = document.querySelector('#edit-submit');




openModalButton.onclick = function(event) {
lsRememberMe();
};



const rmCheck = document.getElementById(\"rememberMe\"),
mameInput = document.getElementById(\"edit-name\");

if (localStorage.checkbox && localStorage.checkbox !== \"\") {
  rmCheck.setAttribute(\"checked\", \"checked\");
  mameInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute(\"checked\");
  mameInput.value = \"\";
}


function lsRememberMe() {
  if (rmCheck.checked && mameInput.value !== \"\") {
    localStorage.username = mameInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = \"\";
    localStorage.checkbox = \"\";
  }
}
</script>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/page--user--login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 39,  115 => 36,  112 => 35,  109 => 34,  101 => 31,  98 => 30,  95 => 29,  87 => 26,  84 => 25,  82 => 24,  74 => 19,  69 => 17,  64 => 15,  51 => 7,  47 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ attach_library('bootstrap_barrio_subtheme/unbxd-styling-login-form') }}
<div class=\"form-wrapper\">
<div id=\"login_box\" class=\"login\">
  <div id=\"top_part\">
    <h1 id=\"the_logo\">
      <a href=\"{{ url('<front>') }}\">
        <img src=\"/{{ directory }}/images/assets/login_title.png\" alt=\"{{ site_name }}\">
      </a>
    </h1>
  </div>



  <div id=\"login_main_part\">
    <h2 class=\"title\">{{ title }}</h2>

    {{ messages }}

    {{ page.content }}

  </div>

  <div id=\"login_bottom_part\">
  {% if forgot_password  %}
    <div class=\"password_link\">
      <a href=\"{{ path('user.pass') }}\">{{ 'Forgot your password?'|t }}</a>
    </div>
  {% endif %}
   {% if create_accounts  %}
    <div class=\"register_link\">
      <a href=\"{{ path('user.register') }}\">{{ 'Register a new account'|t }}</a>
    </div>
  {% endif %}
   {% if back_to_homes  %}
    <div class=\"back_link\">
      <a href=\"{{ url('<front>') }}\">&larr; {{ 'Back'|t }} {{ site_name }}</a>
    </div>
\t{% endif %}
  </div>
</div>
</div>


<script>

let openModalButton = document.querySelector('#edit-submit');




openModalButton.onclick = function(event) {
lsRememberMe();
};



const rmCheck = document.getElementById(\"rememberMe\"),
mameInput = document.getElementById(\"edit-name\");

if (localStorage.checkbox && localStorage.checkbox !== \"\") {
  rmCheck.setAttribute(\"checked\", \"checked\");
  mameInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute(\"checked\");
  mameInput.value = \"\";
}


function lsRememberMe() {
  if (rmCheck.checked && mameInput.value !== \"\") {
    localStorage.username = mameInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = \"\";
    localStorage.checkbox = \"\";
  }
}
</script>
", "themes/custom/subtheme/templates/page--user--login.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/page--user--login.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 24);
        static $filters = array("escape" => 1, "t" => 26);
        static $functions = array("attach_library" => 1, "url" => 6, "path" => 26);

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
