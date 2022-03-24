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

/* themes/custom/subtheme/templates/profile page/content/block--views-block--projects-list-block-1.html.twig */
class __TwigTemplate_becca85a623c5db9dd78a66c2a9a815969ba7f673976f54cfcc175e643a5aae6 extends \Twig\Template
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
        // line 32
        echo "
";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_barrio_subtheme/unbxd-styling-article-slider"), "html", null, true);
        echo "

<div class=\"profile-column projects-list\">

<p class=\"column_header\">ALL RUNNING PROJECTS</p>


";
        // line 40
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("projects_list", "block_1"), "html", null, true);
        echo "






</div>





<script type=\"text/javascript\">


//check how many project exist (based on generated column)
document.addEventListener(\"DOMContentLoaded\", function(event) {


var number = jQuery('.view-projects-list').find('.views-col').length;

if(number==0)
{
jQuery('.projects-list').append('<h3>You have no project running</h3>');
}


  jQuery('#article_slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
  responsive: [
    {
      breakpoint: 999,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]




  });


});










</script>



<div class=\"profile-column articles\"> 


<div class=\"centered\">
\t<h2>NEWS AND RELEASES</h2>
 </div>


<div id=\"article_slider\">


";
        // line 114
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            echo " 

<div class=\"article_item\"> 

<a href=\"";
            // line 118
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 118), "value", [], "any", false, false, true, 118)]), "html", null, true);
            echo "\">
";
            // line 119
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalImage($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "field_image", [], "any", false, false, true, 119), "target_id", [], "any", false, false, true, 119), 119, $this->source), "medium"), "html", null, true);
            echo "
</a>


<div class=\"article_info profile-column\">
<a href=\"";
            // line 124
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 124), "value", [], "any", false, false, true, 124)]), "html", null, true);
            echo "\"><span class=\"article_title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, true, 124), "value", [], "any", false, false, true, 124), 124, $this->source));
            echo "</span></a>
<span class=\"article_body\">";
            // line 125
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "body", [], "any", false, false, true, 125), "value", [], "any", false, false, true, 125), 125, $this->source));
            echo "</span>
<p><span class=\"article_date\">";
            // line 126
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "revision_timestamp", [], "any", false, false, true, 126), "value", [], "any", false, false, true, 126), 126, $this->source), "F d,Y"), "html", null, true);
            echo "</span></p>

<div class=\"link_to\">
<a href=\"";
            // line 129
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 129), "value", [], "any", false, false, true, 129)]), "html", null, true);
            echo "\">
link
</a>
</div>

</div>



</div>


";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 142
        echo "



</div>






 </div>








";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/profile page/content/block--views-block--projects-list-block-1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 142,  166 => 129,  160 => 126,  156 => 125,  150 => 124,  142 => 119,  138 => 118,  129 => 114,  52 => 40,  42 => 33,  39 => 32,);
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
 * - content_attributes: Same as attributes, except applied to the main content
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

{{ attach_library('bootstrap_barrio_subtheme/unbxd-styling-article-slider') }}

<div class=\"profile-column projects-list\">

<p class=\"column_header\">ALL RUNNING PROJECTS</p>


{{ drupal_view('projects_list', 'block_1') }}






</div>





<script type=\"text/javascript\">


//check how many project exist (based on generated column)
document.addEventListener(\"DOMContentLoaded\", function(event) {


var number = jQuery('.view-projects-list').find('.views-col').length;

if(number==0)
{
jQuery('.projects-list').append('<h3>You have no project running</h3>');
}


  jQuery('#article_slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
  responsive: [
    {
      breakpoint: 999,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]




  });


});










</script>



<div class=\"profile-column articles\"> 


<div class=\"centered\">
\t<h2>NEWS AND RELEASES</h2>
 </div>


<div id=\"article_slider\">


{% for article in articles %} 

<div class=\"article_item\"> 

<a href=\"{{ path('entity.node.canonical', {'node':  article.nid.value}) }}\">
{{ drupal_image(article.field_image.target_id,'medium') }}
</a>


<div class=\"article_info profile-column\">
<a href=\"{{ path('entity.node.canonical', {'node':  article.nid.value}) }}\"><span class=\"article_title\">{{article.title.value | raw}}</span></a>
<span class=\"article_body\">{{article.body.value | raw}}</span>
<p><span class=\"article_date\">{{ article.revision_timestamp.value|date('F d,Y') }}</span></p>

<div class=\"link_to\">
<a href=\"{{ path('entity.node.canonical', {'node':  article.nid.value}) }}\">
link
</a>
</div>

</div>



</div>


{% endfor %}




</div>






 </div>








", "themes/custom/subtheme/templates/profile page/content/block--views-block--projects-list-block-1.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/profile page/content/block--views-block--projects-list-block-1.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 114);
        static $filters = array("escape" => 33, "raw" => 124, "date" => 126);
        static $functions = array("attach_library" => 33, "drupal_view" => 40, "path" => 118, "drupal_image" => 119);

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'raw', 'date'],
                ['attach_library', 'drupal_view', 'path', 'drupal_image']
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
