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

/* themes/custom/subtheme/templates/profile page/hero section/block--block-content--9e36695c-c4c6-46d9-a12c-6641fdb131b9.html.twig */
class __TwigTemplate_f08e577ac12a834b5c2609bed450ed2e0c2684fd8deb76095fd357d38ac64f63 extends \Twig\Template
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


";
        // line 33
        $context["user2"] = $this->extensions['Drupal\bamboo_twig_loader\TwigExtension\Loader']->loadCurrentUser();
        // line 34
        echo "






<div class=\"profile_hero_section\" ";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 41, $this->source), "html", null, true);
        echo ">


<div class=\"top_bck_image\">

<a class=\"edit_profile\" href=\"/user/";
        // line 46
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user2"] ?? null), "uid", [], "any", false, false, true, 46), "value", [], "any", false, false, true, 46), 46, $this->source), "html", null, true);
        echo "/edit\"><img class=\"\" src=\"/themes/custom/subtheme/images/icons/pencil_icon.png\"></a>



</div>
<div class=\"profile_img\"><img width=\"85\" src=\"";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user2"] ?? null), "user_picture", [], "any", false, false, true, 51), "entity", [], "any", false, false, true, 51), "uri", [], "any", false, false, true, 51), "value", [], "any", false, false, true, 51), 51, $this->source)), "html", null, true);
        echo "\"></div>
<div class=\"profile_info\"><h2>MY ACCOUNT</h2></div>
<p>Welcome back to your Polar Seal account <span style=\"text-transform: capitalize;\">";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user2"] ?? null), "name", [], "any", false, false, true, 53), "value", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
        echo "!</span></p>











  
  ";
        // line 66
        $this->displayBlock('content', $context, $blocks);
        // line 69
        echo "</div>


";
    }

    // line 66
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 67
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 67, $this->source), "html", null, true);
        echo " 
  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/profile page/hero section/block--block-content--9e36695c-c4c6-46d9-a12c-6641fdb131b9.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 67,  103 => 66,  96 => 69,  94 => 66,  78 => 53,  73 => 51,  65 => 46,  57 => 41,  48 => 34,  46 => 33,  40 => 30,);
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


{% set user2 = bamboo_load_currentuser() %}







<div class=\"profile_hero_section\" {{ attributes }}>


<div class=\"top_bck_image\">

<a class=\"edit_profile\" href=\"/user/{{ user2.uid.value }}/edit\"><img class=\"\" src=\"/themes/custom/subtheme/images/icons/pencil_icon.png\"></a>



</div>
<div class=\"profile_img\"><img width=\"85\" src=\"{{ file_url(user2.user_picture.entity.uri.value) }}\"></div>
<div class=\"profile_info\"><h2>MY ACCOUNT</h2></div>
<p>Welcome back to your Polar Seal account <span style=\"text-transform: capitalize;\">{{ user2.name.value }}!</span></p>











  
  {% block content %}
    {{ content }} 
  {% endblock %}
</div>


", "themes/custom/subtheme/templates/profile page/hero section/block--block-content--9e36695c-c4c6-46d9-a12c-6641fdb131b9.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/profile page/hero section/block--block-content--9e36695c-c4c6-46d9-a12c-6641fdb131b9.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 33, "block" => 66);
        static $filters = array("escape" => 30);
        static $functions = array("attach_library" => 30, "bamboo_load_currentuser" => 33, "file_url" => 51);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block'],
                ['escape'],
                ['attach_library', 'bamboo_load_currentuser', 'file_url']
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
